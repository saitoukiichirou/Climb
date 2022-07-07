@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--            <div class="col-md-8">--}}
            <div class="md-8">
                <div class="card">
                    <div class="card-header">{{ __('会員情報表示') }}</div>
                    <div class="card-header">
                        <h5>{{ $user->kana }}</h5>
                        <h4>{{ $user->name }}</h4>
{{--                        <span class="ml-auto">--}}
{{--                            <a href="{{route('users_list.edit', $user)}}"><button class="btn btn-primary">編集</button></a>--}}
{{--                        </span>--}}
{{--                        <span class="ml-2">--}}
{{--                          <form method="post" action="{{route('users_list.destroy', $user)}}">--}}
{{--                            @csrf--}}
{{--                              @method('delete')--}}
{{--                            <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>--}}
{{--                          </form>--}}
{{--                        </span>--}}

                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="flex justify-content-center">
{{--                                <div class="flex justify-content-center">--}}
                                <tr><th class="w-10">会員番号</th><td>{{$user->id}}</td></tr>

{{--                                上部に名前が表示されている場合は非表示--}}
{{--                                <tr><th>名前</th><td>{{$user->name}}</td></tr>--}}
{{--                                <tr><th>ふりがな</th><td>{{$user->kana}}</td></tr>--}}

                                <tr><th>性別</th><td>
                                        @if(0 === $user->gender)
                                            男性
                                        @elseif(1 === $user->gender)
                                            女性
                                        @endif
                                    </td></tr>
                                <tr><th>生年月日</th><td>{{$user->birthday}}</td></tr>
                                <tr><th>住所</th><td>{{$user->address}}</td></tr>
                                <tr><th>電話番号</th><td>{{$user->phone}}</td></tr>
                                <tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>


{{--                                                                </div>--}}
{{--                                    <th>性別</th>--}}
{{--                                    <th>生年月日</th>--}}
{{--                                    <th>住所</th>--}}
{{--                                    <th>電話番号</th>--}}
{{--                                    <th>メールアドレス</th>--}}
{{--                                    <th>編集</th>--}}
{{--                                    <th>削除</th>--}}
{{--                                <tr></tr>--}}
{{--                                <tr>--}}
{{--                                        <td>{{$user->id}}</td>--}}
{{--                                        <td>{{$user->name}}</td>--}}
{{--                                        <td>{{$user->kana}}</td>--}}
{{--                                        <td>--}}
{{--                                            @if(1 === $user->gender)--}}
{{--                                                男性--}}
{{--                                            @elseif(2 === $user->gender)--}}
{{--                                                女性--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{{$user->birthday}}</td>--}}
{{--                                        <td>{{$user->address}}</td>--}}
{{--                                        <td>{{$user->phone}}</td>--}}
{{--                                        <td>{{$user->email}}</td>--}}
{{--</tr>--}}
                            </table>

                            <span class="ml-auto">
                            <a href="{{route('users_list.edit', $user)}}"><button class="btn btn-primary">編集</button></a>
                        </span>
                            <span class="ml-2">
                          <form method="post" action="{{route('users_list.destroy', $user)}}">
                            @csrf
                              @method('delete')
                            <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>
                          </form>
                        </span>
                            <span class="ml-auto">
                            <a href="{{route('users_list.index')}}"><button class="btn btn-primary"><i class="fa-solid fa-angle-left"></i> 戻る</button></a>
                        </span>
{{--                        <input type="hidden" name="id" value="{{$user->id}}">--}}
{{--                        --}}{{--名前--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--かな--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="kana" class="col-md-4 col-form-label text-md-end">{{ __('かな') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="kana" type="text" class="form-control @error('かな') is-invalid @enderror" name="kana" value="{{$user->kana}}" required autocomplete="kana" autofocus>--}}

{{--                                @error('kana')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--性別--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('性別') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="gender" type="radio" class="mt-2 @error('gender') is-invalid @enderror" name="gender" value="1" @if(1 === $user->gender)checked="checked" @endif>男性--}}
{{--                                <input id="gender" type="radio" class="mt-2 @error('gender') is-invalid @enderror" name="gender" value="2"--}}
{{--                                       @if(2 === $user->gender)--}}
{{--                                       checked="checked"--}}
{{--                                    @endif>女性--}}

{{--                                @error('gender')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--メールアドレス--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--生年月日--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('生年月日') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{$user->birthday}}" required autocomplete="birthday">--}}

{{--                                @error('birthday')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--住所--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address}}" required autocomplete="address">--}}

{{--                                @error('address')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--電話番号--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone">--}}

{{--                                @error('phone')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--登録ボタン--}}
{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('変更する') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        </form>--}}

                        {{--                        {{ __('You are logged in!') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
