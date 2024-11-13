<?php
include "../../connection.php";
header('Content-Type: application/json');
if (
    isset($_POST['nama']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['phone'])
) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users(name, email, password, phone) VALUES(?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $phone);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "failed", "error" => mysqli_stmt_error($stmt)]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    
    echo "{\"status\": \"unauthorized\n\"}";
}