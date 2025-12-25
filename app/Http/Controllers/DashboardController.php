<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function indexEditProfile()
    {
        return view('admin.edit-profile.edit-profile');
    }

    public function indexStatistic()
    {
        return view('admin.statistic.statistic');
    }

    public function indexManageUser()
    {
        $users = User::all();
        return view('admin.manage-users.table-user', compact('users'));
    }

    public function indexAddUser()
    {
        $roles = User::ROLE_ENUM;
        return view('admin.manage-users.add-user', compact('roles'));
    }

    public function indexEditUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $roles = ['warga' => 'Warga', 'desa' => 'Desa'];
        return view('admin.manage-users.edit-user', compact('user', 'roles'));
    }

    public function indexRequestPickup()
    {
        return view('admin.request-pickup.table-request-pickup');
    }

    public function indexDetailPickup()
    {
        return view('admin.request-pickup.detail-request-pickup');
    }

    public function indexTransaction()
    {
        return view('admin.manage-users.transaction');
    }

    public function indexAddTransaction()
    {
        return view('admin.manage-users.add-transaction');
    }
}
