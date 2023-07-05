<?php

include '../db/index.php';
include '../write_login_history/index.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GETリクエストの場合の処理（直接アクセスされた場合）

    // 別のページにリダイレクト
    header("Location: /~g234201/");
    exit;
}

// ユーザー名とパスワードの取得
$username = $_POST["username"];
$password = $_POST["password"];

// パスワードのハッシュ化や認証処理を行う
// ここでは簡略化のため、ユーザー名とパスワードが一致した場合にログインとする
// 実際のアプリケーションでは、データベースからユーザー情報を取得し、ハッシュ化したパスワードと比較するなどの処理を行う

try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND password = ?");
    $stmt->execute([$username, hash('sha256', $password)]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // 認証成功
        // セッションの開始や認証情報の保存などの処理を行う
        // 例えば、セッションを使った認証情報の保存
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['role'] = $row['role'];

        write_login_history($_SESSION['user_id'], $_SESSION['user_name'], 'login');

        // ログイン後のページにリダイレクト
        header("Location: /~g234201/");
        exit;
    } else {
        // 認証失敗
        // ログインページにリダイレクト
        header("Location: /~g234201/login/?error=1");
        exit;
    }
} catch (PDOException $e) {
    // die("ログインに失敗しました: " . $e->getMessage());
}
