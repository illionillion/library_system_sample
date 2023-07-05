<?php

function write_login_history($user_id, $user_name, $mode)
{
    // $file_path = 'login_history.json';
    $file_path = __DIR__ . '/login_history.json';

    // JSONファイルの内容を読み込む
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $history = json_decode($json_data, true);
    } else {
        $history = array();
    }

    // 新しいログイン履歴を作成
    $new_login = array(
        'user_id' => $user_id,
        'user_name' => $user_name,
        'mode' => $mode,
        'timestamp' => date('Y-m-d H:i:s')
    );

    // ログイン履歴を配列に追加
    $history[] = $new_login;

    // 配列をJSON形式に変換
    $updated_json_data = json_encode($history, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // JSONデータをファイルに書き込む
    file_put_contents($file_path, $updated_json_data);
}

function get_login_history()
{
    $file_path = __DIR__ . '/login_history.json';

    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $history = json_decode($json_data, true);
    } else {
        $history = array();
    }

    return $history;
}
