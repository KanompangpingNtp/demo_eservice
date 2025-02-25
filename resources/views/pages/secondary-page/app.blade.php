@extends('layouts.app')
@section('title', 'OSS')
@section('content')
    <style>
        .bg-firstpage {
            background-image: url('{{ asset('images/secondary-pages/BG.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .bg-header {
            background-image: url('{{ asset('images/secondary-pages/บนหน้า2.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 18vh;
        }

        .bg-footer {
            background-image: url('{{ asset('images/secondary-pages/ล่างหน้า2.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 18vh;
        }

        a img {
            transition: all 0.3s ease-in-out;
        }

        a img:hover {
            transform: scale(1.05);
            /* ขยายขนาดเล็กน้อย */
            opacity: 0.8;
            /* ลดความโปร่งใสลง */
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.2));
            /* เพิ่มเงา */
        }

        .gradient-background {
            background: linear-gradient(to bottom, #005bb5, #3478bb, #005bb5);
            border-radius: 20px;

            font-size: 35px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.8);
        }


        ul li {
            list-style: none;
            /* ลบจุดเดิม */
            position: relative;
            padding-left: 30px;
            margin: 10px 0px;
        }

        ul li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 40%;
            transform: translateY(-50%);
            width: 25px;
            /* กำหนดขนาดรูป */
            height: 25px;
            background-image: url('{{ asset('images/secondary-pages/droplet.png') }}');
            /* เปลี่ยนเป็นรูปของคุณ */
            background-size: contain;
            background-repeat: no-repeat;
        }

        ul a {
            text-decoration: none;
            font-size: 23px;
            font-weight: bold;
            white-space: nowrap;
            color: #000;
            position: relative;
        }

        ul a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 3px;
            background-color: #007bff;
            transition: width 0.3s ease-in-out;
        }

        ul a:hover::after {
            width: 100%;
        }
    </style>
    <main>
        <div class="bg-firstpage d-flex flex-column justify-content-between ">
            <div class="bg-header d-flex justify-content-center justify-content-lg-between align-items-center py-5 py-lg-0">
                <div class="container d-flex align-items-center justify-content-center justify-content-lg-between">
                    <div class="d-flex">
                        <img class="d-none d-lg-block" src="{{ asset('images/first-pages/logo.png') }}" alt="logo"
                            style="width: 12rem; margin-top: 25px;">
                        <div
                            class="d-flex flex-column justify-content-center align-items-lg-start lh-1 text-white fw-bold text-center">
                            <span style="font-size: 50px;">องค์การบริหารส่วน <br class="d-block d-md-none">
                                ตำบลคลองอุดมชลจร</span>
                            <span class="fs-3">Khlong Udom Chonlajorn <br class="d-block d-md-none"> Subdistrict
                                Administrative Organization</span>
                            <span class="fs-1">(อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา)</span>
                        </div>
                    </div>
                    <div class="fw-bold text-white d-none d-xl-block" style="font-size: 50px;">
                        One Stop Service
                    </div>
                </div>

            </div>

            <div class="container d-flex flex-column flex-lg-row justify-content-center align-items-center text-center">
                <div class="d-none d-xl-flex flex-column justify-content-center align-items-center me-5">
                    <img src="{{ asset('images/secondary-pages/นายก-Photoroom.png') }}" alt="นายก"
                        style="width: 18rem;">
                    <div class="gradient-background py-3 px-5 text-white lh-1 text-nowrap  w-100">
                        นายมนูศักดิ์ หม่องศิริ
                    </div>
                    <div class="gradient-background p-3 text-white text-center text-nowrap lh-1 mt-2 w-100">
                        นายกองค์การบริหาร <br>
                        ส่วนตำบลคลองอุดมชลจร
                    </div>
                </div>

                <div class="row ms-0 ms-lg-3">
                    <div
                        class="col-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start ">
                        <img src="{{ asset('images/secondary-pages/1.png') }}" alt="1" class="img-fluid">
                        <ul class="text-start lh-1">
                            <li>
                                <a href="{{route('GeneralRequestsFormPage')}}">
                                    คำร้องทั่วไป
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    เบี้ยยังชีพผู้สูงอายุ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    เบี้ยยังชีพผู้พิการ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    เบี้ยเอดส์
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                        <img src="{{ asset('images/secondary-pages/2.png') }}" alt="2" class="img-fluid">
                        <ul class="text-start lh-1 ">
                            <li>
                                <a href="#">
                                    ยื่นแบบภาษีป้าย
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    ภาษีที่ดินและสิ่งปลูกสร้าง
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    ยื่นอุทธรณ์ ภาษีที่ดินและสิ่งปลูกสร้าง
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                        <img src="{{ asset('images/secondary-pages/3.png') }}" alt="3" class="img-fluid">
                        <ul class="text-start lh-1 ">
                            <li>
                                <a href="#">
                                    คำร้องทั่วไป(แจ้งเรื่องไฟฟ้า)
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    คำร้องทั่วไป(แจ้งถนนชำรุด)
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    คำร้องสิ่งปลูกสร้าง
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    แบบขออนุญาตก่อสร้าง
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                        <img src="{{ asset('images/secondary-pages/4.png') }}" alt="4" class="img-fluid">
                        <ul class="text-start lh-1 ">
                            <li>
                                <a href="#">
                                    แบบคำร้องใบอณุญาตประกอบกิจการ <br>
                                    ที่เป็นอันตรายต่อสุขภาพ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    แบบคำร้องใบอณุญาตสะสมอาหาร
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    แบบขอลงทะเบียนสุนัข - แมว
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    คำร้องทั่วไปขอถังขยะ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    คำร้องทั่วไปแจ้งเหตุเดือดร้อนสำคัญ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                        <img src="{{ asset('images/secondary-pages/5.png') }}" alt="5" class="img-fluid">
                        <ul class="text-start lh-1 ">
                            <li>
                                <a href="#">
                                    แบบฟอร์มใบสมัคร ศูนย์พัฒนาเด็กเล็ก
                                </a>
                            </li>
                        </ul>
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
    </main>
@endsection
