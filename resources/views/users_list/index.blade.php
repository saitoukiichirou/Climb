@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
{{--            <div class="md-8">--}}
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
                                    <th>詳細確認</th>
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
                                                キッズ
                                            @elseif(1 === $user->class)
                                                小学生
                                            @elseif(2 === $user->class)
                                                中学生
                                            @elseif(3 === $user->class)
                                                高校生
                                            @elseif(4 === $user->class)
                                                一般
                                            @else
                                                不明
                                            @endif
                                        </td>
                                        <td>
    {{--                                        1ユーザごとの詳細確認画面へ--}}
                                            <a href="{{route('users_list.show', $user)}}"><i class="fa-solid fa-user-pen pl-2"></i></a>
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
