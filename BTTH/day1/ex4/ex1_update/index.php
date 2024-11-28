<?php
    include("header.php");
    include("flowers.php");
?>



<div class="container">
    <h1>Danh sách những loài hoa</h1>
    <?php 
        foreach($flowers as $index => $flower){
            $realIndex = $index + 1;
            echo ('<h2>'.$realIndex.'. '.$flower['name'].'</h2>
                <p>'.$flower['description'].'</p>
                <a href="'.$flower['image'].'">
                    <img src="'.$flower['image'].'" alt="'.$flower['name'].'">
                </a>'
            );
        }
    ?>
</div>

