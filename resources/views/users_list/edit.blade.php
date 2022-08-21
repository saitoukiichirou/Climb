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
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{('性別')}}</label>


                                    <div class="col-md-6">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                            <input id="gender-m" type="radio" class="btn-check @error('gender') is-invalid @enderror" name="gender" value="0" @if(0 === $user->gender)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="gender-m">男性</label>

                                            <input id="gender-w" type="radio" class="btn-check @error('gender') is-invalid @enderror" name="gender" value="1" @if(1 === $user->gender)checked="checked" @endif>
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

                                            <input id="class-0" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="0" @if(0 === $user->class)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="class-0">一般</label>

                                            <input id="class-1" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="1" @if(1 === $user->class)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="class-1">専門・大学</label>

                                            <input id="class-2" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="2" @if(2 === $user->class)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="class-2">高校生以下</label>

                                            <input id="class-3" type="radio" class="btn-check @error('class') is-invalid @enderror" name="class" value="3" @if(3 === $user->class)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="class-3">キッズ</label>
                                        </div>

                                        @error('class')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--段位--}}
                                <div class="row mb-3">
                                    <label for="class" class="col-md-4 col-form-label text-md-end">{{('段位')}}</label>

                                    <div class="col-md-6">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                            <input id="grade-0" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="0" @if(0 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-0">達人</label>

                                            <input id="grade-1" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="1" @if(1 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-1">黒帯</label>

                                            <input id="grade-2" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="2" @if(2 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-2">上級</label>

                                            <input id="grade-3" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="3" @if(3 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-3">赤帯</label>

                                            <input id="grade-4" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="4" @if(4 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-4">中級</label>

                                            <input id="grade-5" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="5" @if(5 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-5">小結</label>

                                            <input id="grade-6" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="6" @if(6 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-6">白帯</label>

                                            <input id="grade-7" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="7" @if(7 == $user->grade)checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-7">初級</label>

                                            <input id="grade-8" type="radio" class="btn-check @error('grade') is-invalid @enderror" name="grade" value="" @if (!isset($user->grade))checked="checked" @endif>
                                            <label class="btn btn-outline-secondary" for="grade-8">未設定</label>
                                        </div>

                                        @error('grade')
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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" autocomplete="email">

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
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" autocomplete="address">

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
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                            ボタン群--}}
                                <div class="input-group justify-content-center mt-2">
                                    {{--                        戻るボタン--}}
                                    <div class="mt-2">
                                        <a class="text-decoration-none" href="{{route('users_list.show', $user)}}">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-angle-left">戻る</i></button>
                                        </a>
                                    </div>
                                    {{--                      submitボタン--}}
                                    <div class="m-2">
                                        <button type="submit" class="btn btn-success">更新する</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
