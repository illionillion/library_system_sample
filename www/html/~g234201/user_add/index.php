<?php
include '../api/session_check/index.php';
include '../api/role_check/index.php';
include '../api/db/index.php';
include '../components/header/component.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
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
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2>ユーザー登録</h2>
                    <form action="/~g234201/api/user_add/index.php" method="POST">
                        <div class="form-group">
                            <label class="w-100" for="username">ユーザー名</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="w-100" for="password">パスワード</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="w-100" for="phone_number">電話番号</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label class="w-100" for="email">メールアドレス</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="w-100" for="role">権限</label>
                            <select id="role" name="role" class="form-control" required>
                                <option value="0">管理者</option>
                                <option value="1">利用者</option>
                            </select>
                        </div>
                        <div class="py-3"><button type="submit" class="btn btn-primary">登録</button></div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>