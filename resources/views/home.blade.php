@extends('layouts.app')

@section('title',config('app.name', '一个博客'))
@section('body-class',' index-page')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand text-center">
                    <h2>{{ config('app.name', '一个博客') }}</h2>
                    <h3 class="title text-center">Blog</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="section text-center">
            {{--            <h2 class="title">Your main section here</h2>--}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- 文章 -->
                @foreach($articles as $article)
                    <div class="row">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <a href="{{ route('articles.show', $article->id) }}">
                                    <img class="img" src="{{ asset('storage/'.$article->image ?: 'img/default.jpg') }}"
                                         alt="Card image cap">
                                    <div class="card-title">
                                        {{ $article->title }}
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                @foreach($article->tags as $tag)
                                    <h6 class="card-category text-info">{{ $tag->name }}<</h6>
                                @endforeach
                                @inject('parsedown', 'Parsedown')
                                <p class="card-contact">
                                    {!! Str::limit(strip_tags($parsedown->text($article->body)),660) !!}
                                </p>
                                <div class="card-footer">
                                    <div class="author">
                                    </div>
                                    <div class="stats ml-auto">
                                        {{ $article->created_at }} <i class="material-icons">access_time</i>
                                    </div>
                                </div>
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
        });

        function scrollToDownload() {

            if ($('.section-download').length !== 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script>
@endsection
