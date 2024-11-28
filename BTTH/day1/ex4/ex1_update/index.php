<?php
    include("flowers.php");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Danh sách những loài hoa</h1>
        <?php 
            foreach($flowers as $index => $flower){
                $realIndex = $index + 1;
                echo ('<h2>'.$realIndex.'. '.$flower['name'].'</h2>
                    <p>'.$flower['description'].'</p>
                    <a href="'.$flower['image'].'">
                        <img src="'.$flower['image'].'" alt="Hoa Đỗ Quyên">
                    </a>'
                );
            }
        ?>
    </div>
</body>
</html>
