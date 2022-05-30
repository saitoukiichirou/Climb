@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="md-8">
                <div class="card">
                    <div class="card-header">{{ __('会員名簿') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="flex justify-content-center">
                            <tr>
                                <th class="w-10">会員番号</th>
                                <th>名前</th>
{{--                                <th>ふりがな</th>--}}
                                <th>性別</th>
                                <th>生年月日</th>
                                <th>住所</th>
                                <th>電話番号</th>
                                <th>メールアドレス</th>
                                <th>編集</th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->kana}}</td>
                                <td>
                                    @if(1 === $user->gender)
                                        男性
                                    @elseif(2 === $user->gender)
                                        女性
                                    @endif
                                </td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{ route('users_list.show', $user) }}">
                                    <i class="fa-solid fa-user-pen pl-2"></i></a>
{{--                                    <form method="POST" action="{{ route('users_list.') }}">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="id" value="{{$user->id}}">--}}
{{--                                        <button type="submit">--}}
{{--                                            <i class="fa-solid fa-user-pen pl-2"></i></button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
