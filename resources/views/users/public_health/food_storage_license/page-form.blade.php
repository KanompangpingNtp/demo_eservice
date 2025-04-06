@extends('users.layout.layout')
@section('pages_content')
<div class="container">
    <h2 class="text-center mb-4">แบบคำร้องใบอณุญาตสะสมอาหาร</h2><br>

    <form action="{{route('FoodStorageLicenseFormCreate')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label class="form-label d-block">ข้าพเจ้า <span class="text-danger">*</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="title_name" id="person_individual" value="บุคคลธรรมดา" required>
                    <label class="form-check-label" for="person_individual">
                        บุคคลธรรมดา
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="title_name" id="person_legal" value="นิติบุคคล">
                    <label class="form-check-label" for="person_legal">
                        นิติบุคคล
                    </label>
                </div>
            </div>


            <div class="col-md-2">
                <label for="salutation" class="form-label">คำนำหน้า</label>
                <select class="form-select" id="salutation" name="salutation">
                    <option value="" selected disabled>เลือกคำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="full_name" class="form-label">ชื่อ - นามสกุล <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="col-md-2">
                <label for="age" class="form-label">อายุ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="age" name="age" required>
            </div>

            <div class="col-md-2">
                <label for="nationality" class="form-label">สัญชาติ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nationality" name="nationality" required>
            </div>

            <div class="col-md-3">
                <label for="id_card_number" class="form-label">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="id_card_number" name="id_card_number" required maxlength="13">
            </div>

            <div class="col-md-3">
                <label for="address" class="form-label">อยู่บ้าน/สำนักงานเลขที่ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="col-md-3">
                <label for="village" class="form-label">หมู่ที่ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="village" name="village" required>
            </div>

            <div class="col-md-3">
                <label for="alley" class="form-label">ตรอก/ซอย <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alley" name="alley" required>
            </div>

            <div class="col-md-3">
                <label for="road" class="form-label">ถนน <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="road" name="road" required>
            </div>

            <div class="col-md-3">
                <label for="subdistrict" class="form-label">ตำบล/แขวง <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="subdistrict" name="subdistrict" required>
            </div>

            <div class="col-md-3">
                <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="district" name="district" required>
            </div>

            <div class="col-md-3">
                <label for="province" class="form-label">จังหวัด <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="province" name="province" required>
            </div>

            <div class="col-md-3">
                <label for="telephone" class="form-label">โทรศัพท์ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="telephone" name="telephone" required maxlength="10">
            </div>

            <div class="col-md-3">
                <label for="fax" class="form-label">โทรสาร <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="fax" name="fax" required>
            </div>
        </div>

        <!-- Row 7: แนบไฟล์ -->
        <div class="mb-3">
            <label for="attachments" class="form-label">แนบไฟล์ (รูปหรือเอกสารประกอบคำร้อง)</label>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <!-- ปุ่มบันทึก -->
        <div class="text-center w-full border">
            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fa-solid fa-file-arrow-up me-2"></i></i>
                ส่งฟอร์มข้อมูล</button>
        </div>
    </form>
</div>

<script src="{{asset('js/multipart_files.js')}}"></script>

@endsection
