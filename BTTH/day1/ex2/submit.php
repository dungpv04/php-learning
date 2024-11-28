<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = 'questions.txt';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $questions = preg_split('/\r?\n\r?\n/', $content);
        $score = 0;
        $totalQuestions = count($questions);
        echo "<h1>Đáp án bài kiểm tra</h1>";
        echo "<ul>";
        foreach ($questions as $index => $question) {
            preg_match('/ANSWER: ([A-D])/', $question, $matches);
            if (isset($matches[1])) {
                $correctAnswer = $matches[1];
            } else {
                $correctAnswer = '';
            }
            if (isset($_POST["question_$index"])) {
                $userAnswer = $_POST["question_$index"];
            } else {
                $userAnswer = 'Không trả lời';
            }
            if ($userAnswer == $correctAnswer) {
                $score++;
                echo "<li>Câu " . ($index + 1) . ": Đúng</li>";
            } else {
                echo "<li>Câu " . ($index + 1) . ": Sai (Đáp án đúng: $correctAnswer)</li>";
            }
        }
        echo "</ul>";
        echo "<p><strong>Số điểm của bạn là: $score / $totalQuestions</strong></p>";
    } else {
        echo "<p>Không tìm thấy tệp câu hỏi.</p>";
    }
}
?>