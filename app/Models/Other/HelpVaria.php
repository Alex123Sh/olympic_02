<?php
// Сборка всякого разного, но полезного
namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpVaria extends Model
{
    use HasFactory;
	
	public static function normalizeFilename($fileName) // Имя с расширением
	{// Приведение в порядок имени файла. Приводим к нижнему регистру, транслит кириллицы, на выходе только 0-9a-z  и _
        $fileName = htmlentities($fileName, ENT_QUOTES, 'UTF-8');
		$fileName = mb_strtolower($fileName, 'UTF-8');
		
		$t2 = pathinfo($fileName);
		$fileNameName = $t2['filename'];
		$fileNameExtension = $t2['extension'];
		
		$tr = array(
            "а"=>"a",
            "б"=>"b",
            "в"=>"v",
            "г"=>"g",
            "д"=>"d",
            "е"=>"e",
            "ё"=>"e",
            "ж"=>"j",
            "з"=>"z",
            "и"=>"i",
            "й"=>"y",
            "к"=>"k",
            "л"=>"l",
            "м"=>"m",
            "н"=>"n",
            "о"=>"o",
            "п"=>"p",
            "р"=>"r",
            "с"=>"s",
            "т"=>"t",
            "у"=>"u",
            "ф"=>"f",
            "х"=>"h",
            "ц"=>"ts",
            "ч"=>"ch",
            "ш"=>"sh",
            "щ"=>"sch",
            "ъ"=>"y",
            "ы"=>"i",
            "ь"=>"j",
            "э"=>"e",
            "ю"=>"yu",
            "я"=>"ya",
        );
        $fileNameName = strtr( $fileNameName, $tr );
        $fileNameName = trim(preg_replace('/[^0-9a-z\-]/', "_", $fileNameName));
		$fileNameFull = $fileNameName.'.'.$fileNameExtension;
		
        return $fileNameFull;
	}

	public static function strToDate($str)
	{	//	Преобразование строки типо 8 Июня 2024 в 2024-06-08
			$arr = explode(' ', $str);
		//dd($arr);
		if( count($arr) == 3 )
		{
			$swapDay = [
				'01' => '1',
				'02' => '2',
				'03' => '3',
				'04' => '4',
				'05' => '5',
				'06' => '6',
				'07' => '7',
				'08' => '8',
				'09' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',		
			]; 

			$swapMonth = [
				'Января' => '01',
				'Февраля' => '02',
				'Марта' => '03',
				'Апреля' => '04',
				'Мая' => '05',
				'Июня' => '06',
				'Июля' => '07',
				'Августа' => '08',
				'Сентября' => '09',
				'Октября' => '10',
				'Ноября' => '11',
				'Декабря' => '12',
			];
			
			$str = $arr[2].'-'.$swapMonth[$arr[1]].'-'.$swapDay[$arr[0]];
		}
		return $str;		
	}

	public static function dateToStr($date)
	{	//	Преобразование даты типо 2024-06-08 в 8 Июня 2024
		$arr = explode('-', $date);
		//dump($arr);
		if( count($arr) == 3 )
		{
			$swapDay = [
				'01' => '1',
				'02' => '2',
				'03' => '3',
				'04' => '4',
				'05' => '5',
				'06' => '6',
				'07' => '7',
				'08' => '8',
				'09' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',		
			]; 

			$swapMonth = [
				'01' => 'Января',
				'02' => 'Февраля',
				'03' => 'Марта',
				'04' => 'Апреля',
				'05' => 'Мая',
				'06' => 'Июня',
				'07' => 'Июля',
				'08' => 'Августа',
				'09' => 'Сентября',
				'10' => 'Октября',
				'11' => 'Ноября',
				'12' => 'Декабря',	
			];			
			$date = $swapDay[$arr[2]].' '.$swapMonth[$arr[1]].' '.$arr[0];
		}
		
		return $date;
	}
	
	








}
