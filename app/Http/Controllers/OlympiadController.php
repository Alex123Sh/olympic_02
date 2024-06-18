<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OlympiadController extends Controller
{
    public function opkShowStart()
	{
		$olympiadS = \App\Models\Olympiad::query() -> orderBy('id') -> where( 'type', '=', '1') -> paginate(6);
		foreach( $olympiadS as $key => $olympiad )
		{
			$olympiadS[$key]['pictUrl'] = \App\Http\Controllers\AdditionalController::resizePict( $olympiad->pict_main, 579, 387 );	
		}
		return view (  'olympiad.opkShow', [ "olympiadS" => $olympiadS, "classMain" => "opkOlympiad" ]);	
	}
	
    public function aksiosShowStart()
	{
		$olympiadS = \App\Models\Olympiad::query() -> orderBy('id') -> where( 'type', '=', '2') -> paginate(6);
		foreach( $olympiadS as $key => $olympiad )
		{
			$olympiadS[$key]['pictUrl'] = \App\Http\Controllers\AdditionalController::resizePict( $olympiad->pict_main, 579, 387 );	
		}
		return view (  'olympiad.aksiosShow', [ "olympiadS" => $olympiadS, "classMain" => "aksiosOlympiad" ]);	
	}

    public function ovioShowStart()
	{
		$olympiadS = \App\Models\Olympiad::query() -> orderBy('id') -> where( 'type', '=', '3') -> paginate(6);
		foreach( $olympiadS as $key => $olympiad )
		{
			$olympiadS[$key]['pictUrl'] = \App\Http\Controllers\AdditionalController::resizePict( $olympiad->pict_main, 579, 387 );	
		}
		return view (  'olympiad.ovioShow', [ "olympiadS" => $olympiadS, "classMain" => "ovioOlympiad" ]);	
	}	
	
	public function olympiadSingle( $id )
	{
		//$olympiadSingle = \App\Models\Olympiad::find( $id);
		$olympiadSingle = \App\Models\Olympiad::getOlympiadSingle( $id );
//dd($olympiadSingle );
		return view (  'olympiad.olympiadSingle', ["olympiadSingle" => $olympiadSingle] );	
		
	}	
	
}
