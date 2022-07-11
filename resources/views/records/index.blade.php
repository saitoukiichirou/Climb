@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card px-0">
                <div class="card-header">{{ __('利用記録入力') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger p-2">
                                @foreach ($errors->all() as $error)
                                        <i class="fa-solid fa-triangle-exclamation"> {{ $error }}</i><br>
                                @endforeach
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-warning p-2" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"> {{ session('status') }}</i>
                        </div>
                    @endif

                    <form method="GET" action="{{route('records.index')}}">
                        @csrf
                        <div class="input-group mr-sm-2">
                            <input type="text" name="id" class="form-control" placeholder="会員番号を入力">
                            <button class="btn btn-primary form-control" type="submit">検索</button>
                        </div>
                    </form>

                </div>

                @if(isset($user))
                    <div class="card-body pt-0">
                        <form method="POST" action="{{route('records.store')}}">
                            @csrf
                            <div class="input-group mr-sm-2">
                                <input class="form-control bg-white text-center" type="text" placeholder="No.{{$user->id}} {{$user->name}} {{$user->class}}" readonly="">
                                <input name="id" type="hidden" value="{{$user->id}}">
                                    <select class="form-control" name="prices[]">
                                    @foreach($user->prices as $price)
                                        <option value="{{$price->id}}">{{$price->item}} {{$price->price}}円</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mr-sm-2 mt-3">
{{--                                カスタムチェックボックス--}}
                                <div class="d-flex flex-warp">
                                    @foreach($user->rents as $rent)
                                        <input type="checkbox" name="prices[]" class="btn-check" id="{{$rent->id}}" value="{{$rent->id}}" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="{{$rent->id}}">{{$rent->item}}</label><br>
                                    @endforeach
                                </div>
{{--                                ここまで　チェックボックス--}}
                            </div>
                            <button class="btn btn-primary form-control mt-3" type="submit">料金確定</button>
                        </form>
                    </div>
                @else
                @endif

            </div>
            <div class="card px-0 mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('本日の利用記録') }}

                <form class="" method="get" action="{{route('records.index')}}">
                    @csrf
                    <div class="input-group mr-sm-2">
                        <input name="select_date" class="form-inline" type="date">
                        <button class="btn btn-secondary form-control" type="submit">日付選択</button>
                    </div>
                </form>
            </div>
                <div class="card-body">
                    <table class="table table-hover flex justify-content-center">
                        <thead>
                        <tr>
                            <th>会員番号</th>
                            <th>名前</th>
                            <th>利用時間</th>
                            <th>レンタル</th>
                            <th>入場時刻</th>
                        </tr>
                        </thead>
                        @if ($records->isEmpty())
                            <div class="alert alert-success p-2" role="alert">
                                利用者はいません
                            </div>
                        @else
                        @if (session('success'))
                            <div class="text-center alert alert-success p-2" role="alert">
                                <i class="fa-solid fa-square-check"> {{ session('success') }}</i>
                            </div>
                        @endif
                            <tboby>
                                @foreach($records as $record)
                                    <tr>
                                        <td>{{$record->user_id}}</td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->use_time->item??''}}</td>
                                        <td>
                                            @foreach($record->item_rents as $item_rent)
                                            {{$item_rent->item}}
                                            @endforeach
                                        </td>
                                        <td>{{($record->date->format('Y/m/d H:i'))}}</td>
                                    </tr>
                                @endforeach
                            </tboby>
                        @endif
                    </table>

                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection
