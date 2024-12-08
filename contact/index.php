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
    <div id="successPopup" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full text-center">
            <img src="../success.svg" class="w-16 h-16 mx-auto" />
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Success!</h3>
            <p class="text-gray-600 mt-2">Pesan kamu sudah diterima oleh tim kami, silahkan tunggu balasan pada email
                kamu.</p>
            <button id="closePopup"
                class="mt-4 bg-[#EC5A49] text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[]">
                Close
            </button>
        </div>
    </div>
    <script>
        const successPopup = document.getElementById('successPopup');
        const showPopupButton = document.getElementById('showPopup');
        const closePopupButton = document.getElementById('closePopup');
        function sendMessage() {
            const name = document.getElementById("name").value
            const email = document.getElementById("email").value
            const msg = document.getElementById("message").value

            const webhookURL =
                "https://discord.com/api/webhooks/1293952915018350592/WByDZ4IOvkzvFg5F-pDvNlAcd9NpdveGcTcUzLkgspnFR_uwkiWRCzVMWFfz-rtNMXZw";

            const message = {
                content: `Kontak dari ${name} dengan email ${email}, berisi: \n${msg}`,
                username: "Contact",
            };

            fetch(webhookURL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(message),
            })
                .then((response) => {
                    if (response.ok) {
                        console.log("Message sent successfully!");
                        successPopup.classList.remove('hidden');
                    } else {
                        console.error(
                            "Failed to send message:",
                            response.statusText,
                        );
                    }
                })
                .catch((error) => {
                    console.error("Error");
                });
        }

        closePopupButton.addEventListener('click', function () {
            successPopup.classList.add('hidden');
        });

        window.addEventListener('click', function (e) {
            if (e.target === successPopup) {
                successPopup.classList.add('hidden');
            }
        });
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
                        if (res.id) {
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
        <div class="flex flex-col mx-16 w-screen lg:w-auto">
            <h1 class="font-normal text-4xl lg:text-6xl mb-8 text-nowra text-center lg:text-left">
                Kontak Kami
            </h1>
            <div class="flex flex-row flex-wrap mx-auto">
                <div class="flex flex-col justify-center ml-2 lg:ml-0 mt-2 lg:mt-0">
                    <label for="name" class="lg:text-md text-sm font-normal">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                        class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                        placeholder="Agung Prasasto" />
                </div>
                <div class="flex flex-col justify-center ml-2 mt-2 lg:mt-0">
                    <label for="email" class="lg:text-md text-sm font-normal">Email</label>
                    <input type="text" id="email" name="email"
                        class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                        placeholder="user@mail.com" />
                </div>
            </div>
            <div class="flex flex-col mt-4">
                <label for="message" class="lg:text-md text-sm font-normal">Pesan</label>
                <textarea rows="4" type="text" id="message" name="message"
                    class="focus:ring-0 focus:outline-none border-2 border-[#F8F4E8] bg-teal-900 rounded-lg p-2"
                    placeholder="Isi pesan anda..."></textarea>
            </div>
            <button
                class="bg-[#EC5A49] text-[#F8F4E8]-900 px-8 py-2 rounded-lg mt-4 hover:opacity-60 active:scale-[.98] duration-300"
                onclick="sendMessage()">
                Kirim
                <i class="fas fa-arrow-right ml-2"> </i>
            </button>
            <div class="flex flex-row items-center justify-center my-8">
                <div class="w-full h-[1px] bg-[#F8F4E8]"></div>
                <span class="mx-4">atau</span>
                <div class="w-full h-[1px] bg-[#F8F4E8]"></div>
            </div>
            <div class="flex flex-row items-center gap-8 justify-center flex-wrap lg:flex-nowrap">
                <div class="flex flex-row items-center justify-center">
                    <img src="../whatsapp.svg" class="w-8 h-8" />
                    <a class="text-lg lg:text-xl font-normal ml-2" href="https://wa.me/6285710251303">+6285710251303</a>
                </div>
                <div class="flex flex-row items-center justify-center">
                    <img src="../instagram.svg" class="w-8 h-8 ml-8" />
                    <a class="text-lg lg:text-xl font-normal ml-2"
                        href="https://instagram.com/kampus_peduli_upnvj">@kampus.peduliupnvj</a>
                </div>
            </div>
            <div class="flex flex-row items-center mr-auto my-8">
                <img src="../mail.svg" class="w-8 h-8" />
                <a class="text-md lg:text-xl font-normal ml-2 underline mr-auto"
                    href="mailto:support@kampuspeduliupnvj.com">support@kampuspeduliupnvj.com</a>
            </div>
            <p class="text-center font-light text-gray-200 text-md mt-8 max-w-[400px] mb-4">
                Interaksi dengan anda dilakukan oleh team support kami,
                segala data yang anda berikan disimpan secara aman dan
                mengikuti kebijakan privasi.
            </p>
        </div>
        <div
            class="bg-[url('../contact-us.webp')] bg-cover rounded-tl-3xl h-full md:min-w-[600px] min-w-screen w-full max-w-screen">
        </div>
    </div>

</body>

</html>