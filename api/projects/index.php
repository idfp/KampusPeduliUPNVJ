<?php
include "../../connection.php";
header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');
session_start();

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