@extends('layout.layout')



@section('script')
<!--    <script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
@stop

@section('content')

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="alerts"></div>

                    <?php if($artikel == null)
                    { ?>
                   <p>tidak ada data</p>

                <?php }
                    else
                    { ?>
                   @foreach($artikel as $a_artikel)
                   <h2 class="section-heading">{{$a_artikel->judul}}</h2>
                   <table>
                   <tr>
                    <td>
                   <p >Posted on {{$a_artikel->created_at}}</p></td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td style="padding : 0px 2px 15px 3px;  ">
                    <div class="fb-share-button" data-href="#" data-layout="button" data-mobile-iframe="true"></div>
                   </td>
                    <td style="padding : 0px 2px 0px 3px;  ">
                     <?PHP
                   $midurl = $a_artikel->kategori;
                   if($a_artikel->kategori == "activities")
                   {
                    $midurl = "activity";
                   }
                   ?>
                   <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{asset($midurl. "/". $a_artikel->slug)}}" data-text="{{$a_artikel->judul}}" data-hashtags="PPPUKDW">Tweet</a>
                   </td>
                   </tr>
                   </table>
                   <br>
                   <?PHP if(!$a_artikel->path == "")
                        {?>
                        <center><img class="img-responsive" src="{{asset($a_artikel->path)}}" alt="<?=$a_artikel->path?>" width="500" />
                    </center></br>
                        <?PHP }?>
                        
                    <?=$a_artikel->content?>

                        <div id="isi_artikel"></div>
                   <div class="form-group col-xs-12">
                    <br>
                    <?PHP
                    if ($a_artikel->kategori == "umum") {
                        echo '<a href="'. URL::to("/") .'" class="btn btn-mini btn-primary">Back</a>';
                    }
                    else
                    {
                        echo '<a href="'. URL::to("/".$a_artikel->kategori."") .'" class="btn btn-mini btn-primary">Back</a>';
                    }
                    ?>
                        </div>

                   @endforeach
                <?php } ?>
                </div>
            </div>
        </div>
    </article>
@stop