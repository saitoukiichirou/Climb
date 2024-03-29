@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="member_number" class="col-md-4 col-form-label text-md-end">{{ ('会員番号') }}</label>

                            <div class="col-md-6">
                                <input id="member_number" type="text" class="form-control @error('member_number') is-invalid @enderror" name="member_number" value="{{ old('member_number') }}" required autocomplete="member_number" autofocus>

                                @error('member_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

{{--                    パスワードリセット未実装のためDisable  --}}
{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}

                            </div>
                            <div class="text-center mt-4">
                            <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"> 注意  このページはサンプルで公開しているのものです <i class="fa-solid fa-triangle-exclamation"></i></i></p>
                                <p>テストログイン情報</p>
                                <p>管理者：会員番号欄 「admin」 パスワード欄 「admin」</p>
                                <p>ゲスト：会員番号欄 「guest」 パスワード欄 「guest」</p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
