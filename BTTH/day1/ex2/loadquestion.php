<?php
$file = 'questions.txt';
if (file_exists($file)) {
    $content = file_get_contents($file);
    $questions = preg_split('/\r?\n\r?\n/', $content);
    foreach ($questions as $index => $question) {
        preg_match('/ANSWER: ([A-D])/', $question, $answerMatch);
        if (isset($answerMatch[1])) {
            $answer = $answerMatch[1];
        } else {
            $answer = '';
        }
        $questionText = preg_replace('/ANSWER: [A-D]/', '', $question);
        $lines = array_filter(array_map('trim', explode("\n", $questionText)));
        $questionText = array_shift($lines);
        $options = $lines;
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<p class='fw-bold'>Câu " . ($index + 1) . ": " . htmlspecialchars($questionText) . "</p>";
        echo "<div class='options'>";
        foreach ($options as $option) {
            $optionKey = substr(trim($option), 0, 1);
            $optionText = substr(trim($option), 3);
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='radio' name='question_$index' id='question_{$index}_$optionKey' value='$optionKey'>";
            echo "<label class='form-check-label' for='question_{$index}_$optionKey'>";
            echo htmlspecialchars($optionText);
            echo "</label>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='text-danger'>Lỗi load file câu hỏi.</p>";
}