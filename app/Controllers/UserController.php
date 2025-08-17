<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $this->requireAuth();
        $users = User::all();
        $this->view('users/index', ['users' => $users]);
    }
}
