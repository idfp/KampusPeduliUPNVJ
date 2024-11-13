<?php

include "../../connection.php";
header('Content-Type: application/json');

if (
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row["password"] === hash('sha256', $password)) {
            $_SESSION['user_id'] = $row["id"];
            $_SESSION['user_name'] = $row["name"];
            $_SESSION['user_email'] = $row["email"];
            $_SESSION['user_phone'] = $row["phone"];
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failed", "error" => "Wrong Credentials"]);
        }
    } else {
        echo json_encode(["status" => "failed", "error" => "Wrong Credentials"]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(["status" => "unauthorized"]);
}