<h2>قائمة المستخدمين</h2>
<table class="table">
    <thead>
        <tr><th>ID</th><th>Email</th><th>Role</th><th>Created</th></tr>
    </thead>
    <tbody>
        <?php foreach($users as $u): ?>
            <tr>
                <td><?= (int)$u['user_id'] ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= htmlspecialchars($u['role']) ?></td>
                <td><?= htmlspecialchars($u['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
