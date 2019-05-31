@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" data-parallax="true" style="background-image:url({{asset('img/header.jpg')}});">
        </div>
        <div class="container">
            <div class="content-center brand">
                <img class="n-logo" src="{{asset('img/now-logo.png')}}" alt="">
                <h1 class="h1-seo">调调的博客.</h1>
                <h3>A beautiful blog.</h3>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- 文章 -->
                    @foreach($articles as $article)
                        <div class="card">
                            <img src="{{ $article->cover ?: 'default.jpg'}}" class="img-fluid card-img-top" alt="Card image cap">
                            <div class="card-body">
                                @foreach($article->tags as $tag)
                                    <span class="label label-info" style="font-size:11px;padding:1px 5px">{{ $tag->name }}</span>
                                @endforeach
                                <p class="card-title">{{ $article->title }}</p>
                                <p class="card-text">{!! Str::limit(strip_tags($article->content), 360) !!}</p>
                                <p class="card-description">- 发表于 {{ $article->created_at }} · 最后访问 {{ $article->updated_at }} -</p>
                                    <div class="card-center-horizontal">
                                    <a href="{{ route('articles.show', $article->id) }}" class="z-button">read more..</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
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
