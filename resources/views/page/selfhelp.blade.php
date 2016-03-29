@extends('layout.layout')
<<<<<<< HEAD
@section('header_selfhelp')
    <header class="intro-header" style="background-image: url('img/selfhelp-bg.png')">
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
=======

@section('selected-selfhelp')
active
@endsection

>>>>>>> bb6ace6270dd5300d966c2eea7edae472e6160bd
@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Tahu dan Kenali Bakatmu!
                        </h2>
                        <h3 class="post-subtitle">
                            Apa itu bakat?
                            Bakat merupakan kemampuan atau keahlian khusus dalam suatu bidang yang dikuasai oleh seseorang sehingga
                        </h3>
                    </a>
                    <p class="post-meta">Posted on March 22, 2016</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Mengatasi kecanduan alkohol
                        </h2>
                        <h3 class="post-subtitle">
                            Di sejumlah budaya tertentu alkohol menjadi minuman favorit. Banyak orang menghubungkan alkohol dengan kesenangan, relasi sosial, dan perayaan. 
                        </h3>
                    </a>
                    <p class="post-meta">Posted by on September 18, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Hidup berdamai dengan trauma
                        </h2>
                        <h3 class="post-subtitle">
                            Apa sih trauma itu?
                            Kejadian yang menurut orang yang mengalaminya terasa sangat menyakitkan, tajam mengiris, dan di luar
                        </h3>
                    </a>
                    <p class="post-meta">Posted on August 24, 2014</p>
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