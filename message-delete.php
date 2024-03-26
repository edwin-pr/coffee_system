<?php
include("core/connection.php");

if (isset($_GET['message'])) {
    $message_id = $_GET['message'];

    mysqli_query($con, "DELETE FROM queries WHERE id = $message_id");
    mysqli_query($con, "DELETE FROM replies WHERE query_id = $message_id");

    echo '<script>window.location.assign("messages.php")</script>';
}