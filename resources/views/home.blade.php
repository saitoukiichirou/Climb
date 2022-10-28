@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                            @can('admin')
                                <a href="{{ route('users_list.index') }}" class="list-group-item {{url()->current()==route('users_list.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-address-book px-2"></i><span>会員名簿</span>
                                </a>
                                <a href="{{ route('records.index') }}" class="list-group-item {{url()->current()==route('records.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-pen-to-square px-2"></i><span>利用記録</span>
                                </a>
                                <a href="{{ route('problems.index') }}" class="list-group-item {{url()->current()==route('problems.index')? 'active' : ''}}">
                                    <i class="fa-solid fa-file-lines px-2"></i><span>課題管理</span>
                                </a>
                            @endcan
                            <a href="{{ route('scores.index') }}" class="list-group-item {{url()->current()==route('scores.index')? 'active' : ''}}">
                                <i class="fa-solid fa-circle-check px-2"></i><span>スコア表</span>
                            </a>
                        </div>
                </div>
            </div>
            @can('admin')
            <div class="card my-3">
                <div class="card-header">
                    お知らせ
                </div>
                <div class="card-body">
                    <h5 class="card-title">修正・更新情報</h5>
                    <p class="card-text">8/23  課題追加修正    スクール課題を入力できるようにしました</p>
                    <p class="card-text">8/21  ユーザー情報修正    段位を入力できるようにしました</p>
                    <p class="card-text">8/21  TODO道場画面修正   壁の角度表示修正、自分の段位が表示されるようにしました</p>
                    <p class="card-text">8/19  ユーザー一覧画修正  1ページあたり50件表示できるようにしました</p>
                    <p class="card-text">8/19  ユーザー一覧画修正  ページの上部にもページ送りボタンを追加しました</p>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
