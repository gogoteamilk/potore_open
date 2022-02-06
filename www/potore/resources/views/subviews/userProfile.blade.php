<div>
    @isset ($users->rolls)
        <h6 class="card-subtitle text-muted">rolls</h6>
        <p>{{ $users->rolls }}</p>
    @endisset
    @isset ($users->sex)
        <h6 class="card-subtitle text-muted">性別</h6>
        <p>{{ $users->sex }}</p>
    @endisset
    @isset ($users->age)
        <h6 class="card-subtitle text-muted">年齢</h6>
        <p>{{ $users->age }}</p>
    @endisset
    @isset($activity_areas[0])
        <h6 class="card-subtitle text-muted">活動地</h6>
        <p>{{ $activity_areas->implode('name', ', ') }}</p>           
    @endisset
    @isset ($users->fees)
        <h6 class="card-subtitle text-muted">希望報酬</h6>
        <p>{{ $users->fees }}</p>
    @endisset
</div>