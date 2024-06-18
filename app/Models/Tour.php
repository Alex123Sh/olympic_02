<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory;
	
	public static function getTourSingle( $id )
	{	//	 Получить все про один тур ( + файлы )
	//dump( $id);
		$tourSingle = DB::table('tours')
			-> where('tours.id', '=', $id)
            -> first();
		//	dump($tourSingle);
		$tourSingle -> tour_start = \App\Models\Other\HelpVaria::dateToStr($tourSingle -> tour_start);
		$tourSingle -> tour_end = \App\Models\Other\HelpVaria::dateToStr($tourSingle -> tour_end);			

		$tourFile = DB::table('tour_files')
			-> where('tours_id', '=', $id)
            -> get();
		//	dump($tourFile);			
		$tourSingle -> files = 	$tourFile;
	//dd($tourSingle);
		
		return $tourSingle;
	}
	/**/
}
