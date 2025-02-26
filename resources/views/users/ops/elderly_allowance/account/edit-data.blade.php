@extends('users.layout.layout')
@section('pages_content')

<div class="container">
    <a href="{{route('ElderlyAllowanceShowDetails')}}">กลับ</a><br>
    <h3 class="text-center">แก้ไขฟอร์มแบบยืนยันสิทธิผู้สูงอายุ</h3><br>

    <form action="{{ route('ElderlyAllowanceUserUpdateForm', $form->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h4>ข้อมูลผู้สูงอายุ</h4>
        <div class="row mb-3">
            <div class="col-12 col-md-4">
                <label for="written_at">เขียนที่:</label>
                <input type="text" id="written_at" name="written_at" class="form-control" value="{{ old('written_at', $form->written_at) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-2">
                <label for="salutation">คำนำหน้า :</label>
                <select class="form-select" id="salutation" name="salutation">
                    <option value="" disabled {{ old('salutation', $form->salutation) == '' ? 'selected' : '' }}>เลือกคำนำหน้า</option>
                    <option value="นาย" {{ old('salutation', $form->salutation) == 'นาย' ? 'selected' : '' }}>นาย</option>
                    <option value="นาง" {{ old('salutation', $form->salutation) == 'นาง' ? 'selected' : '' }}>นาง</option>
                    <option value="นางสาว" {{ old('salutation', $form->salutation) == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                </select>
            </div>
            <div class="col-12 col-md-5">
                <label for="first_name">ขื่่อ: <span class="text-danger">*</span></label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $form->first_name) }}" required>
            </div>
            <div class="col-12 col-md-5">
                <label for="last_name">นามสกุล: <span class="text-danger">*</span></label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $form->last_name) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-2">
                <label for="day">วันเกิดที่ (กรอกวันที่เกิด) <span class="text-danger">*</span></label>
                <input type="number" id="day" name="day" class="form-control" min="1" max="31" required>
                <small id="dayError" class="form-text text-danger" style="display: none;">กรุณากรอกวันเป็นตัวเลขระหว่าง 1 - 31</small>
            </div>

            <script>
                document.getElementById("day").addEventListener("input", function() {
                    const dayInput = document.getElementById("day");
                    const dayError = document.getElementById("dayError");

                    const dayValue = parseInt(dayInput.value, 10);

                    if (dayValue < 1 || dayValue > 31 || isNaN(dayValue)) {
                        dayInput.value = "";
                        dayError.style.display = "block";
                        dayInput.classList.add("is-invalid");
                    } else {
                        dayError.style.display = "none";
                        dayInput.classList.remove("is-invalid");
                    }
                });

            </script>

            <div class="col-12 col-md-2">
                <label for="month">เดือน (เลือกเดือนเกิด) <span class="text-danger">*</span></label>
                <select id="month" name="month" class="form-control" required>
                    <option value="1">มกราคม</option>
                    <option value="2">กุมภาพันธ์</option>
                    <option value="3">มีนาคม</option>
                    <option value="4">เมษายน</option>
                    <option value="5">พฤษภาคม</option>
                    <option value="6">มิถุนายน</option>
                    <option value="7">กรกฎาคม</option>
                    <option value="8">สิงหาคม</option>
                    <option value="9">กันยายน</option>
                    <option value="10">ตุลาคม</option>
                    <option value="11">พฤศจิกายน</option>
                    <option value="12">ธันวาคม</option>
                </select>
            </div>
            <div class="col-12 col-md-2">
                <label for="year">ปี (กรอกปีที่เกิดเป็น พ.ศ.) <span class="text-danger">*</span></label>
                <input type="number" id="year" name="year" class="form-control" min="1900" required>
                <small id="yearError" class="form-text text-danger" style="display: none;">กรุณากรอกปี 4 หลัก</small>
            </div>

            <script>
                document.getElementById("year").addEventListener("input", function() {
                    const yearInput = document.getElementById("year");
                    const yearError = document.getElementById("yearError");

                    if (yearInput.value.length > 4) {
                        yearInput.value = yearInput.value.slice(0, 4);
                    }

                    const yearValue = yearInput.value;

                    if (yearValue.length !== 4 || isNaN(yearValue)) {
                        yearError.style.display = "block";
                        yearInput.classList.add("is-invalid");
                    } else {
                        yearError.style.display = "none";
                        yearInput.classList.remove("is-invalid");
                    }
                });

            </script>

            <input type="text" id="birth_day" name="birth_day" class="form-control" hidden>

            <div class="col-12 col-md-2">
                <label for="age">อายุ: <span class="text-danger">*</span></label>
                <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $form->age) }}" required>
            </div>
            <div class="col-12 col-md-4">
                <label for="nationality">สัญชาติ: <span class="text-danger">*</span></label>
                <input type="text" id="nationality" name="nationality" class="form-control" value="{{ old('nationality', $form->nationality) }}" required>
            </div>
        </div>

        <style>
            #birth_day {
                border: none;
                /* ลบขอบ */
                background: transparent;
                /* ลบพื้นหลัง */
                box-shadow: none;
                /* ลบเงา */
            }

        </style>

        <script>
            // ฟังก์ชันแปลงวันที่จาก พ.ศ. เป็น ค.ศ.
            function convertToAD(year) {
                return year - 543;
            }

            // เมื่อมีการกรอกข้อมูลในช่องวัน เดือน ปี
            document.querySelectorAll("#day, #month, #year").forEach(input => {
                input.addEventListener("input", function() {
                    // ดึงค่าจาก input
                    const day = document.getElementById("day").value;
                    const month = document.getElementById("month").value;
                    const year = document.getElementById("year").value;

                    if (day && month && year) {
                        // แปลงปี พ.ศ. เป็น ค.ศ.
                        const yearAD = convertToAD(parseInt(year));

                        // สร้างวันที่ในรูปแบบ dd/mm/yyyy
                        const formattedDate = `${String(day).padStart(2, '0')}/${String(month).padStart(2, '0')}/${yearAD}`;

                        // แสดงวันที่ที่แปลงแล้วใน input birth_day
                        document.getElementById("birth_day").value = formattedDate;
                    }
                });
            });

        </script>

        <div class="row mb-3">
            <div class="col-12 col-md-4 mb-3">
                <label for="house_number">ที่อยู่ตามสำเนาทะเบียนบ้าน: <span class="text-danger">*</span></label>
                <input type="text" id="house_number" name="house_number" class="form-control" value="{{ old('house_number', $form->house_number) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="village">หมู่:</label>
                <input type="text" id="village" name="village" class="form-control" value="{{ old('village', $form->village) }}">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="community">ชุมชน:</label>
                <input type="text" id="community" name="community" class="form-control" value="{{ old('community', $form->community) }}">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="alley">ซอย:</label>
                <input type="text" id="alley" name="alley" class="form-control" value="{{ old('alley', $form->alley) }}">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="road">ถนน:</label>
                <input type="text" id="road" name="road" class="form-control" value="{{ old('road', $form->road) }}">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="subdistrict">ตำบล: <span class="text-danger">*</span></label>
                <input type="text" id="subdistrict" name="subdistrict" class="form-control" value="{{ old('subdistrict', $form->subdistrict) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="district">อำเภอ: <span class="text-danger">*</span></label>
                <input type="text" id="district" name="district" class="form-control" value="{{ old('district', $form->district) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="province">จังหวัด: <span class="text-danger">*</span></label>
                <input type="text" id="province" name="province" class="form-control" value="{{ old('province', $form->province) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="postal_code">รหัสไปรษณีย: <span class="text-danger">*</span></label>
                <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code', $form->postal_code) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="phone_number">โทรศัพท์: <span class="text-danger">*</span></label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $form->phone_number) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="citizen_id">เลขบัตรประชาชน: <span class="text-danger">*</span></label>
                <input type="text" id="citizen_id" name="citizen_id" class="form-control" value="{{ old('citizen_id', $form->citizen_id) }}" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="marital_status">สถานภาพการสมรส:</label>
                <select id="marital_status" name="marital_status" class="form-control" required>
                    <option value="single" {{ old('marital_status', $form->marital_status) == 'single' ? 'selected' : '' }}>โสด</option>
                    <option value="married" {{ old('marital_status', $form->marital_status) == 'married' ? 'selected' : '' }}>แต่งงานแล้ว</option>
                    <option value="widowed" {{ old('marital_status', $form->marital_status) == 'widowed' ? 'selected' : '' }}>เป็นม่าย</option>
                    <option value="divorced" {{ old('marital_status', $form->marital_status) == 'divorced' ? 'selected' : '' }}>หย่าร้าง</option>
                    <option value="separated" {{ old('marital_status', $form->marital_status) == 'separated' ? 'selected' : '' }}>แยกจากกัน</option>
                    <option value="other" {{ old('marital_status', $form->marital_status) == 'other' ? 'selected' : '' }}>อื่นๆ</option>
                </select>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="monthly_income">รายได้ต่อเดือน:</label>
                <input type="text" id="monthly_income" name="monthly_income" class="form-control" value="{{ old('monthly_income', $form->monthly_income) }}">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="occupation">อาชีพ:</label>
                <input type="text" id="occupation" name="occupation" class="form-control" value="{{ old('occupation', $form->occupation) }}">
            </div>
        </div>

        <hr>

        <h4> ข้อมูลทั่วไป : สถานภาพการรับสวัสดิการภาครัฐ</h4>
        <div class="form-check">
            <input type="checkbox" name="welfare_type[]" id="welfare_type_aid" value="option1" class="form-check-input" {{ in_array('option1', old('welfare_type', $form->personsOption->first()->welfare_type ?? [])) ? 'checked' : '' }}>
            <label for="welfare_type_aid" class="form-check-label">ไม่ได้รับเบี้ยยังชีพผู้สูงอายุ</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="welfare_type[]" id="welfare_type_disability" value="option2" class="form-check-input" {{ in_array('option2', old('welfare_type', $form->personsOption->first()->welfare_type ?? [])) ? 'checked' : '' }}>
            <label for="welfare_type_disability" class="form-check-label">ได้รับเงินสงเคราะห์เพื่อการยังชีพผู้ป่วยเอดส์</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="welfare_type[]" id="welfare_type_disability2" value="option3" class="form-check-input" {{ in_array('option3', old('welfare_type', $form->personsOption->first()->welfare_type ?? [])) ? 'checked' : '' }}>
            <label for="welfare_type_disability2" class="form-check-label">ได้รับเงินเบี้ยความพิการ</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="welfare_type[]" id="welfare_type_relocation" value="option4" class="form-check-input" {{ in_array('option4', old('welfare_type', $form->personsOption->first()->welfare_type ?? [])) ? 'checked' : '' }}>
            <label for="welfare_type_relocation"> ย้ายภูมิลำเนาเข้ามาอยู่ใหม่ เมื่อ</label>
        </div>

        <div id="welfare_other_types_div" style="display: {{ in_array('option4', old('welfare_type', $form->personsOption->first()->welfare_type ?? [])) ? 'block' : 'none' }};">
            <label for="welfare_other_types" class="form-label">รายละเอียดอื่นๆ</label>
            <input type="text" id="welfare_other_types" name="welfare_other_types" class="form-control" value="{{ old('welfare_other_types', $form->personsOption->first()->welfare_other_types ?? '') }}" placeholder="กรอกข้อมูลเพิ่มเติม">
        </div>

        <hr>

        <div class="mb-4">
            <h4>มีความประสงค์ขอรับเงินเบี้ยยังชีพผู้สูงอายุ โดยวิธีดังต่อไปนี้ (เลือก 1
                วิธี)</h4>
            <div class="form-check">
                <input type="radio" name="request_for_money_type" id="money_type_option1" value="option1" class="form-check-input" {{ old('request_for_money_type', $form->personsOption->first()->request_for_money_type ?? '') == 'option1' ? 'checked' : '' }} required>
                <label for="money_type_option1" class="form-check-label">รับเงินสดด้วยตนเอง</label>
            </div>
            <div class="form-check">
                <input type="radio" name="request_for_money_type" id="money_type_option2" value="option2" {{ old('request_for_money_type', $form->personsOption->first()->request_for_money_type ?? '') == 'option2' ? 'checked' : '' }} class="form-check-input">
                <label for="money_type_option2" class="form-check-label">รับเงินสดโดยบุคคลที่ได้รับมอบอํานาจจากผู้มีสิทธิ</label>
            </div>
            <div class="form-check">
                <input type="radio" name="request_for_money_type" id="money_type_option3" value="option3" {{ old('request_for_money_type', $form->personsOption->first()->request_for_money_type ?? '') == 'option3' ? 'checked' : '' }} class="form-check-input">
                <label for="money_type_option3" class="form-check-label">โอนเงินเข้าบัญชีเงินฝากธนาคารในนามผู้มีสิทธิ</label>
            </div>
            <div class="form-check">
                <input type="radio" name="request_for_money_type" id="money_type_option4" value="option4" {{ old('request_for_money_type', $form->personsOption->first()->request_for_money_type ?? '') == 'option4' ? 'checked' : '' }} class="form-check-input">
                <label for="money_type_option4" class="form-check-label">โอนเงินเข้าบัญชีเงินฝากธนาคารในนามบุคลที่ได้รับมอบอํานาจจากผู้มีสิทธิ</label>
            </div>
        </div>

        <hr>

        @php
        $documentType = $form->personsOption->first()->document_type ?? '[]';
        if (!is_string($documentType)) {
        $documentType = '[]';
        }
        $documentTypeArray = json_decode($documentType, true);
        @endphp

        <h4>ประเภทเอกสารที่แนบ</h4>
        <div class="form-check">
            <input type="checkbox" name="document_type[]" id="document_type_id_card" value="option1" class="form-check-input" {{ in_array('option1', $documentTypeArray) ? 'checked' : '' }}>
            <label for="document_type_id_card" class="form-check-label">สำเนาบัตรประจำตัวประชาชน</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="document_type[]" id="document_type_house_reg" value="option2" class="form-check-input" {{ in_array('option2', $documentTypeArray) ? 'checked' : '' }}>
            <label for="document_type_house_reg" class="form-check-label">สำเนาทะเบียนบ้าน</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="document_type[]" id="document_type_bank_book" value="option3" class="form-check-input" {{ in_array('option3', $documentTypeArray) ? 'checked' : '' }}>
            <label for="document_type_bank_book" class="form-check-label">สำเนาสมุดบัญชีเงินฝากธนาคาร</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="document_type[]" id="document_type_auth_letter" value="option4" class="form-check-input" {{ in_array('option4', $documentTypeArray) ? 'checked' : '' }}>
            <label for="document_type_auth_letter" class="form-check-label">หนังสือมอบอำนาจ</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="bank_option" id="bank_option" value="1" class="form-check-input" onclick="toggleAccountInputs()" {{ old('bank_option', $form->bank->first()->bank_option ?? '') == '1' ? 'checked' : '' }}>
            <label for="bank_option" class="form-check-label">บัญชีเงินฝากธนาคาร</label>
        </div>
        <div class="form-group" id="bank_name_group" style="display: none;">
            <label for="bank_name" class="form-label">ชื่อธนาคาร</label>
            <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', $form->bank->first()->bank_name ?? '') }}">
        </div>

        <div class="form-group" id="account_number_group" style="display: none;">
            <label for="account_number" class="form-label">บัญชีเลขที่</label>
            <input type="text" id="account_number" name="account_number" class="form-control" value="{{ old('account_number', $form->bank->first()->account_number ?? '') }}">
        </div>

        <div class="form-group" id="account_name_group" style="display: none;">
            <label for="account_name" class="form-label">ชื่อบัญชี</label>
            <input type="text" id="account_name" name="account_name" class="form-control" value="{{ old('account_name', $form->bank->first()->account_name ?? '') }}">
        </div>

        <hr>

        <div class="mb-3">
            <label class="form-label">ไฟล์แนบปัจจุบัน</label>
            <div class="list-group">
                @foreach ($form->files as $attachment)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank" class="text-truncate" style="max-width: 80%;">
                        {{ basename($attachment->file_path) }}
                    </a>
                    <div class="form-check">
                        <input type="checkbox" name="delete_attachments[]" value="{{ $attachment->id }}" class="form-check-input">
                        <label class="form-check-label" for="delete_attachments_{{ $attachment->id }}">ลบไฟล์นี้</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div>
            <h4>เพิ่มแนบไฟล์</h4>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <!-- แสดงรายการไฟล์ที่แนบ -->
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <div class="text-center w-full border">
            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fa-solid fa-file-arrow-up me-2"></i></i>
                ส่งฟอร์มข้อมูล</button>
        </div>
    </form>
</div>


<script src="{{ asset('js/multipart_files.js') }}"></script>

<script>

    document.getElementById('welfare_type_relocation').addEventListener('change', function() {
        const otherTypesDiv = document.getElementById('welfare_other_types_div');
        otherTypesDiv.style.display = this.checked ? 'block' : 'none';
    });

</script>

<script>
    // Function to toggle the visibility of account inputs based on the checkbox
    function toggleAccountInputs() {
        var checkBox = document.getElementById("bank_option");
        var accountNumberGroup = document.getElementById("account_number_group");
        var accountNameGroup = document.getElementById("account_name_group");
        var bankNameGroup = document.getElementById("bank_name_group");

        // If checkbox is checked, show the account inputs, otherwise hide them
        if (checkBox.checked) {
            accountNumberGroup.style.display = "block";
            accountNameGroup.style.display = "block";
            bankNameGroup.style.display = "block";
        } else {
            accountNumberGroup.style.display = "none";
            accountNameGroup.style.display = "none";
            bankNameGroup.style.display = "none";
        }
    }

    // Check inputs on page load to determine visibility
    document.addEventListener("DOMContentLoaded", function() {
        var checkBox = document.getElementById("bank_option");
        var accountNumberInput = document.getElementById("account_number");
        var accountNameInput = document.getElementById("account_name");
        var bankNameInput = document.getElementById("bank_name");

        // If any of the inputs have values or the checkbox is checked, display the groups
        if (
            checkBox.checked ||
            accountNumberInput.value.trim() !== "" ||
            accountNameInput.value.trim() !== "" ||
            bankNameInput.value.trim() !== ""
        ) {
            checkBox.checked = true; // Ensure the checkbox is checked
            toggleAccountInputs();
        }
    });

</script>


@endsection
