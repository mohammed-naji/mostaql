<aside>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          Home
        </a>
        <a href="#" class="list-group-item list-group-item-action">Proposals</a>
        <a href="{{ route('employer.messages') }}" class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center">Messages
            <span class="badge badge-danger badge-pill">{{ Auth::user()->messagesin()->whereNull('read_at')->count() }}</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">Profile</a>
        <a class="list-group-item list-group-item-action disabled">Jobs</a>
      </div>
</aside>

