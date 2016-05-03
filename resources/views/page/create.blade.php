@extends('layout.layout')

@section('selected-create')
active
@endsection

@section('css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('js/artikel/create_artikel.js') }}"></script>
    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>-->
    <script type="text/javascript" src="{{ asset('js/artikel/summernote.js') }}"></script>
@stop


@section('content')
 <!-- Main Content -->
    <div class="container">
        <div class="row">
        <h1 class="text-center tambahtengah">Tambah Artikel</h1>
            <div class="alerts"></div>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" placeholder="Judul Artikel" id="judul" required data-validation-required-message="Harap tuliskan judul artikel.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div class="row control-group">
                    <!-- displaying foto disini -->
                    <img id="fotoxx" class="img-responsive" width="300px;" max-width="500px" max-height="250px";>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 controls">
                        <label for="inputpicture">Foto Artikel</label>
                        
                        <table>
                            <th>
                                <input type="file" name="picture" class="" id="inputpicture"></th>
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
                        <textarea name="deskripsi" id="deskripsi" cols="70" rows="5" placeholder="Deskripsi Artikel"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Isi</label>
                        <div id="isi_artikel"></div>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div class="row control-group">
            		 <div class="form-group col-xs-12 controls">
	                    <label>Jenis Artikel</label>
	                		<label><input type="radio" name="etype" value="umum" checked="checked"> Umum </label>
	                		<label><input type="radio" name="etype" value="selfhelp"> Self Help </label>
	                		<label><input type="radio" name="etype" value="activities"> Activities </label>
                    </div>

                </div>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <span class="btn btn-success" id="btn_submit">Submit</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop