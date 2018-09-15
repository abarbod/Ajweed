@extends('users.accounts.layout')

<?php /** @var \App\Models\User $user */ ?>

@section('accounts.content')

    <div class="card">
        <div class="card-header d-flex justify-content-between bg-transparent">
            <div>@lang('Edit')</div>
            <a href="{{ route('users.details.index') }}" class="btn btn-outline-warning">
                @lang('Cancel')
            </a>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('users.details.update') }}"
                  aria-label="@lang('Edit')">
            @csrf
            @method('PUT')

            @include('users.accounts._details_form_inputs')

            <!-- Update btn +  Cancel btn -->
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                        <a href="{{ route('users.details.index') }}" class="btn btn-outline-warning">
                            @lang('Cancel')
                        </a>
                        <button type="submit" class="btn btn-primary">
                            @lang('Edit')
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
