@extends('layouts.master')
@section('title', 'Users')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-5">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">All Users</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ url('users/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add User</a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 min-w-300px rounded-start">#</th>
                            <th class="min-w-125px">Action</th>
                        </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                        @foreach(\App\Models\User::get() as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="{{ $user->image() }}" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $user->name }}</a>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ url('users/edit/' . $user->ID) }}" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                    <a href="{{ url('users/delete/' . $user->ID) }}" class="btn btn-bg-danger btn-color-white btn-active-color-white btn-sm px-4 me-2">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 12-->
    </div> <!-- end col -->
</div>

@endsection
