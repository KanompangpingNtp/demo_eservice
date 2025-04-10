@extends('users.layout.layout')
@section('pages_content')

<div class="container">
    <h2 class="text-center mb-4">แบบคำร้องขอใช้ถังขยะ</h2><br>

    <form action="{{route('HealthHazardApplicationFormCreate')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3 mb-3">
            <div class="col-md-2">
                <label for="salutation" class="form-label">คำนำหน้า</label>
                <select class="form-select" id="salutation" name="salutation">
                    <option value="" selected disabled>เลือกคำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="full_name" class="form-label">ชื่อ - นามสกุล <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="col-md-3">
                <label for="address" class="form-label">อยู่บ้านเลขที่<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="col-md-3">
                <label for="village" class="form-label">หมู่ที่</label>
                <input type="text" class="form-control" id="village" name="village">
            </div>

            <div class="col-md-3">
                <label for="road" class="form-label">ถนน</label>
                <input type="text" class="form-control" id="road" name="road">
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
        </div>

        <div class="mb-3">
            <p>ซึ่งตั้งบ้านเรือนอยู่ในเขตปกครอง ของเทศบาลเมืองต้นแบบ ๔.๐ มีความประสงค์ขอรับถังขยะ จำนวน
                <input type="text" class="form-control d-inline" style="width: 80px;" name="">
                ใบ จากเทศบาลเมืองต้นแบบ ๔.๐ ตั้งแต่วันที่
                <input type="date" class="form-control d-inline" style="width: 150px;" name="">
                และยินยอมจ่ายค่าธรรมเนียมในการบริการเก็บ
                ขยะมูลฝอยในอัตรา ๔๐ บาท/เดือน/ใบ ตามเทศบัญญัติ
                เทศบาลเมืองต้นแบบ ๔.๐ เรื่อง การกำาจัดขยะมูลฝอยสิ่งปฏิกูล
                และสิ่งเปรอะเปื้อน พ.ศ. ๒๕๕๒ ทุกประการ
            </p>
        </div>

        <br>

        <div class="mb-3">
            <label for="attachments" class="form-label">แนบไฟล์ (รูปหรือเอกสารประกอบคำร้อง)</label>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <div class="text-center w-full border">
            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fa-solid fa-file-arrow-up me-2"></i></i>
                ส่งฟอร์มข้อมูล
            </button>
        </div>

    </form>
</div>

@endsection
