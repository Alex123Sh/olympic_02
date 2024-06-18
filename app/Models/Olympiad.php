<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Olympiad extends Model
{ 
    use HasFactory;
	
	public static function getOlympiadSingle( $id )
	{	//	 Получить все про одну олимпиаду ( картинка + туры )
		$olympiadSingle = DB::table('olympiads')
			->selectRaw('
			olympiads.id as id_olimpiad,
			olympiads.name,
			olympiads.preview_text,
			olympiads.content,
			olympiads.pict_main,
			olympiads.type,
			olympiads.created_at,
			olympiads.updated_at,
			tours.id as id_tour,
			tours.tour_name,
			tours.tour_start,
			tours.tour_end'
  )
            ->leftJoin('tours', 'tours.olympiads_id', '=', 'olympiads.id')
			->where('olympiads.id', '=', $id)
            ->get();
		$olympiadRet = [];
		foreach( $olympiadSingle as $key => $olympiad )
		{
			$olympiadRet['pictUrl'] = \App\Http\Controllers\AdditionalController::resizePict( $olympiad -> pict_main, 579, 387 );	
			$olympiadRet['id_olimpiad'] = $olympiad -> id_olimpiad;
			$olympiadRet['name'] = $olympiad -> name;
			$olympiadRet['preview_text'] = $olympiad -> preview_text;
			$olympiadRet['content'] = $olympiad -> content;
			$olympiadRet['pict_main'] = $olympiad -> pict_main;
			$olympiadRet['type'] = $olympiad -> type;
			$olympiadRet['created_at'] = $olympiad -> created_at;
			$olympiadRet['updated_at'] = $olympiad -> updated_at;
			//
			if( !empty($olympiad -> id_tour) )
			{	//	есть туры у этой олимпиады
				$arr['id_tour'] = $olympiad -> id_tour;
				$arr['tour_name'] = $olympiad -> tour_name;
				$arr['tour_start'] = $olympiad -> tour_start;
				$arr['tour_end'] = $olympiad -> tour_end;
				$olympiadRet['tour'][] = $arr;
			}
		
		}
		
		return $olympiadRet;
	}
}
