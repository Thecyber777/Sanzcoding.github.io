<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = "SzBNZnRldkdTaVNWWCsxUUI4Z0xDb0pqc3YyZzBCcTVIYXU0dG9xbXo1WmtzYnBSYXpaYzg4UE04RUI0cG01cHlnSGpPZ3VQdDhkRUpnaW1MM1RxOUlOdWI4YTcwVXMwd2pqOWE1aE00TDB2NEFRVGM2bktKUHZPMFZURU9yM1RFWmRiV096VEJiNFo2Qy9FT1FmcytsWVpDQkxOV3RWRjM2WHpsSVg5V0tyMzFqSy8zRFFzVVZYMkM4UXpBeElw";
    $header = array("Authorization: Bearer " . $token);

    $id_user_tambah = $_POST["id_user_tambah"];
    $id_user_kurang = $_POST["id_user_kurang"];
    $jumlah = $_POST["jumlah"];
    
    $post_body_tambah = array(
        "id_user" => $id_user_tambah,
        "tipe" => "tambah",
        "jumlah" => $jumlah
    );
    
    $post_body_kurang = array(
        "id_user" => $id_user_kurang,
        "tipe" => "kurang",
        "jumlah" => $jumlah
    );
    
    $ch_tambah = curl_init();
    curl_setopt($ch_tambah, CURLOPT_URL, "https://bukaolshop.net/api/v1/member/saldo");
    curl_setopt($ch_tambah, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch_tambah, CURLOPT_POST, TRUE);
    curl_setopt($ch_tambah, CURLOPT_POSTFIELDS, $post_body_tambah);
    curl_setopt($ch_tambah, CURLOPT_RETURNTRANSFER, true);
    $hasil_tambah = curl_exec($ch_tambah);
    curl_close($ch_tambah);
    
    $ch_kurang = curl_init();
    curl_setopt($ch_kurang, CURLOPT_URL, "https://bukaolshop.net/api/v1/member/saldo");
    curl_setopt($ch_kurang, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch_kurang, CURLOPT_POST, TRUE);
    curl_setopt($ch_kurang, CURLOPT_POSTFIELDS, $post_body_kurang);
    curl_setopt($ch_kurang, CURLOPT_RETURNTRANSFER, true);
    $hasil_kurang = curl_exec($ch_kurang);
    curl_close($ch_kurang);
    
    $respons_tambah = json_decode($hasil_tambah, true);
    $respons_kurang = json_decode($hasil_kurang, true);

    if ($respons_tambah["code"] == 200 && $respons_kurang["code"] == 200) {
        echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembali</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
.header {
    background: #2196F3;
    height: 150px;
    top: 0;
    padding: 15px;
}

a[href*="www.000webhost.com"] {
            display:none;
            color: transparent;
            text-decoration: none;
            pointer-events: none;
        }
.box {
    padding: 30px;
    background-color: white;
    border-radius: 15px;
    margin-top: 45px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}

.box img {
    margin-top: 30px;
}

body {
    background: aliceblue;
}

a {
    text-decoration: none;
}
.dashed-line {
  width: 100%;
  border-bottom: 2px dashed #ccc; 
  margin: 15px 0; 
}

    </style>
</head>
<body class="bg-gray-100">
<div class="header">
    <div class="box">
<div class="flex justify-center items-center">
  <img src="https://cdn-icons-png.flaticon.com/128/7641/7641727.png" class="w-16 h-16" alt="Icon">
</div>
<p class="text-center text-gray-500 font-bold mb-1 mt-1">Sukses</p>
<div class="dashed-line"></div>
    </header>
        <div class="main-item-text">
            <p>Tujuan </p>
            <h6 class="text-gray-500 ">$id_user_tambah</h6>
        </div>
        <div class="main-item-text">
            <p>Pembayaran</p>
            <h6 class="text-gray-500 ">SanzPoint</h6>
        </div>
        <div class="main-item-text font-bold">
            <p>Total Bayar</p>
            <h6 class="text-gray-600 ">Rp$jumlah</h6>
        </div>
  <div class="dashed-line"></div>
  <p class="text-gray-500 text-center">Sanzzolshop</p>
    <div class="dashed-line"></div>
    <p class="main-item-text text-center text-gray-600 mb-5">Terimakasih Telah Menggunakan Sanzzolshop Transaksi Anda Akan Segera Kami Proses</p>
  <div class="grid grid-cols-2 gap-4">
  <button style="background: red;" class="text-white py-2 px-4 rounded-full" onclick="back()">Kembali</button>
  <button style="background: #2196F3;" class="text-white py-2 px-4 rounded-full "onclick="detail()">Detail</button>
</div>
  <button style="background: #fff; color: #2196F3; outline: 1px solid #2196F3;" class="mt-5 py-2 px-4 rounded-full w-full" onclick="bantuan()">Pusat Bantuan</button>
</div>
</div>
</div>
</div>
</div>
</div> 
<script>

const olshop = "https://glizzpedia.olshopku.com"

function bantuan() {
    window.location.href= olshop + '/akun/?page=chat';
}
function back() {
    window.location.href = olshop;
}
function detail() {
    window.location.href = olshop + '/akun/?page=transaksi&nomor{{nomor_pembayaran}}';
}
document.addEventListener('copy', function(event) {
    event.preventDefault();
});
</script>
<script src="https://cdn.jsdelivr.net/gh/danizevaro/javascript@main/style/buyer/rwt.min.js"></script>
</body>
</html>
</html>
HTML;
        exit;
    } else {
        echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembali</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
.header {
    background: #2196F3;
    height: 150px;
    top: 0;
    padding: 15px;
}

a[href*="www.000webhost.com"] {
            display:none;
            color: transparent;
            text-decoration: none;
            pointer-events: none;
        }
.box {
    padding: 30px;
    background-color: white;
    border-radius: 15px;
    margin-top: 45px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}

.box img {
    margin-top: 30px;
}

body {
    background: aliceblue;
}

a {
    text-decoration: none;
}
.dashed-line {
  width: 100%;
  border-bottom: 2px dashed #ccc; 
  margin: 15px 0; 
}

    </style>
</head>
<body class="bg-gray-100">
<div class="header">
    <div class="box">
<div class="flex justify-center items-center">
  <img src="https://cdn-icons-png.flaticon.com/128/7641/7641727.png" class="w-16 h-16" alt="Icon">
</div>
<p class="text-center text-gray-500 font-bold mb-1 mt-1">Gagal</p>
<div class="dashed-line"></div>
    </header>
        <div class="main-item-text">
            <p>Tujuan </p>
            <h6 class="text-gray-500 ">$id_user_tambah</h6>
        </div>
        <div class="main-item-text">
            <p>Pembayaran</p>
            <h6 class="text-gray-500 ">SanzPoint</h6>
        </div>
        <div class="main-item-text font-bold">
            <p>Total Bayar</p>
            <h6 class="text-gray-600 ">Rp$jumlah</h6>
        </div>
  <div class="dashed-line"></div>
  <p class="text-gray-500 text-center">Sanzzolshop</p>
    <div class="dashed-line"></div>
    <p class="main-item-text text-center text-gray-600 mb-5">Terimakasih Telah Menggunakan Sanzzolshop Transaksi Anda Akan Segera Kami Proses</p>
  <div class="grid grid-cols-2 gap-4">
  <button style="background: red;" class="text-white py-2 px-4 rounded-full" onclick="back()">Kembali</button>
  <button style="background: #2196F3;" class="text-white py-2 px-4 rounded-full "onclick="detail()">Detail</button>
</div>
  <button style="background: #fff; color: #2196F3; outline: 1px solid #2196F3;" class="mt-5 py-2 px-4 rounded-full w-full" onclick="bantuan()">Pusat Bantuan</button>
</div>
</div>
</div>
</div>
</div>
</div> 
<script>

const olshop = "https://glizzpedia.olshopku.com"

function bantuan() {
    window.location.href= olshop + '/akun/?page=chat';
}
function back() {
    window.location.href = olshop;
}
function detail() {
    window.location.href = olshop + '/akun/?page=transaksi&nomor{{nomor_pembayaran}}';
}
document.addEventListener('copy', function(event) {
    event.preventDefault();
});
</script>
<script src="https://cdn.jsdelivr.net/gh/danizevaro/javascript@main/style/buyer/rwt.min.js"></script>
</body>
</html>
HTML;
        exit;
    }
} else {
    echo <<<HTML
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
    a[href*="www.000webhost.com"] {
            display:none;
            color: transparent;
            text-decoration: none;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">404</h1>
        <p class="text-xl text-gray-600 mb-8">Halaman Tidak Ditemukan</p>
        <a href="/" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Kembali ke Beranda</a>
    </div>
</body>
</html>
HTML;
}
?>