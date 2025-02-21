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
            transform: scale(1.05);
            /* ขยายขนาดเล็กน้อย */
            opacity: 0.8;
            /* ลดความโปร่งใสลง */
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.2));
            /* เพิ่มเงา */
        }

        .eservice-text {
            width: 40rem;
        }

        .button-3 {
            width: 23rem;
        }

        .button-4,
        .button-5 {
            width: 16rem;
        }

        /* สำหรับหน้าจอขนาดเล็กกว่า md */
        @media (max-width: 767px) {
            .eservice-text {
                width: 80%;
                /* ปรับให้มีขนาดเล็กลง */
            }

            .button-3 {
                width: 70%;
                /* ปรับขนาดเล็กลง */
            }

            .button-4,
            .button-5 {
                width: 60%;
                /* ปรับขนาดเล็กลง */
            }
        }
    </style>
    <main>
        <div class="bg-firstpage d-flex flex-column justify-content-between">
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
                    <div class="d-none d-xl-flex flex-column flex-2xl-row p-2 gap-2"
                        style="background-color:rgba(255, 255, 255, 0.275); border-radius:20px;">
                        <a href="#">
                            <img src="{{ asset('images/first-pages/button-1.png') }}" alt="button-4" style="width: 10rem;">
                        </a>
                        <a href="#">
                            <img src="{{ asset('images/first-pages/button-2.png') }}" alt="button-5" style="width: 10rem;">
                        </a>
                    </div>
                </div>

            </div>

            <div class="container d-flex flex-column flex-lg-row justify-content-center align-items-center text-center">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('images/first-pages/eservice-text.png') }}" alt="eservice-text"
                        class="eservice-text">
                    <a href="#">
                        <img src="{{ asset('images/first-pages/button-3.png') }}" alt="button-3" class="button-3">
                    </a>
                    <div class="d-flex justify-content-center align-items-center mt-4 gap-4">
                        <a href="#">
                            <img src="{{ asset('images/first-pages/button-4.png') }}" alt="button-4" class="button-4">
                        </a>
                        <a href="#">
                            <img src="{{ asset('images/first-pages/button-5.png') }}" alt="button-5" class="button-5">
                        </a>
                    </div>

                    <div class="d-flex  d-xl-none p-2 gap-2 my-2"
                        style="background-color:rgba(255, 255, 255, 0.275); border-radius:20px;">
                        <a href="#">
                            <img src="{{ asset('images/first-pages/button-1.png') }}" alt="button-4" style="width: 11rem;">
                        </a>
                        <a href="#">
                            <img src="{{ asset('images/first-pages/button-2.png') }}" alt="button-5" style="width: 11rem;">
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center d-none d-xl-flex">
                    <img src="{{ asset('images/first-pages/images-right.png') }}" alt="images-right"
                        style="width: 36rem; filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.5));">
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
