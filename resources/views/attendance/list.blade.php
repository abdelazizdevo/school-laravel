@extends('layouts.master')
@section('title', 'Students')
@section('content')
<form>
    <div class="row mb-4">
        <div class="col-xxl-4">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">الغياب</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control date" name="date" value="{{ isset($_GET['date']) ? $_GET['date'] : '' }}"/>
                            <label for="floatingInput">التاريخ</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <select class="form-select" name="section_ID" data-control="select2">
                                @foreach(\App\Models\Section::get() as $section)
                                    <option {{ isset($_GET['section_ID']) && $_GET['section_ID'] == $section->ID ? 'selected' : '' }} value="{{ $section->ID }}">
                                        {{ $section->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInput">اختر الفصل</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">اظهار التلاميذ</button>
                </div>
            </div>
        </div>
    </div>
</form>
@if(isset($_GET['date']))
    <input type="hidden" name="date" value="{{ $_GET['date'] }}">
    <form method="POST">
        <div class="row">
            <div class="col-xxl-12">
                <div class="card card-xxl-stretch mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">الغياب</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-rounded table-row-bordered border gy-4 gs-4">
                                <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-200px">اسم الطالب</th>
                                    <th class="min-w-200px">الغياب والحضور</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\Student::where('section_ID', $_GET['section_ID'])->get() as $student)
                                    <tr>
                                        <td>
                                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->name }}</span>
                                        </td>
                                        <td>
                                            <!--begin::Radio group-->
                                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                                <!--begin::Radio-->
                                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{ \App\Models\Attendance::where('student_ID', $student->ID)->where('date', $_GET['date'])->where('is_attendant', 0)->count() > 0 ? 'active' : '' }}" data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" {{ \App\Models\Attendance::where('student_ID', $student->ID)->where('date', $_GET['date'])->where('is_attendant', 0)->count() > 0 ? 'checked' : '' }} type="radio" value="0" name="is_attendant[{{ $student->ID }}]"/>
                                                    <!--end::Input-->
                                                    غائب
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{ \App\Models\Attendance::where('student_ID', $student->ID)->where('date', $_GET['date'])->where('is_attendant', 1)->count() > 0 ? 'active' : '' }}" data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" {{ \App\Models\Attendance::where('student_ID', $student->ID)->where('date', $_GET['date'])->where('is_attendant', 1)->count() > 0 ? 'checked' : '' }} type="radio" value="1" name="is_attendant[{{ $student->ID }}]"/>
                                                    <!--end::Input-->
                                                    حاضر
                                                </label>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Radio group-->
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit_student_modal_{{ $student->ID }}">
                                                <span class="svg-icon svg-icon-3">
                                                    <i class="fa fa-edit text-gray-700"></i>
                                                </span>
                                                </button>
                                                @include('students.modals.edit', ['student' => $student])
                                                <a href="{{ url('settings/students/delete/' . $student->ID) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <span class="svg-icon svg-icon-3">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><button type="submit" class="btn btn-primary">تحديث</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif
@endsection
