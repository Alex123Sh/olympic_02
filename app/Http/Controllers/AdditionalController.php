<?php
// Всяко разно вспомогательное
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*
use Intervention\Image\Facades\Image as InterventionImageV2;
use Intervention\Image\Laravel\Facades\Image as InterventionImageV3;
*/
use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver;
// для загрузки файлов
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class AdditionalController extends Controller
{
    public static function uploadFile( $request, $uploadFolder,  )
	{	//	Загрузка файлов AJAX
		//sleep(1);
		$file = $request->file[0] ;//  ->file[0]
		$mimeType = $file -> getMimeType();
		$typeFileOk = 
			[
			'image/jpeg', // jpg
			'application/vnd.ms-excel', // xls
			'application/msword', //doc
			'image/png', // png
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', //xlsx
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //docx
			'application/pdf', // pdf
			];
		if( in_array($mimeType, $typeFileOk) )
		{
			$filename = $file->getClientOriginalName();
			
			$filename = \App\Models\Other\HelpVaria::normalizeFilename( $filename );

			Storage::putFileAs($uploadFolder, $file, $filename);	
			
			exit ( $uploadFolder . '/' . $filename ) ;	
		}
		else
		{
			exit ("mimeTypeErr");	
		}			
		/*
        //$upload_folder = 'public/folder';
		if ($request->isMethod('post') && $request->file[0]) {

			$request->validate([

				 // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
				'userfile' => 'image',

				// поддерживаемые MIME файла (image/jpeg, image/png)
				'userfile' => 'mimetypes:image/jpeg,image/png',

			]);
			
			// …
		}
		*/

			
	}

    public static function uploadFileOriginalName( 
		$request, 
		$uploadFolder //	В какую папку пишем
		/*
		$type_file, 	//  категория файла -задачи/отвеы, почее
		tour_id  // ID тура к которому относятся эти файлы
		*/
		)
	{	//	Загрузка файлов AJAX
		//dd($request->all());
		//sleep(3);
		$file = $request->file[0] ;//  ->file[0]
		$mimeType = $file -> getMimeType();
		$typeFileOk = 
			[
			'image/jpeg', // jpg
			'application/vnd.ms-excel', // xls
			'application/msword', //doc
			'image/png', // png
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', //xlsx
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //docx
			'application/pdf', // pdf
			];
		if( in_array($mimeType, $typeFileOk) )
		{
			$type_file = $request -> type_file; //тип файла 1 - задачи, 2-ответы/ключи, 3-дополнительные материалы',
			//dump($_SERVER );
			$tour_id = $request -> tour_id;
			//dump($tour_id);	
			
			//Генерируем имя файла
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_()+';
			$fileNameServer = substr(str_shuffle($permitted_chars), 0, 16);
			$filename = $tour_id . '-' . $type_file . '-' . $fileNameServer;
			
			$fileNameOriginal = $file->getClientOriginalName();
			
			//$filename = \App\Models\Other\HelpVaria::normalizeFilename( $filename );

			$systemPath = str_replace( 'public', '', $uploadFolder);
			$systemPath .= '/' . $filename; 
			
			$idDB = DB::table('tour_files')->insertGetId(
			[
				'tours_id' => $tour_id,
				'file_type' => $type_file,
				'original_name' => $fileNameOriginal,
				'system_path' => $systemPath
			]);
			//	формируем ответ
			$answer = $systemPath ."' download='$fileNameOriginal'>$fileNameOriginal</a><span class='fileTourDel' data-rec='$idDB'><i class='bi bi-x-square'></i></span>"; 
			Storage::putFileAs($uploadFolder, $file, $filename);
			//dd($fileNameOriginal);
			exit (  $answer ) ;	
		}
		else
		{
			exit ("mimeTypeErr");	
		}			
	}
	
	public static function resizePict( 	$pictPath, $imgWidth, $imgHeight)
	{
		// Получает адрес картинки на сервере и размеры картинки, отдает URL этой, вырезанной картинки 
		//dd( $pictPath);
		if( empty($pictPath) )
		{
			//$urlPictStart = url('/current(');
			$pictPath = 'is_null'.$pictPath;	
		}
		else
		{
			$urlPictStart = $pictPath;
			
		}

		
		$pictPath = 'public'.$pictPath;
		
		if ( (Storage::exists($pictPath))  )
		{ //echo 'Файл сушестует -> '.$pictPath;
			$urlPict =  url('/storage');
			
			$urlFolder =  pathinfo($urlPictStart);
			$folder = $urlFolder['dirname'];
			$urlPict =  $urlPict.$folder.'/thumbs';
			
			$pictPathReal = str_replace( 'public', 'storage/app/', $_SERVER['DOCUMENT_ROOT'] );
			$pictPathReal .= $pictPath;	
		}
		else
		{ //echo 'Файл не обнаружен Ставим заглушку';
	
			$pictPathReal = $_SERVER['DOCUMENT_ROOT'];
			$urlPict = url('/css/personal/pictCSS/thumbs');
			$pictPathReal .= '/css/personal/pictCSS/no-photo.jpg';		
		}
		
		$imgPathInfo = pathinfo($pictPathReal);

		$dir = $imgPathInfo["dirname"];
		$extension = $imgPathInfo["extension"];
		$filename = $imgPathInfo["filename"];

		$dirNew = $imgPathInfo["dirname"].'/thumbs';		
		$fileNameNew = $filename."_w-".$imgWidth."_h-".$imgHeight.".".$extension;
		$filePathServer = $dirNew.'/'.$fileNameNew; // Полный путь запрошенному и подрезанному файлу-картинке
		//dump ($filePathServer.'  - Путь к файлу 46578');
		$urlPict .= '/'.$fileNameNew;
		if ( !(file_exists($filePathServer))  )
		{	//echo ('	Файл НЕ существует');
			
			// create image manager with desired driver
			$manager = new ImageManager(
				new \Intervention\Image\Drivers\Gd\Driver()
			);

			// open an image file
			$image = $manager->read($pictPathReal);

			$image->cover( $imgWidth, $imgHeight );



			if ( !(file_exists($dirNew))  )
			{ //echo "//каталог отсутствует";
				mkdir($dirNew);
			}	
			
			$image->save($filePathServer);
		}
		else
		{
			//echo ('	Существует файл');
		}




		
		return $urlPict;



	}




}