@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-6">
                <div class="card">
                    <div class="card-header">{{ __('課題編集') }}
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
                        <form method="post" action="{{route('leadproblems.update', $problem)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="title">※グレード</label>
                                <select name="grade" class="form-control">
                                    <option value="" @if (empty(old('grade'))) selected @endif disabled>リストから選択してください</option>
                                    <option value="00" @if("00" == old('grade')) selected @endif >13d</option>
                                    <option value="01" @if("01" == old('grade')) selected @endif >13c</option>
                                    <option value="02" @if("00" == old('grade')) selected @endif >13b</option>
                                    <option value="03" @if("01" == old('grade')) selected @endif >13a</option>
                                    <option value="04" @if("02" == old('grade')) selected @endif >12d</option>
                                    <option value="05" @if("03" == old('grade')) selected @endif >12c</option>
                                    <option value="06" @if("02" == old('grade')) selected @endif >12b</option>
                                    <option value="07" @if("03" == old('grade')) selected @endif >12a</option>
                                    <option value="08" @if("04" == old('grade')) selected @endif >11d</option>
                                    <option value="09" @if("05" == old('grade')) selected @endif >11c</option>
                                    <option value="10" @if("06" == old('grade')) selected @endif >11b</option>
                                    <option value="11" @if("07" == old('grade')) selected @endif >11a</option>
                                    <option value="12" @if("08" == old('grade')) selected @endif >10d</option>
                                    <option value="13" @if("09" == old('grade')) selected @endif >10c</option>
                                    <option value="14" @if("10" == old('grade')) selected @endif >10b</option>
                                    <option value="15" @if("11" == old('grade')) selected @endif >10a</option>
                                    <option value="16" @if("12" == old('grade')) selected @endif >5.9</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">※ホールド色</label>
                                <input type="text" name="hold_color" class="form-control" id="title" value="{{old('hold_color', $problem->hold_color)}}" placeholder="例：赤 黄 黒 など">
                            </div>

                            <div class="form-group">
                                <label for="title">TOPまでの手数</label>
                                <input type="text" name="top" class="form-control" id="title" value="{{old('top')}}" placeholder="例：20など">
                            </div>

                            <div class="form-group">
                                <label for="body">セッター</label>
                                <input type="text" name="setter" class="form-control" value="{{old('setter', $problem->setter)}}" placeholder="名前を入力">
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
                                    <button type="submit" class="btn btn-success">更新する</button>
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

