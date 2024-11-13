<?php

include "../../connection.php";
header('Content-Type: application/json');
session_start();

if (
    isset($_POST['name']) &&
    isset($_POST['phone']) &&
    isset($_POST['nominal']) &&
    isset($_POST['payment'])
) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $nominal = $_POST['nominal'];
    $payment = $_POST['payment'];
    $msg = isset($_POST['msg']) ? $_POST['msg'] : '';
    $status = "completed";
    $id = $_SESSION['user_id'];

    $sql = "INSERT INTO donations(user_id, donor_name, total_donations, payment, donation_message, status) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $nominal, $payment, $msg, $status);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "failed", "error" => mysqli_stmt_error($stmt)]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    $sql = "SELECT * FROM donations";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $donations = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $donations[] = $row;
        }
        echo json_encode($donations);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to fetch data"]);
    }
    mysqli_close($conn);
}