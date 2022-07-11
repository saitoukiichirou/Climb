@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                        <div class="col-md-10">
            <div class="md-8">
                <div class="card">
                    <div class="card-header">{{ __('会員情報編集') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{--以下修正用フォーム--}}
                        <form method="POST" action="{{ route('users_list.update', $user) }}">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            {{--名前--}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

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
                                    <input id="kana" type="text" class="form-control @error('かな') is-invalid @enderror" name="kana" value="{{ old('kana', $user->kana) }}" required autocomplete="kana" autofocus>

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
                                    <input id="gender" type="radio" class="mt-2 @error('gender') is-invalid @enderror" name="gender" value="0" @if(0 === $user->gender)checked="checked" @endif>男性
                                    <input id="gender" type="radio" class="mt-2 @error('gender') is-invalid @enderror" name="gender" value="1" @if(1 === $user->gender)checked="checked" @endif>女性
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

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
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday', $user->birthday) }}" required autocomplete="birthday">

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
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" required autocomplete="address">

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
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="phone">

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
                                    <button type="submit" class="btn btn-success">
                                        {{ __('更新する') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                        <span class="ml-auto">
                            <a href="{{route('users_list.show', $user)}}"><button class="btn btn-primary"><i class="fa-solid fa-angle-left"></i> 戻る</button></a>
                        </span>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
