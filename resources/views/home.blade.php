@extends('layouts.app')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1>Your title here</h1>
                        <h3 class="title text-center">Subtitle</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Your main section here</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- 文章 -->
                    @foreach($articles as $article)
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <a href="{{ route('articles.show', $article->id) }}">
                                    <img class="img" src="{{ $article->cover ?: 'img/default.jpg'}}" alt="Card image cap">
                                    <div class="card-title">
                                        {{ $article->title }}
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                @foreach($article->tags as $tag)
                                    <h6 class="card-category text-info">{{ $tag->name }}<</h6>
                                @endforeach
                                <p class="card-contact">
                                    {{ $article->content }}
                                </p>
                                {{-- <p class="card-text">{!! Str::limit(strip_tags($article->content), 360) !!}</p>--}}
                                <div class="card-footer">
                                    <div class="author">
                                    </div>
                                    <div class="stats ml-auto">
                                        <i class="material-icons">access_time</i> {{ $article->created_at }}
                                        <i class="material-icons">update</i> {{ $article->updated_at }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>

            @endsection

            @section('scripts')
                <script>
                    $(document).ready(function () {
                        // the body of this function is in assets/js/now-ui-kit.js
                        nowuiKit.initSliders();
                    });

                    function scrollToDownload() {

                        if ($('.section-download').length != 0) {
                            $("html, body").animate({
                                scrollTop: $('.section-download').offset().top
                            }, 1000);
                        }
                    }
                </script>
@endsection
