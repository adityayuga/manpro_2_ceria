<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artikel;

class ArtikelController extends Controller
{
	protected $rules = [
        'judul' => ['required', 'max:255'],
        'isi' => ['required'],
        'kategori' => ['required'],
    ];

    public function create_post(Request $request){
    	$err_code;
        $error;
        $message;

        $this->validate($request, $this->rules);
        
    	try{
            $artikel = new Artikel;
            $artikel->judul = $request->judul;
            $artikel->content = $this->generateImage($request->isi);
            $artikel->slug = $request->judul;
            $artikel->kategori = $request->kategori;

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
}
