@extends('layouts.master')
@section('title', 'Students')
@section('content')
    <div class="row">
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">تفاصيل الطالب</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-rounded table-row-bordered border gy-4 gs-4">
                            <tbody>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">الاسم</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">المجموعه</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->group_name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">الهاتف</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->phone }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">الصف</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ \App\Models\Section::find($student->section_ID)->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">العنوان</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->address }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">اسم الاب</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->father_name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">هاتف الاب</span>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $student->father_phone }}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-8">
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
                                <th class="min-w-200px">اليوم</th>
                                <th class="min-w-200px">الغياب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Attendance::where('student_ID', $student->ID)->get() as $attendance)
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $attendance->date }}</span>
                                </td>
                                <td>
                                    @if($attendance->is_attendant)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
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
