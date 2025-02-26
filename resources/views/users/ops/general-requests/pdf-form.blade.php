<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PDF Report</title>

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun-bold';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew-Bold.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', 'sarabun-bold', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            line-height: 1;
        }


        .regis_number {
            text-align: right;
            margin-right: 8px;
        }

        .title_doc {
            text-align: center;
        }

        .box_text {
            border: 1px solid rgb(255, 255, 255);
            text-align: center;
        }

        .box_text span {
            display: inline-flex;
            align-items: center;
            line-height: 1;
        }

        .box_text input[type="checkbox"] {
            width: 17px;
            /* ปรับขนาด checkbox ให้พอดีกับข้อความ */
            height: 17px;
            /* ปรับความสูงให้พอดีกับข้อความ */
            margin-right: 5px;
            margin-left: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
        }

        .box_text_border {
            margin-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            margin-bottom: 5px;
            border: 2px solid black;
            text-align: left;
            ;
        }

        .box_text_border span {
            display: inline-flex;
            align-items: left;
            line-height: 0.3;
        }

        .box_text_border input[type="checkbox"] {
            width: 17px;
            /* ปรับขนาด checkbox ให้พอดีกับข้อความ */
            height: 17px;
            /* ปรับความสูงให้พอดีกับข้อความ */
            margin-right: 5px;
            margin-left: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
        }

        .dotted-line {
            margin-left: 2px;
            color: blue;
            border-bottom: 2px dotted blue;
            word-wrap: break-word;
            /* ห่อข้อความที่ยาวเกิน */
            overflow-wrap: break-word;
            /* รองรับ browser อื่น */
        }
    </style>
</head>

<body>

    @php
        use Carbon\Carbon;
        $date = Carbon::parse($form->date);
        $day = $date->day;
        $month = $date->locale('th')->translatedFormat('F');
        $year = $date->year + 543;

        $birthday = Carbon::parse($form->birth_day);
        $birthday_day = $birthday->day;
        $birthday_month = $birthday->locale('th')->translatedFormat('F');
        $birthday_year = $birthday->year + 543;

        // $citizen_id = $form->traders->first()->citizen_id;
        // $tradersformatted_id =
        //     substr($citizen_id, 0, 1) .
        //     '-' .
        //     substr($citizen_id, 1, 4) .
        //     '-' .
        //     substr($citizen_id, 5, 5) .
        //     '-' .
        //     substr($citizen_id, 10, 2) .
        //     '-' .
        //     substr($citizen_id, 12, 1);

        $citizen_c_id = $form->citizen_id;
        $formatted_id =
            substr($citizen_c_id, 0, 1) .
            '-' .
            substr($citizen_c_id, 1, 4) .
            '-' .
            substr($citizen_c_id, 5, 5) .
            '-' .
            substr($citizen_c_id, 10, 2) .
            '-' .
            substr($citizen_c_id, 12, 1);
    @endphp

    <div>
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/logo.png'))) }}" alt="Logo">
    </div>

    <div class="title_doc">คำร้องทั่วไป</div>
    <div class="box_text" style="text-align: right; margin-top:10px;"><span>เขียนที่
            นายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
        <div>
            <span>วันที่</span><span class="dotted-line" style="width: 5%; text-align: center;"> {{ $day }}
            </span><span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center;">
                {{ $month }}
            </span><span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center;">
                {{ $year }}
            </span>
        </div>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>เรื่อง</span><span class="dotted-line" style="width: 35%; text-align: center;">{{$form->subject}}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>เรียน นายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span style="margin-left:2rem;">ข้าพเจ้า</span><span class="dotted-line"
            style="width: 20%; text-align: center;">{{ $form->salutation }}{{ $form->name }}</span><span>อายุ</span><span class="dotted-line"
            style="width: 6%; text-align: center;">{{ $form->age }}</span><span>ปี สัญชาติ</span><span class="dotted-line"
            style="width: 8%; text-align: center;"> </span><span>เชื้อชาติ</span><span class="dotted-line"
            style="width: 8%; text-align: center;"> </span><span>อยู่บ้านเลขที่</span><span class="dotted-line"
            style="width: 8%; text-align: center;">{{ $form->house_number}}</span><span>หมู่ที่</span><span class="dotted-line"
            style="width: 8%; text-align: center;">{{ $form->village }}</span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span>ตำบล</span><span class="dotted-line"
            style="width: 18%; text-align: center;">{{ $form->subdistrict }}</span><span>อำเภอ</span><span class="dotted-line"
            style="width: 18%; text-align: center;">{{ $form->district }}</span><span>จังหวัด</span><span class="dotted-line"
            style="width: 18%; text-align: center;">{{ $form->province }}</span><span>เบอร์โทรติดต่อ</span><span class="dotted-line"
            style="width: 19%; text-align: center;">{{ $form->phone }}</span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:2rem">
        <span>ด้วยข้าพเจ้ามีความประสงค์</span><span class="dotted-line" style="width: 78%; text-align: center;">{{ $form->request_details }}</span>
    </div>
    <div class="box_text" style="text-align: left; margin-top:20px;">
        <span class="dotted-line" style="width: 99%; text-align: center;"></span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:2rem">
        <span>จึงเรียนมาเพื่อทราบและโปรดพิจารณาดำเนินการตามที่เสนอ</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem; margin-bottom:1.5rem;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 35%; text-align: center;">{{ $form->name }}
        </span>
        <span>ผู้ยื่นคำร้อง</span>
        <div style="margin-right: 55px;">
            <span>(</span>
            <span class="dotted-line" style="width: 35%; text-align: center;">{{ $form->salutation }}{{ $form->name }}</span>
            <span>)</span>
        </div>
    </div>
    <hr>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- คอลัมน์ซ้าย -->
            <td style="width: 50%; vertical-align: top; border: 0px solid black; padding: 10px;">
                <div class="box_text" style="text-align: left; margin-top: 2rem; margin-bottom: 1.5rem;">
                    <div style="margin-left: 98px;">ความคิดเห็นผู้เขียน/บันทึก</div>
                    <div class="box_text" style="margin-left: 25px; margin-top: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>ลงชื่อ</span>
                        <span class="dotted-line" style="display: inline-block; width: 50%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>(</span>
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                        <span>)</span>
                    </div>
                </div>
            </td>

            <!-- คอลัมน์ขวา -->
            <td style="width: 50%; vertical-align: top; border: 0px solid black; padding: 10px;">
                <div class="box_text" style="text-align: left; margin-top: 2rem; margin-bottom: 1.5rem;">
                    <div style="margin-left: 98px;">ความคิดเห็นหัวหน้าสำนักปลัด</div>
                    <div class="box_text" style="margin-left: 25px; margin-top: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>ลงชื่อ</span>
                        <span class="dotted-line" style="display: inline-block; width: 50%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>(</span>
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                        <span>)</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <!-- คอลัมน์ซ้าย -->
            <td style="width: 50%; vertical-align: top; border: 0px solid black; padding: 10px;">
                <div class="box_text" style="text-align: left; margin-top: 2rem; margin-bottom: 1.5rem;">
                    <div style="margin-left: 130px;">ความคิดเห็นปลัด</div>
                    <div class="box_text" style="margin-left: 25px; margin-top: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>ลงชื่อ</span>
                        <span class="dotted-line" style="display: inline-block; width: 50%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>(</span>
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                        <span>)</span>
                    </div>
                </div>
            </td>

            <!-- คอลัมน์ขวา -->
            <td style="width: 50%; vertical-align: top; border: 0px solid black; padding: 10px;">
                <div class="box_text" style="text-align: left; margin-top: 2rem; margin-bottom: 1.5rem;">
                    <div style="margin-left: 130px;">ความคิดเห็นนายก</div>
                    <div class="box_text" style="margin-left: 25px; margin-top: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>ลงชื่อ</span>
                        <span class="dotted-line" style="display: inline-block; width: 50%; border-bottom: 1px dotted black;"></span>
                    </div>
                    <div class="box_text" style="margin-left: 25px;">
                        <span>(</span>
                        <span class="dotted-line" style="display: inline-block; width: 60%; border-bottom: 1px dotted black;"></span>
                        <span>)</span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

