<?php 
    $conn = new mysqli("localhost", "root", "", "FLOWERS");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT Id, Name, Description, Image FROM FlowerList";
    $result = $conn->query($sql);
    session_start();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Description"]) . "</td>";
            echo('<td><a href="../'.$row['Image'].'">'.$row['Image'].'</a></td>');
            echo('<td><a href="edit.php?id='.$row['Id'].'"class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>');
			echo('<a href="delete.php?id='.$row['Id'].'" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>');
            echo "</tr>";
            $_SESSION['data'][$row['Id']] = [
                'name'=> $row['Name'],
                'description'=> $row['Description'],
                'image'=> $row['Image']
            ];
        }
        

    } else {
        echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu</td></tr>";
    }
?>