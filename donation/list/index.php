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
    <header class="flex justify-between items-center p-6 z-50 flex-row">
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
            Selamat datang di portal kampus peduli UPNVJ<br />
            Donasi aman dan mudah
        </h1>
        <div class="w-[90vw] lg:w-[80vw] bg-[#F8F4E8] mx-auto rounded-t-[35px] px-4 lg:px-16 py-10 text-black">
            <h1 class="font-bold text-xl lg:text-2xl">Donasi yang diterima</h1>
            <div class="overflow-x-auto mt-8">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-md font-medium text-gray-700">ID</th>
                            <th class="px-4 py-2 text-left text-md font-medium text-gray-700">Donor Name</th>
                            <th class="px-4 py-2 text-left text-md font-medium text-gray-700">Donation Amount</th>
                            <th class="px-4 py-2 text-left text-md font-medium text-gray-700">Date</th>
                            <th class="px-4 py-2 text-left text-md font-medium text-gray-700">Payment Method</th>
                            <th class="px-4 py-2 text-left text-md font-medium text-gray-700">Donation Message</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-4 py-2 text-md text-gray-900">1</td>
                            <td class="px-4 py-2 text-md text-gray-900">John Doe</td>
                            <td class="px-4 py-2 text-md text-gray-900">$100</td>
                            <td class="px-4 py-2 text-md text-gray-900">2024-11-10</td>
                            <td class="px-4 py-2 text-md text-gray-900">Credit Card</td>
                            <td class="px-4 py-2 text-md text-gray-900">For the community center</td>
                        </tr>
                        <tr class="bg-gray-50 border-t hover:bg-gray-100">
                            <td class="px-4 py-2 text-md text-gray-900">2</td>
                            <td class="px-4 py-2 text-md text-gray-900">Jane Smith</td>
                            <td class="px-4 py-2 text-md text-gray-900">$50</td>
                            <td class="px-4 py-2 text-md text-gray-900">2024-11-09</td>
                            <td class="px-4 py-2 text-md text-gray-900">PayPal</td>
                            <td class="px-4 py-2 text-md text-gray-900">For education fund</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
        function formatRupiah(number) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(number);
        }
        fetch("../../api/donation/")
            .then(x => x.json())
            .then(donations => {
                const tbody = document.getElementById("table-body")
                tbody.innerHTML = donations.map(donation => {
                    const date = new Date(donation.created_at)
                    const year = date.getFullYear();
                    const month = date.getMonth() + 1; // Months are zero-indexed (0-11), so add 1 to display correctly
                    const day = date.getDate();
                    const formattedDate = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
                    return `
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-4 py-2 text-md text-gray-900">${donation.id}</td>
                            <td class="px-4 py-2 text-md text-gray-900">${donation.donor_name}</td>
                            <td class="px-4 py-2 text-md text-gray-900">${formatRupiah(donation.total_donations)}</td>
                            <td class="px-4 py-2 text-md text-gray-900">${formattedDate}</td>
                            <td class="px-4 py-2 text-md text-gray-900">${donation.payment}</td>
                            <td class="px-4 py-2 text-md text-gray-900">${donation.donation_message}</td>
                        </tr>
                `
                })
            })
    </script>
</body>

</html>