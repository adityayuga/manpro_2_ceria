@extends('layout.layout')
@section('header_activities')
    <header class="intro-header" style="background-image: url('img/activities-bg.png')">
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


@section('selected-activities')
active
@endsection

@section('content')

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h1 class="post-title text-center">Aktivitas Kami</h2><br>
                    <hr class="star-light">
                    @foreach ($artikel as $a_artikel)
                <div class="post-preview">
                    <a  href="{{ URL::to('activity/' . $a_artikel->slug) }}" value="<?=$a_artikel->slug?>">
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="30%" align="left">
                            <?PHP if(!$a_artikel->path == "")
                            {?>
                                <img class="img-responsive container" src="<?=$a_artikel->path?>" alt="<?=$a_artikel->path?>" width="300" />
                            <?PHP } ?>
                            </td>
                            <td align="left">
                                <h2 class="post-title responsivetexth2">
                            {!!str_limit($a_artikel->judul, 30,"...")!!}
                                </h2>
                            <p class="post-subtitle responsivetexth3">
                            {!!str_limit($a_artikel->deskripsi,60,"...")!!}
                            </p></td>
                        </tr>
                        </table>
                    </a>
                    <?php if ($a_artikel->kategori == "umum") {?>
                        <p class="post-meta"><!-- kategori artikel dari database--><b>Category </b> <a href="{{URL::to('umum')}}">{{ucfirst($a_artikel->kategori)}}</a> <b>Posted on </b> {{$a_artikel->created_at}}</p>
                    <?php } 
                       else{ ?>
                        <p class="post-meta"><!-- kategori artikel dari database--><b>Category </b> <a href="{{ $a_artikel->kategori }}">{{ucfirst($a_artikel->kategori)}}</a> <b>Posted on </b> {{$a_artikel->created_at}}</p>
                     <?php } ?>
                </div>
                <hr>
                 @endforeach
                <div class="text-center">
                    {!! $artikel->render() !!}
                </div>
                </div>
            </div>
        </div>
    </article>
@stop