@extends('layout.layout')

@section('selected-activities')
active
@endsection

@section('content')

    <!-- Post Content -->
    <article>
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
                        <p class="post-meta">Posted by on September 24, 2014</p>
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
                        <p class="post-meta">Posted by on September 18, 2014</p>
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
                        <p class="post-meta">Posted by on August 24, 2014</p>
                    </div>
                </div>
            </div>
        </div>
    </article>
@stop