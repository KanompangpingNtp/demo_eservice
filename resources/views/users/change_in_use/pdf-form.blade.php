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
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 50%; text-align: left;">
                <!-- ด้านซ้าย (เว้นไว้ หรือใส่ข้อความก็ได้) -->
            </td>
            <td style="width: 50%; text-align: right;">
                <div style="display: inline-block; padding: 5px; border: 1px solid #000;">
                    <span style="margin-right: 100px; font-weight: bold;">สำหรับเจ้าหน้าที่</span><br>
                    <span>เลขรับ</span>
                    <span
                        style="display: inline-block; width: 100px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <span>วันที่</span>
                    <span
                        style="display: inline-block; width: 100px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>
                    <br><span>ผู้รับเรื่อง</span>
                    <span
                        style="display: inline-block; width: 220px; border-bottom: 1px dotted #000; margin-left: 5px;"></span>

                </div>
            </td>
        </tr>
    </table>
    <div class="box_text" style="text-align: right; margin-top:0rem; margin-right:7rem;">
        <span>ภ.ด.ส. ๕</span>
    </div>
    <div style="text-align: center; margin-top: 0rem; ">
        <strong>
            แบบแจ้งการเปลี่ยนแปลงการใช้ประโยชน์ในที่ดินหรือสิ่งปลูกสร้าง
        </strong>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem;">
        <span>เขียนที่</span><span class="dotted-line" style="width: 30%; text-align: center; line-height: 1;"></span><br>
        <span>วันที่</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left;">
        <div style="margin-left: 6rem;">
            <span>ข้าพเจ้า</span><span class="dotted-line" style="width: 53.2%; text-align: center; line-height: 1;"></span>
            <span>อยู่บ้านเลขที่</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
            <span>หมู่ที่</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        </div>
        <span>ถนน</span><span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;"></span>
        <span>ตำบล</span><span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ</span><span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;"></span>
        <span>ขอยื่นแบบแจ้งการเปลี่ยนแปลงการใช้ประโยชน์ในที่ดินหรือสิ่งปลูกสร้างต่อองค์กรปกครองส่วนท้องถิ่น</span>
        <span>ดังมีข้อความต่อไปนี้</span>
        <div style="margin-left: 6rem;">
            <span>ข้าพเจ้ามีทรัพท์สินประเภท</span><br>
            <span>๑. ที่ดิน จำนวน</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>แปลง ดังนี้</span>
            <div style="margin-left: 1rem;">
                <span>๑.๑ แปลงที่</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
                <span>ตั้งอยู่หมู่ที่</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
                <span>ถนน</span><span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
                <span>ตำบล</span><span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;"></span>
            </div>
        </div>
        <span>อำเภอ</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        <span>เลขที่โฉนดหรือหนังสือสำคัญ</span><span class="dotted-line" style="width: 31%; text-align: center; line-height: 1;"></span>
        <span>เนื้อที่ดิน</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ไร่</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>งาน</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ตร.ว. เดิมที่ดินแปลงนี้ใช้ทำประโยชน์</span><span class="dotted-line" style="width: 34%; text-align: center; line-height: 1;"></span>
        <span>บัดนี้ ที่ดินแปลงดังกล่าวใช้ทำประโยชน์</span><span class="dotted-line" style="width: 74%; text-align: center; line-height: 1;"></span>
        <span>ตั้งแต่วันที่</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: center">
        <span>ฯลฯ</span>
    </div>
    <div class="box_text" style="">
        <div style="margin-left: 6rem;">
            <span>๒. สิ่งปลูกสร้าง จำนวน</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>หลัง ดังนี้</span>
            <div style="margin-left: 1rem;">
                <span>๒.๑ หลังที่</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
                <span>ตั้งอยู่หมู่ที่</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
                <span>ถนน</span><span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
                <span>ตำบล</span><span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;"></span>
            </div>
        </div>
        <span>อำเภอ</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        <span>เลขที่โฉนดหรือหนังสือสำคัญ</span><span class="dotted-line" style="width: 31%; text-align: center; line-height: 1;"></span>
        <span>ขนาดพื้นที่สิ่งปลูกสร้าง</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        <span>ตร.ม. เดิมที่ดินแปลงนี้ใช้ทำประโยชน์</span><span class="dotted-line" style="width: 40%; text-align: center; line-height: 1;"></span>
        <span>บัดนี้ ที่ดินแปลงดังกล่าวใช้ทำประโยชน์</span><span class="dotted-line" style="width: 74%; text-align: center; line-height: 1;"></span>
        <span>ตั้งแต่วันที่</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: center">
        <span>ฯลฯ</span>
    </div>
    <div class="box_text" style="">
        <div style="margin-left: 6rem;">
            <span>๓. อาคารชุด/ห้องชุด จำนวน</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>ห้อง ดังนี้</span>
            <div style="margin-left: 1rem;">
                <span>๓.๑ ชื่ออาคารชุด/ห้องชุด</span><span class="dotted-line" style="width: 35%; text-align: center; line-height: 1;"></span>
                <span>เลขที่/ห้องที่</span><span class="dotted-line" style="width: 35%; text-align: center; line-height: 1;"></span>
            </div>
        </div>
        <span>ตั้งอยู่หมู่ที่</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span><span class="dotted-line" style="width: 15.5%; text-align: center; line-height: 1;"></span>
        <span>ตำบล</span><span class="dotted-line" style="width: 15.5%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ</span><span class="dotted-line" style="width: 15.5%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;"></span>
        <span>บนที่ดินเลขโฉนดหรือหนังสือสำคัญ</span><span class="dotted-line" style="width: 34%; text-align: center; line-height: 1;"></span>
        <span>ขนาดพื้นที่อาคารชุด/ห้องชุด</span><span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        <span>ตร.ม.</span>
        <span>เดิมอาคารชุด/ห้องชุดนี้ใช้ทำประโยชน์</span><span class="dotted-line" style="width: 55%; text-align: center; line-height: 1;"></span>
        <span>บัดนี้ อาคารชุด/ห้องชุดดังกล่าว</span>
        <span>ใช้ทำประโยชน์</span><span class="dotted-line" style="width: 90%; text-align: center; line-height: 1;"></span>
        <span>ตั้งแต่วันที่</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: right;  position: relative;">
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 30%; text-align: center;"></span>
        <span style="margin-right: 80px">ผู้แจ้ง</span>
        <div style="margin-right: 110px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
        <span>โทร</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 100px;"></span>
    </div>
    <div class="box_text" style="text-align: right;  position: relative;">
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 30%; text-align: center;"></span>
        <span>เจ้าหน้าที่ผู้รับตำแหน่ง</span>
        <div style="margin-right: 110px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
        <span>ตำแหน่ง</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 100px;"></span>
    </div>

</body>

</html>