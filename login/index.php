<?php
include "../connection.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kampus Peduli UPNVJ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet" />
    <style>
        * {
            font-family: "Josefin Sans", sans-serif;
        }
    </style>
</head>

<body class="bg-teal-900 text-white">
    <script>
        function login() {
            const email = document.getElementById("email").value
            const password = document.getElementById("password").value
            const loginError = document.getElementById("login-error")
            loginError.innerText = ""

            const data = new URLSearchParams();
            data.append("email", email);
            data.append("password", password);

            fetch("/api/login/", {
                method: "POST",
                body: data
            }).then(x => x.json())
                .then(x => {
                    if (x.status === "success") {
                        window.location.href = "../"
                    } else {
                        loginError.innerText = "Gagal melakukan login, email / password salah."
                    }
                })

        }
    </script>
    <header class="flex justify-between items-center p-6">
        <div class="text-lg font-bold lg:ml-16">
            <img src="../logo.svg" />
        </div>
        <nav class="space-x-2 lg:space-x-6 ml-2 flex flex-row">
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="../">
                Home
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="../contact/">
                Contact
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="../about_us/">
                About Us
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="../donation/list/">
                List Donasi
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="../login/" id="login-btn">
                Masuk / Daftar
            </a>
            <script>
                fetch("../api/my_user/", {
                    credentials: "include"
                })
                    .then(x => x.json())
                    .then(res => {
                        if(res.id){
                            const loginBtn = document.getElementById("login-btn")
                            loginBtn.innerText = "Dashboard"
                            loginBtn.href = "../dashboard"
                        }
                    })
            </script>
        </nav>
        <a class="bg-[#EC5A49] text-white px-8 py-2 rounded-lg hidden hover:opacity-50 active:scale-97 duration-300 lg:block" href="../donation/">
            Donasi Sekarang
        </a>
    </header>
    <div
        class="flex flex-row w-full h-[91vh] justify-center items-center flex-wrap xl:flex-nowrap mt-16 xl:mt-4 overflow-x-none">
        <div class="flex flex-col mx-16 w-screen lg:w-auto lg:min-w-[400px]">
            <h1 class="font-normal text-4xl lg:text-6xl mb-8 text-nowra text-center lg:text-left">
                Login
            </h1>

            <div class="flex flex-row flex-wrap mt-2 w-full mb-4">
                <div class="flex flex-col justify-center ml-2 lg:ml-0 mt-2 lg:mt-0 w-full">
                    <label for="name" class="lg:text-md text-sm font-normal">Email</label>
                    <input type="text" id="email" name="email"
                        class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                        placeholder="user@mail.com" />
                </div>

            </div>

            <div class="flex flex-row flex-wrap mt-2 w-full mb-2">
                <div class="flex flex-col justify-center ml-2 lg:ml-0 mt-2 lg:mt-0 w-full">
                    <label for="name" class="lg:text-md text-sm font-normal">Password</label>
                    <input type="password" id="password" name="password"
                        class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                        placeholder="••••••••" />
                </div>

            </div>
            <span id="login-error" class="text-red-400 mb-4"></span>
            <span class="ml-auto">Belum Memiliki Akun? <a href="../register" class="text-[#EC5A49] hover:opacity-50 active:scale-97 duration-300">Register</a></span>
            <button
                class="bg-[#EC5A49] text-[#F8F4E8]-900 px-8 py-2 rounded-lg mt-4 hover:opacity-60 active:scale-[.98] duration-300"
                onclick="login()">
                Masuk
                <i class="fas fa-arrow-right ml-2"> </i>
            </button>
            <div class="flex flex-row items-center justify-center my-8">
                <div class="w-full h-[1px] bg-[#F8F4E8]"></div>
                <span class="mx-4">atau</span>
                <div class="w-full h-[1px] bg-[#F8F4E8]"></div>
            </div>
            <div class="flex flex-col items-center justify-center">
                <button
                    class="bg-white rounded-lg flex flex-row px-8 py-2 justify-center items-center text-black w-full hover:opacity-50 active:scale-97 duration-300">
                    <svg class="w-5 h-5 mr-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                        xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                        <path fill="#EA4335"
                            d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                        </path>
                        <path fill="#4285F4"
                            d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                        </path>
                        <path fill="#FBBC05"
                            d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                        </path>
                        <path fill="#34A853"
                            d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                        </path>
                        <path fill="none" d="M0 0h48v48H0z"></path>
                    </svg>
                    <div>
                        Login dengan Google
                    </div>
                </button>
            </div>

            <p class="text-center font-light text-gray-200 text-md mt-8 max-w-[400px] mb-4">
                Dengan Masuk ke KampusPeduliUPNVJ, anda menyetujui kebijakan privasi pada platform ini, serta
                terms of services yang berlaku.
            </p>
        </div>
        <div
            class="bg-[url('../login.webp')] bg-cover rounded-tl-3xl h-full md:min-w-[600px] min-w-screen w-full max-w-screen brightness-[40%]">
        </div>
    </div>
</body>

</html>