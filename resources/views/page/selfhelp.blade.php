@extends('layout.layout')

@section('selected-selfhelp')
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