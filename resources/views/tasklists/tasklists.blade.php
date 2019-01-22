<ul class="media-list">
    @foreach ($tasklists as $tasklist)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('users.show', $tasklist->user->name, ['id' => $tasklist->user->id]) !!} <span class="text-muted">posted at {{ $tasklist->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($tasklist->content)) !!}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $tasklists->render('pagination::bootstrap-4') }}