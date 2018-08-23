<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div>@lang('My Profile')</div>
        <a href="{{ route('users.profile.edit') }}">@lang('Edit')</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p><strong>Gender: </strong>{{ $user->profile->gender }}</p>
        <p><strong>Birth Date: </strong>{{ $user->profile->birth_date->toDateString() }}</p>
    </div>
</div>
