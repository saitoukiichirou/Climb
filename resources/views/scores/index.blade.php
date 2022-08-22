@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>{{Auth::user()->name}}さんの段位  [ {{(\App\Models\User::convUserGrade(Auth::user()->grade))}} ]</h4>
                    </div>

                    <div id="app">
                        <div class="card-header p-0 border-0">
                            {{--                            コンテンツスライド切り替えメニュー--}}
                            <div class="swiper-container tab-menu">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">A面</div>
                                    <div class="swiper-slide">B面</div>
                                    <div class="swiper-slide">C面</div>
                                    <div class="swiper-slide">D面</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-hidden px-0">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="swiper-container tab-content">
                                <div class="swiper-wrapper">
                                    {{--ここから Tab A のコンテンツ--}}
                                    <div class="swiper-slide">
                                        <h1 class="text-center">A面 スラブ</h1>
                                        <table class="table table-hover flex justify-content-center">
                                            <thead>
                                            <tr>
                                                <th>グレード</th>
                                                <th>ホールド色</th>
                                                <th>テープ形</th>
                                                <th>完登</th>
                                            </tr>
                                            </thead>

                                            <tboby>
                                                @foreach($problems as $problem)
                                                    @if("A" == $problem->dimension)
                                                        <tr>
                                                            <td>{{\App\Models\Problem::convProblemGrade($problem->grade)}}</td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>

                                                            <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                                        <button class="btn-circle like-toggle" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button><span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @else
                                                                    <span class="likes">
                                                                        <button type="button" class="btn-circle like-toggle liked" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button>
                                                                        <span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                    {{--ここから Tab B のコンテンツ--}}
                                    <div class="swiper-slide">
                                        <h1 class="text-center">B面  100°</h1>
                                        <table class="table table-hover flex justify-content-center">
                                            <thead>
                                            <tr>
                                                <th>グレード</th>
                                                <th>ホールド色</th>
                                                <th>テープ形</th>
                                                <th>完登</th>
                                            </tr>
                                            </thead>

                                            <tboby>
                                                @foreach($problems as $problem)
                                                    @if("B" == $problem->dimension)
                                                        <tr>
                                                            <td>{{\App\Models\Problem::convProblemGrade($problem->grade)}}</td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>
                                                            <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                                        <button class="btn-circle like-toggle" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button><span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @else
                                                                    <span class="likes">
                                                                        <button type="button" class="btn-circle like-toggle liked" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button>
                                                                        <span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                    {{--ここから Tab C のコンテンツ--}}
                                    <div class="swiper-slide">
                                        <h1 class="text-center">C面 125°</h1>
                                        <table class="table table-hover flex justify-content-center">
                                            <thead>
                                            <tr>
                                                <th>グレード</th>
                                                <th>ホールド色</th>
                                                <th>テープ形</th>
                                                <th>完登</th>
                                            </tr>
                                            </thead>

                                            <tboby>
                                                @foreach($problems as $problem)
                                                    @if("C" == $problem->dimension)
                                                        <tr>
                                                            <td>{{\App\Models\Problem::convProblemGrade($problem->grade)}}</td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>
                                                            <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                                        <button class="btn-circle like-toggle" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button><span class="like-counter">{{$problem->likes_count }}</span>
                                                                    </span>
                                                                @else
                                                                    <span class="likes">
                                                                        <button type="button" class="btn-circle like-toggle liked" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button>
                                                                        <span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                    {{--ここから Tab D のコンテンツ--}}
                                    <div class="swiper-slide">
                                        <h1 class="text-center">D面 roof</h1>
                                        <table class="table table-hover flex justify-content-center">
                                            <thead>
                                                <tr>
                                                    <th>グレード</th>
                                                    <th>ホールド色</th>
                                                    <th>テープ形</th>
                                                    <th>完登</th>
                                                </tr>
                                            </thead>
                                            <tboby>
                                                @foreach($problems as $problem)
                                                    @if("D" == $problem->dimension)
                                                        <tr>
                                                            <td>{{\App\Models\Problem::convProblemGrade($problem->grade)}}</td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>
                                                            <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                                        <button class="btn-circle like-toggle" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button><span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @else
                                                                    <span class="likes">
                                                                        <button type="button" class="btn-circle like-toggle liked" data-review-id="{{ $problem->id }}">
                                                                            <i class="fa-solid fa-face-smile"></i>
                                                                        </button>
                                                                        <span class="like-counter">{{$problem->likes_count}}</span>
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
