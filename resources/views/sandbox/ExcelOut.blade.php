@extends('layouts.app')

@section('title', 'ПЕСОЧНИЦА-EXCEL))')



@section('content')



  <div class="container">
  <a href="{{ route("sandboxWord") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Word</a>
  <a href="{{ route("sandboxExcelINP") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Excel</a>  
  <a href="{{ route("sandboxExcelOUT") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Получение данных Excel</a>   
    <h1 class="page-header">Получение данных из Excel</h1>
    <div class="row">
@php
dump($data);
@endphp
    <div class="col-12 mx-auto bgGreyMedium p-3" >
	<h5>Содержимое EXCEL</h5>
	<p>Файл с данными - загрузка через песочницу Drag&&Drop , имя обязательно data_test.xlsx</p>
	<table class='table-bordered'>
	@foreach ($data[0] as $row)
		<tr>
			@foreach ($row as $cell)
				<td>
				{{ $cell }}

				</td>
			@endforeach		
		</tr>
	@endforeach
	</table>

    </div>
    </div>

  </div>


  
@endsection

@section('jsForPage')
 <!--  script -->

@endsection