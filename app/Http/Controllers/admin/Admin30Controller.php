<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Admin30Controller extends Controller
{
    public function olympicAdd( Request $request )
	{	//	 Добавление в БД новой олимпиады
		$data['name'] = $request -> name;
		$data['type'] = $request -> type;
		$data['preview_text'] = $request -> preview_text;
		$data['pict_main'] = $request -> pict_main;
		$data['content'] = $request -> content;
		$idRec = \App\Models\Olympiad::insertGetId( $data );
		//$id = 8 ;
		//return redirect()->route('posts.index') ;
		return redirect() -> route('admin30/olympicEdit' , [ 'id' => $idRec ]) ;
	}

    public function olympicShow( $id )
	{	// Форма	Редактирование сушествуюшей олимпиады
		$recOlimpic = \App\Models\Olympiad::find( $id );
		//dump( $recOlimpic .' id ЗАписи--Line30-Admin30Controller.php'); 
		
		$pictURL = \App\Http\Controllers\AdditionalController::resizePict( $recOlimpic->pict_main, 161, 107 );
		
		//dump( $pictURL);
		/*
		$tt = \App\Models\Olympiad::all();
		//$data['']
		*/
		$data['id'] = $recOlimpic -> id;
		$data['name'] = $recOlimpic -> name;
		$data['type'] = $recOlimpic -> type;
		$data['preview_text'] = $recOlimpic -> preview_text;
		$data['pict_main'] = $recOlimpic -> pict_main;
		$data['pict_URL'] = $pictURL;		
		$data['content'] = $recOlimpic -> content;
		
		//dd($data['name']);
		return view( 'layouts.admin30.olympicEdit', [ 'data' => $data ]) ;
	}
	
    public function olympicUpdate( Request $request )
	{	//	 Обновление в БД сушествующей олимпиады
		$idRec = $request -> id;
		$data['name'] = $request -> name;
		$data['type'] = $request -> type;
		$data['preview_text'] = $request -> preview_text;
		$data['pict_main'] = $request -> pict_main;
		$data['content'] = $request -> content;
		\App\Models\Olympiad::where( "id",$idRec )->update( $data );
		//$id = 8 ;
		//return redirect()->route('posts.index') ;
		return redirect() -> route('admin30/olympicEdit' , [ 'id' => $idRec ]) ;
	}	

    public function olympicDelete( $id, $type )
	{	// Удаление сушествуюшей олимпиады
		$recOlimpic = \App\Models\Olympiad::where('id', '=', $id)->delete();
		if( $type == 1 )
		{ return redirect() -> route('opkShowStart') ; }
		elseif ( $type == 2 )
		{ return redirect() -> route('aksiosShowStart') ; }
		elseif ( $type == 3 )
		{ return redirect() -> route('ovioShowStart') ; }
		else
		{ return redirect() -> route('home') ; }
	}	
	
    public function olympicTourNew( $id, $type, $name,  Request $request )
	{	// Добавление Тура к сушествующей Олимпиаде - создаем запись тура и редирект на редактирование сушествующей записи тура.
		$newRec = \App\Models\Tour::insertGetId(['tour_name' => 'Новый тур', 'olympiads_id' => $id ]);
		//dd($newRec);  
		return redirect() -> route('admin30/olympicTourEdit', [ 'id' => $id, 'type' => $type, 'name' => $name, 'id_tour' => $newRec ]) ;
	}
	
	
    public function olympicTourUpdate( $id, $type, $name, $id_tour, Request $request )
	{	// Запись отредактированного тура.

		$arr = $request->all(); 
		//dump( $arr);
		$id_tour = $arr['tour_id'];
		unset($arr['tour_id']);
		unset($arr['_token']);
		$arr['tour_start'] = \App\Models\Other\HelpVaria::strToDate( $arr['tour_start']);
		$arr['tour_end'] = \App\Models\Other\HelpVaria::strToDate( $arr['tour_end']);		
		//dump( $arr);
		//dd($arr['tour_start']);
		\App\Models\Tour::where('id', $id_tour)
     // ->where('destination', 'San Diego')
      ->update($arr);
				
		$tourData = \App\Models\Tour::getTourSingle( $id_tour );
	
		
		return view('tour.tourEdit', [ 'id' => $id, 'type' => $type, 'name' => $name, 'tourData' => $tourData ]) ;
	}	
	
    public function olympicTourEdit( $id, $type, $name, $id_tour,  Request $request )
	{	// Вывод на редактирование сушествующей записи тура. Новый тур - сначала создаем запись, пустышку, потом ее редактируем
		$tourData = \App\Models\Tour::getTourSingle( $id_tour );
		//dd($tourData -> tour_start) ;

		
		return view('tour.tourEdit', [ 'id' => $id, 'type' => $type, 'name' => $name, 'tourData' => $tourData ]) ;
	}
    public function userControl()
	{	// Контроль ролей пользователей
		$students = \App\Models\User::all();
		dd($students);
		
	}	
/**/	
    public static function fileTourDelete( $request )
	{	//	Удаление файлов у туров
		//dd($request->all());
		$path = DB::table('tour_files')->where('id', '=', $request->idRec )->value('system_path');
		$path = 'public/'.$path;
		Storage::delete( $path );
		DB::table('tour_files')->where('id', '=', $request->idRec )->delete();
		exit ('deleteOk');
	}		
	
}
