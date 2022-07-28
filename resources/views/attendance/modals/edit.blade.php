<div class="modal fade" tabindex="-1" id="{{ isset($student) ? 'edit_student_modal_' .  $student->ID : 'add_student_modal' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">{{ isset($student) ? 'Edit student: ' .  $student->name : 'Add New student' }}</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    @csrf
                    @if(isset($student))
                        <input type="hidden" name="student[ID]" value="{{ $student->ID }}">
                    @endif
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="student[name]" value="{{ isset($student) ? $student->name : '' }}" required/>
                            <label for="floatingInput">الاسم</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="student[phone]" value="{{ isset($student) ? $student->phone : '' }}"/>
                            <label for="floatingInput">التليفون</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="email" class="form-control" name="student[email]" value="{{ isset($student) ? $student->email : '' }}"/>
                            <label for="floatingInput">الايميل</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <select class="form-select" name="student[gender]" data-control="select2">
                                <option {{ isset($student) && $student->gender == 'male' ? 'selected' : '' }} value="male">ذكر</option>
                                <option {{ isset($student) && $student->gender == 'female' ? 'selected' : '' }}  value="female">انثى</option>
                            </select>
                            <label for="floatingInput">النوع</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <select class="form-select" name="student[section_ID]" data-control="select2">
                                @foreach(\App\Models\Section::get() as $section)
                                <option {{ isset($student) && $student->section_ID == $section->ID ? 'selected' : '' }} value="{{ $section->ID }}">
                                    {{ $section->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInput">الفصل</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="student[father_name]" value="{{ isset($student) ? $student->father_name : '' }}"/>
                            <label for="floatingInput">اسم الاب</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="student[father_phone]" value="{{ isset($student) ? $student->father_phone : '' }}"/>
                            <label for="floatingInput">تليفون الاب</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="student[address]" value="{{ isset($student) ? $student->address : '' }}"/>
                            <label for="floatingInput">العنوان</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">{{ isset($student) ? 'تحديث' : 'اصافه' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
