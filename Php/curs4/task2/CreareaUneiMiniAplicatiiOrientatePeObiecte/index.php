<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Devices</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Mobile Devices</h1>
        <a href="add_device.php" class="btn">Add New Device</a>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Entry Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $devices = $conn->query("SELECT * FROM mobile_devices");
                if ($devices && $devices->num_rows > 0) {
                    while ($row = $devices->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['manufacturer'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['year_of_production'] . "</td>";
                        echo "<td>" . $row['entry_datetime'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit_device.php?id=" . $row['id'] . "' class='btn'>Edit</a>";
                        echo "<a href='delete_device.php?id=" . $row['id'] . "' class='btn'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No devices found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>