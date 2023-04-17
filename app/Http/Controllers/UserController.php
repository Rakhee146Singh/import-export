<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function importView()
    {
        $users = User::get();
        return view('welcome', ['users' => $users]);
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('files'));
        // return redirect()->back();
        return 'ok';
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
