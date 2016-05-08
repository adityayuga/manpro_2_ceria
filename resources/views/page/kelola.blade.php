@extends('layout.layout')

@section('selected-kelola')
active
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/artikel/load_artikel.js') }}"></script>
@stop
@section('content')

    <!-- Main Content -->

    <div class="alerts">
        @if(session('artikel'))
        <div class='alert alert-success text-center' role='alert'>{{session('artikel')['message']}}</div>
        @endif
    </div>
    <<?php 
        for ($x=0; $x<3;$x++){
            echo "<br>";
        }
     ?>
    <h1 class="text-center post-title">Tabel Artikel</h1><br>
    <hr class="star-light"><br>
    <div >
            <div class="form-group has-feedback">
                <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="search" id="cari" placeholder="Cari Judul...">
                    <a href="" class="glyphicon glyphicon-search form-control-feedback"></a>
            </div>
    </div>
    <div class="tabel_artikel">
        <div class="table-responsive">
            <table class="table table-bordered" style="border:groove;" >
                <thead>
                    <tr style="border:groove;">
                        <th style="border:groove;">No</th>
                        <th style="border:groove;">Judul Artikel</th>
                        <th style="border:groove;">Tanggal</th>
                        <th colspan="2" style="border:groove;text-align: center;">Kelola</th>   
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
                </tr>

            </table>
        </div>
    </div>
@stop