<?php
include 'connection.php';

$phone = $_SESSION['supplier_number'];

$user = mysqli_query($con,"SELECT * FROM suppliers WHERE supplierphone = '$phone'");
$row=mysqli_fetch_array($user);

//fetch patchment
$supplier_id = $row['id'];
$sql = "SELECT MONTH(created_at) AS month, SUM(quantity) AS total_kgs 
        FROM parchment 
        WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND supplier = $supplier_id 
        GROUP BY MONTH(created_at)";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array_fill(1, 12, 0);
    while($row = mysqli_fetch_array($result)) {
        $data[$row['month']] = $row['total_kgs'];
    }
    //echo json_encode(array_values($data));
    // Construct the JSON string manually
    $json_array = '[' . implode(',', array_values($data)) . ']';

    // Output the JSON string
    echo $json_array;
}