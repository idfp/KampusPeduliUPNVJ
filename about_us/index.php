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
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="/login/" id="login-btn">
                Masuk / Daftar
            </a>
            <script>
                fetch("/api/my_user/", {
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
        <a class="bg-[#EC5A49] text-white px-8 py-2 rounded-lg hidden lg:block" href="/donation/">
            Donasi Sekarang
        </a>
    </header>
    <div class="flex flex-row w-full h-[91vh] justify-center items-center flex-wrap lg:flex-nowrap">
        <div class="flex flex-col mx-8 lg:mx-6">
            <h1 class="font-normal text-4xl mb-8">
                Kelompok 5
            </h1>
            <section>
                <h2 class="text-[#EC5A49] text-2xl">Visi</h2>
                <p>
                    Menjadi platform terpercaya yang memfasilitasi donasi di
                    lingkungan UPN "Veteran" Jakarta, yang dapat
                    memberdayakan dan meningkatkan kesejahteraan komunitas
                    kampus serta masyarakat sekitar.
                </p>
            </section>
            <br />
            <section>
                <h2 class="text-[#EC5A49] text-2xl">Misi</h2>
                <ol>
                    <li>Menyediakan Platform yang Transparan</li>
                    <li>Meningkatkan Kesadaran Sosial</li>
                    <li>Memfasilitasi Proyek Berbasis Komunitas</li>
                    <li>Mengoptimalkan Pengalaman Pengguna</li>
                </ol>
            </section>
            <br />
            <section>
                <h2 class="text-[#EC5A49] text-2xl">Anggota Kelompok</h2>
                <ul>
                    <li class="flex flex-row">
                        Fendi Permadi
                        <span class="ml-auto">2310512093</span>
                    </li>
                    <li class="flex flex-row">
                        Vega Setiawan
                        <span class="ml-auto">2310512108</span>
                    </li>
                    <li class="flex flex-row">
                        Anisa Bella Kayla
                        <span class="ml-auto">2310512110</span>
                    </li>
                    <li class="flex flex-row">
                        Ashja Radithya Lesmana
                        <span class="ml-auto">2310512113</span>
                    </li>
                    <li class="flex flex-row">
                        Jihan Aulia Rahmawati
                        <span class="ml-auto">2310512117</span>
                    </li>
                </ul>
            </section>
            <hr class="w-auto h-1 mx-2 lg:mx-16 my-4 bg-[#F8F4E8] border-[0.5px] border-[#F8F4E8] rounded md:my-7" />
            <section class="pb-8">
                <h2 class="text-[#EC5A49] text-2xl">Alamat Kami</h2>
                <p>
                    Universitas Pembangunan Nasional "Veteran" Jakarta<br />
                    Jl. Cilandak Raya No. 10, Cilandak,<br />
                    Kecamatan Cilandak,<br />
                    Kota Jakarta Selatan,<br />
                    DKI Jakarta,<br />
                    Indonesia, 12430.<br />
                </p>
            </section>
        </div>
        <div
            class="bg-[url('/about_us.webp')] bg-cover rounded-tl-3xl h-full md:min-w-[600px] min-w-screen w-full max-w-screen brightness-[40%]">
        </div>
    </div>
</body>

</html>