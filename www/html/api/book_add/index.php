<?php

include '../session_check/index.php';
include '../role_check/index.php';
include '../db/index.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GETリクエストの場合の処理（直接アクセスされた場合）

    // 別のページにリダイレクト
    header("Location: /~g234201/");
    exit;
}

$bookname = $_POST["bookname"];
$book_category = $_POST["book_category"];
$regist_id = $_SESSION["user_id"];

try {
    $stmt = $pdo->prepare("INSERT INTO books (book_name, book_category, regist_date, regist_id) VALUES (?, ?, now(), ?)");
    $stmt->execute([$bookname, $book_category, $regist_id]);

    // 成功した場合の処理（例: メッセージを表示）
    // echo "従業員データを正常に登録しました。";
    header("Location: /~g234201/book_add/");
} catch (PDOException $e) {
    // echo $e->getMessage();
    header("Location: /~g234201/book_add/?error=1");
}