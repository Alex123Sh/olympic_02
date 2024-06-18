<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportArrController extends Controller
{
    public function import() 
    {
		$root = base_path();

		
		$fileNameFull = $root . '/storage/app/public/temp/data_test.xlsx';


        $array = Excel::toArray(new UsersImport, $fileNameFull);
		//dd('Смотри в базе');
		return view( 'sandbox.ExcelOut', [ 'data' => $array,  'root' => $root] ) ;
    }
}
