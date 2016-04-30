@extends('layout.layout')
@section('header_home')
    <header class="intro-header" style="background-image: url('img/home-bg.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <img class="img-responsive" src="img/logoukdw.png">
                        <h1>PUSAT PENGEMBANGAN PRIBADI</h1>
                        <p class="italic">People's development center</p>
                        <hr class="small">
                        <span class="subheading">Universitas Kristen Duta Wacana</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="moto">
                <p class="moto">- Anda dilayani supaya anda dapat melayani. -</p>
        </div>
    </header>
@stop

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
    <p></p>
    <h3>Tabel Artikel</h3>
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