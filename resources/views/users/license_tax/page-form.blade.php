@extends('users.layout.layout')
@section('pages_content')
<div class="container">
    <h2 class="text-center mb-4">แบบฟอร์ม(ภ.ป.๑) แนบแสดงรายการ ภาษีป้าย</h2><br>

    <form action="{{route('LicenseTaxFormCreate')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 mb-3">

            <h5>ข้อมูลเจ้าของภาษีป้าย</h5><br>
            <div class="col-md-4">
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

            <div class="col-md-4">
                <label for="build_name" class="form-label">ชื่อสถานที่ประกอบการค้าหรือกิจการอื่นๆ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="build_name" name="build_name" required>
            </div>

            <div class="col-md-3">
                <label for="address" class="form-label">เลขที่ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="col-md-3">
                <label for="alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" class="form-control" id="alley" name="alley">
            </div>

            <div class="col-md-3">
                <label for="village" class="form-label">หมู่ที่ </label>
                <input type="text" class="form-control" id="village" name="village" required>
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
                <label for="district" class="form-label">อำเภอ/เขต <span class="text-danger">*</span></label>
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

            <div class="col-md-6">
                <label for="emp_fullname" class="form-label">ขอยื่นแบบแสดงรายการภาษีป้ายต่อพนักงานเจ้าหน้าที่ ณ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="emp_fullname" name="emp_fullname" required>
            </div>
        </div>
        <hr>
        <h5>ข้อมูลรายการภาษีป้าย</h5><br>
        <h5>1. ภาษีป้ายมีอักษรไทยล้วน</h5><br>
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="build_wide_1" class="form-label">ขนาดป้าย : กว้าง (เซนติเมตร)</label>
                <input type="text" class="form-control" id="build_wide_1" name="build_wide_1">
            </div>
            <div class="col-md-3">
                <label for="build_long_1" class="form-label">ขนาดป้าย : ยาว (เซนติเมตร)</label>
                <input type="text" class="form-control" id="build_long_1" name="build_long_1">
            </div>
            <div class="col-md-3">
                <label for="build_meter_1" class="form-label">เนื้อที่ป้าย (ตารางเซนติเมตร) </label>
                <input type="text" class="form-control" id="build_meter_1" name="build_meter_1">
            </div>
            <div class="col-md-3">
                <label for="build_amount_1" class="form-label">จำนวนป้าย</label>
                <input type="text" class="form-control" id="build_amount_1" name="build_amount_1">
            </div>
            <div class="col-md-6">
                <label for="build_text_1" class="form-label">ข้อความหรือภาพเครื่องหมายที่ปรากฎในป้ายโดยย่อ</label>
                <input type="text" class="form-control" id="build_text_1" name="build_text_1">
            </div>
            <div class="col-md-6">
                <label for="build_place_1" class="form-label">สถานที่ติดตั้งป้าย (ถนน,ตรอก,ซอย,แขวง,เขต,สถานที่ใกล้เคียง หรือระหว่าง ก.ม.ที่)</label>
                <input type="text" class="form-control" id="build_place_1" name="build_place_1">
            </div>
            <div class="col-md-3">
                <label for="build_date_1" class="form-label">วันที่ติดตั้ง</label>
                <input type="date" class="form-control" id="build_date_1" name="build_date_1">
            </div>
            <div class="col-md-3">
                <label for="build_remark_1" class="form-label">หมายเหตุ</label>
                <input type="text" class="form-control" id="build_remark_1" name="build_remark_1">
            </div>
        </div>
        <hr>
        <h5>2. ภาษีป้ายมีอักษรไทยปนอักษรต่างประเทศหรือเครื่องหมาย</h5><br>
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="build_wide_2" class="form-label">ขนาดป้าย : กว้าง (เซนติเมตร)</label>
                <input type="text" class="form-control" id="build_wide_2" name="build_wide_2">
            </div>
            <div class="col-md-3">
                <label for="build_long_2" class="form-label">ขนาดป้าย : ยาว (เซนติเมตร)</label>
                <input type="text" class="form-control" id="build_long_2" name="build_long_2">
            </div>
            <div class="col-md-3">
                <label for="build_meter_2" class="form-label">เนื้อที่ป้าย (ตารางเซนติเมตร) </label>
                <input type="text" class="form-control" id="build_meter_2" name="build_meter_2">
            </div>
            <div class="col-md-3">
                <label for="build_amount_2" class="form-label">จำนวนป้าย</label>
                <input type="text" class="form-control" id="build_amount_2" name="build_amount_2">
            </div>
            <div class="col-md-6">
                <label for="build_text_2" class="form-label">ข้อความหรือภาพเครื่องหมายที่ปรากฎในป้ายโดยย่อ</label>
                <input type="text" class="form-control" id="build_text_2" name="build_text_2">
            </div>
            <div class="col-md-6">
                <label for="build_place_2" class="form-label">สถานที่ติดตั้งป้าย (ถนน,ตรอก,ซอย,แขวง,เขต,สถานที่ใกล้เคียง หรือระหว่าง ก.ม.ที่)</label>
                <input type="text" class="form-control" id="build_place_2" name="build_place_2">
            </div>
            <div class="col-md-3">
                <label for="build_date_2" class="form-label">วันที่ติดตั้ง</label>
                <input type="date" class="form-control" id="build_date_2" name="build_date_2">
            </div>
            <div class="col-md-3">
                <label for="build_remark_2" class="form-label">หมายเหตุ</label>
                <input type="text" class="form-control" id="build_remark_2" name="build_remark_2">
            </div>
        </div>
        <hr>
        <h5>3. ภาษีป้ายที่ไม่มีอักษรไทย</h5><br>
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="build_wide_3" class="form-label">ขนาดป้าย : กว้าง (เซนติเมตร)</label>
                <input type="text" class="form-control" id="build_wide_3" name="build_wide_3">
            </div>
            <div class="col-md-3">
                <label for="build_long_3" class="form-label">ขนาดป้าย : ยาว (เซนติเมตร)</label>
                <input type="text" class="form-control" id="build_long_3" name="build_long_3">
            </div>
            <div class="col-md-3">
                <label for="build_meter_3" class="form-label">เนื้อที่ป้าย (ตารางเซนติเมตร) </label>
                <input type="text" class="form-control" id="build_meter_3" name="build_meter_3">
            </div>
            <div class="col-md-3">
                <label for="build_amount_3" class="form-label">จำนวนป้าย</label>
                <input type="text" class="form-control" id="build_amount_3" name="build_amount_3">
            </div>
            <div class="col-md-6">
                <label for="build_text_3" class="form-label">ข้อความหรือภาพเครื่องหมายที่ปรากฎในป้ายโดยย่อ</label>
                <input type="text" class="form-control" id="build_text_3" name="build_text_3">
            </div>
            <div class="col-md-6">
                <label for="build_place_3" class="form-label">สถานที่ติดตั้งป้าย (ถนน,ตรอก,ซอย,แขวง,เขต,สถานที่ใกล้เคียง หรือระหว่าง ก.ม.ที่)</label>
                <input type="text" class="form-control" id="build_place_3" name="build_place_3">
            </div>
            <div class="col-md-3">
                <label for="build_date_3" class="form-label">วันที่ติดตั้ง</label>
                <input type="date" class="form-control" id="build_date_3" name="build_date_3">
            </div>
            <div class="col-md-3">
                <label for="build_remark_3" class="form-label">หมายเหตุ</label>
                <input type="text" class="form-control" id="build_remark_3" name="build_remark_3">
            </div>
        </div>
        <hr>
        <div class="mb-3 col-md-12">
            <h5><strong>เอกสารหลักฐานที่ต้องใช้ประกอบการยื่นแบบฯ </strong></h5>
            <label class="form-label"><strong><u>กรณีป้ายใหม่</u> ให้เจ้าของป้ายยื่นแบบเสียภาษี พร้อมสำเนาหลักฐานและลงลายมือชื่อรับรองความถูกต้อง ได้แก่ </strong></label>
            <div class="form-check">
                <label class="form-check-label">- ใบอนุญาตติดตั้งป้าย,ใบเสร็จรับเงินค่าทำป้าย</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">- สำเนาทะเบียนบ้าน</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">- บัตรประจำตัวประชาชน/บัตรข้าราชการ/บัตรพนักงานรัฐวิสาหกิจ/บัตรประจำตัว ผู้เสียภาษี</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">- กรณีป้ายเป็นนิติบุคคลให้แนบหนังสือรับรองสำนักงานทะเบียนหุ้นส่วนบริษัท,ทะเบียนพาณิชย์และหลักฐานของสรรพากร เช่น ภ.พ. 01,09,ภ.พ. 20</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">- หนังสือมอบอำนาจ (กรณีไม่สามารถยื่นแบบได้ด้วยตนเอง พร้อมติดอากรแสตมป์ตามกฎหมาย)</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">- หลักฐานอื่นๆ ตามที่เจ้าหน้าที่ให้คำแนะนำ เช่น รูปถ่ายป้าย,วัดขนาดความกว้าง x ยาว</label>
            </div>
            <label class="form-label"><strong><u>กรณีป้ายเก่า</u> ให้เจ้าของป้ายยื่นแบบเสียภาษีป้าย (ภ.ป.1) พร้อมใบเสร็จรับเงินการเสียภาษีครั้งสุดท้าย กรณีเจ้าของป้ายเป็นนิติบุคคลให้แนบหนังสือรับรองสำนักงานทะเบียนหุ้นส่วนบริษัทพร้อมกับการยื่นแบบ ภ.ป.1</strong></label><br>
        </div>
        <div class="mb-3">
            <label for="attachments" class="form-label">แนบไฟล์ (รูปหรือเอกสารประกอบคำร้อง)</label>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <div class="text-center w-full border mt-5">
            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fa-solid fa-file-arrow-up me-2"></i></i>
                ส่งฟอร์มข้อมูล</button>
        </div>
    </form>
</div>

<script src="{{asset('js/multipart_files.js')}}"></script>

@endsection