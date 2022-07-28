@extends('layouts.master')
@section('title', 'Permissions')

@section('content')
<form method="POST">
    @csrf
    @foreach(config('permissions') as $permission)
    <div class="col-lg-12 col-xl-12 mb-5 mb-xl-0 mt-5">
        <div class="card h-md-100">
            <div class="card-header py-5 px-8">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">{{ $permission['name'] }}</span>
                </h3>
            </div>
            <div class="card-body pt-7 mb-8 px-8 row">
                @foreach($permission['permissions'] as $key => $val)
                    <div class="col-lg-6 form-group mt-4">
                        <div class="form-floating border rounded">
                            <select class="form-select form-select-transparent" data-control="select2" name="permissions[{{ $key }}][]" multiple>
                                @foreach(\App\Models\User::get() as $user)
                                    <option {{ $user->can_do($key) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <label for="kt_docs_select2_country">{{ $val }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    <div class="form-group mt-5">
        <button type="submit" class="btn btn-primary submit">Update</button>
    </div>
</form>
<style>
    .select2-container--bootstrap5 .select2-selection--multiple:not(.form-select-sm):not(.form-select-lg) {
        padding-top: calc((4rem + 2px - 0.8rem) / 2) !important;
        padding-bottom: calc((4rem + 2px - 0.8rem) / 2) !important;
    }
    .form-floating > label{
        top: -16px;
        font-size: 16px;
        opacity: 1;
    }
    .form-floating > .form-control:focus ~ label, .form-floating > .form-control:not(:placeholder-shown) ~ label, .form-floating > .form-select ~ label{
        opacity: 1;
    }
</style>
@endsection
