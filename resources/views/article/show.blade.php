@extends('layouts.app')

@section('title', $article->title)
@section('body-class','profile-page')

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="section text-center">
{{--            <h2 class="title">Your main section here</h2>--}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- 文章 -->

                <div class="card card-blog">
                    <div class="card-header card-header-image">
                        <div>
                            <img class="img" src="{{ asset($article->cover ?: 'img/default.jpg') }}" alt="Card image cap">
                            <div class="card-title">
                                {{ $article->title }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($article->tags as $tag)
                            <h6 class="card-category text-info">{{ $tag->name }}<</h6>
                        @endforeach
                        <p class="card-contact">
                            {{ $article->content }}
                        </p>
                        <div class="card-footer">
                            <div class="author">
                            </div>
                            <div class="stats ml-auto">
                                <i class="material-icons">access_time</i> {{ $article->created_at }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
