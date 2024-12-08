<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kampus Peduli UPNVJ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet" />
    <style>
        * {
            font-family: "Josefin Sans", sans-serif;
        }
        *::selection{
            background-color: #EC5A49;
        }
    </style>
</head>

<body class="bg-teal-900 text-white">
    <div id="addProjectPopUp"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full text-center z-50 flex flex-col">
            <button id="closeAddProjectPopup" class="text-[#EC5A49] px-4 py-2 rounded-lg ml-auto text-2xl">
                x
            </button>
            <h1 class="text-black mb-4">Tambahkan Project</h1>
            <input type="file" class="hidden" id="upload-image" />
            <input type="file" class="hidden" id="upload-image2" />
            <input type="file" class="hidden" id="upload-image3" />
            <div class="mx-2 cursor-pointer" onclick="document.getElementById('upload-image').click()">
                <img id="add-image-jpg" class="w-full h-48 object-cover" src="../../add-image2.jpg" />
            </div>
            <div class="flex flex-col mt-4">
                <h1 class="font-bold text-md text-black mr-auto">Judul Project</h1>
                <input id="title" placeholder="Membantu banjir" type="text"
                    class="border-2 text-md border-gray-400 text-gray-400 rounded-xl bg-white px-6 py-3" />
            </div>
            <div class="flex flex-col mt-4">
                <h1 class="font-bold text-md text-black mr-auto">Deskripsi</h1>
                <textarea rows="4" id="description" placeholder="Menjaga banjir" type="text"
                    class="border-2 text-md border-gray-400 text-gray-400 rounded-xl bg-white px-6 py-3"></textarea>
            </div>
            <h1 class="font-bold text-md text-black mr-auto mt-4">Category</h1>
            <div class="bg-white px-6 rounded-full flex text-black">
                <select id="categoryAdd" name="category"
                    class="py-3 text-lg w-full max-w-[300px] rounded-full focus:outline-none">
                    <option value="Pendidikan">Dana Pendidikan</option>
                    <option value="Bencana Alam">Dana Bencana Alam</option>
                    <option value="Sosial">Dana sosial</option>
                </select>
            </div>

            <h1 class="font-bold text-md text-black mr-auto mt-4">Dokumentasi Project</h1>
            <div class="mx-2 cursor-pointer flex gap-4">
                <img id="add-image-jpg2" class="w-48 h-36 object-cover" src="../../add-image3.jpg"
                    onclick="document.getElementById('upload-image2').click()" />
                <img id="add-image-jpg3" class="w-48 h-36 object-cover" src="../../add-image3.jpg"
                    onclick="document.getElementById('upload-image3').click()" />
            </div>
            <div class="flex mt-4 justify-center items-center gap-2">
                <span class="text-black text-sm">Nominal Target Donasi:</span>
                <input id="target" placeholder="Rp. 5.000.000,00" type="text"
                    class="ml-auto border-2 text-md border-gray-400 text-gray-400 rounded-xl bg-white px-6 py-3" />
            </div>
            <div class="flex justify-center items-center mt-4">
                <a class="cursor-pointer bg-[#EC5A49] text-white px-8 py-3 rounded-lg mb-4 inline-flex items-center font-bold hover:opacity-50 active:scale-97 duration-300 mx-4"
                    onclick="document.getElementById('addProjectPopup').classList.add('hidden')"> Cancel</a>
                <a class="bg-[#EC5A49] text-white px-8 py-3 rounded-lg mb-4 inline-flex items-center font-bold hover:opacity-50 active:scale-97 duration-300 mx-4"
                    onclick="uploadProject()" href="#"> Buat</a>
            </div>
        </div>
    </div>
    <div id="detailProjectPopUp"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
        <div class="bg-teal-900 rounded-lg p-6 max-w-[900px] w-full text-center z-50 flex flex-col">
            <button id="closeDetailProjectPopup" class="text-[#EC5A49] px-4 py-2 rounded-lg text-2xl ml-auto">
                x
            </button>
            <div class="flex flex-row gap-12">
                <div class="w-full max-w-[500px]">
                    <div class="mb-4 rounded-lg w-full h-60 overflow-hidden">
                        <img alt="${project.title}"
                            class="mb-4 rounded-lg w-full h-60 object-cover hover:scale-125 hover:cursor-pointer active:cursor-pointer duration-500"
                            src="../../project1.webp" />
                    </div>
                </div>
                <div class="flex flex-col items-start">
                    <span class="bg-[#EC5A49] px-5 py-2 rounded-full">
                        Bantuan Pendidikan
                    </span>
                    <h1 class="text-xl font-bold text-left mt-4">
                        Membantu Anak Anak Mendapatkan Pendidikan Yang Lebih Layak
                    </h1>
                    <p class="text-lg mt-4 text-left font-light">
                        Pendidikan adalah kunci untuk mengubah hidup. Dengan mendukung kampanye ini, Donasi Anda akan
                        digunakan untuk membangun sekolah, melatih guru, dan menyediakan fasilitas belajar yang memadai.
                    </p>
                </div>
            </div>
            <div class="text-xl font-bold my-4 text-center mb-4">
                <h1 class="mb-4">
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
                <p class="text-sm mr-auto">
                    Terkumpul Rp. ${parseInt(project.donation).toLocaleString('id-ID')} / Rp.
                    ${parseInt(project.donation_target).toLocaleString('id-ID')}
                </p>
            </div>
            <div class="text-center ml-auto mt-8">
                <a class="bg-[#EC5A49] text-white px-24 py-6 rounded-lg mb-4 inline-flex items-center font-bold hover:opacity-50 active:scale-97 duration-300 lg:mr-auto mx-auto lg:ml-0"
                    href="../../donation"> Donasi</a>
            </div>
        </div>
    </div>
    <script>
        window.user = {}
    </script>
    <header class="flex justify-between items-center p-6 z-50">
        <div class="text-lg font-bold ml-4 lg:ml-16">
            <img src="../../logo.svg" />
        </div>
        <nav class="space-x-2 items-center justify-center w-full lg:space-x-6 -ml-48 flex flex-row ml-auto mr-auto">
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="../../">
                Home
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg duration-300" href="../../contact/">
                Contact
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap duration-300" href="../../about_us/">
                About Us
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap" href="../../donation/list/">
                List Donasi
            </a>
            <a class="text-white hover:text-red-500 text-md lg:text-lg text-nowrap mr-auto" href="../../login/"
                id="login-btn">
                Masuk / Daftar
            </a>
            <script>
                fetch("../../api/my_user/", {
                    credentials: "include"
                })
                    .then(x => x.json())
                    .then(res => {
                        if (res.id) {
                            window.user = res
                            const loginBtn = document.getElementById("login-btn")
                            loginBtn.innerText = "Dashboard"
                            loginBtn.href = "/dashboard"
                        }
                    })
            </script>
        </nav>
    </header>
    <div
        class="bg-[url('../../donation.webp')] bg-cover h-screen w-screen max-w-screen brightness-[70%] fixed top-0 -z-10">
    </div>
    <div>
        <h1 class="text-2xl lg:text-4xl text-center mt-36 lg:mt-72 mb-16">
            Bosan scrolling timeline? Yuk, ganti jadi scrolling kebaikan<br />
            Donasi sekarang dan rasakan sensasi jadi orang baik!
        </h1>
        <div class="w-[90vw] lg:w-[90vw] bg-[#F8F4E8] mx-auto rounded-t-[35px] px-4 lg:px-16 py-10 text-black">
            <h1 class="font-bold text-center text-xl lg:text-2xl">Carilah donasi sebanyak mungkin</h1>
            <div class="flex justify-center gap-x-8 mt-8">
                <input id="search" type="text" class="py-3 px-6 text-lg w-full max-w-[500px] rounded-full" onchange=""
                    placeholder="Tuliskan judul donasi yang ingin dicari...">
                <div class="bg-white px-6 rounded-full flex justify-center items-center">
                    <select id="category" name="category" id="category"
                        class="py-3 text-lg w-full max-w-[300px] rounded-full focus:outline-none">
                        <option value="Semua">Semua</option>
                        <option value="Pendidikan">Dana Pendidikan</option>
                        <option value="Bencana Alam">Dana Bencana Alam</option>
                        <option value="Sosial">Dana sosial</option>
                    </select>
                </div>
                <div id="add-project" class="">
                    <button
                        class="bg-[#EC5A49] text-white px-4 py-4 rounded-lg hover:opacity-50 active:scale-97 duration-300">Tambahkan
                        Project <span class="text-3xl">+</span></button>
                </div>
            </div>
            <div class="mt-8">
                <div id="project-container"
                    class="flex flex-row flex-wrap justify-center gap-5 transition-transform duration-300 ease-linear">
                </div>
            </div>
        </div>
    </div>
    <script>
        const addProjectPopup = document.getElementById('addProjectPopUp');
        const detailProjectPopUp = document.getElementById('detailProjectPopUp');
        const showPopupButton = document.getElementById('add-project');
        const closeAddProjectPopup = document.getElementById('closeAddProjectPopup');
        const closeDetailProjectPopup = document.getElementById('closeDetailProjectPopup')
        showPopupButton.addEventListener("click", (e) => {
            addProjectPopup.classList.remove("hidden")
        })
        closeAddProjectPopup.addEventListener('click', function () {
            addProjectPopup.classList.add('hidden');
            console.log("closing")
        });
        closeDetailProjectPopup.addEventListener('click', () => {
            detailProjectPopUp.classList.add('hidden');
            console.log("closing detail project")
        })
        window.addEventListener('click', function (e) {
            if (e.target === addProjectPopup) {
                addProjectPopup.classList.add('hidden');
            }
        });

    </script>
</body>
<script>
    let projectData = [];
    const search = document.getElementById("search")
    const category = document.getElementById("category")
    const target = document.getElementById("target")
    function uploadProject() {
            const uploadImage = document.getElementById("upload-image")
            const uploadImage2 = document.getElementById("upload-image2")
            const uploadImage3 = document.getElementById("upload-image3")
            const target = document.getElementById("target")
            const title = document.getElementById("title")
            const description = document.getElementById("description")
            const categoryAdd = document.getElementById("categoryAdd")
            const formData = new FormData();
            formData.append('mainImage', uploadImage.files[0])
            formData.append('documentation1', uploadImage2.files[0])
            formData.append('documentation2', uploadImage3.files[0])
            formData.append('title', title.value)
            formData.append('category', category.value)
            formData.append('description', description.value)
            formData.append('target', target.value)
            fetch("../../api/projects/", {
                method: "POST",
                body: formData
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    const addProjectPopup = document.getElementById('addProjectPopUp');
                    addProjectPopup.classList.add("hidden")
                    projectData.unshift({
                        id: projectData.length,
                        title: title.value,
                        description: description.value,
                        category: category.value,
                        donation: 0,
                        donation_target: target.value
                    })
                    render(projectData)
                }
            })
        }
    target.addEventListener("keydown", (event) => {
        const key = event.key;
        if (isNaN(parseInt(key)) && key !== "Backspace" && key !== "Delete") {
            event.preventDefault();
        }
    })
    const uploadImage = document.getElementById("upload-image")
    const uploadImage2 = document.getElementById("upload-image2")
    const uploadImage3 = document.getElementById("upload-image3")
    let activeImage;
    uploadImage.addEventListener("change", (e) => {
        const files = e.target.files;
        if (files.length > 0) {
            console.log('Selected file:');
            console.log(files[0]);
            const blobUrl = URL.createObjectURL(files[0]);
            document.getElementById("add-image-jpg").src = blobUrl
            activeImage = files[0]
        }
    })
    uploadImage2.addEventListener("change", (e) => {
        const files = e.target.files;
        if (files.length > 0) {
            console.log('Selected file:');
            console.log(files[0]);
            const blobUrl = URL.createObjectURL(files[0]);
            document.getElementById("add-image-jpg2").src = blobUrl
            activeImage = files[0]
        }
    })
    uploadImage3.addEventListener("change", (e) => {
        const files = e.target.files;
        if (files.length > 0) {
            console.log('Selected file:');
            console.log(files[0]);
            const blobUrl = URL.createObjectURL(files[0]);
            document.getElementById("add-image-jpg3").src = blobUrl
            activeImage = files[0]
        }
    })

    search.addEventListener("input", (e) => {
        const searchTerm = e.target.value
        let result = []
        projectData.forEach(d => {
            if (d.category === category.value || category.value === "Semua") {
                if (d.title.toLowerCase().includes(searchTerm.toLowerCase())) {
                    result.push(d)
                } else if (d.description.toLowerCase().includes(searchTerm.toLowerCase())) {
                    result.push(d)
                }
            }
        })
        render(result)
    })
    category.addEventListener("change", (e) => {
        const searchTerm = search.value
        let result = []
        projectData.forEach(d => {
            if (d.category === e.target.value || category.value === "Semua") {

                if (d.title.toLowerCase().includes(searchTerm.toLowerCase())) {
                    result.push(d)
                } else if (d.description.toLowerCase().includes(searchTerm.toLowerCase())) {
                    result.push(d)
                }
            }
        })
        render(result)
    })

    function render(data) {
        const container = document.getElementById('project-container');
        container.innerHTML = '';
        if (data.length == 0) {
            container.innerHTML = `
            <h1 class="text-xl my-8">Project tidak ditemukan</h1>
            `;
            return
        }
        let html = ``
        data.forEach(project => {
            const progress = (project.donation / project.donation_target) * 100;
            const projectHTML = `
                    <div id="card-project" 
                        class="bg-teal-900 text-white rounded-lg h-[540px] max-w-[450px]"
                        data-id="${project.id}"
                        onclick="showProjectDetail(${project.id})">
                        <div class="relative mb-4 rounded-lg w-full h-48 overflow-hidden">
                            <img alt="${project.title}" class="mb-4 rounded-lg w-full h-48 object-cover hover:scale-125 hover:cursor-pointer active:cursor-pointer duration-500"
                            src="../../uploads/project-${project.id}/main.jpg" />
                            <div id="add-project" class="absolute top-[10px] right-[10px]">
                                <button class="bg-[#EC5A49] text-white px-4 py-4 rounded-lg hover:cursor-pointer hover:opacity-70 active:scale-97 duration-300">Update</button>
                            </div>
                        </div>
                        <div class="py-6 px-9 flex flex-col h-[320px]">
                            <span class="bg-[#EC5A49] px-4 rounded-full mr-auto">Bantuan ${project.category}</span>
                            <h3 class="text-xl font-bold my-2 text-left hover:text-slate-400 hover:cursor-pointer active:cursor-pointer duration-300">
                                ${project.title}
                            </h3>
                            <p class="text-lg mb-4 text-left font-light text-ellipsis line-clamp-3">
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
                                    <a class="bg-[#EC5A49] text-white px-5 py-3 rounded-lg mb-4 inline-flex items-center font-bold hover:opacity-50 active:scale-97 duration-300 lg:mr-auto mx-auto lg:ml-0" 
                                    href="../../donation"> Donasi</a>
                                </div>
                            </div>
                        </div>
                    </div>`
                ;
            html = html + projectHTML
        });
        container.innerHTML = html;
    }

    fetch('../../api/projects/')
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

    function showProjectDetail(projectId) {
        const selectedProject = projectData.find(project => parseInt(project.id) === projectId);
        if (selectedProject) {
            // Menghitung progress donasi
            const progress = (selectedProject.donation / selectedProject.donation_target) * 100;
            document.getElementById('detailProjectPopUp').classList.remove('hidden');
            // Update konten pop-up dengan data proyek
            document.querySelector('#detailProjectPopUp img').src = `../../uploads/project-${selectedProject.id}/main.jpg`;
            document.querySelector('#detailProjectPopUp img').alt = selectedProject.title;
            document.querySelector('#detailProjectPopUp h1.text-xl').innerText = selectedProject.title;
            document.querySelector('#detailProjectPopUp p.text-lg').innerText = selectedProject.description;
            document.querySelector('#detailProjectPopUp span').innerText = `Bantuan ${selectedProject.category}`;
            document.querySelector('#progress').style.width = `${progress}%`;
            console.log(document.getElementById('doc1'))
            document.getElementById('doc1').src = `../../uploads/project-${selectedProject.id}/doc1.jpg`;
            document.getElementById('doc2').src = `../../uploads/project-${selectedProject.id}/doc2.jpg`;
            document.querySelector('#detailProjectPopUp p.text-sm').innerText = `Terkumpul Rp. ${parseInt(selectedProject.donation).toLocaleString('id-ID')} / Rp. ${parseInt(selectedProject.donation_target).toLocaleString('id-ID')}
            `;
        }
    }

</script>

</html>