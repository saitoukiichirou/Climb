@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('スコア表') }}</div>

                    <div id="app">
                        <div class="card-header">
                            {{--                            コンテンツスライド切り替え--}}
                            <div class="swiper-container tab-menu">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">A面</div>
                                    <div class="swiper-slide">B面</div>
                                    <div class="swiper-slide">C面</div>
                                    <div class="swiper-slide">D面</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif


                            <div class="swiper-container tab-content">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <h1>A面</h1>
                                        //ここにTab 1のコンテンツを追加
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
                                                            <td>
                                                                @if("00" == $problem->grade)
                                                                    3段
                                                                @elseif("01" == $problem->grade)
                                                                    2段
                                                                @elseif("02" == $problem->grade)
                                                                    初段
                                                                @elseif("03" == $problem->grade)
                                                                    1級
                                                                @elseif("4" == $problem->grade)
                                                                    2級
                                                                @elseif("05" == $problem->grade)
                                                                    3級
                                                                @elseif("06" == $problem->grade)
                                                                    4級
                                                                @elseif("07" == $problem->grade)
                                                                    5級
                                                                @elseif("08" == $problem->grade)
                                                                    6級
                                                                @elseif("09" == $problem->grade)
                                                                    7級
                                                                @elseif("10" == $problem->grade)
                                                                    8級
                                                                @else
                                                                    不明
                                                                @endif
                                                            </td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>


                                                            <!------------------------------------------------>
                                                            <!-- いいね機構はじまり                            -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle" data-review-id="{{ $problem->id }}"></i>
                                              <span class="like-counter">{{$problem->likes_count}}</span>
                                            </span><!-- /.likes -->
                                                                @else
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle liked" data-review-id="{{ $problem->id }}"></i>
                                                <span class="like-counter">{{$problem->likes_count}}</span>
                                                </span><!-- /.likes -->
                                                                @endif
                                                            </td>
                                                            <!------------------------------------------------>
                                                            <!-- いいね機構おわり                              -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1>B面</h1>
                                        //ここにTab 2のコンテンツを追加
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
                                                            <td>
                                                                @if("00" == $problem->grade)
                                                                    3段
                                                                @elseif("01" == $problem->grade)
                                                                    2段
                                                                @elseif("02" == $problem->grade)
                                                                    初段
                                                                @elseif("03" == $problem->grade)
                                                                    1級
                                                                @elseif("4" == $problem->grade)
                                                                    2級
                                                                @elseif("05" == $problem->grade)
                                                                    3級
                                                                @elseif("06" == $problem->grade)
                                                                    4級
                                                                @elseif("07" == $problem->grade)
                                                                    5級
                                                                @elseif("08" == $problem->grade)
                                                                    6級
                                                                @elseif("09" == $problem->grade)
                                                                    7級
                                                                @elseif("10" == $problem->grade)
                                                                    8級
                                                                @else
                                                                    不明
                                                                @endif
                                                            </td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>


                                                            <!------------------------------------------------>
                                                            <!-- いいね機構はじまり                            -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle" data-review-id="{{ $problem->id }}"></i>
                                              <span class="like-counter">{{$problem->likes_count}}</span>
                                            </span><!-- /.likes -->
                                                                @else
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle liked" data-review-id="{{ $problem->id }}"></i>
                                                <span class="like-counter">{{$problem->likes_count}}</span>
                                                </span><!-- /.likes -->
                                                                @endif
                                                            </td>
                                                            <!------------------------------------------------>
                                                            <!-- いいね機構おわり                              -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1>C面</h1>
                                        //ここにTab 3のコンテンツを追加
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
                                                            <td>
                                                                @if("00" == $problem->grade)
                                                                    3段
                                                                @elseif("01" == $problem->grade)
                                                                    2段
                                                                @elseif("02" == $problem->grade)
                                                                    初段
                                                                @elseif("03" == $problem->grade)
                                                                    1級
                                                                @elseif("4" == $problem->grade)
                                                                    2級
                                                                @elseif("05" == $problem->grade)
                                                                    3級
                                                                @elseif("06" == $problem->grade)
                                                                    4級
                                                                @elseif("07" == $problem->grade)
                                                                    5級
                                                                @elseif("08" == $problem->grade)
                                                                    6級
                                                                @elseif("09" == $problem->grade)
                                                                    7級
                                                                @elseif("10" == $problem->grade)
                                                                    8級
                                                                @else
                                                                    不明
                                                                @endif
                                                            </td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>


                                                            <!------------------------------------------------>
                                                            <!-- いいね機構はじまり                            -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle" data-review-id="{{ $problem->id }}"></i>
                                              <span class="like-counter">{{$problem->likes_count}}</span>
                                            </span><!-- /.likes -->
                                                                @else
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle liked" data-review-id="{{ $problem->id }}"></i>
                                                <span class="like-counter">{{$problem->likes_count}}</span>
                                                </span><!-- /.likes -->
                                                                @endif
                                                            </td>
                                                            <!------------------------------------------------>
                                                            <!-- いいね機構おわり                              -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1>D面</h1>
                                        //ここにTab 4のコンテンツを追加
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
                                                            <td>
                                                                @if("00" == $problem->grade)
                                                                    3段
                                                                @elseif("01" == $problem->grade)
                                                                    2段
                                                                @elseif("02" == $problem->grade)
                                                                    初段
                                                                @elseif("03" == $problem->grade)
                                                                    1級
                                                                @elseif("4" == $problem->grade)
                                                                    2級
                                                                @elseif("05" == $problem->grade)
                                                                    3級
                                                                @elseif("06" == $problem->grade)
                                                                    4級
                                                                @elseif("07" == $problem->grade)
                                                                    5級
                                                                @elseif("08" == $problem->grade)
                                                                    6級
                                                                @elseif("09" == $problem->grade)
                                                                    7級
                                                                @elseif("10" == $problem->grade)
                                                                    8級
                                                                @else
                                                                    不明
                                                                @endif
                                                            </td>
                                                            <td>{{$problem->hold_color}}</td>
                                                            <td>{{$problem->tape_form}}</td>


                                                            <!------------------------------------------------>
                                                            <!-- いいね機構はじまり                            -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>
                                                            <td>
                                                                @if (!$problem->isLikedBy(Auth::user()))
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle" data-review-id="{{ $problem->id }}"></i>
                                              <span class="like-counter">{{$problem->likes_count}}</span>
                                            </span><!-- /.likes -->
                                                                @else
                                                                    <span class="likes">
                                                    <i class="fa-solid fa-thumbs-up heart like-toggle liked" data-review-id="{{ $problem->id }}"></i>
                                                <span class="like-counter">{{$problem->likes_count}}</span>
                                                </span><!-- /.likes -->
                                                                @endif
                                                            </td>
                                                            <!------------------------------------------------>
                                                            <!-- いいね機構おわり                              -->
                                                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                                            <!------------------------------------------------>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tboby>
                                        </table>
                                    </div>
                                </div>
                            </div>


{{--                            {{ __('You are logged in!') }}--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
