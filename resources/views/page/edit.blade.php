@extends('layout.layout')
@section('header_home')
    <header class="intro-header" style="background-image: url('img/home-bg.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <img class="img-responsive" src="img/logoukdw.png">
                        <h1>PUSAT PENGEMBANGAN PRIBADI</h1>
                        <hr class="small">
                        <span class="subheading">Universitas Kristen Duta Wacana</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('js/artikel/edit_artikel.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
@stop


@section('content')
 <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="alerts"></div>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" placeholder="Judul Artikel" id="judul" required data-validation-required-message="Harap tuliskan judul artikel.">
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
	                		<label><input class="CBumum" type="radio" name="etype" value="umum" > Umum </label>
	                		<label><input class="CBsh" type="radio" name="etype" value="selfhelp"> Self Help </label>
	                		<label><input class="CBact" type="radio" name="etype" value="activites"> Activities </label>
                    </div>

                </div>
                <hr>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input class="btn btn-success" id="btn_submit" type="submit">

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop