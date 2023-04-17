<?php

namespace App\Imports;

use PDO;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row->filter()->isNotEmpty()) {
                Validator::make($row->toArray(), [
                    'name'        => 'required|string',
                    'email'       => 'required|unique:users,email|email',
                    'city'        => 'required|string',
                    'password'    => 'required|string',
                ])->validate();

                User::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'city' => $row['city'],
                    'password' => bcrypt($row['password']),
                ]);
            }
        }
    }
}
