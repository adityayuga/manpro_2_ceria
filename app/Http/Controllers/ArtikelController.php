<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artikel;
use View;
use File;
use DB;
class ArtikelController extends Controller
{
	protected $rules = [
        'judul' => ['required', 'max:255', 'unique:artikel,judul'],
        'isi' => ['required'],
        'kategori' => ['required'],
        'deskripsi' => ['required', 'max:255'],
        'image' => ['required'],
    ];

    protected $rulesEdit = [
        'judul' => ['required', 'max:255'],
        'isi' => ['required'],
        'kategori' => ['required'],
        'deskripsi' => ['required', 'max:255'],
        'image' => ['required'],
    ];

    public function detail_artikel($artikel, $slug){
        $artikel = Artikel::where("slug","=",$slug)->get();
         return view('page.post',compact('artikel'));

    }

    public function get_artikel_activities(){
        $artikel = Artikel::where("kategori","=","Activities")->orderby("created_at","desc")->paginate(7);
        return view('page.activities',compact('artikel'));
    }

    public function get_artikel_umum(){
        $artikel = Artikel::where("kategori","=","Umum")->orderby("created_at","desc")->paginate(7);
        return view('page.index',compact('artikel'));
    }
    public function get_artikel_selfhelp(){
        $artikel = Artikel::where("kategori","=","Selfhelp")->orderby("created_at","desc")->paginate(7);
        return view('page.selfhelp',compact('artikel'));
    }

    public function create_post(Request $request){
    	$err_code;
        $error;
        $message;

        $this->validate($request, $this->rules);

        
    	try{
            $artikel = new Artikel;
            $artikel->judul = $request->judul;
            $artikel->content = $this->generateImage($request->isi);
            $artikel->slug = str_replace(" ", '-', strtolower($request->judul));
            $artikel->kategori = $request->kategori;
            $artikel->deskripsi = $request->deskripsi;
            $artikel->path = $this->saveImage($request->image);
            $artikel->save();

            $err_code = 0;
            $error = "Success!";
            $message = ", Artikel telah diupload!";

        }catch(Exception $e){
            $err_code = 0;
            $error = "Warning!";
            $message = ", Artikel gagal diupload!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'message' => $message]);
    }

	public function kelola_post(Request $request){
		
    	$err_code;
        $error;
        $message;		
        $data;
        $kataKunci;
        try{

            $err_code = 0;
            $error = "Sukses!";
            $message = ", load data!";
            $kataKunci = $request->kataKunci;
            $data = Artikel::
            			select('artikel.id', 'artikel.judul', 'artikel.created_at')->where('artikel.judul',  'like', '%'.$kataKunci.'%' )->get();
        }catch(Exception $e){
            $err_code = 0;
            $error = "error!";
            $message = ", artikel gagal di load!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'data' => $data, 'message' => $message]);

	}


	public function edit_post(Request $request){
		
    	$err_code;
        $error;
        $message;		
        $data;
        $id;
        try{

            $err_code = 0;
            $error = "Sukses!";
            $message = ", load data!";
            $id = $request->id;
            $data = Artikel::
            			select('artikel.id','artikel.deskripsi', 'artikel.judul', 'artikel.content', 'artikel.kategori')->where('artikel.id',  'like', '%'.$id.'%' )->get();

        }catch(Exception $e){
            $err_code = 0;
            $error = "error!";
            $message = ", artikel gagal di load!";
        }
        
        return response()->json(['error_code' => $err_code, 'error' => $error, 'data' => $data, 'message' => $message]);

	}

	public function update_post(Request $request){
    	$err_code;
        $error;
        $message;

        $this->validate($request, $this->rulesEdit);
        
    	try{
    		$artikel = new Artikel;

			$artikel->exists = true;
			$artikel->id = $request->id;
            
            $artikel->judul = $request->judul;
            $artikel->deskripsi = $request->deskripsi;
            $artikel->content = $this->generateImage($request->isi);
            $artikel->slug = str_replace(" ", '-', strtolower($request->judul));
            $artikel->kategori = $request->kategori;
            $artikel->updated_at = $request->updated_at;
            $artikel->save();

            $err_code = 0;
            $error = "Success!";
            $message = ", Artikel telah diedit!";

        }catch(Exception $e){
            $err_code = 0;
            $error = "Warning!";
            $message = ", Artikel gagal diedit!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'message' => $message]);
    }

    public function delete_post(Request $request){
        //return redirect('/');
        try{
            $artikel = Artikel::find($request->id);
            File::delete($artikel->path);

            $artikel->delete();

            $err_code = 0;
            $error = "Success!";
            $message = ", Artikel telah dihapus!";

        }catch(Exception $e){
            $err_code = 0;
            $error = "Warning!";
            $message = ", Artikel gagal dihapus!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'message' => $message]);
    }

    private function generateImage($html){
    	$html = preg_replace_callback("/src=\"data:([^\"]+)\"/", function ($matches) {
		    list($contentType, $encContent) = explode(';', $matches[1]);
		    if (substr($encContent, 0, 6) != 'base64') {
		        return $matches[0]; // Don't understand, return as is
		    }
		    $imgBase64 = substr($encContent, 6);
		    $imgFilename = md5($imgBase64); // Get unique filename
		    //$imgFilename = $title . "_image_" . date();
		    $imgExt = '';
		    switch($contentType) {
		        case 'image/jpeg':  $imgExt = 'jpg'; break;
		        case 'image/gif':   $imgExt = 'gif'; break;
		        case 'image/png':   $imgExt = 'png'; break;
		        default:            return $matches[0]; // Don't understand, return as is
		    }

		    $dir = "images/";
		    
		    if (!is_dir($dir)) {
			    mkdir($dir, 0777, true);
			}

		    $imgPath = $dir.$imgFilename.'.'.$imgExt;
		    // Save the file to disk if it doesn't exist
		    if (!file_exists($imgPath)) {
		        $imgDecoded = base64_decode($imgBase64);
		        $fp = fopen($imgPath, 'w');
		        if (!$fp) {
		            return $matches[0];
		        }
		        fwrite($fp, $imgDecoded);
		        fclose($fp);
		    }
		    return 'src="'.$imgPath.'"';
		}, $html);

		return $html;
    }

    private function saveImage($data){

        list($type, $encContent) = explode(';', $data);
        list($str, $contentType) = explode(':', $type);
        if (substr($encContent, 0, 6) != 'base64') {
            return -1; // Don't understand, return as is
        }
        $imgBase64 = substr($encContent, 6);
        $imgFilename = md5($imgBase64); // Get unique filename
        //$imgFilename = $title . "_image_" . date();
        $imgExt = '';
        switch($contentType) {
            case 'image/jpeg':  $imgExt = 'jpg'; break;
            case 'image/gif':   $imgExt = 'gif'; break;
            case 'image/png':   $imgExt = 'png'; break;
            default:            return $matches[0]; // Don't understand, return as is
        }

        $dir = "images/";
        
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $imgPath = $dir.$imgFilename.'.'.$imgExt;
        // Save the file to disk if it doesn't exist
        if (!file_exists($imgPath)) {
            $imgDecoded = base64_decode($imgBase64);
            $fp = fopen($imgPath, 'w');
            if (!$fp) {
                return $matches[0];
            }
            fwrite($fp, $imgDecoded);
            fclose($fp);
        }
        return $imgPath;
    }
}

