<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>Capstone4 MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{font-family: Arial, Helvetica, sans-serif; margin:0; padding:0; background:#f6f7fb;}
        header, footer {background:#1f2937; color:#fff; padding:12px 16px;}
        main {max-width: 900px; margin: 24px auto; background:#fff; padding:20px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,.06);}
        a {color:#2563eb; text-decoration:none}
        .btn{display:inline-block; padding:8px 14px; border-radius:8px; border:1px solid #ddd; background:#f3f4f6}
        .btn-primary{background:#2563eb; color:#fff; border-color:#1d4ed8}
        .table{width:100%; border-collapse: collapse;}
        .table th,.table td{border-bottom:1px solid #eee; padding:10px; text-align:right}
        .error{color:#b91c1c; margin-bottom:10px}
        nav a{margin-left:10px}
    </style>
</head>
<body>
<header>
    <nav>
        <a href="/users" class="btn">المستخدمون</a>
        <?php if(!empty($_SESSION['user'])): ?>
            <span style="margin:0 10px">مرحباً، <?= htmlspecialchars($_SESSION['user']['email']) ?></span>
            <a class="btn" href="/logout">خروج</a>
        <?php else: ?>
            <a class="btn btn-primary" href="/login">دخول</a>
        <?php endif; ?>
    </nav>
</header>
<main>
    <?= $content ?>
</main>
<footer>
    <small>Capstone4 MVC — PHP 8 + PDO — <?= date('Y') ?></small>
</footer>
</body>
</html>
