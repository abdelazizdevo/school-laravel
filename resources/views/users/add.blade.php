@extends('layouts.master')
@section('title', $title)

@section('content')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-6 col-xl-6 mb-5 mb-xl-0">
        <div class="card h-md-100">
            <div class="card-header py-5 px-8">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">{{ $title }}</span>
                </h3>
            </div>
                <div class="card-body pt-7 mb-8 px-8 row">
                    @if($edit)
                        <input type="hidden" name="user[ID]" value="{{ $user->ID }}">
                    @endif
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="user[name]" value="{{ $edit ? $user->name : '' }}">
                            <label for="floatingInput">Name</label>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-8"></div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="email" class="form-control" name="user[email]" value="{{ $edit ? $user->email : '' }}">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>

                        <div class="separator separator-dashed my-8"></div>
                        <div class="form-group">
                            <div class="form-floating mb-7">
                                <input type="password" class="form-control" name="user[password]">
                                <label for="floatingInput">Password</label>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-8"></div>
                        <div class="form-group">
                            <div class="form-floating mb-7">
                                <select class="form-select" name="user[role]" data-control="select2">
                                    <option {{ $edit && $user->role == 'user' ? 'selected' : '' }} value="user">User</option>
                                    <option {{ $edit && $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                </select>
                                <label for="floatingInput">Role</label>
                            </div>
                        </div>
                    <div class="separator separator-dashed my-8"></div>
                    <div class="col-lg-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $edit ? $user->image() : '' }})"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <div class="separator separator-dashed my-8"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
