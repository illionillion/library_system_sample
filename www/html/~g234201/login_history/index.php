<?php

include '../api/write_login_history/index.php';
include '../api/session_check/index.php';
include '../api/role_check/index.php';
include '../components/header/component.php';

$login_history = get_login_history();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン履歴</title>
    <link rel="stylesheet" href="/~g234201/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $header = new HeaderComponent('蔵書システム');
    $header->render();
    ?>

    <main class="py-3">
        <div class="container">
            <h2>ログイン履歴</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ユーザーID</th>
                        <th scope="col">ユーザー名</th>
                        <th scope="col">アクション</th>
                        <th scope="col">時間</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($login_history as $row) : ?>
                        <tr>
                            <td scope="row"><?= $row['user_id'] ?></td>
                            <td><?= htmlspecialchars($row['user_name']) ?></td>
                            <td><?= htmlspecialchars($row['mode']) ?></td>
                            <td><?= htmlspecialchars($row['timestamp']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>