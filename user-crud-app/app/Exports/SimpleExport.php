<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SimpleExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        return [
            ['Alice', 'alice@example.com', 25],
            ['Bob', 'bob@example.com', 30],
            ['Charlie', 'charlie@example.com', 28],
        ];
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Age'];
    }
}
