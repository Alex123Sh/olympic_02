<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Invoice;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelDataExport implements FromArray, ShouldAutoSize
{
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public function array(): array
    {
        return $this->invoices;
    }
}

/*
php artisan make:export UsersExport --model=User
php artisan make:controller office/ExcelExportController 
*/