<?php
// session dimulai
session_start();
include("config.php");
$email = $_POST['email'];
$password = $_POST['password'];

if($email != '' && $password != ''){
    // query untuk mengecek apakah ada data user dengan email dan password yang dikirim dari form
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query); // ambil data dari hasil query
    
    if(mysqli_num_rows($query) < 1){
        // buat sebuah cookie untuk menampung data pesan kesalahan
        setcookie("message", "Maaf, email atau password salah", time()+60);
        header("location: index.php"); // redirect ke halaman index.php
    }else{
        echo $data['email'] . $data['password'];
        $_SESSION['email'] = $data['email']; // set session email
        $_SESSION['nama'] = $data['nama']; // set session nama
        setcookie("message", "", time()-60); // delete cookie message
        header("location: reservasi.php"); // redirect ke halaman welcome.php
    }
}else{
    setcookie("message", "Email atau Password kosong", time()+60);
    header("location: index.php"); // redirect ke halaman index.php
}
?>