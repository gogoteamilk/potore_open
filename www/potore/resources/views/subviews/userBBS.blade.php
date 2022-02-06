<div class="comment card-haeder p-3 w-100 d-flex">
  <img src="{{ $comment->avatar ?? "https://placehold.jp/50x50.png" }}" class="rounded-circle" width="50" height="50">
  <div class="ml-2 d-flex flex-column">
      <h5 class="mb-0 comment-user-name">
        <a href="/home/{{$comment->send_user_id ?? ''}}">{{$comment->name ?? 'none name'}}</a>
      </h5>
      <p class="small text-secondary mb-2">{{$comment->created_at ?? ''}}</p>
      <p>{{$comment->comment ?? ''}}</p>
  </div>
</div>