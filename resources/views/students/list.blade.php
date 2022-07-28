@extends('layouts.master')
@section('title', 'Students')
@section('content')
<div class="row">
    <div class="col-xxl-8">
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">الطلاب</span>
                </h3>
                <div class="card-toolbar d-flex">
                    <button type="button" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_student_modal"><span class="svg-icon svg-icon-3"><i class="fa fa-plus-circle"></i></span>طالب جديد</button>
                    <form class="position-relative mb-3" autocomplete="off">
                        <button class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-0 btn" type="submit" style=" left: 0; ">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                            </svg>
                        </button>
                        <input type="text" class="search-input form-control mx-3  ps-10" name="search" value="" placeholder="البحث...">
                    </form>
                </div>
                @include('students.modals.edit')
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-rounded table-row-bordered border gy-4 gs-4">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-200px">الاسم</th>
                                <th class="min-w-200px">المجموعه</th>
                                <th class="min-w-100px text-end">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>
                                <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->name }}</span>
                            </td>
                            <td>
                                <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->group_name }}</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{ url('students/report/' . $student->ID) }}" class="btn btn-icon btn-bg-light btn-active-color-primary mx-3">
                                        <span class="svg-icon svg-icon-3">
                                            <i class="fa fa-receipt text-info"></i>
                                            تقرير
                                        </span>
                                    </a>
                                    <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary me-1 mx-3" data-bs-toggle="modal" data-bs-target="#edit_student_modal_{{ $student->ID }}">
                                        <span class="svg-icon svg-icon-3">
                                            <i class="fa fa-edit text-gray-700"></i>
                                            تعديل
                                        </span>
                                    </button>
                                    @include('students.modals.edit', ['student' => $student])
                                    <a href="{{ url('students/delete/' . $student->ID) }}" class="btn btn-icon btn-bg-light btn-active-color-primary mx-3">
                                        <span class="svg-icon svg-icon-3">
                                            <i class="fa fa-trash text-danger"></i>
                                            حذف
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
