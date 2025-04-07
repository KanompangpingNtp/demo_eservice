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
            line-height: 0.8;
        }


        .regis_number {
            text-align: right;
            margin-right: 8px;
        }

        .title_doc {
            text-align: center;
            font-weight: bold;
        }

        .box_text {
            border: 1px solid rgb(255, 255, 255);
            text-align: center;
        }

        .box_text span {
            display: inline-flex;
            line-height: 1;
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
    <div style="width: 100%; display: table;">
        <!-- โลโก้อยู่ตรงกลาง -->
        <div style="display: table-cell; width: 75%; text-align: center; vertical-align: top;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/logo.png'))) }}"
                alt="Logo" height="120" style="margin-right: -180px;">
        </div>

        <!-- กล่องข้อความอยู่ขวาสุด -->
        <div style="display: table-cell; width: 25%; vertical-align: top; text-align: right;">
            <div class="box_text_border" style="display: inline-block;">
                <div class="box_text" style="text-align: left;">
                    <span>ลงรับเลขที่</span>
                    <span class="dotted-line" style="width: 85px;"></span> <br>
                    <span>วันที่</span>
                    <span class="dotted-line" style="width: 120px;"></span><br>
                    <span>เวลา</span>
                    <span class="dotted-line" style="width: 120px;"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="title_doc" style="text-align:center;">
        คำขอรับ ใบอนุญาต <br>
        จัดตั้งสถานที่จำหน่ายอาหาร หรือ สถานที่สะสมอาหาร
    </div>
    <div class="box_text" style="text-align: right; margin-top:1rem;">
        <span>เขียนที่</span>
        <span class="dotted-line" style="width: 32%; text-align: center; line-height: 1;">องค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
    </div>
    <div class="box_text" style="text-align: right; ">
        <span>วันที่</span>
        <span class="dotted-line" style="width: 5%; text-align: center;"></span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 15%; text-align: center;"> </span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 10%; text-align: center;"> </span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:5rem;">
        <span>ข้าพเจ้า</span><input type="checkbox" style="margin: 0px 5px;"><span>บุคคลธรรมดา</span>
        <input type="checkbox" style="margin: 0px 5px;"><span>นิติบุคคล ชื่อ</span>
        <span class="dotted-line" style="width: 43%; text-align: center;"></span>
        <span>อายุ</span>
        <span class="dotted-line" style="width: 10%; text-align: center;"></span>
        <span>ปี</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>สัญชาติ</span>
        <span class="dotted-line" style="width: 10%; text-align: center;"></span>
        <span>เลขบัตรประจำตัวประชาชน</span>
        <span class="dotted-line" style="width: 17%; text-align: center;"></span>
        <span>อยู่บ้าน/สำนักงานเลขที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center;"></span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ตรอกซอย</span>
        <span class="dotted-line" style="width: 22%; text-align: center;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 22%; text-align: center;"></span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 22%; text-align: center;"></span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 20%; text-align: center;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 20%; text-align: center;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 19%; text-align: center;"></span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 18%; text-align: center;"></span>
    </div>
    <div class="box_text" style="text-align: left;">
        <div style="margin-left:4rem;">
            <span>ขอยื่นเรื่องต่อเจ้าพนักงานท้องถิ่น เพื่อขอรับ/ขอต่อ ใบอนุณาตประกอบกิจการที่เป็นนอันตรายต่อสุขภาพ</span> <br>
        </div>
        <span>ประเภท</span>
        <span class="dotted-line" style="width: 49%; text-align: center;"></span>
        <span>ข้อ</span>
        <span class="dotted-line" style="width: 40%; text-align: center;"></span>
    </div>
    <div class="box_text" style="text-align: left;">
        <div style="margin-left:4rem;">
            <span>ชื่อสถานประกอบการ</span><span class="dotted-line" style="width: 82%; text-align: center;"></span>
        </div>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ตั้งอยู่เลขที่</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 18%; text-align: center;"></span>
        <span>ตรอกซอย</span>
        <span class="dotted-line" style="width: 18%; text-align: center;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 18%; text-align: center;"></span>
        <span>ตำบล</span>
        <span class="dotted-line" style="width: 18%; text-align: center;"></span>
        <span>อำเภอ</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 18%; text-align: center;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 20%; text-align: center;"></span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 34.5%; text-align: center;"></span>
        <span>พื้นที่ประกอบการ</span>
        <span class="dotted-line" style="width: 35%; text-align: center;"></span>
        <span>ตารางเมตร</span>
        <span>กำลังเครื่องจักร</span>
        <span class="dotted-line" style="width: 30%; text-align: center;"></span>
        <span>แรงม้า จำนวนคนงานชาย</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center;"></span>
        <span>คน หญิง</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center;"></span>
        <span>คน</span>
        <span>เปิดประกอบการตั้งแต่เวลา</span>
        <span class="dotted-line" style="width: 16%; text-align: center;"></span>
        <span>น. ถึงเวลา</span>
        <span class="dotted-line" style="width: 16%; text-align: center;"></span>
        <span>น.</span>
        <span>โดยได้แนบใบอนุญาติเดิมพร้อมกับหลักฐานดังต่อไปนี้</span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:5rem; margin-top:-2px;">
        <div style="margin-left:0.5rem;">
            <input type="checkbox" style="margin: 0px 10px;"><span>สำเนาบัตรประจำตัวประชาชนและสำเนาทะเบียนบ้านเจ้าของกิจการ(ผู้ประกอบการ/ผู้ถือใบอนุญาต)</span> <br>
            <input type="checkbox" style="margin: 0px 10px;"><span>สำเนาหนังสือรับรองการจดทะเบียนนิติบุคคลพร้อมสำเนาบัตรประชาชนของผู้แทนนิติบุคคล</span> <br>
            <span style="margin-left: 2rem; margin-top:-10px;">(กรณีผู้ประกอบการเป็นนิติบุคคล)</span><br>
            <input type="checkbox" style="margin: 0px 10px;"><span>หนังสือยินยอมให้ใช้อาคาร สถานที่ หรือสัญญาเช่า(กรณีผู้รับใบอนุญาตไม่มีกรรมสิทธิ์ในอาคารสถานที่)</span> <br>
            <input type="checkbox" style="margin: 0px 10px;"><span>หนังสือยินมอบอำนาจพร้อมสำเนาบัตรประชาชน/สำเนาทะเบียนบ้านผู้มอบและผู้รับมอบอำนาจ พร้อมติด</span> <br>
            <span style="margin-left: 2rem; margin-top:-10px;">อากรแสตมป์ (กรณีเจ้าของไม่สามารถมายื่นคำขอด้วยตนเอง)</span><br>
            <input type="checkbox" style="margin: 0px 10px;"><span>สำเนนาใบอนุญาตตามกฏหมายว่าด้วยการควบคุมอาคาร(แบบอ.๑)</span> <br>
            <input type="checkbox" style="margin: 0px 10px;"><span>สำเนนาใบอนุญาตประกอบกิจการโรงงานทุกหน้า(ใบร.ง.๔)</span> <br>
            <input type="checkbox" style="margin: 0px 10px;"><span>แผนที่สถานที่ตั้งของสถานประกอบการ (กรณีขอรับ)</span> <br>
            <input type="checkbox" style="margin: 0px 10px;"><span>อื่นๆ</span><span class="dotted-line" style="width: 20%; text-align: center;"></span> <br>
        </div>
        <span>ข้าพเจ้าขอรับรองว่า ข้อความในแบบคำขอนี้เป็นความจริงทุกประการ</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:1rem;">
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 35%; text-align: center;"> {{$form->full_name}}</span>
        <span>ผู้ขอรับใบอนุญาต</span>
        <div style="margin-right: 130px;">
            <span>(</span>
            <span class="dotted-line" style="width: 35%; text-align: center;"> {{$form->salutation}}{{$form->full_name}} </span>
            <span>)</span>
        </div>
    </div>
</body>


</html>
