<div class="list-item" data-id="19">
    <div>
        <a href="{{ '/home/'. $userData->id }}" data-abc="true">
            <span class="w-48 avatar"><img src="{{ $userData->avatar }}"></span>
        </a>
    </div>
        <div class="flex"> <a href="{{ '/home/'. $userData->id }}" class="item-author text-color" data-abc="true">{{ $userData->name }}</a>
            <div class="item-except text-muted text-sm h-1x">{{ $userData->intoro }}</div>
        </div>
        {{-- <div class="no-wrap">
            <div class="item-date text-muted text-sm d-none d-md-block">more infomation</div>
        </div> --}}
</div>