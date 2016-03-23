@extends('layout.layout')

@section('content')
 <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <form name="createArticle" id="createArticle" novalidate>
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
                            <textarea rows="5" class="form-control" placeholder="Isi Artikel" id="isi" required data-validation-required-message="Harap tuliskan isi artikel."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div class="row control-group">
                		 <div class="form-group col-xs-12 controls">
		                    <label>Jenis Artikel</label>
		                    <form method="post" action="">
		                		<input type="radio" name="etype" value="umum" checked="checked"> Umum
		                		<input type="radio" name="etype" value="selfhelp"> Self Help
		                		<input type="radio" name="etype" value="activites"> Activities
		                    </form>
	                    </div>
                    </div>
                    <hr>
                    <div class="row control-group">
                         <div class="form-group col-xs-12 controls">
                             <label>Gambar Artikel:</label>
                             <form method="post" action="">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                             </form>
                         </div>
                    </div>
                    <hr>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop