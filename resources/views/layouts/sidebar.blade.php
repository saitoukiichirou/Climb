<div class="list-group">
    <a href="{{ route('home') }}" class="list-group-item {{url()->current()==route('home')? 'active' : ''}}">
        <i class="fas fa-home pr-2"></i><span>ホーム</span>
    </a>
    @can('admin')
    <a href="{{ route('users_list.index') }}" class="list-group-item {{url()->current()==route('users_list.index')? 'active' : ''}}">
        <i class="fa-solid fa-address-book pr-2"></i><span>会員名簿</span>
    </a>
    <a href="{{ route('records.index') }}" class="list-group-item {{url()->current()==route('records.index')? 'active' : ''}}">
        <i class="fa-solid fa-pen-to-square pr-2"></i><span>利用記録</span>
    </a>
    <a href="{{ route('problems.index') }}" class="list-group-item {{url()->current()==route('problems.index')? 'active' : ''}}">
        <i class="fa-solid fa-list pr-2"></i><span>課題管理</span>
    </a>
    @endcan
    <a href="{{ route('score_boards') }}" class="list-group-item {{url()->current()==route('score_boards')? 'active' : ''}}">
        <i class="fa-solid fa-circle-check pr-2"></i><span>スコア表</span>
    </a>
</div>

