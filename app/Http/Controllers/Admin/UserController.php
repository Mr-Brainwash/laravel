<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('admin.users', ['users' => $users]);
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.updateUsers')->withSuccess('Назначен как админ');
        } else {
            return redirect()->route('admin.updateUsers')->withError('Ошибка! Нельзя снять с себя привилегии админа');
        }
    }
}
