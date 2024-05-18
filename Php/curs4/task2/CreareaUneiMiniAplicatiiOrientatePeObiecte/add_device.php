<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $entry_datetime = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO mobile_devices (manufacturer, model, price, year_of_production, entry_datetime) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdis", $manufacturer, $model, $price, $year, $entry_datetime);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Device</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Device</h1>
        <form action="" method="POST">
            <label for="manufacturer">Manufacturer:</label>
            <input type="text" name="manufacturer" id="manufacturer" required>
            <br>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" required>
            <br>
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" required>
            <br>
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" required>
            <br>
            <input type="submit" value="Save" class="btn">
        </form>
    </div>
</body>
</html>
