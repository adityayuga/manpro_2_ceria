@extends('layout.layout')

@section('css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('js/artikel/edit_artikel.js') }}"></script>
    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>-->
    <script type="text/javascript" src="{{ asset('js/artikel/summernote.js') }}"></script>
@stop


@section('content')
 <!-- Main Content -->
 
    <div class="container">
        <div class="row">
        <h1 class="text-center edittengah">Edit Artikel</h1><br>
            <hr class="star-light">
            <div class="alerts"></div>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach ($artikel as $a_artikel)
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" placeholder="Judul Artikel" id="judul" required data-validation-required-message="Harap tuliskan judul artikel." value="{{$a_artikel->judul}}">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                <!-- displaying foto disini -->
				<?PHP if(!$a_artikel->path == "")
                            {?>
                    <img id="fotoxx" width="230" src="../{{ $a_artikel->path }}">
							<?PHP } else { ?>
                    <img id="fotoxx" width="230" >
				<?PHP } ?>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 controls">
                        <label for="inputpicture">Ganti Foto Artikel</label>
                        <table>
                            <th>
                                <input type="file" name="picture" class="" id="inputpicture">
                                <img src="" id="fotoBackup" style="display: none;">
                            </th>
                            <th>
                                <button id="btn-delete-foto" class="btn btn-warning" style="display: none;">Delete Foto</button>
                                <button id="btn-kembalikan-foto" class="btn btn-warning" style="display: none;">
                                    Kembalikan Foto
                                </button>
                            </th>
                        </table>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Deskripsi Artikel</label>
                        <textarea name="deskripsi" id="deskripsi" cols="70" rows="5" placeholder="Deskripsi Artikel">{{ $a_artikel->deskripsi }}</textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Isi</label>
                        <div id="isi_artikel">{!! $a_artikel->content !!}</div>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div class="row control-group">
            		 <div class="form-group col-xs-12 controls">
                     <label>Jenis Artikel</label>
                     <?PHP if($a_artikel->kategori == "umum"){?>
                            <label><input class="CBumum" type="radio" name="etype" value="umum" checked="true"> Umum </label>
                            <label><input class="CBsh" type="radio" name="etype" value="selfhelp"> Self Help </label>
                            <label><input class="CBact" type="radio" name="etype" value="activities"> Activities </label>
                        <?PHP }
                            elseif($a_artikel->kategori == "selfhelp"){
                        ?>
                            <label><input class="CBumum" type="radio" name="etype" value="umum" > Umum </label>
                            <label><input class="CBsh" type="radio" name="etype" value="selfhelp" checked="true"> Self Help </label>
                            <label><input class="CBact" type="radio" name="etype" value="activities"> Activities </label>
                        <?php } 
                            else{
                        ?>
                            <label><input class="CBumum" type="radio" name="etype" value="umum" > Umum </label>
                            <label><input class="CBsh" type="radio" name="etype" value="selfhelp"> Self Help </label>
                            <label><input class="CBact" type="radio" name="etype" value="activities" checked="true"> Activities </label>
                        <?php }?>
	                    
	                		
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input class="btn btn-success" id="btn_submit" type="submit">
                        <a href=" {{URL::to('/kelola')}}" class="btn btn-warning">Cancel</a>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop