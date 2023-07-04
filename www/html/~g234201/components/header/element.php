<link rel="stylesheet" href="/~g234201/css/header.css">
<header>
    <div class="service-name"><a href="/~g234201/"><?= $title ?></a></div>
    <nav class="navigation-bar">
        <?php if($_SESSION['role'] == 0) :?>
            <a href="/~g234201/">蔵書検索</a>
            <a href="/~g234201/book_add/">蔵書登録</a>
            <a href="/~g234201/user_add/">ユーザー登録</a>
            <a href="/~g234201/user_list/">ユーザー一覧</a>
        <?php endif ;?>
    </nav>
    <div class="login-logout">
        <!-- <input type="button" class="btn btn-primary" value="従業員情報" /> -->
        <a href="/~g234201/logout/" class="btn btn-primary">ログアウト</a>
    </div>
</header>