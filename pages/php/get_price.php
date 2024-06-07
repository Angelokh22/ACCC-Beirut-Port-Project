<?php
include "tools.php";

// Fetch last calculatedPrice from Orders table
$sql = "SELECT calculatedPrice FROM Orders ORDER BY OrderID DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastCalculatedPrice = $row['calculatedPrice'];
    echo "<h2>Last calculated price: $lastCalculatedPrice</h2>";
} else {
    echo "<h2>No results found</h2>";
}
$conn->close();
?>

