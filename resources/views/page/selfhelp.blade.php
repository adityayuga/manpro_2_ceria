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
                    <a href="{{ URL::to('selfhelp/' . $a_artikel->slug) }}" value="<?=$a_artikel->slug?>">
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <?PHP if(!$a_artikel->path == "")
                            {?>
                            <td width="30%" align="left">
                                <img class="img-responsive container" src="<?=$a_artikel->path?>" alt="<?=$a_artikel->path?>" width="300" />
                            </td>
                            <?PHP }?>
                            <td align="left">
                                <h2 class="post-title responsivetexth2">
                            {{$a_artikel->judul}}
                                </h2>
                            <p class="post-subtitle responsivetexth3">
                            {!!str_limit($a_artikel->deskripsi,60,"...")!!}
                            </p></td>
                        </tr>
                        </table>
                    </a>
                    <p class="post-meta"><!-- kategori artikel dari database-->Category : {{ucfirst($a_artikel->kategori)}} Posted on {{$a_artikel->created_at}}</p>
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