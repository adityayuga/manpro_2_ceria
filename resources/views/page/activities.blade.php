@extends('layout.layout')
@section('header_activities')
    <header class="intro-header" style="background-image: url('img/activities-bg.png')">
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


@section('selected-activities')
active
@endsection

@section('content')

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    @foreach ($artikel as $a_artikel)
                <div class="post-preview">
                    <a  href="{{ URL::to('/activity/' . $a_artikel->slug) }}" value="<?=$a_artikel->slug?>">
                        <?PHP if(!$a_artikel->path == "")
                        {?>
                        <img src="<?=$a_artikel->path?>" alt="<?=$a_artikel->path?>" width="80" />
                        <?PHP }?>

                        
                        <h2 class="post-title">
                            {{$a_artikel->judul}}
                        </h2>
                        <h3 class="post-subtitle">
                            {!!str_limit($a_artikel->deskripsi,50,"...")!!}
                        </h3>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category Posted by on {{$a_artikel->created_at}}</p>
                </div>
                <hr>
 @endforeach
 
                {!! $artikel->render() !!}
                </div>
            </div>
        </div>
    </article>
@stop