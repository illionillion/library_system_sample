<?php
include '../api/session_check/index.php';
include '../api/role_check/index.php';
include '../api/db/index.php';
include '../components/header/component.php';

try {

    $stmt = $pdo->prepare('select user_id, user_name, phone_number, email, role from users;');
    $stmt->execute();

    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    die("データの取得に失敗しました: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="/css/index.css">
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
            <h2>ユーザー一覧</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ユーザーID</th>
                        <th scope="col">ユーザー名</th>
                        <th scope="col">電話番号</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">権限</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td scope="row"><?= $row['user_id'] ?></td>
                            <td><?= htmlspecialchars($row['user_name']) ?></td>
                            <td><?= htmlspecialchars($row['phone_number']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= $row['role'] == 0 ? '管理者' : '利用者' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>