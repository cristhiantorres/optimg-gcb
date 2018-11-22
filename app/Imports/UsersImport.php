<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $items = [];
        foreach ($rows as $row)
        {
            array_push($items, $row);
        }

        return $items;
    }
}
