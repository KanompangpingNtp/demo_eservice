<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="คำอธิบายเว็บไซต์">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'th-krub';
            src: url('/fonts/TH-Krub.ttf') format('woff2');
            font-weight: normal;
        }

        @font-face {
            font-family: 'th-krub';
            src: url('/fonts/TH-Krub-Bold.ttf') format('woff2');
            font-weight: bold;
        }

        body {
            font-family: 'th-krub', sans-serif;
            font-size: 23px;
        }


        .logo {
            height: 9rem;
        }

        /* สำหรับ scrollbar ทุกประเภท */
        ::-webkit-scrollbar {
            width: 5px;
            /* กำหนดความกว้างของ scrollbar */
            height: 12px;
            /* กำหนดความสูงของ scrollbar สำหรับแนวนอน */

        }

        /* ส่วนที่ใช้ควบคุมสีของ scrollbar */
        ::-webkit-scrollbar-thumb {
            background-color: rgb(0, 87, 181);
            /* สีของ scrollbar */
            border-radius: 10px;
            /* ทำให้ขอบ scrollbar เป็นมุมมน */
            transition: all 0.5s;
        }

        /* ส่วนที่เป็นพื้นหลังของ scrollbar */
        ::-webkit-scrollbar-track {
            background: transparent;
            /* สีพื้นหลังของ scrollbar */
            border-radius: 10px;
            /* ทำให้ขอบของ track เป็นมุมมน */
        }

        /* ส่วนของ scrollbar แนวนอน */
        ::-webkit-scrollbar-horizontal {
            height: 10px;
        }

        /* สำหรับ scrollbar เมื่อ hover */
        ::-webkit-scrollbar-thumb:hover {
            background-color: rgb(0, 109, 226);
            /* เปลี่ยนสีเมื่อ hover */
        }

        /* Loading Screen */


        #loading-screen {
            position: fixed;
            /* ให้ loading screen อยู่เต็มหน้าจอ */
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            /* เพิ่มพื้นหลังให้ดูชัดขึ้น */
            display: flex;
            /* ใช้ Flexbox จัดกลาง */
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* ให้แน่ใจว่าอยู่ด้านบนสุด */
        }
    </style>
</head>

<body>
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <style>
            .spinner {
                width: 44.8px;
                height: 44.8px;
                animation: spinner-y0fdc1 2s infinite ease;
                transform-style: preserve-3d;
            }

            .spinner>div {
                background-color: rgba(117, 150, 255, 0.2);
                height: 100%;
                position: absolute;
                width: 100%;
                border: 2.2px solid #7596ff;
            }

            .spinner div:nth-of-type(1) {
                transform: translateZ(-22.4px) rotateY(180deg);
            }

            .spinner div:nth-of-type(2) {
                transform: rotateY(-270deg) translateX(50%);
                transform-origin: top right;
            }

            .spinner div:nth-of-type(3) {
                transform: rotateY(270deg) translateX(-50%);
                transform-origin: center left;
            }

            .spinner div:nth-of-type(4) {
                transform: rotateX(90deg) translateY(-50%);
                transform-origin: top center;
            }

            .spinner div:nth-of-type(5) {
                transform: rotateX(-90deg) translateY(50%);
                transform-origin: bottom center;
            }

            .spinner div:nth-of-type(6) {
                transform: translateZ(22.4px);
            }

            @keyframes spinner-y0fdc1 {
                0% {
                    transform: rotate(45deg) rotateX(-25deg) rotateY(25deg);
                }

                50% {
                    transform: rotate(45deg) rotateX(-385deg) rotateY(25deg);
                }

                100% {
                    transform: rotate(45deg) rotateX(-385deg) rotateY(385deg);
                }
            }
        </style>
    </div>

    <div id="page-content">


        @yield('content')

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                window.onload = function() {
                    const loadingScreen = document.getElementById("loading-screen");

                    if (loadingScreen) {
                        setTimeout(() => {
                            loadingScreen.style.display = "none"; // ซ่อน loading หลังจาก 2 วิ
                        }, 2000); // 2000 มิลลิวินาที = 2 วินาที
                    }
                };
            });
        </script>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </div>

</body>

</html>
