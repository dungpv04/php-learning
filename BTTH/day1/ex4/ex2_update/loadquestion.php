<?php
$conn = new mysqli("localhost", "root", "", "QUESTIONS");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Id, QuestionTitle, OptionA, OptionB, OptionC, OptionD, CorrectAnswers FROM QuestionList";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $correctAnswers = explode(',', $row["CorrectAnswers"]);
        $inputType = count($correctAnswers) > 1 ? 'checkbox' : 'radio';

        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<p class='fw-bold'>Câu " . $row["Id"] . ": " . htmlspecialchars($row["QuestionTitle"]) . "</p>";
        echo "<div class='options'>";
        foreach (['A', 'B', 'C', 'D'] as $option) {
            $optionText = htmlspecialchars($row["Option$option"]);
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='$inputType' name='question_{$row["Id"]}[]' id='question_{$row["Id"]}_$option' value='$option'>";
            echo "<label class='form-check-label' for='question_{$row["Id"]}_$option'>$optionText</label>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='text-danger'>Chưa có câu hỏi</p>";
}

$conn->close();