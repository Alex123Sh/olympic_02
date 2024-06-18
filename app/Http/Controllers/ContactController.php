<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  //  работа с БД в лоб
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function fSubmit( Request $reg )
	{
		
		/*  запись в базу в лоб */
		DB::table('contacts')->insert([
    'email' => $reg -> input('email'),
    'nameUser' => $reg -> input('nameUser')
		]);

		$contact = new ContactModel();
		$contact -> nameUser =  $reg -> input('nameUser');
		$contact -> email =  $reg -> input('email');		
		$contact -> subject =  $reg -> input('subject');		
		$contact -> comment =  $reg -> input('comment');		
		
		$contact -> save();
		
		return redirect()->route('about-N') ;
		/*
		dd( $reg -> request );
		return "Okey-Controller1";
		*/
	}
	
	public function f_allData()
	{
		$contact = new ContactModel();
		$temp =  $contact -> all(); 
		/*
		dump($temp );
		exit ("www");
		*/
		return view( 'contact_all', [ 'data' => $temp ]) ;
		
	}
	
	public function oneMessage( $id)
	{
		$contact = new ContactModel();
		$temp =  $contact -> find( $id); 
		/**/
		dump($temp );
		dump (  $temp -> nameUser );
		foreach( $temp as $key => $value) {
		print "$key => $value\n"; }
		exit ("www");
		
		return view( 'contact_oneMessage', ['data' => $temp] ) ;
		
	}	
}
