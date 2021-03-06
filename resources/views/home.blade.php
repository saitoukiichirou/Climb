@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('利用する機能を選択してください') }}

                        <div class="list-group">
                            <a href="{{ route('home') }}" class="list-group-item {{url()->current()==route('home')? 'active' : ''}}">
                                <i class="fas fa-home px-2"></i><span>ホーム</span>
                            </a>
                            @can('admin')
                                <a href="{{ route('users_list.index') }}" class="list-group-item {{url()->current()==route('users_list.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-address-book pr-2"></i><span>会員名簿</span>
                                </a>
                                <a href="{{ route('records.index') }}" class="list-group-item {{url()->current()==route('records.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-pen-to-square pr-2"></i><span>利用記録</span>
                                </a>
                                <a href="{{ route('problems.index') }}" class="list-group-item {{url()->current()==route('problems.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-file-lines pr-2"></i><span>課題管理</span>
                                </a>
                            @endcan
                            <a href="{{ route('scores.index') }}" class="list-group-item {{url()->current()==route('scores.index')? 'active' : ''}}">
                                <i class="fa-solid fa-circle-check pr-2"></i><span>スコア表</span>
                            </a>
                        </div>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
