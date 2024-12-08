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

        *::selection {
            background-color: #121212;
        }
    </style>
</head>

<body class="bg-teal-900 text-white">
<div id="detailProjectPopUp"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
        <div class="bg-teal-900 rounded-lg p-10 max-w-[900px] w-full text-center z-50 flex flex-col">
            <button id="closeDetailProjectPopup" class="text-[#EC5A49] px-[10px] py-[2px] rounded-lg text-2xl ml-auto hover:bg-[#EC5A49] hover:px-[10px] py-[2px] hover:rounded-full hover:text-black duration-300">
                x
            </button>
            <div class="flex flex-col gap-5">
                <div class="flex flex-col justify-center items-center text-left">
                    <span class="bg-[#EC5A49] px-5 py-2 rounded-full">
                        Bantuan Pendidikan
                    </span>
                    <h1 class="text-2xl font-bold text-left mt-4">
                        Membantu Anak Anak Mendapatkan Pendidikan Yang Lebih Layak
                    </h1>
                </div>
                <div class="basis-1/2">
                    <div class="float-left mr-4 rounded-lg w-full max-w-[400px] h-60 overflow-hidden">
                        <img alt="${project.title}"
                            class="mb-4 rounded-lg w-full h-60 object-cover hover:scale-125 hover:cursor-pointer active:cursor-pointer duration-500"
                            src="../../project1.webp" />
                    </div>
                    <p class="text-lg text-left font-light">
                        Pendidikan adalah kunci untuk mengubah hidup. Dengan mendukung kampanye ini, Donasi Anda akan
                        digunakan untuk membangun sekolah, melatih guru, dan menyediakan fasilitas belajar yang memadai.
                    </p>
                </div>
            </div>
            <div class="text-xl font-bold my-8 text-center">
                <h1 class="mb-4 text-2xl">
                    Dokumentasi Proyek
                </h1>
                <div class="flex flex-row w-full justify-evenly">
                    <div class="mb-4 rounded-lg w-full max-w-[350px] h-40 overflow-hidden">
                        <img id="doc1" alt="${project.title}"
                            class="mb-4 rounded-lg w-full h-40 object-cover hover:scale-125 hover:cursor-pointer active:cursor-pointer duration-500"
                            src="../../project1.webp" />
                    </div>
                    <div class="mb-4 rounded-lg w-full max-w-[350px] h-40 overflow-hidden">
                        <img id="doc2" alt="${project.title}"
                            class="mb-4 rounded-lg w-full h-40 object-cover hover:scale-125 hover:cursor-pointer active:cursor-pointer duration-500"
                            src="../../project1.webp" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="bg-[#F8F4E8] h-3 w-full rounded-full mb-4">
                    <div id="progress" class="bg-[#EC5A49] h-3 rounded-full" style="width: ${progress}%;"></div>
                </div>
                <p class="text-xl text-center">
                    Terkumpul Rp. ${parseInt(project.donation).toLocaleString('id-ID')} / Rp.
                    ${parseInt(project.donation_target).toLocaleString('id-ID')}
                </p>
            </div>
            <div class="text-center text-center mt-8">
                <a class="bg-[#EC5A49] text-2xl text-white px-24 py-6 rounded-lg mb-4 inline-flex items-center font-bold hover:opacity-50 active:scale-97 duration-300 lg:mr-auto mx-auto lg:ml-0"
                    href="donation"> Donasi</a>
            </div>
        </div>
    </div>
    <script>
        window.user = {}
    </script>
    <header class="flex justify-between items-center p-6">
        <div class="text-lg font-bold lg:ml-16">
            <img src="logo.svg" />
        </div>
        <nav class="space-x-2 lg:space-x-6 ml-2 flex flex-row">
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="">
                Home
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="contact/">
                Contact
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="about_us/">
                About Us
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="donation/list/">
                List Donasi
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="login/" id="login-btn">
                Masuk / Daftar
            </a>
            <script>
                fetch("api/my_user", {
                    credentials: "include"
                })
                    .then(x => x.json())
                    .then(res => {
                        if(res.id){
                            const loginBtn = document.getElementById("login-btn")
                            loginBtn.innerText = "Dashboard"
                            loginBtn.href = "dashboard"
                        }
                    })
            </script>
        </nav>
        <a class="bg-[#EC5A49] text-white px-8 py-2 rounded-lg hover:opacity-50 active:scale-97 duration-300 hidden lg:block" href="donation/projects">
            Donasi Sekarang
        </a>
    </header>
    <main class="text-center flex flex-row items-center justify-center pb-48 flex-wrap-reverse">
        <div class="flex flex-col mt-8 lg:mt-0">
            <h1 class="lg:text-8xl text-4xl font-normal mb-4 lg:text-left text-center">
                Ubah Saldo<br />
                Dana Menjadi<br />
                Amal Jariyah
            </h1>

            <a class="bg-[#EC5A49] text-white px-6 py-3 rounded-lg mb-4 inline-flex items-center hover:opacity-50 active:scale-97 duration-300 lg:mr-auto mx-auto lg:ml-0"
                href="donation/projects">
                Donasi Sekarang
                <i class="fas fa-arrow-right ml-2"> </i>
            </a>
            <p class="lg:text-lg text-sm mb-8 font-light lg:text-left mx-auto lg:mx-0 text-center">
                Ribuan orang sudah mendonasikan harta mereka.<br />
                Ribuan orang sudah terbantukan.
            </p>
        </div>
        <div class="mt-0 lg:ml-24 mx-4">
            <img alt="Illustration of charity market" class="mx-auto" height="500" src="charity.svg" width="500" />
            <p class="lg:text-lg text-sm mb-8 font-light text-center">
                Dikembangkan oleh mahasiswa S1 Sistem Informasi<br />FIK UPN
                Veteran jakarta 2023
            </p>
        </div>
    </main>
    <section class="bg-[#F8F4E8] text-teal-900 py-20">
        <div class="container mx-auto text-center bg-[#EC5A49] max-w-[1000px] -mt-48 rounded-3xl">
            <div class="text-white bg-[url('hero.webp')] pt-20 pb-10 bg-cover rounded-t-3xl">
                <h2 class="text-4xl font-bold mb-8">
                    Berbagi adalah Kunci
                </h2>
                <div class="flex justify-center space-x-8 lg:space-x-24 space-y-4 lg:space-y-0 mb-8 flex-wrap">
                    <div class="text-center">
                        <i class="fas fa-donate text-4xl mb-2"> </i>
                        <p class="text-lg">+Rp. 200jt</p>
                        <p>Sudah Terkumpul</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-hand-holding-heart text-4xl mb-2">
                        </i>
                        <p class="text-lg">+1000</p>
                        <p>Donasi diterima</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-bullseye text-4xl mb-2"> </i>
                        <p class="text-lg">+8</p>
                        <p>Target Donasi</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-donate text-4xl mb-2"> </i>
                        <p class="text-lg">+Rp. 200jt</p>
                        <p>Sudah Tersalurkan</p>
                    </div>  
                </div>
            </div>
            <div
                class="bg-[#EC5A49] text-white px-16 py-8 rounded-full flex flex-row items-center flex-wrap space-y-4 lg:space-y-0">
                <div class="flex-1 text-left">
                    <h1 class="text-3xl">Ikuti Ribuan Orang lainnya</h1>
                    <p class="text-sm font-light">
                        Mulai Berdonasi pada KampusPeduliUPNVJ, donasi tidak
                        dipotong sama sekali. Dan dipastikan akan sampai ke
                        tangan penerima dengan selamat. Dokumentasi
                        penyerahan donasi dapat dilihat pada bagian bawah
                        halaman website ini.
                    </p>
                </div>
                <div class="flex-1 flex flex-col">
                    <a class="bg-teal-900 rounded-full px-8 py-4 ml-auto hover:opacity-50 active:scale-97 duration-300" href="donation/list/">
                        Donasi Terkumpul
                        <i class="fas fa-arrow-right ml-2"> </i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-[#F8F4E8] py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4 text-black">
                Proyek Terkini
            </h2>
            <p class="text-lg mb-8 text-black font-light">
                MISI DAN TUJUAN ORGANISASI KAMI
            </p>
            <div class="m-auto w-full max-w-[1400px] text-right">
                <a class="bg-[#EC5A49] text-white px-6 py-3 rounded-lg mb-4 inline-flex items-center hover:opacity-50 active:scale-97 duration-300 lg:mr-auto mx-auto lg:ml-0"
                    href="donation/projects/">
                    lihat yang lainnya
                    <i class="fas fa-arrow-right ml-2"> </i>
                </a>
            </div>
            <!-- Slider Container -->
            <div id="slider-wrapper" class="relative w-full max-w-[1400px] my-0 mx-auto overflow-x-auto py-4">
                <div id="project-container" class="flex flex-row gap-3"></div>
            </div>
        </div>
    </section>
    <footer class="bg-teal-900 text-white py-10 flex flex-col">
        <div class="container mx-auto text-center flex flex-row items-center justify-center flex-wrap">
            <div class="flex flex-col max-w-[400px] lg:mr-8">
                <h3 class="text-2xl lg:text-4xl text-center lg:text-life font-bold mb-4">KampusPeduliUPNVJ</h3>
                <p class="text-lg lg:text-2xl text-center lg:text-life mb-8 text-left font-light">
                    Bersama KampusPeduli UPNVJ, mari kita wujudkan impian
                    dan harapan mereka yang membutuhkan.
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.603980024899!2d106.79088627617291!3d-6.315638761805954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee3e065d4f6b%3A0xe176f81a31564166!2sUniversitas%20Pembangunan%20Nasional%20Veteran%20Jakarta!5e0!3m2!1sen!2sid!4v1728471836215!5m2!1sen!2sid"
                width="400" height="300" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p class="text-sm lg:text-2xl font-light mt-16 mx-auto">
            Copyright © KampusPeduliUPNVJ | Design By Kelompok 5
        </p>
    </footer>
</body>
<script>
    let projectData = [];
    const detailProjectPopUp = document.getElementById('detailProjectPopUp');
    const closeDetailProjectPopup = document.getElementById('closeDetailProjectPopup')

    closeDetailProjectPopup.addEventListener('click', () => {
        detailProjectPopUp.classList.add('hidden');
        console.log("closing detail project")
    })
    
    window.addEventListener('click', function (e) {
        if (e.target === addProjectPopup) {
            addProjectPopup.classList.add('hidden');
        }
    });

    function render(data) {
        const container = document.getElementById('project-container');
        container.innerHTML = '';
        if (data.length == 0) {
            container.innerHTML = `
            <h1 class="text-xl my-8">Project tidak ditemukan</h1>
            `;
            return
        }

        let html = ``;

        data.forEach(project => {
            const progress = (project.donation / project.donation_target) * 100;
            const projectHTML = `
                <div id="card-project" 
                    class="bg-teal-900 text-white rounded-lg h-[540px] w-[480px] flex-shrink-0" >
                    <div class="relative mb-4 rounded-lg w-full h-48 overflow-hidden"
                        data-id="${project.id}"
                        onclick="showProjectDetail(${project.id})">
                        <img alt="${project.title}" class="mb-4 rounded-lg w-full h-48 object-cover hover:brightness-50 hover:scale-125 hover:cursor-pointer active:cursor-pointer duration-500"
                            src="uploads/project-${project.id}/main.jpg" />
                    </div>
                    <div class="py-5 px-8 flex flex-col h-[320px]">
                        <span class="bg-[#EC5A49] px-4 rounded-full mr-auto">Bantuan ${project.category}</span>
                        <h3 class="text-xl font-bold my-2 text-left hover:text-slate-400 hover:cursor-pointer active:cursor-pointer duration-300"
                            data-id="${project.id}"
                            onclick="showProjectDetail(${project.id})">
                            ${project.title}
                        </h3>
                        <p class="text-lg mb-4 text-left font-light text-ellipsis line-clamp-3"
                            data-id="${project.id}"
                            onclick="showProjectDetail(${project.id})">
                            ${project.description}
                        </p>
                        <div class="flex flex-row mt-auto">
                            <div class="flex flex-col">
                                <div class="bg-[#F8F4E8] h-3 w-full rounded-full mb-4">
                                    <div class="bg-[#EC5A49] h-3 rounded-full" style="width: ${progress}%;"></div>
                                </div>
                                <p class="text-sm mr-auto">
                                    Terkumpul Rp. ${parseInt(project.donation).toLocaleString('id-ID')} / Rp. ${parseInt(project.donation_target).toLocaleString('id-ID')}
                                </p>
                            </div>  
                            <div class="flex justify-center items-center ml-auto">
                                <a class="bg-[#EC5A49] text-lg text-white px-7 py-3 rounded-lg mb-4 inline-flex items-center font-bold hover:opacity-50 active:scale-97 duration-300 lg:mr-auto mx-auto lg:ml-0" 
                                href="donation"> Donasi</a>
                            </div>
                        </div>
                    </div>
                </div>`;
            html = html + projectHTML;
            // container.innerHTML += projectHTML;
        });
        container.innerHTML = html;
    }

    function showProjectDetail(projectId) {
        const selectedProject = projectData.find(project => parseInt(project.id) === projectId);
        if (selectedProject) {
            // Menghitung progress donasi
            const progress = (selectedProject.donation / selectedProject.donation_target) * 100;
            document.getElementById('detailProjectPopUp').classList.remove('hidden');
            // Update konten pop-up dengan data proyek
            document.querySelector('#detailProjectPopUp img').src = `uploads/project-${selectedProject.id}/main.jpg`;
            document.querySelector('#detailProjectPopUp img').alt = selectedProject.title;
            document.querySelector('#detailProjectPopUp h1.text-2xl').innerText = selectedProject.title;
            document.querySelector('#detailProjectPopUp p.text-lg').innerText = selectedProject.description;
            document.querySelector('#detailProjectPopUp span').innerText = `Bantuan ${selectedProject.category}`;
            document.querySelector('#progress').style.width = `${progress}%`;
            console.log(document.getElementById('doc1'))
            document.getElementById('doc1').src = `uploads/project-${selectedProject.id}/doc1.jpg`;
            document.getElementById('doc2').src = `uploads/project-${selectedProject.id}/doc2.jpg`;
            document.querySelector('#detailProjectPopUp p.text-xl').innerText = `Terkumpul Rp. ${parseInt(selectedProject.donation).toLocaleString('id-ID')} / Rp. ${parseInt(selectedProject.donation_target).toLocaleString('id-ID')}
            `;
        }
    }

    fetch('api/projects/')
        .then(response => response.json())
        .then(res => {
            const data = res.data
            projectData = data
            activeProjects = data
            render(data)
        })
        .catch(error => {
            console.error('Error fetching project data:', error);
        });
</script>

</html>