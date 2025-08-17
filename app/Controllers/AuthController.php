<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\User;

class AuthController extends Controller {

    public function showLogin() {
        if (!empty($_SESSION['user'])) {
            $this->res->redirect('/users');
        }
        $this->view('auth/login');
    }

    public function login() {
        $email = trim($this->req->body['email'] ?? '');
        $password = $this->req->body['password'] ?? '';

        $user = User::findByEmail($email);
        if ($user && password_verify($password, $user['password_hash'])) {
            // تسجيل الجلسة
            $_SESSION['user'] = ['id' => $user['user_id'], 'email' => $user['email'], 'role' => $user['role']];
            $this->res->redirect('/users');
        } else {
            $this->view('auth/login', ['error' => 'Invalid credentials']);
        }
    }

    public function logout() {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        $this->res->redirect('/login');
    }
}
