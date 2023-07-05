<?php

include '../api/write_login_history/index.php';

// セッションの開始
session_start();

write_login_history($_SESSION['user_id'], $_SESSION['user_name'], 'logout');

// セッションの破棄
session_destroy();

// ログアウト後のリダイレクト先に適切なページを指定する
header("Location: /~g234201/login/");
exit;
