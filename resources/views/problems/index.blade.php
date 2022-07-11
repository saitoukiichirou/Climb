@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                        <div class="col-md-10">
            <div class="card px-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('課題一覧') }}
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
                    <table class="table table-hover flex justify-content-center">
                        <thead>
                        <tr>
                            <th>セット面</th>
                            <th>グレード</th>
                            <th>ホールド色</th>
                            <th>テープ形</th>
                            <th>セッター名</th>
                            <th>追加日</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                        </thead>
                        <tboby>
                            @foreach($problems as $problem)
                                <tr>
                                    <td>{{$problem->dimension}}</td>
                                    <td>
                                        @if("00" == $problem->grade)
                                            3段
                                        @elseif("01" == $problem->grade)
                                            2段
                                        @elseif("02" == $problem->grade)
                                            初段
                                        @elseif("03" == $problem->grade)
                                            1級
                                        @elseif("4" == $problem->grade)
                                            2級
                                        @elseif("05" == $problem->grade)
                                            3級
                                        @elseif("06" == $problem->grade)
                                            4級
                                        @elseif("07" == $problem->grade)
                                            5級
                                        @elseif("08" == $problem->grade)
                                            6級
                                        @elseif("09" == $problem->grade)
                                            7級
                                        @elseif("10" == $problem->grade)
                                            8級
                                        @else
                                            不明
                                        @endif
                                    </td>
                                    <td>{{$problem->hold_color}}</td>
                                    <td>{{$problem->tape_form}}</td>
                                    <td>{{$problem->setter}}</td>
                                    <td>{{$problem->created_at->format('Y-m-d')}}</td>
{{--                                    <td>--}}
{{--                                        課題ごとの詳細画面へ--}}
{{--                                        <a href="{{route('problems.show', $problem)}}"><i class="fa-solid fa-file-pen pl-2"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="p-1">
                                        {{--                                        課題ごとの編集画面へ--}}
                                        <a href="{{route('problems.edit', $problem)}}">
                                        <button type="button" class="btn btn-outline-primary pr-2">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </button>
                                        </a>
                                    </td>

                                    {{--                                        課題の削除--}}
                                    <td class="p-1">
                                        <form method="post" action="{{route('problems.destroy', $problem)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger" onClick="return confirm('本当に削除しますか？');">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tboby>
                    </table>
{{--                    <div class="mb-2 flex-">--}}
{{--                        {{ $users->links('vendor.pagination.bootstrap-4') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

