<div class="modal fade" tabindex="-1" id="{{ isset($section) ? 'edit_section_modal_' .  $section->ID : 'add_section_modal' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">{{ isset($section) ? 'Edit section: ' .  $section->name : 'Add New section' }}</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    @csrf
                    @if(isset($section))
                        <input type="hidden" name="section[ID]" value="{{ $section->ID }}">
                    @endif
                    <div class="form-group">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control" name="section[name]" value="{{ isset($section) ? $section->name : '' }}" required/>
                            <label for="floatingInput">سم الفصل</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">{{ isset($section) ? 'تحديث' : 'اصافه' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
