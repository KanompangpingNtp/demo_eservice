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

        <br>
        <h5>ขอยื่นคำร้องขอรับ/ขอต่ออายุใบอนุญาตจัดตั้งสถานที่ ต่อเข้าพนักงานท้องถิ่น</h5><br>

        <div class="col-md-5 mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="confirm_option" id="person_individual" value="จัดตั้งสถานที่จำหน่ายอาหาร" required>
                <label class="form-check-label" for="person_individual">
                    จัดตั้งสถานที่จำหน่ายอาหาร
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="confirm_option" id="person_legal" value="จัดตั้งสถานที่สะสมอาหาร">
                <label class="form-check-label" for="person_legal">
                    จัดตั้งสถานที่สะสมอาหาร
                </label>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="confirm_volume" class="form-label">ตามใบอนุญาต เล่มที่</label>
                <input type="text" class="form-control" id="confirm_volume" name="confirm_volume">
            </div>

            <div class="col-md-3">
                <label for="confirm_number" class="form-label">เลขที่</label>
                <input type="text" class="form-control" id="confirm_number" name="confirm_number">
            </div>

            <div class="col-md-3">
                <label for="confirm_year" class="form-label">ปี</label>
                <input type="text" class="form-control" id="confirm_year" name="confirm_year">
            </div>

            <div class="col-md-3">
                <label for="confirm_expiration_date" class="form-label">ซึ่งจะหมดอายุลงในวันที่</label>
                <input type="date" class="form-control" id="confirm_expiration_date" name="confirm_expiration_date">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="place_name" class="form-label"><strong>1.</strong> สถานที่ชื่อ</label>
                <input type="text" class="form-control" id="place_name" name="place_name">
            </div>

            <div class="col-md-3">
                <label for="shop_type" class="form-label">ประเภทร้าน</label>
                <input type="text" class="form-control" id="shop_type" name="shop_type">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="location" class="form-label"><strong>2.</strong> สถานที่ตั้งเลขที่</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>

            <div class="col-md-3">
                <label for="details_village" class="form-label">หมู่ที่</label>
                <input type="text" class="form-control" id="details_village" name="details_village">
            </div>

            <div class="col-md-3">
                <label for="details_alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" class="form-control" id="details_alley" name="details_alley">
            </div>

            <div class="col-md-3">
                <label for="details_road" class="form-label">ถนน</label>
                <input type="text" class="form-control" id="details_road" name="details_road">
            </div>

            <div class="col-md-3">
                <label for="details_subdistrict" class="form-label">ตำบล/แขวง</label>
                <input type="text" class="form-control" id="details_subdistrict" name="details_subdistrict">
            </div>

            <div class="col-md-3">
                <label for="details_district" class="form-label">อำเภอ</label>
                <input type="text" class="form-control" id="details_district" name="details_district">
            </div>

            <div class="col-md-3">
                <label for="details_province" class="form-label">จังหวัด</label>
                <input type="text" class="form-control" id="details_province" name="details_province">
            </div>

            <div class="col-md-3">
                <label for="details_telephone" class="form-label">โทรศัพท์</label>
                <input type="text" class="form-control" id="details_telephone" name="details_telephone" maxlength="10">
            </div>

            <div class="col-md-3">
                <label for="details_fax" class="form-label">โทรสาร</label>
                <input type="text" class="form-control" id="details_fax" name="details_fax">
            </div>

            <div class="col-md-3">
                <label for="business_area" class="form-label">พื้นที่ประกอบการ (ตารางเมตร)</label>
                <input type="text" class="form-control" id="business_area" name="business_area">
            </div>

            <div class="col-md-3">
                <label for="number_of_cooks" class="form-label">จำนวนผู้ปรุง (คน)</label>
                <input type="text" class="form-control" id="number_of_cooks" name="number_of_cooks">
            </div>

            <div class="col-md-3">
                <label for="number_of_food" class="form-label">ผู้เสิร์ฟ (คน)</label>
                <input type="text" class="form-control" id="number_of_food" name="number_of_food">
            </div>

            <div class="col-md-3">
                <label for="including_food_handlers" class="form-label">รวมผู้สัมผัสอาหาร (คน)</label>
                <input type="text" class="form-control" id="including_food_handlers" name="including_food_handlers">
            </div>

            <div class="col-md-3">
                <label for="number_of_trainees" class="form-label">ผ่านการอบรมแล้วจำนวน (คน)</label>
                <input type="text" class="form-control" id="number_of_trainees" name="number_of_trainees">
            </div>

            <div class="col-md-3">
                <label for="opening_hours" class="form-label">เปิดประกอบการตั้งแต่เวลา (น.)</label>
                <input type="text" class="form-control" id="opening_hours" name="opening_hours">
            </div>

            <div class="col-md-3">
                <label for="opening_for_business_until" class="form-label">ถึงเวลา (น.)</label>
                <input type="text" class="form-control" id="opening_for_business_until" name="opening_for_business_until">
            </div>

            <div class="col-md-3">
                <label for="total_hours" class="form-label">รวม (ชั่วโมง/วัน)</label>
                <input type="text" class="form-control" id="total_hours" name="total_hours">
            </div>

            <br>
            <p><strong>3. </strong>พร้อมคำร้องนี้ข้าพเจ้าได้แนบหนังสือรับรองการแจ้งเดิมและเอกสารหลักฐานต่างๆ มาด้วยคือ</p>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option1" id="option1">
                        <label class="form-check-label" for="option1">
                            Option 1
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option2" id="option2">
                        <label class="form-check-label" for="option2">
                            Option 2
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option3" id="option3">
                        <label class="form-check-label" for="option3">
                            Option 3
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option4" id="option4">
                        <label class="form-check-label" for="option4">
                            Option 4
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option5" id="option5">
                        <label class="form-check-label" for="option5">
                            Option 5
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option6" id="option6">
                        <label class="form-check-label" for="option6">
                            Option 6
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option7" id="option7">
                        <label class="form-check-label" for="option7">
                            Option 7
                        </label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="document_option[]" value="option8" id="option8">
                        <label class="form-check-label" for="option8">
                            อื่นๆ
                        </label>
                    </div>

                    <!-- Input ที่จะซ่อน/แสดงเมื่อเลือก checkbox -->
                    <div class="col-md-7" id="document_option_detail_div" style="display: none;">
                        <label for="document_option_detail" class="form-label">รายละเอียดอื่นๆ</label>
                        <input type="text" class="form-control" id="document_option_detail" name="document_option_detail">
                    </div>

                    <!-- JavaScript -->
                    <script>
                        document.getElementById('option8').addEventListener('change', function() {
                            var detailDiv = document.getElementById('document_option_detail_div');
                            if (this.checked) {
                                detailDiv.style.display = 'block'; // แสดง input
                            } else {
                                detailDiv.style.display = 'none'; // ซ่อน input
                            }
                        });

                    </script>

                </div>
            </div>
        </div>

        <br>

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
