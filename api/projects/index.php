<?php
include "../../connection.php";
header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');
session_start();

if (
    isset($_POST['name']) &&
    isset($_POST['phone']) &&
    isset($_POST['nominal']) &&
    isset($_POST['payment'])
) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $mainImage = $_FILES['mainImage'];
    $documentation = $_FILES['documentation1'];
    $documentation2 = $_FILES['documentation2'];
    $target = $_POST['target'];

    $sql = "INSERT INTO project(title, description, category, donation_target) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $nominal, $payment, $msg, $status);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "failed", "error" => mysqli_stmt_error($stmt)]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
$sql = 'SELECT * FROM project';
$result = mysqli_query($conn, $sql);

if (!$result)
{
    echo json_encode([
        'status' => 'error',
        'message' => 'Query failed' . mysqli_error($conn)
    ]);
    exit;
}

$projects = [];

while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = [
        "id" => $row['id'],
        "title" => $row['title'],
        "description" => $row['description'],
        "category" => $row['category'],
        "donation" => (float) $row['donation'],
        "donation_target" => (float) $row['donation_target']
    ];
}

echo json_encode([
    'status' => 'success',
    'data' => $projects
]);

mysqli_close($conn);

?>