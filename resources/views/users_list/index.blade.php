@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card px-0">
                    <div class="card-header">
                        {{ __('会員名簿') }}
                    </div>

                    {{--                        検索機能　漢字での検索のみ  --}}
                    <div class="card-header">
                        {{ __('名前検索') }}
                        <form method="POST" action="{{ route('users_list.search')}}">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="漢字で入力  一部分でも可">
                                <button type="submit" class="btn btn-primary">{{ __('検索') }}</button>
                            </div>
                        </form>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-2 flex-">
                            {{ $users->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <table class="table table-hover flex justify-content-center">
                            <thead>
                            <tr>
                                <th>会員番号</th>
                                <th>名前</th>
                                <th>性別</th>
                                <th>年齢</th>
                                <th>種別</th>
                                <th>段位</th>
                                <th class="text-center">詳細確認</th>
                                <th class="text-center">課題状況</th>
                            </tr>
                            </thead>
                            <tboby>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->member_number}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @if(0 === $user->gender)
                                                男性
                                            @elseif(1 === $user->gender)
                                                女性
                                            @endif
                                        </td>
                                        <td>{{$user->age}}</td>
                                        <td>{{\App\Models\User::convUserClass($user->class)}}</td>
                                        <td>{{\App\Models\User::convUserGrade($user->grade)}}</td>

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
