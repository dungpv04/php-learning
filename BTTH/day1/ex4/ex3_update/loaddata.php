<?php
$conn = new mysqli("localhost", "root", "", "STUDENT");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT UserName, Password, LastName, FirstName, City, Email, Course FROM Accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["UserName"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Password"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["LastName"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["FirstName"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["City"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Course"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No data found</td></tr>";
}

$conn->close();
?>