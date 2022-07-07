@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--            <div class="col-md-8">--}}
            <div class="md-8">
                <div class="card">
                    <div class="card-header">{{ __('課題編集画面') }}</div>
                    <span class="ml-auto">
          <a href="{{route('problems.edit', $problem)}}"><button class="btn btn-primary">編集</button></a>
        </span>
                    <span class="ml-2">
          <form method="post" action="{{route('problems.destroy', $problem)}}">
            @csrf
              @method('delete')
            <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>
          </form>
        </span>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-hover flex justify-content-center">
                                <thead>
                                <tr>
                                    <th>セット面</th>
                                    <th>グレード</th>
                                    <th>ホールド色</th>
                                    <th>テープ形</th>
                                    <th>セッター名</th>
                                </tr>
                                </thead>
                                <tboby>
                                    {{--                                        @foreach($problems as $problem)--}}
                                    <tr>
                                        <td>{{$problem->dimension}}</td>
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
                                        <td>{{$problem->setter}}</td>
                                    </tr>
                                    {{--                                        @endforeach--}}
                                </tboby>
                            </table>
                            {{--                            </div>--}}
                            {{--                        <table class="flex justify-content-center">--}}
                            {{--                            <tr><th class="w-10">会員番号</th><td>{{$user->id}}</td></tr>--}}
                            {{--                            <tr><th>性別</th><td>--}}
                            {{--                                    @if(0 === $user->gender)--}}
                            {{--                                        男性--}}
                            {{--                                    @elseif(1 === $user->gender)--}}
                            {{--                                        女性--}}
                            {{--                                    @endif--}}
                            {{--                                </td></tr>--}}
                            {{--                            <tr><th>生年月日</th><td>{{$user->birthday}}</td></tr>--}}
                            {{--                            <tr><th>住所</th><td>{{$user->address}}</td></tr>--}}
                            {{--                            <tr><th>電話番号</th><td>{{$user->phone}}</td></tr>--}}
                            {{--                            <tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>--}}
                            {{--                        </table>--}}

                            <span class="ml-auto">
{{--                            <a href="{{route('users_list.edit', $user)}}"><button class="btn btn-primary">編集</button></a>--}}
                        </span>
                            <span class="ml-2">
{{--                          <form method="post" action="{{route('users_list.destroy', $user)}}">--}}
                                {{--                            @csrf--}}
                                {{--                              @method('delete')--}}
                                {{--                            <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>--}}
                                {{--                          </form>--}}
                        </span>
                            <span class="ml-auto">
                            <a href="{{route('problems.index')}}"><button class="btn btn-primary"><i class="fa-solid fa-angle-left"></i> 戻る</button></a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
