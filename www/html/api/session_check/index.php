<?php

// セッションの開始
if(!isset($_SESSION)){ session_start(); }

// セッションにuser_idが存在するかチェック
if (!isset($_SESSION['user_id'])) {
    // セッションがない場合はlogin.phpへリダイレクト
    header("Location: /~g234201/login/");
    exit;
}

// セッションがある場合は何も処理しない
