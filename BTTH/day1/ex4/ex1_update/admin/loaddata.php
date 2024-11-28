<?php 
    $conn = new mysqli("localhost", "root", "", "FLOWERS");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT Name, Description, Image FROM FlowerList";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Description"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Image"]) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu</td></tr>";
    }
?>