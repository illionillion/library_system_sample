<?php

include '../session_check/index.php';
include '../role_check/index.php';
include '../db/index.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GETリクエストの場合の処理（直接アクセスされた場合）

    // 別のページにリダイレクト
    header("Location: /");
    exit;
}

$username = $_POST["username"];
$password = hash('sha256',$_POST["password"]);
$phone_number = $_POST["phone_number"];
$email = $_POST["email"];
$role = $_POST["role"];

// INSERT文の実行
try {
    $stmt = $pdo->prepare("INSERT INTO users (user_name, password, phone_number, email, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$username, $password, $phone_number, $email, $role]);

    // 成功した場合の処理（例: メッセージを表示）
    // echo "従業員データを正常に登録しました。";
    header("Location: /user_add/");
    exit;
} catch (PDOException $e) {
    // エラーが発生した場合の処理
    header("Location: /user_add/?error=1");
    // die("従業員データの登録に失敗しました: " . $e->getMessage());
    exit;
}
