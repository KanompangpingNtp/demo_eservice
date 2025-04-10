@extends('layouts.app')
@section('title', 'OSS')
@section('content')
    <style>
        .bg-firstpage {
            background-image: url('{{ asset('images/first-pages/BG.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .bg-header {
            background-image: url('{{ asset('images/first-pages/บนหน้า1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 18vh;
        }

        .bg-footer {
            background-image: url('{{ asset('images/first-pages/ล่างหน้า1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 18vh;
        }

        a img {
            transition: all 0.3s ease-in-out;
        }

        a img:hover {
            transform: scale(1.02);
            /* ขยายขนาดเล็กน้อย */
            opacity: 0.8;
            /* ลดความโปร่งใสลง */
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.2));
            /* เพิ่มเงา */
        }

        .eservice-text {
            max-width: 100%;
            height: auto;
        }

        .button-3 {
            max-width: 100%;
            height: auto;
        }

        .button-4,
        .button-5 {
            max-width: 70%;
            height: auto;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.1);
            /* สีพื้นหลังโปร่งใส */
            backdrop-filter: blur(10px);
            /* เอฟเฟกต์ฟรอสต์แก้ว */
            -webkit-backdrop-filter: blur(10px);
            /* รองรับ Safari */
            border-radius: 1rem;
            /* ขอบมน */
            box-shadow: 0 4px 20px rgba(46, 46, 46, 0.6);
            /* เงาสีดำ */
            color: rgb(0, 0, 0);
            /* สีข้อความ (ถ้าพื้นหลังมืด) */
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* ขอบเบา ๆ */

        }

        .bg-blue-option {
            background: linear-gradient(#2b76e3, #193b89);
            border-radius: 20px;
            width: 100%;
            color: #ffffff;
            padding: 10px 15px;
            cursor: pointer;
            /* <-- เพิ่มเมาส์ pointer */
            transition: all 0.3s ease;
            /* ทำให้ hover ลื่นไหล */
        }

        .bg-blue-option:hover {
            filter: brightness(1.1);
            /* ทำให้สว่างขึ้นเวลา hover */
            transform: scale(1.02);
            background: linear-gradient(#3c89f0, #1d46a3);
            */
        }

        .text-yellow {
            color: #f5e53b;
            text-decoration: underline;
            text-decoration-color: #f5e53b;
            font-size: 22px;
            font-weight: bold;
            word-break: break-word;
        }

        @media screen and (max-width: 400px) {
    .text-yellow {
        font-size: 20px;
    }
}

    </style>
    <main>
        <div class="bg-firstpage d-flex flex-column justify-content-between">
            <div class="bg-header d-flex justify-content-center justify-content-lg-between align-items-center py-5 py-lg-0">
                <div
                    class="container d-flex flex-column flex-xl-row align-items-center justify-content-center justify-content-lg-between">
                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                        <img src="{{ asset('images/first-pages/logo.png') }}" alt="logo"
                            style="width: 10rem; margin-top: 25px;">
                        <div
                            class="d-flex flex-column justify-content-center align-items-lg-start lh-1 text-white fw-bold text-center">
                            <span style="font-size: 40px;">องค์การบริหารส่วน <br class="d-block d-md-none">
                                ตำบลคลองอุดมชลจร</span>
                            <span class="fs-4">Khlong Udom Chonlajorn <br class="d-block d-md-none"> Subdistrict
                                Administrative Organization</span>
                            <span class="fs-3">(อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา)</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class=" d-flex align-items-center justify-content-center p-2 gap-2"
                            style="background-color:rgba(255, 255, 255, 0.275); border-radius:20px;">
                            <a href="{{ route('LoginPage') }}">
                                <img src="{{ asset('images/first-pages/button-1.png') }}" alt="button-4"
                                    style="max-width: 9rem;" class="img-fluid">
                            </a>
                            <a href="#">
                                <img src="{{ asset('images/first-pages/button-2.png') }}" alt="button-5"
                                    style="max-width: 9rem;" class="img-fluid">
                            </a>
                        </div>
                        <div class="
                                text-yellow
                            ">
                            คำแนะนำ สมัครสมาชิกเพื่อติดตามสถานะการดำเนินการ
                        </div>
                    </div>

                </div>

            </div>
            <div class="container">
                <div class=" row justify-content-center align-items-center text-center">
                    <div class="col-xl-6 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('images/first-pages/eservice-text.png') }}" alt="eservice-text"
                            class="eservice-text">

                        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center ">
                            <a href="{{ route('SeconDaryPage') }}">
                                <img src="{{ asset('images/first-pages/button-3.png') }}" alt="button-3" class="button-3">
                            </a>
                            <div class="d-flex flex-lg-column justify-content-center align-items-center mt-3 mt-lg-0">
                                <a href="https://public.es.demo.gmskysmartcity.com/pdf/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%20E-service.pdf" target="_blank">
                                    <img src="{{ asset('images/first-pages/button-4.png') }}" alt="button-4"
                                        class="button-4">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('images/first-pages/button-5.png') }}" alt="button-5"
                                        class="button-5">
                                </a>
                            </div>
                        </div>
                        <div class="glass-box d-flex flex-column justify-content-center align-items-start mt-3">
                            <div class="fs-2 fw-bold ps-5 text-start">
                                แจ้งเหตุฉุกเฉิน
                            </div>
                            <a href="https://khlong.udom.eservice.sosmartsolution.com/emergency">
                                <img src="{{ asset('images/first-pages/ปุ่มแจ้งเหตุฉุกเฉิน.png') }}"
                                    alt="ปุ่มแจ้งเหตุฉุกเฉิน" class="img-fluid">
                            </a>
                        </div>
                        <div class="d-flex justify-content-center align-items-end gap-3 mt-2">
                            <a href="https://khlong.udom.eservice.sosmartsolution.com/general-electricity-request">
                                <img src="{{ asset('images/first-pages/ปุ่มแจ้งเหตุไฟไหม้.png') }}"
                                    alt="ปุ่มแจ้งเหตุไฟไหม้" class="img-fluid">
                            </a>
                            <a href="https://khlong.udom.eservice.sosmartsolution.com/general-road-request">
                                <img src="{{ asset('images/first-pages/ปุ่มแจ้งถนนพัง.png') }}" alt="ปุ่มแจ้งถนนพัง"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex flex-column justify-content-center align-items-center mt-3 mt-xl-0">
                        <div class="glass-box d-flex flex-column justify-content-center align-items-start"
                            style="padding-bottom: 2.5rem; border-radius:30px;">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('images/first-pages/icon ใบประกอบอนุญาต.png') }}" alt="icon">
                                <div class="fw-bold lh-sm fs-2 text-start">
                                    ใบประกอบอนุญาตประกอบกิจการ
                                    สาธารณะสุข ยื่นขออนุญาต / ต่ออายุ
                                </div>
                            </div>
                            <a href="https://khlong.udom.eservice.sosmartsolution.com/food_storage_license"
                                class="bg-blue-option d-flex justify-content-start align-items-center text-decoration-none my-2">
                                <img src="{{ asset('images/first-pages/ลูกศรตัวเลือกใต้ใบประกอบอนุญาต.png') }}"
                                    alt="arrow" class="me-2">
                                <div class="lh-1 text-start">
                                    ใบอนุญาตจัดตั้งสถานที่จำหน่ายอาหาร หรือ สถานที่สะสมอาหาร
                                </div>
                            </a>
                            <a href="https://khlong.udom.eservice.sosmartsolution.com/health_hazard_applications"
                                class="bg-blue-option d-flex justify-content-start align-items-center text-decoration-none">
                                <img src="{{ asset('images/first-pages/ลูกศรตัวเลือกใต้ใบประกอบอนุญาต.png') }}"
                                    alt="arrow" class="me-2">
                                <div class="lh-1 text-start">
                                    ใบอนุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
                                </div>
                            </a>
                        </div>
                        <div class="d-flex justify-content-center align-items-end gap-3 mt-4">
                            <a href="https://trashalert.sosmartsolution.com/">
                                <img src="{{ asset('images/first-pages/แจ้งค่าขยะ.png') }}" alt="แจ้งค่าขยะ"
                                    class="img-fluid">
                            </a>
                            <a href="https://trashalert.sosmartsolution.com/%E0%B8%98%E0%B8%99%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%A3%E0%B8%82%E0%B8%A2%E0%B8%B0.html">
                                <img src="{{ asset('images/first-pages/ธนาคารขยะ.png') }}" alt="ธนาคารขยะ"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-footer d-flex justify-content-between align-items-center py-5 py-lg-0">
                <div
                    class="container d-flex flex-column flex-lg-row align-items-center align-items-lg-end justify-content-between ">
                    <div class="d-flex">
                        <img src="{{ asset('images/first-pages/home.png') }}" alt="home" style="width: 4rem;"
                            class="me-2 d-none d-lg-block">
                        <div
                            class="d-flex flex-column justify-content-center align-items-center align-items-lg-start lh-1 text-white fw-bold">
                            <span class="fs-3">องค์การบริหารส่วนตำบลคลองอุดมชลจร</span>
                            <span class="fs-4">Khlong Udom Chonlajorn Subdistrict Administrative Organization <br>
                                เลขที่ 9/9 หมู่ที่.4 ตำบลคลองอุดมชลจร อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา 24000
                            </span>
                        </div>
                    </div>
                    <div class="fs-2 text-white lh-1">
                        โทรศัพท์ 0-3809-3908
                    </div>
                    <div class="fs-2 text-white lh-1">
                        โทรสาร 0-3809-3885
                    </div>
                </div>
            </div>
        </div>


        </div>
    </main>
@endsection
