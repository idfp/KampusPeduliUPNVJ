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

    <div id="deletePrompt" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full text-center z-50">
            <i class="fas fa-exclamation-triangle ml-2 text-red-500 fa-2x"></i>
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Warning</h3>
            <p class="text-gray-600 mt-2">Akunmu akan dihapus, hal ini bersifat permanen dan akun tidak akan bisa dikembalikan.</p>
            <button id="closePopup"
                class="mt-4 bg-[#EC5A49] text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-none">
                Hapus Akun
            </button>
        </div>
    </div>
    <script>
        const deletePrompt = document.getElementById('deletePrompt');
        const showPopupButton = document.getElementById('showPopup');
        const closePopupButton = document.getElementById('closePopup');
        function render(id, name, email, phone) {
            const main = document.getElementById("main")
            main.innerHTML = main.innerHTML
                .replace(/{id}/g, id)
                .replace(/{user}/g, name)
                .replace(/{email}/g, email)
                .replace(/{phone}/g, phone)
        }
        fetch("/api/my_user/", {
            method: "GET",
            credentials: "include"
        }).then(x => x.json())
            .then(res => {
                if (res.status && res.status === "unauthorized") {
                    window.location.href = "/"
                    return
                }
                render(res.id, res.name, res.email, res.phone)
            })
        function update() {
            const name = document.getElementById("name").value
            const email = document.getElementById("email").value
            const phone = document.getElementById("phone").value
            const updateError = document.getElementById("update-error")
            const data = new URLSearchParams();
            data.append("nama", name);
            data.append("email", email);
            data.append("phone", phone);


            fetch("/api/my_user/", {
                method: "POST",
                body: data,
                credentials: "include"
            }).then(x => x.json())
                .then(x => {
                    if (x.status === "success") {
                        location.reload()
                    } else {
                        updateError.innerText = "Gagal melakukan update"
                    }
                })

        }
        function deleteAccount(){
            fetch("/api/my_user/", {
                method: "DELETE",
                credentials:"include"
            })
            .then(x=>x.json())
            .then(x=>{
                if(x.status === "success"){
                    window.location.href = "/"
                }
            })
        }
        function deletePopUp(){
            deletePrompt.classList.remove("hidden")
        }
        closePopupButton.addEventListener('click', function () {
            deleteAccount()
        });

        window.addEventListener('click', function (e) {
            if (e.target === deletePrompt) {
                deletePrompt.classList.add('hidden');
            }
        });
    </script>
    <header class="flex justify-between items-center p-6">
        <div class="text-lg font-bold lg:ml-16">
            <img src="/logo.svg" />
        </div>
        <nav class="space-x-2 lg:space-x-6 ml-2 flex flex-row">
            <a class="text-white hover:text-red-500 text-md lg:text-lg" href="/">
                Home
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg" href="/contact/">
                Contact
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="/about_us/">
                About Us
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="/donation/list/">
                List Donasi
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="/logout/" >
                Logout
            </a>
            
        </nav>
        <a class="bg-[#EC5A49] text-white px-8 py-2 rounded-lg hidden lg:block" href="/donation/">
            Donasi Sekarang
        </a>
    </header>
    <div id="main" class="flex flex-col w-full h-[91vh] mt-16 xl:mt-4 overflow-x-none">
        <div
            class="bg-[url('/login.webp')] bg-cover rounded-tl-3xl h-[200px] min-w-screen w-full max-w-screen brightness-[40%]">
        </div>
        <div class="flex flex-row mx-4 lg:mx-16 xl:mx-32 w-screen lg:w-auto lg:min-w-[400px] mt-20 flex-wrap">
            <div class="flex flex-col">
                <h1 class="font-normal text-2xl lg:text-4xl mb-8 text-nowrap text-left lg:text-left">
                    Selamat Datang {user}!
                </h1>
                <div class="flex flex-row flex-wrap mx-auto w-full">
                    <div class="flex flex-col justify-center ml-2 lg:ml-0 mt-2 lg:mt-0 flex-1">
                        <label for="name" class="lg:text-md text-sm font-normal">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                            placeholder="Agung Prasasto" value="{user}" />
                    </div>
                    <div class="flex flex-col justify-center ml-2 mt-2 lg:mt-0 flex-1">
                        <label for="email" class="lg:text-md text-sm font-normal">Email</label>
                        <input type="text" id="email" name="email"
                            class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                            placeholder="user@mail.com" value="{email}" />
                    </div>
                </div>
                <div class="flex flex-row flex-wrap mt-2 w-full mb-4">
                    <div class="flex flex-col justify-center ml-2 lg:ml-0 mt-2 lg:mt-0 w-full">
                        <label for="name" class="lg:text-md text-sm font-normal">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" value="{phone}"
                            class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                            placeholder="+628XXXXXXXXXX" />
                    </div>
                </div>
                <span id="update-error" class="text-red-400 mb-4"></span>
                <button
                    class="bg-[#EC5A49] text-[#F8F4E8]-900 px-8 py-2 rounded-lg mt-4 hover:opacity-60 active:scale-[.98] duration-300 mr-auto"
                    onclick="update()">
                    Simpan
                    <i class="fas fa-arrow-right ml-2"> </i>
                </button>
                <button
                    class="bg-red-500 text-[#F8F4E8]-900 px-8 py-2 rounded-lg mt-4 hover:opacity-60 active:scale-[.98] duration-300 ml-auto"
                    onclick="deletePopUp()">
                    Hapus Akun
                    <i class="fas fa-trash ml-2"></i>
                </button>
            </div>
            <img src="/dashboard.svg" class="max-w-[500px] ml-auto" />
        </div>

    </div>
</body>

</html>