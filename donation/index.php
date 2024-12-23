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
            <img src="/success.svg" class="w-16 h-16 mx-auto" />
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Success!</h3>
            <p class="text-gray-600 mt-2">Donasi kamu sudah kami terima, terimakasih sudah melakukan donasi!</p>
            <button id="closePopup"
                class="mt-4 bg-[#EC5A49] text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[]">
                Close
            </button>
        </div>
    </div>
    <div id="qrisPopup" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full text-center">
            <img src="/payment.svg" class="w-16 h-16 mx-auto" />
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Bayar dengan QRIS!</h3>
            <p class="text-gray-600 mt-2" id="payment">Bayar sebesar $1 ke kode QR berikut.</p>
            <img src="/qr.webp" class="w-98 h-98" />
            <button id="closeQris"
                class="mt-4 bg-[#EC5A49] text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[]">
                Sudah Dibayar
            </button>
        </div>
    </div>
    <header class="flex justify-between items-center p-6 z-50">
        <div class="text-lg font-bold -ml-4 lg:ml-16">
            <img src="../logo.svg" />
        </div>
        <nav class="space-x-2 lg:space-x-6 ml-4 flex flex-row ml-auto mr-auto">
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="../">
                Home
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="../contact/">
                Contact
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="../about_us/">
                About Us
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="../donation/list/">
                List Donasi
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="../login/" id="login-btn">
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
                            loginBtn.href = "/dashboard"
                        }
                    })
            </script>
        </nav>
    </header>
    <div class="bg-[url('../donation.webp')] bg-cover h-screen w-screen max-w-screen brightness-[70%] fixed top-0 -z-10">
    </div>
    <div>
        <h1 class="text-2xl lg:text-4xl text-center mt-36 lg:mt-72 mb-16">
            Selamat datang di portal kampus peduli UPNVJ<br />
            Donasi aman dan mudah
        </h1>
        <div class="w-[90vw] lg:w-[80vw] bg-[#F8F4E8] mx-auto rounded-t-[35px] px-4 lg:px-16 py-10 text-black">
            <h1 class="font-bold text-xl lg:text-2xl">Nominal</h1>
            <span>Pilih nominal yang tersedia</span>
            <div id="nominal" class="flex flex-row my-4 flex-wrap justify-center lg:justify-start"></div>

            <h1 class="font-bold text-text-xl lg:text-2xl">Nominal Lainnya</h1>
            <div class="flex flex-row items-center relative">
                <span class="left-6 absolute text-xl text-gray-400">Rp.</span>
                <input placeholder="125.000" type="number" id="otherNominal"
                    class="border-2 text-xl border-gray-400 text-gray-400 rounded-xl bg-white pr-6 pl-[54px] py-3 mr-6 my-4 min-w-[40vw]" />
            </div>
            <br />
            <span class="text-gray-500 mb-8">Minimum donasi Rp 10.000</span>
            <div class="w-full h-[4px] bg-gray-300 my-8"></div>
            <div class="flex flex-row items-center flex-wrap">
                <h1 class="font-bold text-xl lg:text-2xl">Metode Pembayaran</h1>
                <div class="relative inline-block text-left ml-auto">
                    <button id="dropdownButton"
                        class="inline-flex w-full items-center border-2 text-xl border-gray-400 text-gray-400 rounded-xl bg-white pr-6 pl-6 py-3 mr-6 my-4 min-w-[20vw]">
                        <svg class="ml-0 w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#000">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-black" id="active-payment">Gopay
                        </span>
                    </button>

                    <div id="dropdownMenu"
                        class="hidden absolute right-0 mt-2 w-56 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg">
                        <a onclick="setActivePayment('Gopay')"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gopay</a>
                        <a onclick="setActivePayment('Dana')"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dana</a>
                        <a onclick="setActivePayment('Qris')"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Qris</a>
                    </div>
                </div>
            </div>
            <div class="w-full h-[4px] bg-gray-300 my-8"></div>
            <h1 class="font-bold text-xl lg:text-2xl">Info Donatur</h1>
            <span class="underline"><a href="#" class="text-[#EC5A49]">Masuk akun</a> atau
                lengkapi data dibawah ini</span>
            <div class="flex flex-col mt-7">
                <h1 class="font-bold text-xl lg:text-2xl">Nama Lengkap*</h1>
                <input id="name" placeholder="Agung Prasasto" type="text"
                    class="border-2 text-xl border-gray-400 text-gray-400 rounded-xl bg-white px-6 py-3 mr-6 my-4 min-w-[40vw]" />
            </div>
            <div class="flex flex-col">
                <h1 class="font-bold text-xl lg:text-2xl">No Telepon*</h1>
                <input id="telp" placeholder="+62xxxxxxxxxx" type="number"
                    class="border-2 text-xl border-gray-400 text-gray-400 rounded-xl bg-white px-6 py-3 mr-6 my-4 min-w-[40vw]" />
            </div>
            <div class="flex flex-col">
                <h1 class="font-bold text-xl lg:text-2xl">Email (Opsional)</h1>
                <input id="email" placeholder="user@mail.com" type="text"
                    class="border-2 text-xl border-gray-400 text-gray-400 rounded-xl bg-white px-6 py-3 mr-6 my-4 min-w-[40vw]" />
            </div>
            <div class="flex flex-row my-7 flex-wrap">
                <h1 class="font-bold text-xl lg:text-2xl">
                    Sembunyikan nama saya (Anonim)
                </h1>
                <button id="switchToggle"
                    class="relative inline-flex items-center h-8 rounded-full w-16 bg-gray-300 focus:outline-none transition-colors duration-200 ml-auto mr-8">
                    <span
                        class="absolute left-1 inline-block w-6 h-6 transform bg-white rounded-full transition-transform duration-200"></span>
                </button>
            </div>
            <div class="flex flex-col mt-5">
                <h1 class="font-bold text-xl lg:text-2xl">Beri Pesan (Opsional)</h1>
                <textarea id="message" type="text" cols="4"
                    class="w-full h-36 rounded-xl p-3 align-top my-4 text-start border-2 border-gray-400"
                    placeholder="Pesan..."></textarea>
            </div>
            <span>Dengan melanjutkan donasi, saya setuju Syarat & Ketentuan</span>
            <button id="donateButton"
                class="py-4 w-full mt-4 bg-[#EC5A49] rounded-xl text-3xl text-[#F8F4E8] font-bold hover:opacity-50 active:scale-97 duration-300"
                onclick="donate()">
                Donasi Sekarang
            </button>
        </div>
    </div>
    <script>
        let activeNominal = 25000;
        let nominal = [10000, 25000, 75000, 100000];
        let activePayment = "Gopay";
        function setActivePayment(payment) {
            const element = document.querySelector("#active-payment");
            activePayment = payment;
            element.innerHTML = payment;
        }

        const nominalContainer = document.querySelector("#nominal");
        function formatRupiah(number) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(number);
        }
        const otherNominalInput = document.getElementById("otherNominal");
        otherNominalInput.addEventListener("input", () => {
            activeNominal = otherNominalInput.value
            if (nominal.includes(Number.parseInt(otherNominalInput.value))) {
                render()
            }
        })
        const switchToggle = document.getElementById('switchToggle');
        let isOn = false;

        switchToggle.addEventListener('click', function () {
            isOn = !isOn;

            switchToggle.classList.toggle('bg-[#EC5A49]', isOn);
            switchToggle.classList.toggle('bg-gray-300', !isOn);

            const knob = switchToggle.querySelector('span');
            knob.classList.toggle('translate-x-8', isOn);
            knob.classList.toggle('translate-x-0', !isOn);

        });

        function render() {
            nominalContainer.innerHTML = "";
            nominal.forEach((nm) => {
                nominalContainer.innerHTML =
                    nominalContainer.innerHTML +
                    `<div class="border-2 text-md lg:text-xl ${nm == activeNominal ? "border-[#EC5A49] text-[#EC5A49]" : "border-gray-400 text-gray-400"} rounded-full bg-white px-4 py-2 lg:px-6 lg:py-3 mr-6 cursor-pointer mt-2"
                        onclick="(()=>{activeNominal = ${nm};render()})()"
                        >
                        ${formatRupiah(nm)}
                    </div>`;
            });
        }
        render();

        document
            .getElementById("dropdownButton")
            .addEventListener("click", function () {
                const dropdownMenu =
                    document.getElementById("dropdownMenu");
                dropdownMenu.classList.toggle("hidden");
            });

        window.addEventListener("click", function (e) {
            const dropdownMenu = document.getElementById("dropdownMenu");
            const dropdownButton =
                document.getElementById("dropdownButton");

            if (!dropdownButton.contains(e.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
        
        function sendMessage() {
            const name = document.getElementById("name").value
            const email = document.getElementById("email").value
            const phone = document.getElementById("telp").value
            const msg = document.getElementById("message").value
            const data = new URLSearchParams();
            data.append("name", name);
            data.append("email", email);
            data.append("phone", phone);
            data.append("msg", msg);
            data.append("nominal", activeNominal);
            data.append("payment", activePayment);
            fetch("../api/donation/", {
                method: "POST",
                credentials: "include",
                body: data
            })
                .then(x => x.json())
                .then(res => {
                    
                })
            const webhookURL =
                "https://discord.com/api/webhooks/1293952915018350592/WByDZ4IOvkzvFg5F-pDvNlAcd9NpdveGcTcUzLkgspnFR_uwkiWRCzVMWFfz-rtNMXZw";

            const message = {
                content: `Donasi dari ${name} dengan email ${email}\nSebesar: ${formatRupiah(activeNominal)}\nPayment Method: ${activePayment}\nNo. Telepon: ${phone}\nPesan: ${msg}`,
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
        function donate() {
            const qrisPopup = document.getElementById('qrisPopup');
            const closePopupButton = document.getElementById('closeQris');
            const successPopup = document.getElementById("successPopup")
            const closeButton = document.getElementById('closePopup');

            qrisPopup.classList.remove("hidden")
            document.getElementById("payment").innerHTML = `Bayar sebesar ${formatRupiah(activeNominal)} ke kode QR berikut.`
            closePopupButton.addEventListener('click', function () {
                qrisPopup.classList.add('hidden');
                successPopup.classList.remove('hidden');
                sendMessage()
            });
            closeButton.addEventListener('click', function () {
                successPopup.classList.add('hidden');

            });

            window.addEventListener('click', function (e) {
                if (e.target === successPopup) {
                    qrisPopup.classList.add('hidden');
                    successPopup.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>