@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--            <div class="col-md-8">--}}
            <div class="md-8">
                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-arrow-turn-down-right"></i>{{ __('会員情報編集') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{--以下修正用フォーム--}}
{{--                        <form id="target" method="POST" action="{{ route('users_list_edited') }}">--}}
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            {{--名前--}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--かな--}}
                            <div class="row mb-3">
                                <label for="kana" class="col-md-4 col-form-label text-md-end">{{ __('かな') }}</label>

                                <div class="col-md-6">
                                    <input id="kana" type="text" class="form-control @error('かな') is-invalid @enderror" name="kana" value="{{$user->kana}}" required autocomplete="kana" autofocus>

                                    @error('kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--性別--}}
                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('性別') }}</label>

                                <div class="col-md-6">
                                    <input id="gender" type="radio" class="mt-2 @error('gender') is-invalid @enderror" name="gender" value="1" @if(1 === $user->gender)checked="checked" @endif>男性
                                    <input id="gender" type="radio" class="mt-2 @error('gender') is-invalid @enderror" name="gender" value="2"
                                           @if(2 === $user->gender)
                                           checked="checked"
                                        @endif>女性
                                    {{--                                <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>--}}
                                    {{--                                <input id="gender" type="int" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>--}}

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--メールアドレス--}}
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--生年月日--}}
                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('生年月日') }}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{$user->birthday}}" required autocomplete="birthday">

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--住所--}}
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address}}" required autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--電話番号--}}
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--登録ボタン--}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('変更する') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{--                        {{ __('You are logged in!') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
