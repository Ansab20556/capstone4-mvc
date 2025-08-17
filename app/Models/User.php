<?php
namespace App\Models;
use App\Core\DB;
use PDO;

class User {
    public static function findByEmail(string $email): ?array {
        $stmt = DB::conn()->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function all(): array {
        $stmt = DB::conn()->query('SELECT user_id, email, role, created_at FROM users ORDER BY user_id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(string $email, string $password, string $role = 'volunteer'): int {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = DB::conn()->prepare('INSERT INTO users (email, password_hash, role) VALUES (?, ?, ?)');
        $stmt->execute([$email, $hash, $role]);
        return (int)DB::conn()->lastInsertId();
    }
}
