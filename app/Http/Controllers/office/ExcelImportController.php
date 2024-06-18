<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import() 
    {
		$root = base_path();

		
		$fileNameFull = $root . '/storage/app/public/temp/dataTest.xlsx';


        Excel::import(new UsersImport, $fileNameFull);
		dd('Смотри в базе');//
		return redirect('/')->with('success', 'All good!');
    }
}
