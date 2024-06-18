<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportController extends Controller
{
    public function export() 
    {
		/*
		$t = [
            [1, 2, 3],
            [4, 5, 6]
        ]*/
		//dump(new UsersExport);
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
