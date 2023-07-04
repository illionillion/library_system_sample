<?php

if(!isset($_SESSION)){ session_start(); }

// 権限が管理者以外ならそのページにアクセスさせない
if ($_SESSION['role'] != 0) {
    header('Location: /');
    exit;
}