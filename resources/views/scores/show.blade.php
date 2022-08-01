@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card px-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ $user->name }}{{ __('の完登状況') }}
                        <a href="{{route('users_list.index')}}" class="mr-0">
                            <button type="button" class="btn btn-primary">{{ __('ユーザー 一覧に戻る')}}</button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-hover flex justify-content-center">
                            <thead>
                            <tr>
                                <th>グレード</th>
                                <th>A面</th>
                                <th>B面</th>
                                <th>C面</th>
                                <th>D面</th>
                            </tr>
                            </thead>

                            <tboby>
                                @foreach($problems as $key1 => $val1)
                                    <tr>
                                        <td>
                                            @if("00" == $key1)
                                                3段
                                            @elseif("01" == $key1)
                                                2段
                                            @elseif("02" == $key1)
                                                初段
                                            @elseif("03" == $key1)
                                                1級
                                            @elseif("4" == $key1)
                                                2級
                                            @elseif("05" == $key1)
                                                3級
                                            @elseif("06" == $key1)
                                                4級
                                            @elseif("07" == $key1)
                                                5級
                                            @elseif("08" == $key1)
                                                6級
                                            @elseif("09" == $key1)
                                                7級
                                            @elseif("10" == $key1)
                                                8級
                                            @else
                                                不明
                                            @endif
                                            <br>
                                            {{\App\Models\Score::achievementProblem($user->id, $key1)}}
                                        </td>
                                        @foreach($val1 as $key2 => $val2)
                                            @if (count($val2) == 0)
                                                <td class="text-secondary">なし</td>
                                            @else
                                                <td>
                                                    @foreach($val2 as $key3 => $val3)
                                                        <table class="table-sm">
                                                            <tr>
                                                                <td>
                                                                    @if (!$val3->isLikedBy($user))
                                                                        <i class="fa-solid fa-face-smile"></i>
                                                                    @else
                                                                        <i class="fa-solid fa-face-smile liked"></i>
                                                                    @endif
                                                                </td>
                                                                <td class="">{{$val3->hold_color}}</td>
                                                                <td class="text-secondary">{{$val3->tape_form}}</td>
                                                            </tr>
                                                        </table>
                                                    @endforeach
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tboby>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

