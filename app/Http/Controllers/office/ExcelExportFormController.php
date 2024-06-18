<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportFormController extends Controller
{

	public function export( Request $request  ) 
	{
		$arrRow = $request -> row;
		//dump($arrRow);
		$arrCol = $request -> col;	
//dump($arrCol);		
		$arrCell = $request -> cell;
//dump($arrCell);		
		$maxRow = max($arrRow);
		//dump($maxRow);
		$maxCol = max($arrCol);	
		//dump($maxCol);
		for( $i = 0; $i < $maxRow; $i++ )
		{
			for( $j = 0; $j < $maxCol; $j++ )
			{
				$arr[$i][$j] = '';
			}			
		}
		//dump($arr);
		foreach( $arrRow as $key => $val )
		{
			
			$arr[$val][$arrCol[$key]] = $arrCell[$key];
		}
		
		
		
		
		$export = new \App\Exports\ExcelDataExport($arr);
//dd($export );
		return Excel::download($export, 'invoices.xlsx');
	}
}
