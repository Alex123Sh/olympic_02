@extends('layouts.app')

@section('title', 'ПЕСОЧНИЦА-WORD))')



@section('content')



  <div class="container">
  <a href="{{ route("sandboxWord") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Word</a>
  <a href="{{ route("sandboxExcelINP") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Excel</a>  
  <a href="{{ route("sandboxExcelOUT") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Получение данных Excel</a>   
    <h1 class="page-header">Генерация WORD</h1>
    <div class="row">

<form method='post' action='{{ route("sandboxWordCreate") }}'>
	@csrf
    <div class="col-6 mx-auto bgGreyMedium p-3" >
      <h5>Можно заполнить поля произвольным текстом</h5>
	  <p>Новый шаблон - сейчас грузиться через песочницу (Drag&Drop), имя обязательно <i>template_demo.docx</i> !!!<br>
	  <a href = "/storage/temp/template_demo.docx" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Скачать оригинал Шаблона<a><br>
	  <a href = "/storage/Reserve/template_demo.docx" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Резервная копия Шаблона<a> 
	  </p>
	  <input name='block1' type="text" class="form-control" value="Ваш email">
	  <input name='block2' type="text" class="form-control" value="Email Ваш">
	  <input name='block3' type="text" class="form-control" value="НЕ Ваш email">
	  <button type="submit" class="btn btnBlue bgBlueLight colorWhite ubuntu-400">Получить сертификат<i class="bi bi-caret-right-fill"></i></button>
    </div>
  
</form>
    </div>

  </div>


  
@endsection

@section('jsForPage')
 <!--  script -->

@endsection