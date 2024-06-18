@extends('layouts.app')

@section('title', 'ПЕСОЧНИЦА-EXCEL))')



@section('content')



  <div class="container">
  <a href="{{ route("sandboxWord") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Word</a>
  <a href="{{ route("sandboxExcelINP") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Excel</a>  
  <a href="{{ route("sandboxExcelOUT") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Получение данных Excel</a>   
    <h1 class="page-header">Генерация EXCEL</h1>
    <div class="row">

<form method='post' action='{{ route("sandboxExcelProcessINP") }}'>
	@csrf
    <div class="col-8 mx-auto bgGreyMedium p-3" >
      <h5>Демо - заполняем строка(число), столбец(число), значение(произвольно)</h5>
	  <div class="row">
		<div class='col-3'>
		  <input name='row[1]' type="text" class="form-control" value="5">
		  <input name='row[2]' type="text" class="form-control" value="2">
		  <input name='row[3]' type="text" class="form-control" value="23">
		</div>
		<div class='col-3'>
		  <input name='col[1]' type="text" class="form-control" value="5">
		  <input name='col[2]' type="text" class="form-control" value="2">
		  <input name='col[3]' type="text" class="form-control" value="23">
		</div>
		<div class='col-6'>
		  <input name='cell[1]' type="text" class="form-control" value="Получить">
		  <input name='cell[2]' type="text" class="form-control" value="сертификат">
		  <input name='cell[3]' type="text" class="form-control" value="Генерация">
		</div>		
	  </div>
	  <button type="submit" class="btn btnBlue bgBlueLight colorWhite ubuntu-400">Создать EXCEL<i class="bi bi-caret-right-fill"></i></button>
    </div>
  
</form>
    </div>

  </div>


  
@endsection

@section('jsForPage')
 <!--  script -->

@endsection