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
            font-size: 19.3px;
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
            padding-top: 7px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 7px;
            border: 2px solid black;
            font-size: 16px;
            text-align: left;
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
    <div class="box_text">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/ครุฑ.png'))) }}"
            alt="Logo" height="120"><br>
        <span>ใบอนุญาติ</span><br>
        <span>ประกอบกิจการที่เป็นอันตรายต่อสุขภาพ</span>
    </div>
    <table style="width: 100%; margin-top: 1rem;">
        <tr>
            <td style="text-align: left;">
                <span>เล่มที่</span>
                <span class="dotted-line" style="width: 15%; display: inline-block; text-align: center; line-height: 1;"></span>
                <span>เลขที่</span>
                <span class="dotted-line" style="width: 15%; display: inline-block; text-align: center; line-height: 1;"></span>
                <span>ปี</span>
                <span class="dotted-line" style="width: 15%; display: inline-block; text-align: center; line-height: 1;"></span>
            </td>
            <td style="text-align: right;">
                <span>ที่ทำการ</span>
                <span class="dotted-line" style="width: 50%; display: inline-block; text-align: center; line-height: 1;"></span>
            </td>
        </tr>
    </table>
    
    <div class="box_text" style="text-align: left; margin-top:1rem;">
        <div style="margin-left:3rem;">
            <span>ข้อ 1) เจ้าพนักงานท้องถิ่นอนุญาตให้ นิติบุคคล ชื่อ</span>
            <span class="dotted-line" style="width: 43%; text-align: center; line-height: 1;"></span>
            <span>อายุ</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>ปี </span>
        </div>
        <span>สัญชาติ</span>
        <span class="dotted-line" style="width: 14%; text-align: center; line-height: 1;"></span>
        <span>เลขประจำตัวผู้เสียภาษี</span>
        <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>อยู่บ้าน/สำนักงานเลขที่</span>
        <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>

        <span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;"></span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;"></span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;"></span>
        <div style="margin-left:3rem;">
            <span>ประกอบกิจการที่เป็นอันตรายต่อสุขภาพ ประเภท</span>
            <span class="dotted-line" style="width: 60.4%; text-align: center; line-height: 1;"></span>
        </div>
        <span>ลำดับที่</span>
        <span class="dotted-line" style="width: 11.5%; text-align: center; line-height: 1;"></span>
        <span>ค่าธรรมเนียม</span>
        <span class="dotted-line" style="width: 11.5%; text-align: center; line-height: 1;"></span>
        <span>บาท</span>
        <span>ใบเสร็จรับเงินเล่มที่</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;"></span>
        <span>เลขที่</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;"></span>
        <span>ลงวันที่</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>โดยใช้ชื่อสถานประกอบการว่า</span>
        <span class="dotted-line" style="width: 36.5%; text-align: center; line-height: 1;"></span>
        <span>พื้นที่ประกอบการ</span>
        <span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;"></span>
        <span>ตารางเมตร กำลังเครื่องจักร</span>
        <span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;"></span>
        <span>แรงม้า จำนวนคงาน</span>
        <span class="dotted-line" style="width: 14%; text-align: center; line-height: 1;"></span>
        <span>คน</span>
        <span>ตั้ง อยู่ ณ เลขที่</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>ตำบล</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 12.5%; text-align: center; line-height: 1;"></span>
        <div style="margin-left:3rem;">
            <span>(๒) ผู้รับใบอนุญาตต้องปฎิบัติให้ถูกต้อง ครบถ้วน ตามหลักเกณฑ์ วิธีการ
                และเงื่อนนไขที่กำหนดในข้อบัญญัติท้องถิ่น</span>
            <span>(๓)
                หากปรากฎในภายหลังว่าการประกอบกิจการที่ได้รับอนุญาตนี้เป็นการขัดต่อกฎหมายอื่นที่เกี่ยวข้องโดยมิอาจแก้ไขได้
            </span>
        </div>
        <span>เจ้าพนักงานท้องถิ่นอาจพิจารณาให้เพิกถอนการอนุญาตนี้ได้</span>
        <div style="margin-left:3rem;">
            <span>(๔) ผู้รับใบอนุญาตต้องปฎิบัติตามเงื่อนไขเฉพาะดังต่อไปนี้อีกด้วย คือ</span>
            <div style="margin-left:1rem;">
                <span>(๔.๑) ต้องจัดบริเวณการผลิตอย่างเป็นสัดส่วน สะอาด มีความเป็นระเบียบเรียบร้อย</span>
                <span>(๔.๒) ต้องทำความสะอาดกำจัดฝุ่นละอองตามพื้นอย่างสม่ำเสมอไม่มีฝุ่นละอองสะสม</span>
            </div>
        </div>
        <div style="margin-left:3rem; margin-top:0.5rem;">
            <span>ใบอนุญาตฉบับนี้ให้ใช้ได้จนถึงวันที่</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>

            <div style="margin-left:6rem;">
                <span>ออกให้ ณ วันที่</span>
                <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
                <span>เดือน</span>
                <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
                <span>พ.ศ.</span>
                <span class="dotted-line" style="width: 11%; text-align: center; line-height: 1;"></span>
            </div>
        </div>
        <div class="box_text" style="text-align: right; margin-top:1rem;">
            <span>(ลายมือชื่อ)</span>
            <span class="dotted-line" style="width: 35%; text-align: center;"> {{ $form->full_name }}</span>
            <div style="margin-right: 10px;">
                <span>(</span>
                <span class="dotted-line" style="width: 30%; text-align: center;">
                    {{ $form->salutation }}{{ $form->full_name }} </span>
                <span>)</span>
            </div>
            <div style="margin-right: 10px;">
                <span>นายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span><br>
                <span style="margin-right: 60px;">เจ้าพนักงานท้องถิ่น</span>
            </div>
        </div>
        <div class="box_text_border"
            style="line-height: 0.8; display: inline-block; text-align: left; margin-top: 1rem;">
            <span style="text-decoration: underline;">คำเตือน</span>
            <span style="margin-left: 5px;">(๑) ผู้รับใบอนุญาตินี้ไว้โดยเปิดเผยและเห็นได้ง่าย ณ สถานที่</span><br
                style="margin: 0px;">
            <span style="margin-top: -10px;">ประกอบกิจการตลอดเวลาที่ประกอบกิจการ หากฝ่าฝืนมีโทษปรับไม่เกิน ๒,๕๐๐
                บาท</span><br>
            <div style="margin-top: -10px;">
                <span style="margin-left: 45px;">(๒)
                    หากประสงค์จะประกอบกิจการในปีต่อไปต้องยื่นคำขอต่ออายุใบอนุญาต</span><br>
                <span style="text-decoration: underline;">ก่อน</span>
                <span>ใบอนุญาตสิ้นอายุ ๓๐ วัน พร้อมเสียค่าธรรมเนียมใบอนุญาต</span>
            </div>
        </div>

    </div>
</body>


</html>
