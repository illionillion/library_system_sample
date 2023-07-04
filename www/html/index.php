<?php

include './api/session_check/index.php';
include './api/db/index.php';
include './components/importComponents.php';

$category_stmt = $pdo->prepare('select * from book_category');
$category_stmt->execute();
$category_result = $category_stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>蔵書システム</title>
    <link rel="stylesheet" href="/~g234201//css/index.css">
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
                    <h2>蔵書検索</h2>
                    <form action="/~g234201/book_search_result/" method="GET">
                        <div class="form-group">
                            <label class="w-100" for="bookname">蔵書名</label>
                            <input type="text" class="form-control" id="bookname" name="bookname">
                        </div>
                        <div class="form-group">
                            <label class="w-100" for="book_category">カテゴリー</label>
                            <select id="book_category" name="book_category" class="form-control">
                                <option value="">選択してください</option>
                                <?php foreach ($category_result as $row) : ?>
                                    <option value="<?= $row["book_category_id"] ?>"><?= htmlspecialchars($row["book_category_name"]) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="py-3"><button type="submit" class="btn btn-primary">検索</button></div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>