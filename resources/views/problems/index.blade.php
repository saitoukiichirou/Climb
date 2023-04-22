@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card px-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('課題一覧') }}
                        <div>
                            <a href="{{route('problems.create')}}" class="text-decoration-none">
                                <button type="button" class="btn btn-primary">{{ __('ボルダー課題追加')}}</button>
                            </a>
                            <a href="{{route('problems.create')}}" class="mr-0">
                                <button type="button" class="btn btn-primary">{{ __('リード課題追加')}}</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-header p-0 border-0">
                        {{--   スライド切り替えメニュー--}}
                        <div class="swiper-container tab-menu">
                            <div class="swiper-wrapper">
                                {{-- ヘッダーの幅は親要素の50パーセント --}}
                                <div class="swiper-slide w-33">ボルダー課題</div>
                                <div class="swiper-slide w-33">スクール課題</div>
                                <div class="swiper-slide w-34">リード壁</div>
{{--                                <div class="swiper-slide">キッズウォール</div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body overflow-hidden px-0">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="swiper-container tab-content">
                            <div class="swiper-wrapper">
                                {{--ここから 通常課題 のコンテンツ--}}
                                <div class="swiper-slide">
                                    <h1 class="text-center">ボルダー課題</h1>

                                    <table class="table table-hover flex justify-content-center">
                                        <thead>
                                        <tr>
                                            <th>セット面</th>
                                            <th>グレード</th>
                                            <th>ホールド色</th>
                                            <th>テープ形</th>
                                            <th>セッター名</th>
                                            <th>追加日</th>
                                            <th>完登者数</th>
                                            <th>編集</th>
                                            <th>削除</th>
                                        </tr>
                                        </thead>
                                        <tboby>
                                            @foreach($problems as $problem)
                                                <tr>
                                                    <td>{{$problem->dimension}}</td>
                                                    <td>{{\App\Models\Problem::convProblemGrade($problem->grade)}}</td>
                                                    <td>{{$problem->hold_color}}</td>
                                                    <td>{{$problem->tape_form}}</td>
                                                    <td>{{$problem->setter}}</td>
                                                    <td>{{$problem->created_at->format('Y-m-d')}}</td>
                                                    <td>
                                                        {{--完登者数のカウント--}}
                                                        @if($problem->scores->count())
                                                            {{$problem->scores->count()}}人
                                                        @else
                                                            {{ __('無し') }}
                                                        @endif
                                                    </td>

                                                    {{--                                        課題ごとの編集画面へ--}}
                                                    <td class="p-1">
                                                        <a href="{{route('problems.edit', $problem)}}">
                                                            <button type="button" class="btn btn-outline-primary pr-2">
                                                                <i class="fa-solid fa-file-pen"></i>
                                                            </button>
                                                        </a>
                                                    </td>

                                                    {{--                                        課題の削除--}}
                                                    <td class="p-1">
                                                        <form method="post" action="{{route('problems.destroy', $problem)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger" onClick="return confirm('本当に削除しますか？');">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tboby>
                                    </table>
                                </div>

                                {{--ここから スクール課題 のコンテンツ--}}
                                <div class="swiper-slide">
                                    <h1 class="text-center">スクール課題</h1>

                                    <table class="table table-hover flex justify-content-center">
                                        <thead>
                                        <tr>
                                            <th>セット面</th>
                                            <th>グレード</th>
                                            <th>ホールド色</th>
                                            <th>テープ形</th>
                                            <th>セッター名</th>
                                            <th>追加日</th>
                                            <th>完登者数</th>
                                            <th>編集</th>
                                            <th>削除</th>
                                        </tr>
                                        </thead>
                                        <tboby>
                                            @foreach($problems_scl as $problem)
                                                <tr>
                                                    <td>{{$problem->dimension}}</td>
                                                    <td>{{\App\Models\Problem::convProblemGrade($problem->grade)}}</td>
                                                    <td>{{$problem->hold_color}}</td>
                                                    <td>{{$problem->tape_form}}</td>
                                                    <td>{{$problem->setter}}</td>
                                                    <td>{{$problem->created_at->format('Y-m-d')}}</td>
                                                    <td>
                                                        {{--完登者数のカウント--}}
                                                        @if($problem->scores->count())
                                                            {{$problem->scores->count()}}人
                                                        @else
                                                            無し
                                                        @endif
                                                    </td>

                                                    {{--                                        課題ごとの編集画面へ--}}
                                                    <td class="p-1">
                                                        <a href="{{route('problems.edit', $problem)}}">
                                                            <button type="button" class="btn btn-outline-primary pr-2">
                                                                <i class="fa-solid fa-file-pen"></i>
                                                            </button>
                                                        </a>
                                                    </td>

                                                    {{--                                        課題の削除--}}
                                                    <td class="p-1">
                                                        <form method="post" action="{{route('problems.destroy', $problem)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger" onClick="return confirm('本当に削除しますか？');">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tboby>
                                    </table>
                                </div>

                                {{--ここから リード課題 のコンテンツ--}}
                                <div class="swiper-slide">
                                    <h1 class="text-center">リード壁</h1>

                                    <table class="table table-hover flex justify-content-center">
                                        <thead>
                                        <tr>
                                            <th>グレード</th>
                                            <th>ホールド色</th>
                                            <th>セッター名</th>
                                            <th>追加日</th>
                                            <th>完登者数</th>
                                            <th>編集</th>
                                            <th>削除</th>
                                        </tr>
                                        </thead>
                                        <tboby>
                                             {{--@foreach($problems_scl as $problem)--}}
                                                <tr>
                                                    <td>グレード</td>
                                                    <td>ホールド色</td>
                                                    <td>セッター名</td>
                                                    <td>課題作成年月日</td>
                                                    <td>人数</td>


                                                    {{--                                        課題ごとの編集画面へ--}}
                                                    <td class="p-1">
                                                        {{--<a href="{{route('problems.edit', $problem)}}">--}}
                                                            <button type="button" class="btn btn-outline-primary pr-2">
                                                                <i class="fa-solid fa-file-pen"></i>
                                                            </button>
                                                         {{--</a>--}}
                                                    {{--</td>--}}

                                                    {{--                                        課題の削除--}}
                                                    <td class="p-1">
                                                         {{--<form method="post" action="{{route('problems.destroy', $problem)}}">--}}
                                                             {{--@csrf--}}
                                                             {{--@method('delete')--}}
                                                            <button type="submit" class="btn btn-outline-danger" onClick="return confirm('本当に削除しますか？');">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                         {{--</form>--}}
                                                    </td>

                                                </tr>
                                             {{--@endforeach--}}
                                        </tboby>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

