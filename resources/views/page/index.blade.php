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

@section('selected-home')
active
@endsection

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Judul
                        </h2>
                        <h3 class="post-subtitle">
                            content artikel
                        </h3>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category Posted by on September 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Judul
                        </h2>
                        <h3 class="post-subtitle">
                            content artikel
                        </h3>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category Posted by on September 24, 2014</p><a href="post.html">
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Judul
                        </h2>
                        <h3 class="post-subtitle">
                            content artikel
                        </h3>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category Posted by on August 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Judul
                        </h2>
                        <h3 class="post-subtitle">
                            content artikel
                        </h3>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category Posted by on July 8, 2014</p>
                </div>
                <hr>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop