@extends('layouts.app')
@section('title', 'OSS')
@section('content')
<style>
    .bg-firstpage {
        background-image: url('{{ asset("images/secondary-pages/BG.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    }

    .bg-header {
        background-image: url('{{ asset("images/secondary-pages/บนหน้า2.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 18vh;
    }

    .bg-footer {
        background-image: url('{{ asset("images/secondary-pages/ล่างหน้า2.png") }}');
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
        background-image: url('{{ asset("images/secondary-pages/droplet.png") }}');
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

    #map {
        height: 500px;
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
            <div class="card w-100 m-3">
                <div class="card-body">
                    <div id="map"></div>
                    <button class="btn btn-primary mt-2">ตำแหน่งของคุณ</button>
                </div>
            </div>

            <div class="row ms-0 ms-lg-3 w-100">
                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="mb-1 row">
                                <label for="selectBookregist" class="col-sm-5 col-form-label d-flex justify-content-start">ตัวอย่างรูปสถานที่เกิดเหตุ : </label>
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" id="basic-addon2" for="imageInput" style="cursor: pointer;">
                                            <i class="fa fa-camera"></i>
                                        </label>
                                        <input type="text" id="fileNameDisplay" class="form-control" placeholder="ตัวอย่างรูปสถานที่เกิดเหตุ" readonly>
                                        <input type="file" accept="image/*" capture="environment" id="imageInput" style="display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="selectBookregist" class="col-sm-4 col-form-label d-flex justify-content-start">รายละเอียด : </label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="btn-group" role="group" aria-label="เลือกตัวเลือก">
                                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                                    <label class="btn btn-outline-danger" for="option1">อุบัติเหตุ</label>

                                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                    <label class="btn btn-outline-danger" for="option2">ไฟไหม้</label>

                                    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                                    <label class="btn btn-outline-danger" for="option3">อุบัติเหตุ</label>
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">แจ้งเหตุ</button>
                                </div>
                            </div>
                        </div>
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
</main>
<script>
    let map;
    let marker;

    function initMap(position) {
        const userLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
        };
        map = new google.maps.Map(document.getElementById("map"), {
            center: userLocation,
            zoom: 15,
        });
        marker = new google.maps.Marker({
            position: userLocation,
            map: map,
            title: "คุณอยู่ที่นี่",
        });
        const info = new google.maps.InfoWindow({
            content: "ตำแหน่งเริ่มต้นของคุณ",
        });
        info.open(map, marker);
        map.addListener("click", function(e) {
            const clickedLocation = e.latLng;
            marker.setMap(null);
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                title: "ตำแหน่งใหม่",
            });
            const info = new google.maps.InfoWindow({
                content: `Lat: ${clickedLocation.lat().toFixed(5)}<br>Lng: ${clickedLocation.lng().toFixed(5)}`
            });
            info.open(map, marker);
        });
    }

    function loadMapWithLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                initMap,
                function() {
                    alert("ไม่สามารถดึงตำแหน่งของคุณได้");
                }
            );
        } else {
            alert("เบราว์เซอร์ไม่รองรับ Geolocation");
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB525cpMEpjYlG8HiWgBqPCbaZU6HHxprY&callback=loadMapWithLocation"></script>
@endsection