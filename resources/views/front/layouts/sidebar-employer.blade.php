<aside>
    <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="true">
          Home
        </a>
        <a href="{{ route('employer.post_job') }}" class="list-group-item list-group-item-action {{ request()->routeIs('employer.post_job') ? 'active' : '' }}">Post a Job</a>
        <a href="{{ route('employer.messages') }}" class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center">Messages
            <span class="badge badge-danger badge-pill">{{ Auth::user()->messagesin()->whereNull('read_at')->count() }}</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">Profile</a>
        <a href="{{ route('employer.jobs') }}" class="list-group-item list-group-item-action {{ request()->routeIs('employer.jobs') ? 'active' : '' }}">Jobs</a>
      </div>
</aside>

