<?php
$fileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

if ($fileType != "csv") {
    die("Only CSV files are allowed.");
}

if (($handle = fopen($_FILES["file"]["tmp_name"], "r")) !== FALSE) {
    $conn = new mysqli("localhost", "root", "", "STUDENT");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $headers = fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $stmt = $conn->prepare("INSERT INTO Accounts (UserName, Password, LastName, FirstName, City, Email, Course) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
        $stmt->execute();
    }
    fclose($handle);

    $conn->close();
    echo "The file data has been processed and stored.";
} else {
    echo "Sorry, there was an error processing your file.";
}
header("Location: index.php");
exit();
?>