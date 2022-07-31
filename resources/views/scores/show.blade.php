@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card px-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ $user->name }}{{ __('の完登状況') }}
                        <a href="{{route('problems.create')}}" class="mr-0">
                            <button type="button" class="btn btn-primary">{{ __('新規追加')}}</button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <br class="table table-hover flex justify-content-center">
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

{{--                            <div>--}}
{{--                                @foreach($problems['1Q']['A'] as $value)--}}
{{--                                    <p>{{$value->hold_color.('の').$value->tape_form}}</p>--}}
{{--                                @endforeach--}}

{{--                                @foreach($problems['1Q']['B'] as $value)--}}
{{--                                    <p>{{$value->hold_color.('の').$value->tape_form}}</p>--}}
{{--                                @endforeach--}}

{{--                                @foreach($problems['1Q']['C'] as $value)--}}
{{--                                    <p>{{$value->hold_color.('の').$value->tape_form}}</p>--}}
{{--                                @endforeach--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

                            <tboby>
                                {{--1Qの課題の行はじまり--}}
                                <tr>
                                    <td>
                                        {{('1Q')}}
                                        <p>{{\App\Models\Problem::isHowMany('03')}}</p>
                                    </td>
                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['1Q']['A'] as $problem)
                                            <tr>
                                                {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                <td>
                                                    @if (!$problem->isLikedBy($user))
                                                        <i class="fa-solid fa-face-smile"></i>
                                                    @else
                                                        <i class="fa-solid fa-face-smile liked"></i>
                                                    @endif
                                                </td>
                                                <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['1Q']['B'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['1Q']['C'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['1Q']['D'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>

                                {{--2Qの課題の行はじまり--}}
                                <tr>
                                    <td>{{('2Q')}}</td>
                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['2Q']['A'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['2Q']['B'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['2Q']['C'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table-sm">
                                            @foreach($problems['2Q']['D'] as $problem)
                                                <tr>
                                                    {{-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 --}}
                                                    <td>
                                                        @if (!$problem->isLikedBy($user))
                                                            <i class="fa-solid fa-face-smile"></i>
                                                        @else
                                                            <i class="fa-solid fa-face-smile liked"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{$problem->hold_color.('の').$problem->tape_form}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>

{{--                                @endforeach--}}
{{--                                </table>--}}
{{--                                    {{$problem->isHowMany($user)}}--}}
{{--                                    <tr>--}}
{{--                                        @foreach($problem->D)--}}
{{--                                        {{$problems}}{{ __('<-ここに表示される') }}--}}
{{--                                        @endforeach--}}
{{--                                        @if("01" == $problem->grade)--}}
{{--                                        <td>--}}
{{--                                            2D--}}
{{--                                            @elseif("01" == $problem->grade)--}}
{{--                                                2段--}}
{{--                                            @elseif("02" == $problem->grade)--}}
{{--                                                初段--}}
{{--                                            @elseif("03" == $problem->grade)--}}
{{--                                                1級--}}
{{--                                            @elseif("04" == $problem->grade)--}}
{{--                                                2級--}}
{{--                                            @elseif("05" == $problem->grade)--}}
{{--                                                3級--}}
{{--                                            @elseif("06" == $problem->grade)--}}
{{--                                                4級--}}
{{--                                            @elseif("07" == $problem->grade)--}}
{{--                                                5級--}}
{{--                                            @elseif("08" == $problem->grade)--}}
{{--                                                6級--}}
{{--                                            @elseif("09" == $problem->grade)--}}
{{--                                                7級--}}
{{--                                            @elseif("10" == $problem->grade)--}}
{{--                                                8級--}}
{{--                                            @else--}}
{{--                                                不明--}}
{{--                                        </td>--}}

{{--                                        @if($problem->dimension == 'A')--}}
{{--                                            @if($loop->first)--}}
{{--                                        <td>--}}
{{--                                            <table>--}}
{{--                                                <tr>--}}
{{--                                                <td>{{$problem->hold_color}}</td>--}}
{{--                                                <td>{{$problem->tape_form}}</td>--}}
{{--                                                <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                <td>--}}
{{--                                                    @if (!$problem->isLikedBy($user))--}}
{{--                                                        <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                    @else--}}
{{--                                                        <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                                </tr>--}}
{{--                                            </table>--}}
{{--                                        </td>--}}
{{--                                            @endif--}}
{{--                                        @endif--}}

{{--                                            <td>--}}
{{--                                                @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            --}}{{--                                                    <button class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @else--}}
{{--                                                            --}}{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}

{{--                                            <td>--}}
{{--                                                @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            --}}{{--                                                    <button class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @else--}}
{{--                                                            --}}{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}


{{--                                            <td>--}}
{{--                                                @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            --}}{{--                                                    <button class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @else--}}
{{--                                                            --}}{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
{{--                                        @endif--}}
{{--                                        <td>{{$problem->getProblem('A', '02')}}</td>--}}
{{--                                        <td>{{$problem->grade == '00'}}</td>--}}
{{--                                        <td>3D</td>--}}
{{--                                        <td>2D</td>--}}
{{--                                        <td>1D</td>--}}
{{--                                        <td>1Q</td>--}}
{{--                                        <td>2Q</td>--}}
{{--                                        <td>3Q</td>--}}
{{--                                        <td>4Q</td>--}}
{{--                                        <td>5Q</td>--}}
{{--                                        <td>6Q</td>--}}
{{--                                        <td>7Q</td>--}}
{{--                                        <td>8Q</td>--}}
{{--                                        <td>{{$problem->hold_color}}</td>--}}
{{--                                        <td>{{$problem->tape_form}}</td>--}}

{{--                                        <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                        <td>--}}
{{--                                            @if (!$problem->isLikedBy($user))--}}
{{--                                                    <button class="btn-circle">--}}
{{--                                                        <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                    </button>--}}
{{--                                            @else--}}
{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                        <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                    </button>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    @if("02" == $problem->grade)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                                1D--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            --}}{{--                                                    <button class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @else--}}
{{--                                                            --}}{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            --}}{{--                                                    <button class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @else--}}
{{--                                                            --}}{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            --}}{{--                                                    <button class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @else--}}
{{--                                                            --}}{{--                                                    <button type="button" class="btn-circle">--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                            --}}{{--                                                    </button>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                    </tr>--}}

{{--                                    @if("03" == $problem->grade)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            1Q--}}
{{--                                        </td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                        <td>--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                        </td>--}}
{{--                                        @endif--}}

{{--                                        @if($problem->dimension == 'B')--}}
{{--                                        <td>--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                        </td>--}}
{{--                                        @endif--}}

{{--                                        @if($problem->dimension == 'C')--}}
{{--                                        <td>--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                        </td>--}}
{{--                                        @endif--}}


{{--                                        @if($problem->dimension == 'D')--}}
{{--                                        <td>--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    @endif--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("04" == $problem->grade)--}}
{{--                                                2Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("05" == $problem->grade)--}}
{{--                                                3Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("06" == $problem->grade)--}}
{{--                                                4Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("07" == $problem->grade)--}}
{{--                                                5Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("08" == $problem->grade)--}}
{{--                                                6Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("09" == $problem->grade)--}}
{{--                                                7Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            @if("10" == $problem->grade)--}}
{{--                                                8Q--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'A')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'B')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'C')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            @if($problem->dimension == 'D')--}}
{{--                                                <table>--}}
{{--                                                    <td>{{$problem->hold_color}}</td>--}}
{{--                                                    <td>{{$problem->tape_form}}</td>--}}
{{--                                                    <!-- 非同期機能はじまり, problems.phpに作ったisLikedByメソッドをここで使用 -->--}}
{{--                                                    <td>--}}
{{--                                                        @if (!$problem->isLikedBy($user))--}}
{{--                                                            <i class="fa-solid fa-face-smile"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="fa-solid fa-face-smile liked"></i>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                </table>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                            </tboby>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

