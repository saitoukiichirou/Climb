@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card px-0">
                    <div class="card-header">{{ __('会員名簿') }}</div>

                    {{--                        検索機能　未実装--}}
                    {{--                    <div class="card-header">--}}
                    {{--                        <h6>{{ __('検索') }}</h6>--}}
                    {{--                        <div>--}}
                    {{--                            <form method="POST" action="{{ route('users_list.index')}}">--}}
                    {{--                                @csrf--}}
                    {{--                                <input type="text" name="name" class="form-control">--}}
                    {{--                                <button type="submit" class="btn btn-primary">{{ __('検索') }}</button>--}}
                    {{--                            </form>--}}

                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover flex justify-content-center">
                            <thead>
                            <tr>
                                <th>会員番号</th>
                                <th>名前</th>
                                <th>性別</th>
                                <th>年齢</th>
                                <th>種別</th>
                                <th class="text-center">詳細確認</th>
                                <th class="text-center">課題状況</th>
                            </tr>
                            </thead>
                            <tboby>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @if(0 === $user->gender)
                                                男性
                                            @elseif(1 === $user->gender)
                                                女性
                                            @endif
                                        </td>
                                        <td>{{$user->age}}</td>
                                        <td>
                                            @if(0 === $user->class)
                                                一般
                                            @elseif(1 === $user->class)
                                                専門・大学
                                            @elseif(2 === $user->class)
                                                高校生以下
                                            @elseif(3 === $user->class)
                                                キッズ
                                            @else
                                                不明
                                            @endif
                                        </td>
                                        {{--    ユーザごとの詳細確認画面へ--}}
                                        <td class="text-center">
                                            <a href="{{route('users_list.show', $user)}}">
                                                <button type="button" class="btn btn-outline-primary">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </button>
                                            </a>
                                        </td>
                                        {{--    ユーザーごとの課題の達成状況確認画面へ--}}
                                        <td class="text-center">
                                            <a href="{{route('scores.show', $user)}}" class="text-center">
                                                <button type="button" class="btn btn-outline-primary">
                                                    <i class="fa-solid fa-file-lines"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tboby>
                        </table>
                        <div class="mb-2 flex-">
                            {{ $users->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
