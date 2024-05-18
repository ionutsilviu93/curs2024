<?php
require_once 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $device_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM mobile_devices WHERE id = ?");
    $stmt->bind_param("i", $device_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
