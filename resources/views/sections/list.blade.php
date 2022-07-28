@extends('layouts.master')
@section('title', 'الفصول')
@section('content')
<div class="row">
    <div class="col-xxl-8">
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">الفصول</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a section">
                    <button type="button" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_section_modal"><span class="svg-icon svg-icon-3"><i class="fa fa-plus-circle"></i></span>فصل جديد</button>
                </div>
                @include('sections.modals.edit')
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-rounded table-row-bordered border gy-4 gs-4">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-200px">الاسم</th>
                                <th class="min-w-100px text-end">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Section::get() as $section)
                        <tr>
                            <td>
                                <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $section->name }}</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit_section_modal_{{ $section->ID }}">
                                        <span class="svg-icon svg-icon-3">
                                            <i class="fa fa-edit text-gray-700"></i>
                                        </span>
                                    </button>
                                    @include('sections.modals.edit', ['section' => $section])

                                    <a href="{{ url('sections/delete/' . $section->ID) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <span class="svg-icon svg-icon-3">
                                            <i class="fa fa-trash text-danger"></i>
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
