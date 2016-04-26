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
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <?PHP if(!$a_artikel->path == "")
                            {?>
                            <td width="30%" align="left">
                                <img src="<?=$a_artikel->path?>" alt="<?=$a_artikel->path?>" height="150" />
                            </td>
                            <?PHP }?>
                            <td align="left">
                                <h2 class="post-title">
                            {{$a_artikel->judul}}
                                </h2>
                            <h3 class="post-subtitle">
                            {!!str_limit($a_artikel->deskripsi,60,"...")!!}
                            </h3></td>
                        </tr>
                        </table>
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