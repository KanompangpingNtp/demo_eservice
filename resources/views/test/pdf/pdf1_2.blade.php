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
            border: 3px solid black;
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
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse;" >
        <tr>
            <td style="width: 50%; text-align: left;">
                <div style="display: inline-block; padding: 5px; border: 3px solid #000;">
                    <span>เลขรับ</span>
                    <span
                        style="display: inline-block; width: 220px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <br><span>วันที่</span>
                    <span
                        style="display: inline-block; width: 230px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <br><span>สำนักงานที่รับ</span>
                    <span
                        style="display: inline-block; width: 190px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <br><span>เลขที่รับปีก่อน</span>
                    <span
                        style="display: inline-block; width: 190px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <br><span>ลงชื่อ</span>
                    <span
                        style="display: inline-block; width: 180px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <span>ผู้รับแบบ</span>
                </div>
            </td>
            <td style="width: 50%; text-align: left;">
                    <strong style="text-decoration: underline;">
                        บันทึกการตรวจสอบของเจ้าหน้าที่
                    </strong>
            </td>
        </tr>
    </table>
    <div class="box_text" style="text-align: left; margin-top:0.5rem; ">
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem; ">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 50%; text-align: center; line-height: 1;">data</span>
        <span>เจ้าหน้าที่</span>
    </div>
    <div style="width: 100%; border-bottom: 2px solid #000; margin: 0.5rem 0rem;"></div>
    <div class="box_text" style="text-align: center; ">
        <span style="text-decoration: underline;">รายงานการประเมินไทย</span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span>ได้ทำการประเมินภาษีป้ายตามรายการที่ปรากฎในแบบแสดงรายการภาษีป้ายรายนี้แล้ว เจ้าของป้ายจะต้องเสียภาษีดังนี้</span><br>
        <span>๑. ค่าภาษีป้ายตามแบบแสดงรายการภาษีป้ายเป็นเงิน</span><span class="dotted-line" style="width: 63%; text-align: center; line-height: 1;"></span><span>บาท</span>
        <span>๒. ค่าเพิ่มภาษีป้ายตามราคา ๒๕(๑) (ไม่ยื่นแบบแสดงรายการภาษีป้ายภายในนเวลาที่กำหนด) ร้อยละ เป็นเงิน</span><span class="dotted-line" style="width: 28%; text-align: center; line-height: 1;"></span><span>บาท</span>
        <div style="text-align: right">
            <span>รวมทั้งสิ้นเป็นเงินบาท</span><span class="dotted-line" style="width: 28%; text-align: center; line-height: 1;"></span><span>บาท</span>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem; ">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 44%; text-align: center; line-height: 1;">data</span>
        <span>พนักงานเจ้าหน้าที่</span> <br>
        <span>วันที่</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 18%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
    </div>
    <div style="width: 100%; border-bottom: 2px solid #000; margin: 0.5rem 0rem;"></div>
    <div class="box_text" style="text-align: center; ">
        <span style="text-decoration: underline;">คำขอชำระภาษี</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ข้าพเจ้าได้ทราบการประเมินภาษีป้ายข้างต้นแล้ว ขอชำระภาษีป้ายให้เสร็จไปพร้อมนี้</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:1rem; ">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 44%; text-align: center; line-height: 1;">data</span>
        <span>ผู้ชำระภาษีป้าย</span> <br>
        <span>วันที่</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 18%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
    </div>
    <div style="width: 100%; border-bottom: 2px solid #000; margin: 0.5rem 0rem;"></div>
    <div class="box_text" style="text-align: center; ">
        <span style="text-decoration: underline;">รายการรับชำระภาษีป้าย</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ได้รับเงินภาษีป้าย</span><span class="dotted-line" style="width: 16.5%; text-align: center; line-height: 1;"></span><span>บาท</span>
        <span>แต่วันที่</span><span class="dotted-line" style="width: 16.5%; text-align: center; line-height: 1;"></span>
        <span>ใบเสร็จเล่มที่</span><span class="dotted-line" style="width: 16.5%; text-align: center; line-height: 1;"></span>
        <span>เลขที่</span><span class="dotted-line" style="width: 16.5%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem; ">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 37%; text-align: center; line-height: 1;">data</span>
        <span>พนักงานเจ้าหน้าที่ผู้รับเงิน</span> <br>
    </div>
    <div style="width: 100%; border-bottom: 2px solid #000; margin: 0.5rem 0rem;"></div>
    <div class="box_text" style="text-align: center; ">
        <span style="text-decoration: underline;">บันทึกเพิ่มเติม</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
        <span class="dotted-line" style="width: 100%; text-align: center; line-height: 1;">data</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem; ">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 37%; text-align: center; line-height: 1;">data</span>
        <span>เจ้าหน้าที่</span> <br>
    </div>
    <div style="page-break-before: always;"></div>
    <div class="box_text" style="text-align: center; font-size:23px; font-weight: bold;">
        <span>เอกสารหลักฐานที่ต้องใช้ประกอบการยื่นแบบฯ</span>
    </div>
    <div class="box_text">
        <span style="text-decoration: underline;">กรณีป้ายใหม่</span><span>ให้เจ้าของป้ายยื่นแบบเสียภาษี พร้อมสำเนาหลักฐานและลงลายมือชื่อรับรองความถูกต้อง ได้แก่</span><br>
        <span>- ใบอณุญาตติดตั้งป้าย, ใบเสร็จรับเงินค่าทำป้าย</span>
        <span>- สำเนาทะเบียนบ้าน</span>
        <span>- บัตรประจำตัวประชาชน / บัตรข้าราชการ / บัตรพนักงานรัฐวิสาหกิจ / บัตรประจำตัว ผู้เสียภาษี</span>
        <span>- กรณีป้ายเป็นนนนิติบุคคลให้แนบหนังสือรับรองสำนักงานทะเบียนหุ้นส่วนบริษัท, ทะเบียนพาณิชย์และหลักฐานของ</span><br>
        <span>สรรพากรเช่น ภ.พ. ๐๑, ภ.พ. ๐๙, ภ.พ. ๒๐</span><br>
        <span>- หนังสือมอบอำนาจ (กรณีไม่สามารถยื่นแบบได้ด้วยตนนเอง พร้อมติดอากรแสตมป์ตามกฎหมาย)</span><br>
        <span>- หลักฐานอื่นๆ ตามที่เจ้าหน้าที่ให้คำแนะนำ เช่น รูปถ่ายป้าย,วัดขนาดความกว้างxยาว</span>
        <div style="margin-left: 1rem; margin-top:10px;">
            <span style="text-decoration: underline;">กรณีป้ายเก่า</span><span>ให้เจ้าของป้ายยื่นแบบเสียภาษีป้าย(ภ.ป.1)พร้อมใบเสร็จรับเงินการเสียภาษีครั้งสุดท้าย กรณีเจ้าของป้ายเป็นนิติบุคคลให้แนบหนังสือรับรอง</span>
            <span style="margin-top:-10px;">สำนักงานทะเบียนหุ้นส่วนบริษัทพร้อมกับการยื่นแบบ ภ.ป.1</span>
        </div>
    </div>
</body>
</html>
