<h2>تسجيل الدخول</h2>
<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post" action="/login">
    <div>
        <label>البريد الإلكتروني</label><br>
        <input name="email" type="email" required>
    </div>
    <div>
        <label>كلمة المرور</label><br>
        <input name="password" type="password" required>
    </div>
    <button class="btn btn-primary" type="submit">دخول</button>
</form>
<p>حساب تجريبي: admin@example.com / 123456</p>
