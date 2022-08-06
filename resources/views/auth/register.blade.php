@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                <div class="card-header">会員登録</div>--}}
                    <div class="card-header">{{ __('会員登録') }}</div>

                    <div class="card-body">
                        {{--以下登録フォーム--}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{--会員番号--}}
                            <div class="row mb-3">
                                <label for="member_number" class="col-md-4 col-form-label text-md-end">{{ __('会員番号') }}</label>

                                <div class="col-md-6">
                                    <input id="member_number" type="text" class="form-control @error('member_number') is-invalid @enderror" name="member_number" value="{{ old('member_number') }}" required autocomplete="member_number">

                                    @error('member_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--名前--}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="name" type="text" class="form-control @error('かな') is-invalid @enderror" name="kana" value="{{ old('kana') }}" required autocomplete="kana" autofocus>

                                    @error('kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--性別--}}

                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{('性別')}}</label>


                                <div class="col-md-6">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <input id="gender-m" type="radio" class="btn-check @error('gender') is-invalid @enderror" name="gender" value="0">
                                        <label class="btn btn-outline-secondary" for="gender-m">男性</label>

                                        <input id="gender-w" type="radio" class="btn-check @error('gender') is-invalid @enderror" name="gender" value="1">
                                        <label class="btn btn-outline-secondary" for="gender-w">女性</label>
                                    </div>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--カテゴリ--}}
                            <div class="row mb-3">
                                <label for="class" class="col-md-4 col-form-label text-md-end">{{('カテゴリ')}}</label>

                                <div class="col-md-6">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <input id="class-0" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="0">
                                        <label class="btn btn-outline-secondary" for="class-0">一般</label>

                                        <input id="class-1" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="1">
                                        <label class="btn btn-outline-secondary" for="class-1">専門・大学</label>

                                        <input id="class-2" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="2">
                                        <label class="btn btn-outline-secondary" for="class-2">高校生以下</label>

                                        <input id="class-3" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="3">
                                        <label class="btn btn-outline-secondary" for="class-3">キッズ</label>
                                    </div>

                                    @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--生年月日--}}
                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">{{('生年月日')}}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            {{--                              --}}
                            {{-- ここから テスト運用のためDisable --}}
                            {{--                              --}}

{{--                            --}}{{--メールアドレス--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{--住所--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">--}}

{{--                                    @error('address')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{--電話番号--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">--}}

{{--                                    @error('phone')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{--パスワード--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            --}}{{--パスワード確認--}}
{{--                            <div class="row mb-3">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}" required autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{--                              --}}
                            {{-- ここまで テスト運用のためDisable --}}
                            {{--                              --}}


                            {{--登録ボタン--}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{('会員登録') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <p class="text-center mt-4">アカウントをお持ちの方は
                            <a class="" href="{{ route('login') }}">ログイン</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
