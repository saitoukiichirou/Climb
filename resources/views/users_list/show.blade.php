@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="md-8">
                    <div class="card">
                        <div class="card-header">{{ __('会員情報表示') }}</div>
                        <div class="card-header">
                            <h5>{{ $user->kana }}</h5>
                            <h4>{{ $user->name }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="flex justify-content-center">
                                <tr>
                                    <th class="w-10">会員番号</th>
                                    <td>{{$user->member_number}}</td>
                                </tr>
                                <tr>
                                    <th>性別</th>
                                    <td>
                                        @if(0 === $user->gender)
                                            男性
                                        @elseif(1 === $user->gender)
                                            女性
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>カテゴリ</th>
                                    <td>
                                        @if(0 === $user->class)
                                            一般
                                        @elseif(1 === $user->class)
                                            専門・大学生
                                        @elseif(2 === $user->class)
                                            高校生以下
                                        @elseif(3=== $user->class)
                                            キッズ
                                        @endif
                                    </td>
                                <tr>
                                    <th>生年月日</th>
                                    <td>{{$user->birthday}}</td>
                                </tr>
                                <tr>
                                    <th>住所</th>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th>メールアドレス</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                            </table>

                            <div class="input-group mt-2">
                                <div class="m-2">
                                    <a href="{{route('users_list.index')}}">
                                        <button class="btn btn-primary"><i class="fa-solid fa-angle-left"></i> 戻る</button>
                                    </a>
                                </div>
                                <div class="m-2">
                                    <a href="{{route('users_list.edit', $user)}}">
                                        <button class="btn btn-primary">編集</button>
                                    </a>
                                </div>
                                <div class="m-2">
                                    <form method="post" action="{{route('users_list.destroy', $user)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
