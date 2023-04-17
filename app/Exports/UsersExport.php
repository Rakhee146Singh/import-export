<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select('name', 'email', 'city', 'password')->get();
    }
    public function headings(): array
    {
        return ["Name", "Email", "City", "Password"];
    }
}
