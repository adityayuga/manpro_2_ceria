@extends('layout.layout')
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

@section('selected-selfhelp')
active
@endsection


@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
             <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    @foreach ($artikel as $a_artikel)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{$a_artikel->judul}}
                        </h2>
                        <h3 class="post-subtitle">
                            {!!str_limit($a_artikel->content,50,"...")!!}
                        </h3>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category Posted by on {{$a_artikel->created_at}}</p>
                </div>
                <hr>
                    @endforeach

                {!! $artikel->render() !!}
                <!-- Pager -->
                <!--<ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
@stop