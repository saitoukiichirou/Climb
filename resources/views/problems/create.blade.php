@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-6">
                <div class="card">
                    <div class="card-header">{{ __('課題新規登録') }}
                        <span class="text-danger"> ※印は入力必須</span>
                    </div>

                    <div class="card-body">
                        {{--            バリデーションエラー表示--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--            セッションメッセージ表示--}}
                        @if(session('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                        @endif

                        {{--            投稿フォーム 始まり--}}
                        <form method="post" action="{{route('problems.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="dimension">※セット面</label><br>
                                    <input type="radio" class="btn-check" name="dimension" id="dimension-a" value="A" autocomplete="off" checked>
                                    <label class="btn btn-outline-dark" for="dimension-a">A面</label>

                                    <input type="radio" class="btn-check" name="dimension" id="dimension-b" value="B" autocomplete="off">
                                    <label class="btn btn-outline-dark" for="dimension-b">B面</label>

                                    <input type="radio" class="btn-check" name="dimension" id="dimension-c" value="C" autocomplete="off">
                                    <label class="btn btn-outline-dark" for="dimension-c">C面</label>

                                    <input type="radio" class="btn-check" name="dimension" id="dimension-d" value="D" autocomplete="off">
                                    <label class="btn btn-outline-dark" for="dimension-d">D面</label>
                            </div>

                            <div class="form-group">
                                <label for="title">※グレード</label>
                                <select name="grade" class="form-control">
                                    <option value="" selected disabled>リストから選択してください</option>
                                    <option value="00">3段</option>
                                    <option value="01">2段</option>
                                    <option value="02">初段</option>
                                    <option value="03">1級</option>
                                    <option value="04">2級</option>
                                    <option value="05">3級</option>
                                    <option value="06">4級</option>
                                    <option value="07">5級</option>
                                    <option value="08">6級</option>
                                    <option value="09">7級</option>
                                    <option value="10">8級</option>
                                    <option value="21">スクール</option>
                                    <option value="22">エクストラ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">※ホールド色</label>
                                <input type="text" name="hold_color" class="form-control" id="title" value="{{old('hold_color')}}" placeholder="例：赤 黄 黒 など">
                            </div>

                            <div class="form-group">
                                <label for="title">※テープの形</label>
                                <input type="text" name="tape_form" class="form-control" id="title" value="{{old('tape_form')}}" placeholder="例：■ × / など">
                            </div>

                            <div class="form-group">
                                <label for="body">セッター</label>
                                <input type="text" name="setter" class="form-control" value="{{old('setter')}}" placeholder="名前を入力">
                            </div>

                            {{--ボタン群--}}
                            <div class="input-group mt-2">
                                {{--                        戻るボタン--}}
                                <div class="mt-2">
                                    <a class="text-decoration-none" href="{{route('problems.index')}}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa-solid fa-angle-left">戻る</i></button>
                                    </a>
                                </div>
                                {{--                      submitボタン--}}
                                <div class="m-2">
                                    <button type="submit" class="btn btn-success">登録する</button>
                                </div>
                            </div>
                        </form>
                        {{--            投稿フォーム 終わり--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
