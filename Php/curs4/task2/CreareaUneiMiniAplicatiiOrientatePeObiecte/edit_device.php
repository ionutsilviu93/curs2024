<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("UPDATE mobile_devices SET manufacturer = ?, model = ?, price = ?, year_of_production = ? WHERE id = ?");
    $stmt->bind_param("ssdii", $manufacturer, $model, $price, $year, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $device_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM mobile_devices WHERE id = $device_id");

    if ($result && $result->num_rows > 0) {
        $device = $result->fetch_assoc();
    } else {
        echo "Device not found";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Device</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Device</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $device['id']; ?>">
            <label for="manufacturer">Manufacturer:</label>
            <input type="text" name="manufacturer" id="manufacturer" value="<?php echo $device['manufacturer']; ?>" required>
            <br>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="<?php echo $device['model']; ?>" required>
            <br>
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo $device['price']; ?>" required>
            <br>
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" value="<?php echo $device['year_of_production']; ?>" required>
            <br>
            <input type="submit" value="Save Changes" class="btn">
        </form>
    </div>
</body>
</html>
