<?php

include '../api/session_check/index.php';
include '../api/db/index.php';
include '../components/header/component.php';

if (isset($_GET['bookname']) && !empty($_GET['bookname'])) {
    $bookname = $_GET['bookname'];
}
if (isset($_GET['book_category']) && !empty($_GET['book_category'])) {
    $book_category = $_GET['book_category'];
}

try {
    $sql = "SELECT b.book_id, b.book_name, bc.book_category_name, b.regist_date
            FROM books b
            JOIN book_category bc ON b.book_category = bc.book_category_id
            WHERE b.book_name LIKE CONCAT('%', :keyword_name, '%') OR b.book_category = :keyword_category";
    $stmt = $pdo->prepare($sql);

    // プレースホルダーに値をバインドする
    $stmt->bindValue(':keyword_name', $bookname, PDO::PARAM_STR);
    $stmt->bindValue(':keyword_category', $book_category, PDO::PARAM_INT);

    // クエリを実行
    $stmt->execute();

    // 結果を取得
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $category_stmt = $pdo->prepare('select * from book_category');
    $category_stmt->execute();
    $category_result = $category_stmt->fetchAll();


    foreach ($category_result as $row) {
        if ($row['book_category_id'] == $book_category) {
            $category_name = $row['book_category_name'];
        }
    }
} catch (PDOException $e) {
    // echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>蔵書検索結果</title>
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
            <h2>検索結果</h2>
            <p><span>蔵書名</span><?= $bookname ? $bookname : 'なし' ?></p>
            <p><span>カテゴリー</span><?= $category_name ? $category_name : 'なし' ?></p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">蔵書ID</th>
                        <th scope="col">蔵書名</th>
                        <th scope="col">カテゴリー</th>
                        <th scope="col">登録日</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$results) : ?>
                        <div>該当なし</div>
                    <?php else: ?>
                        <?php foreach ($results as $row) : ?>
                            <tr>
                                <td scope="row"><?= $row['book_id'] ?></td>
                                <td><?= htmlspecialchars($row['book_name']) ?></td>
                                <td><?= htmlspecialchars($row['book_category_name']) ?></td>
                                <td><?= htmlspecialchars($row['regist_date']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>