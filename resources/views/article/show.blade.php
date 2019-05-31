@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" data-parallax="true" style="background-image:url({{asset('img/header.jpg')}});">
        </div>

    </div>
    <div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <img src="{{ $article->cover ?: 'default.jpg'}}" class="img-fluid card-img-top" alt="Card image cap">
                    <div class="card-body">
                        @foreach($article->tags as $tag)
                            <span class="label label-info" style="font-size:11px;padding:1px 5px">{{ $tag->name }}</span>
                        @endforeach
                        <p class="card-title">{{ $article->title }}</p>
                        <p class="card-text">{!! Str::limit(strip_tags($article->content), 360) !!}</p>
                        <p class="z-counter">
                            阅读 {{ $article->view }}
                        </p>
                        <div class="z-comments">
                            @foreach ($article->comments as $comment)
                                <hr id="comment{{ $comment->id }}">
                                @if( $comment->user_id == 1 )
                                    <img src="{{ asset('g.jpeg') }}" class="rounded-circle z-avatar">
                                    <p class="z-name z-center-vertical">music-man <span
                                                class="z-label">作 者</span></p>
                                @else
                                    @if( $comment->website )
                                        <p class="z-avatar-text">{{ mb_substr($comment->name, 0, 1) ?: '匿' }}</p>
                                        <a href="{{ $comment->website }}" target="_blank">
                                            <p class="z-name">{{ $comment->name ?: '匿' }}</p>
                                        </a>
                                    @else
                                        <p class="z-avatar-text">{{ mb_substr($comment->name, 0, 1) ?: '匿' }}</p>
                                        <p class="z-name">{{ $comment->name ?: '匿' }}</p>
                                    @endif
                                @endif
                                <p class="z-content">{{ $comment->contents }}</p>
                                <p class="z-info">{{ $comment->created_at->diffForHumans() }} · {{ $comment->city }}
                                    <span data-toggle="modal" data-target="#commentModal"
                                          data-replyid="{{ $comment->id }}"
                                          data-replyname="{{ $comment->name }}"
                                          class="z-reply-btn">
                                </span>
                                </p>
                                <div class="z-reply">
                                    @foreach( $comment->reply as $reply )
                                        @if( $reply->user_id == 1 )
                                            <img src="{{ asset('g.jpeg') }}" class="img-circle z-avatar">
                                            <p class="z-name z-center-vertical">music-man <span
                                                        class="z-label">作 者</span></p>
                                        @else
                                            @if( $reply->website )
                                                <p class="z-avatar-text">{{ mb_substr($reply->name, 0, 1) ?: '匿' }}</p>
                                                <a href="{{ $reply->website }}" target="_blank">
                                                    <p class="z-name">{{ $reply->name ?: '匿' }}</p>
                                                </a>
                                            @else
                                                <p class="z-avatar-text">{{ mb_substr($reply->name, 0, 1) ?: '匿' }}</p>
                                                <p class="z-name">{{ $reply->name ?: '匿' }}</p>
                                            @endif
                                        @endif
                                        <p class="z-content">{{ $reply->contents }}</p>
                                        <p class="z-info">{{ $reply->created_at->diffForHumans() }} · {{ $reply->city }}
                                            <span data-toggle="modal" data-target="#commentModal"
                                                  data-replyid="{{ $reply->id }}"
                                                  data-replyname="{{ $reply->name }}"
                                                  class="z-reply-btn">
                                        </span>
                                        </p>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
{{--        <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            @if (session('message'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session('message') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{ route('comments.store') }}" method="post">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputFile">留言</label>--}}
{{--                            <textarea class="form-control" id="content" name="contents" rows="3" required--}}
{{--                                      title=""></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputPassword1">昵称</label>--}}
{{--                            <input type="text" class="form-control" id="name" name="name" placeholder="[选填] 怎么称呼？"--}}
{{--                                   value="{{ $inputs->name }}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1">邮箱</label>--}}
{{--                            <input type="email" class="form-control" id="email" name="email"--}}
{{--                                   placeholder="[选填] 如果有人回复，会收到邮件提醒" value="{{ $inputs->email }}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputPassword1">个人网站</label>--}}
{{--                            <input type="text" class="form-control" id="website" name="website"--}}
{{--                                   placeholder="[选填] 包含 http:// 或 https:// 的完整域名" value="{{ $inputs->website }}">--}}
{{--                        </div>--}}
{{--                        <input type="hidden" id="parent_id" name="parent_id" value="0">--}}
{{--                        <input type="hidden" id="target_name" name="target_name" value="">--}}
{{--                        <input type="hidden" name="article_id" value="{{ $article->id }}">--}}
{{--                        <input type="submit" class="btn btn-primary">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    </div>
    </div>
</div>


    <!-- comment Modal -->

@endsection

@section('scripts')

@endsection
