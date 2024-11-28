<?php
$csvFile = 'accounts.csv';
if (file_exists($csvFile)) {
    $handle = fopen($csvFile, "r");
    if ($handle !== false) {
        $header = fgetcsv($handle);
        while (true) {
            $data = fgetcsv($handle);
            if ($data === false) {
                break;
            }
            echo "<tr>";
            foreach ($data as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
        fclose($handle);
    } else {
        echo "<tr><td colspan='7' class='text-center'>Lỗi không mở file được.</td></tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>File không tồn tại.</td></tr>";
}