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
            font-size: 17px;
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
            border: 1px solid rgba(255, 255, 255, 0);
            text-align: start;
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
            margin-bottom: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
        }

        .box_text_border {
            margin-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            margin-bottom: 5px;
            border: 2px solid black;
            text-align: left;

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

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }

        .sub-header {
            font-weight: normal;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="title_doc">
        <img src=":image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/logo.png'))) }}"
            alt="Logo" height="90">
    </div>
    <div class="box_text" style="text-align: left; margin-top:-5rem;">
        <span style="margin-left: 3rem;">ภ.ป.1</span><br>
        <span>แบบแสดงรายการภาษีป้าย</span><br>
        <span>ประจำ พ.ศ.</span><span class="dotted-line"
            style="width: 10%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ชื่อเจ้าของป้าย</span><span class="dotted-line"
            style="width: 37.5%; text-align: center; line-height: 1;"></span>
        <span>ชื่อสถานที่ประกอบการค้าหรือกิจการอื่น</span><span class="dotted-line"
            style="width: 37.5%; text-align: center; line-height: 1;"></span>
        <span>เลขที่</span><span class="dotted-line"
            style="width: 21.6%; text-align: center; line-height: 1;"></span>
        <span>ตรอก/ซอย</span><span class="dotted-line"
            style="width: 21.6%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span><span class="dotted-line" style="width: 21.6%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span><span class="dotted-line"
            style="width: 21.6%; text-align: center; line-height: 1;"></span>
        <span>ตำบล</span><span class="dotted-line" style="width: 21.5%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ</span><span class="dotted-line"
            style="width: 21.5%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line"
            style="width: 21.5%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span><span class="dotted-line"
            style="width: 21.5%; text-align: center; line-height: 1;"></span>
        <span>ขอยื่นแบบแสดงรายการภาษีป้ายต่อพนักงานเจ้าหน้าที่ ณ</span><span class="dotted-line"
            style="width: 40%; text-align: center; line-height: 1;"></span>
        <span style="margin-left: 6rem;">ตามรายการต่อไปนี้</span>

    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 17px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 0px;
            text-align: center;
            vertical-align: middle;
            line-height: 0.9;
        }

        .sub-header {
            font-weight: normal;
            font-size: 15px;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th rowspan="2">1.ประเภทป้าย</th>
                <th colspan="2">2.ขนาดป้าย (ซม.)</th>
                <th rowspan="2">3.เนื้อที่ป้าย<br>(ตารางซม.)</th>
                <th rowspan="2">4.จำนวนป้าย</th>
                <th rowspan="2">5.ข้อความหรือภาพหรือ<br>เครื่องหมายที่ปรากฏในป้ายโดยย่อ</th>
                <th rowspan="2">6.สถานที่ติดตั้งป้ายและวันติดตั้ง(แสดงป้าย)<br>ถนน, ตรอก, ซอย, แขวง, เขต <br>สถานที่ใกล้เคียง หรือระหว่าง ก.ม. ที่</th>
                <th rowspan="2">หมายเหตุ</th>
            </tr>
            <tr>
                <th class="sub-header">กว้าง</th>
                <th class="sub-header">ยาว</th>
            </tr>
        </thead>
        <tbody>
            <!-- ป้ายประเภทที่ 1 (rowspan 4) -->
            <tr>
                <td rowspan="4">ป้ายประเภทที่ 1</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <!-- ป้ายประเภทที่ 2 (rowspan 6) -->
            <tr>
                <td rowspan="6">ป้ายประเภทที่ 2</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>


            <!-- ป้ายประเภทที่ 3 (rowspan 4) -->
            <tr>
                <td rowspan="4">ป้ายประเภทที่ 3</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

        </tbody>
    </table>
    <div class="box_text" style="text-align: right;">
        <span>ข้าพเจ้าขอรับรองว่ารายการที่แจ้งไว้ในแบบนี้ถูกต้องและครบถ้วนตาความจริงทุกประการ</span><br>
        <span>วันที่</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span><br>
        <span>ลงชื่อ</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span><span>เจ้าของป้าย</span>
    </div>
</body>

</html>