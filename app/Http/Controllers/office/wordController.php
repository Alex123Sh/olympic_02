<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class wordController extends Controller
{
    public static function createWord( Request $request )
	{
		
		$root = base_path();
		dump($root);
		
		require_once $root . '/vendor/phpoffice/phpword/bootstrap.php';
		
		$fileNameTemplateDOCX = $root . '/storage/app/public/temp/template_demo.docx';

		$_doc = new \PhpOffice\PhpWord\TemplateProcessor( $fileNameTemplateDOCX);
		/*
		dump($t);
		*/
		//field
		$field1 = $request -> block1;
		$field2 = $request -> block2;		
		$field3 = $request -> block3;		
		
		$_doc->setValue('field1', $field1); // 
		$_doc->setValue('field2', $field2); // 
		$_doc->setValue('field3', $field3); // 	

	$filename = $root . '/storage/app/public/temp/resume-5-5.docx';
	/*
header( "Content-Type: application/vnd.ms-word" );
header( 'Content-Disposition: attachment; filename='.$filename );
*/
	$filename = $root . '/public/storage/temp/resume-5-5.docx';

$_doc->saveAs( $filename );

		
		dump( $filename  );
		$urlhome = route('home');
		dump( $t );
		
	$filename = $urlhome . '/storage/temp/resume-5-5.docx';		
	Exit ('Ссылка на результат: '. $filename);
	
	
	
	}
}
