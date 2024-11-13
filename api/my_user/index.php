<?php
include "../../connection.php";
header('Content-Type: application/json');
session_start();

if (
    isset($_SESSION['user_id']) &&
    isset($_SESSION['user_name']) &&
    isset($_SESSION['user_email']) &&
    isset($_SESSION['user_phone'])
) {
    $id = $_SESSION['user_id'];
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $sql = "DELETE FROM users WHERE id = $id";
        if(mysqli_query($conn, $sql)){
            echo json_encode(["status" => "success"]);
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            
            session_destroy();
        }else{
            echo json_encode(["status" => "failed", "error" => mysqli_error($conn)]);
        }
        exit;
    }
    if (
        isset($_POST['nama']) &&
        isset($_POST['email']) &&
        isset($_POST['phone'])
    ) {
        $name = $_POST['nama'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];


        $sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = $id";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $phone);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_phone'] = $phone;
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failed", "error" => mysqli_stmt_error($stmt)]);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit;
    }
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    $phone = $_SESSION['user_phone'];

    echo json_encode([
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "phone" => $phone
    ]);
} else {
    echo json_encode([
        "status" => "unauthorized",
        "message" => "No active session found"
    ]);
}
