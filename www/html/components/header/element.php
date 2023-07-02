<link rel="stylesheet" href="/css/header.css">
<header>
    <div class="service-name"><a href="/"><?= $title ?></a></div>
    <nav class="navigation-bar">
        <?php if($_SESSION['role'] == 0) :?>
            <a href="/">蔵書検索</a>
            <a href="/book_add/">蔵書登録</a>
            <a href="/user_add/">ユーザー登録</a>
            <a href="/user_list/">ユーザー一覧</a>
        <?php endif ;?>
    </nav>
    <div class="login-logout">
        <!-- <input type="button" class="btn btn-primary" value="従業員情報" /> -->
        <a href="/logout/" class="btn btn-primary">ログアウト</a>
    </div>
</header>