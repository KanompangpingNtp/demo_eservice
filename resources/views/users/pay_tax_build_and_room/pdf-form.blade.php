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
    <div class="box_text" style="text-align: center; font-weight: bold;">
        <span>หนังสือขอผ่อนชำระภาษีที่ดินและสิ่งปลูกสร้าง/ห้องชุด</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:2rem;">
        <span>เขียนที่</span><span class="dotted-line" style="width: 34%; text-align: center; line-height: 1;"></span><br>
        <span>วันที่</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left; margin-top:1rem;">
        <span>เรื่อง ขอผ่อนชำระภาษีที่ดินและสิ่งปลูกสร้าง / ห้องชุด</span><br>
        <span>เรียน นายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
    </div>
    <div class="box_text" style="text-align: left; margin-top:2rem;">
        <div style="margin-left: 6rem;">
            <span>๑. ก. กรณีเป็นบุคคลธรรมดา ข้าพเจ้า</span><span class="dotted-line"
                style="width: 56%; text-align: center; line-height: 1;"></span>
            <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>ปี</span>
        </div>
        <span>บัตรประจำตัวประชาชนที่</span><span class="dotted-line"
            style="width: 40%; text-align: center; line-height: 1;"></span>
        <span>ออกให้โดย</span><span class="dotted-line" style="width: 35%; text-align: center; line-height: 1;"></span>
        <span>หมดอายุวันที่</span><span class="dotted-line"
            style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>อยู่บ้านเลขที่</span><span class="dotted-line"
            style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span><span class="dotted-line" style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>แขวง/ตำบล</span><span class="dotted-line"
            style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>เขต/อำเภอ</span><span class="dotted-line"
            style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>Line ID (ถ้ามี)</span><span class="dotted-line"
            style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>อีเมล</span><span class="dotted-line" style="width: 50%; text-align: center; line-height: 1;"></span>
        <span>(แนบสำเนาบัตรประจำตัวประชาชน)</span>

        <div style="margin-left: 6rem; margin-top:1rem;">
            <span>ข. กรณีเป็นนิติบุคคล ข้าพเจ้า</span><span class="dotted-line"
                style="width: 41%; text-align: center; line-height: 1;"></span>
            <span>มีสำนักงานใหญ่ที่</span><span class="dotted-line"
                style="width: 23%; text-align: center; line-height: 1;"></span>
        </div>
        <span>หมู่ที่</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span><span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;"></span>
        <span>แขวง/ตำบล</span><span class="dotted-line"
            style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>เขต/อำเภอ</span><span class="dotted-line"
            style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span><span class="dotted-line" style="width: 28%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26.5%; text-align: center; line-height: 1;"></span>
        <span>โดย นาย/นาง/นางสาว</span><span class="dotted-line"
            style="width: 33.5%; text-align: center; line-height: 1;"></span>
        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ปี บัตรประจำตัวประชาชนเลขที่</span><span class="dotted-line"
            style="width: 17%; text-align: center; line-height: 1;"></span>
        <span>ออกให้โดย</span><span class="dotted-line"
            style="width: 40.5%; text-align: center; line-height: 1;"></span>
        <span>หมดอายุวันที่</span><span class="dotted-line"
            style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>มีอำนาจลงนามผูกพันนิติบุคคล ตามหนังสือรับรองของสำนักงานทะเบียนหุ้นส่วนบริษัท</span><span
            class="dotted-line" style="width: 45%; text-align: center; line-height: 1;"></span>
        <span>ลงวันที่</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>Line ID (ถ้ามี)</span><span class="dotted-line"
            style="width: 42%; text-align: center; line-height: 1;"></span>
        <span>อีเมล (ถ้ามี)</span><span class="dotted-line"
            style="width: 36%; text-align: center; line-height: 1;"></span>
        <span>(แนบสำเนาหนังสือรับรอง สำเนาบัตรประจำตัวประชาชน และหนังสือมอบอำนาจ (ถ้ามี))</span>
        <div style="margin-left: 6rem; margin-top:1rem;">
            <span>๒. ข้าพเจ้ายอมรับว่าได้รับแจ้งการประเมินภาษีที่ดินและสิ่งปลูกสร้าง/ห้องชุด ประจำปีภาษี</span><span
                class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
            <span>(ภ.ด.ส.๖)</span>
        </div>
    </div>
    <div class="box_text">
        <span>เมื่อวันที่</span><span class="dotted-line"
            style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>เป็นเงินทั้งสิ้น</span><span class="dotted-line"
            style="width: 38.5%; text-align: center; line-height: 1;"></span>
        <span>บาท</span><span>(</span><span class="dotted-line"
            style="width: 38%; text-align: center; line-height: 1;"></span>
        <span>)</span><span> ตามรายการที่ปรากฎในแบบแสดงรายการคำนวณภาษีที่ดินและ</span><span>สิ่งปลูกสร้าง (ภ.ด.ส.๗) /
            ห้องชุด (ภ.ด.ส.๘)</span>
    </div>
    <div style="margin-left: 6rem; margin-top:1rem;">
        <span>๓. ค่าภาษีที่ดินและสิ่งปลูกสร้าง/ห้องชุด ตามข้อ ๒.
            ข้าพเจ้าไม่สามารถชำระให้เสร็จสิ้นในคราวเดียวกันได้จึงขอผ่อนชำระ</span>
    </div>
    <span>เป็นจำนวน ๓ งวด ๆ ละเท่า ๆ กัน ภายในกำหนดเวลา หากมีเศษเหลือเท่าใดใช้ชำระในงวดที่ ๑ ดังนี้</span>
    <div class="box_text" style=" margin-top:1rem;">
        <div style="margin-left: 6rem;">
            <span>งวดที่ ๑ ชำระภายในวันที่</span><span class="dotted-line"
                style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span><span class="dotted-line"
                style="width: 11.5%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>จำนวน</span><span class="dotted-line"
                style="width: 30%; text-align: center; line-height: 1;"></span>
            <span>บาท</span>
        </div>
        <span>(</span><span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span>
        <span>)</span>
        <div style="margin-left: 6rem;">
            <span>งวดที่ ๒ ชำระภายในวันที่</span><span class="dotted-line"
                style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span><span class="dotted-line"
                style="width: 11.5%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>จำนวน</span><span class="dotted-line"
                style="width: 30%; text-align: center; line-height: 1;"></span>
            <span>บาท</span>
        </div>
        <span>(</span><span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span>
        <span>)</span>
        <div style="margin-left: 6rem;">
            <span>งวดที่ ๓ ชำระภายในวันที่</span><span class="dotted-line"
                style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span><span class="dotted-line"
                style="width: 11.5%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span><span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>จำนวน</span><span class="dotted-line"
                style="width: 30%; text-align: center; line-height: 1;"></span>
            <span>บาท</span>
        </div>
        <span>(</span><span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span>
        <span>)</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:2rem;">
        /๔. ข้าพเจ้า...
    </div>
    <div style="page-break-before: always;"></div>
    <div class="box_text" style="text-align: center;">
        <span>- ๒ -</span>
    </div>
    <div class="box_text" style="margin-top:2rem;">
        <div style="margin-left:6rem;">
            <span>๔. ข้าพเจ้ายอมรับและตกลงว่า ถ้าข้าพเจ้าผิดนัดชำระงวดหนึ่งงวดใด ถือว่าหมดสิทธิที่จะผ่อนชำระ และต้องเสียเงินเพิ่มอีกร้อยละ</span>
        </div>
        <span>หนึ่งต่อเดือนของจำนวนภาษีที่ค้างชำระ เศษของเดือนให้นับเป็นหนึ่งเดือน ตามมาตรา ๕๒ แห่งพระราชบัญญัติภาษีที่ดินและสิ่งปลูกสร้าง พ.ศ. ๒๕๖๒</span>
        <div style="margin-left:6rem; margin-top:0rem;">
            <span>จึงเรียนมาเพื่อโปรดพิจารณา</span>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0rem; position: relative;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 30%; text-align: center;"></span>
        <span>ผู้ยื่นคำร้อง</span>
        <div style="margin-right: 55px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
    </div>
    <div class="box_text" style="margin-top:1rem;">
        <div style="margin-left:6rem;">
            <span>ความเห็นเจ้าหน้าที่</span><br>
            <span>เรียน ผู้อำนวยการกองคลัง</span>
            <div style="margin-left: 3rem;">
                <input type="checkbox"><span>สมควรให้มีการผ่อนชำระภาษี</span><br>
                <input type="checkbox"><span>ไม่สมควรให้มีการผ่อนชำระภาษี</span><br>
                <span style="margin-left: 0.4rem; margin-top: -10px;">จึงเรียนมาเพื่อโปรดพิจารณา</span>
            </div>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0rem; position: relative;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
        <div style="margin-right: 55px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
        <span>ตำแหน่ง</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span><br>
        <span>วันที่</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
    </div>
    <div class="box_text" style="margin-top:0rem;">
        <div style="margin-left:6rem;">
            <span>เรียน ปลัดองค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
            <div style="margin-left: 3rem;">
                <span class="dotted-line" style="width: 32%; text-align: center; ">()</span>
            </div>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0rem; position: relative;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
        <div style="margin-right: 55px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
        <span>ตำแหน่ง</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span><br>
        <span>วันที่</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
    </div>
    <div class="box_text" style="margin-top:0rem;">
        <div style="margin-left:6rem;">
            <span>เรียน นายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
            <div style="margin-left: 3rem;">
                <span class="dotted-line" style="width: 32%; text-align: center; ">()</span>
            </div>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0rem; position: relative;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
        <div style="margin-right: 55px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
        <span>ตำแหน่ง</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span><br>
        <span>วันที่</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
    </div>
    <div class="box_text" style="margin-top:0rem;">
        <div style="margin-left:6rem;">
            <span>ความเห็นนายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
            <div style="margin-left: 3rem;">
                <input type="checkbox"><span>อณุมัติตามเสนอ และให้แจ้งผู้เสียภาษีทราบ</span><br>
                <input type="checkbox"><span>ไม่อณุมัติ เนื่องจาก</span><span class="dotted-line" style="width: 50%; text-align: center; "></span>
                <span>และแจ้งให้ผู้เสียภาษีทราบ</span>
            </div>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:3rem; position: relative;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
        <div style="margin-right: 55px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
        <span style="margin-right: 65px;">นายกองค์การบริหารส่วนตำบลคลองอุดมชลจร</span> <br>
        <span>วันที่</span>
        <span class="dotted-line" style="width: 30%; text-align: center; margin-right: 55px;"></span>
    </div>
</body>

</html>