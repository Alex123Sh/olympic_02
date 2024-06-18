@extends('layouts.app')

@section('title', 'ПЕСОЧНИЦА))')



@section('content')



  <div class="container">
  <a href="{{ route("sandboxWord") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Word</a>
  <a href="{{ route("sandboxExcelINP") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Генерация Excel</a>  
  <a href="{{ route("sandboxExcelOUT") }}" class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i>Получение данных Excel</a>   
    <h1 class="page-header">Integration Demo Page</h1>
    <div class="row">
      <div class="col-md-6">
        <h2 class="mt-4">CKEditor</h2>
        <textarea name="ce" class="form-control"></textarea>
      </div>
      <div class="col-md-6">
<form>
        <h2 class="mt-4">Standalone Image Button</h2>

 		<div class="input-group mb-3">
		  <button class="btn btnBlue bgBlueLight colorWhite ubuntu-400" type="button" id="lfm2" data-input="thumbnail2" data-preview="holder2"><i class="bi bi-image"></i> Выбор изображения</button>
		  <input id="thumbnail2"  type="text" class="form-control relativePath" placeholder="Путь к изображению"  name="filepath2">
		</div>
		<div id="holder2" style="margin:15px auto 10px; max-height:100px; text-align:center;"  class='imgControlAdmin'></div>       
		
		<div class="input-group mb-3">
		  <button class="btn btnBlue bgBlueLight colorWhite ubuntu-400" type="button" id="lfm" data-input="thumbnail" data-preview="holder"><i class="bi bi-image"></i> Выбор изображения</button>
		  <input id="thumbnail"  type="text" class="form-control relativePath" placeholder="Путь к изображению"  name="filepath">
		</div>
		<div id="holder" style="margin:15px auto 10px; max-height:100px; text-align:center"  class='imgControlAdmin'></div>
		<button>Контрольная отправка</button>
</form>
    </div>

  </div>


  <style>
    .popover {
      top: auto;
      left: auto;
    }
  </style>

  
  

<hr>

<h3>Загрузка файла с проверкой mime_type</h3>


    <div ondrop="upload_fileDD(event, 11)" ondragover="return false" class="wrapperDD widgetGreyMediumCSS">
        <div class="innerDD">
            <div class='infoDD' id="infoDD11">
				<p class='level1'>Перетащите файл(ы) сюда<br> или</p>
				<div class='level2'><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>
				<p class='level3'>Файл успешно загружен.</p>
				<p class='level4'>Отказ в загрузке,<br>не допустимый тип файла.</p>				
			</div>
            <input type="button" value="Выбрать файл(ы)" class="btn btnBlue bgBlueLight colorWhite ubuntu-400" onclick="file_explorerDD('11');">
            <input type="file" id="selectfile11" name='name11' multiple class='sysDD'>
        </div>
    </div>
	<input type='text' id="rezDD11" value='' class='rezJS'>
<p></p>	


    <div ondrop="upload_fileDD(event, 22)" ondragover="return false" class="wrapperDD widgetGreyMediumCSS">
        <div class="innerDD">
            <div class='infoDD' id="infoDD22">
				<p class='level1'>Перетащите файл(ы) сюда<br> или</p>
				<div class='level2'><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>
				<p class='level3'>Файл успешно загружен.</p>
				<p class='level4'>Отказ в загрузке,<br>не допустимый тип файла.</p>				
			</div>
			<input type="button" value="Выбрать файл(ы)" class="btn btnBlue bgBlueLight colorWhite ubuntu-400" onclick="file_explorerDD('22');">
            <input type="file" id="selectfile22"  name='name22' multiple class='sysDD'>
        </div>
    </div>	
	<input type='text' id="rezDD22" value='' class='rezJS'>	
	<div id='rezultDD'></div>
		Демо подключенных шрифтов<br>
		<div style=" font-size:24px;">
			<p class="ubuntu-300">Class ubuntu-300 Кириллица</p>
			<p class="ubuntu-400">Class ubuntu-400 Кириллица</p>		
			<p class="ubuntu-500">Class ubuntu-500 Кириллица</p>		
			<p class="ubuntu-700">Class ubuntu-700 Кириллица</p>		
			<p class="ubuntu-300-italic">Class ubuntu-300-italic Кириллица</p>
			<p class="ubuntu-400-italic">Class ubuntu-400-italic Кириллица</p>		
			<p class="ubuntu-500-italic">Class ubuntu-500-italic Кириллица</p>		
			<p class="ubuntu-700-italic">Class ubuntu-700-italic Кириллица</p>	
		</div>
		<div style="background:#9fd992; padding:20px;">		
			Типовые цвета<br>
			<span class='bgBlueDark' style="display:inline-block; width:100px; height:20px"></span> #032C65 bgBlueDark &nbsp; <span class='colorBlueDark'>TEXT colorBlueDark </span><br>
			<span class='bgBlueMedium' style="display:inline-block; width:100px; height:20px"></span> #083874 bgBlueMedium &nbsp; <span class='colorBlueDark'>TEXT colorBlueMedium </span><br>		
			<span class='bgBlueLight' style="display:inline-block; width:100px; height:20px"></span> #0094FF bgBlueLight &nbsp; <span class='colorBlueDark'>TEXT colorBlueLight </span><br>
			
			<span class='bgGreyDark' style="display:inline-block; width:100px; height:20px"></span> #616161 bgGreyDark &nbsp; <span class='colorGreyDark'>TEXT colorGreyDark </span><br>
			<span class='bgGreyMedium' style="display:inline-block; width:100px; height:20px"></span> #E2E7EE bgGreyMedium &nbsp; <span class='colorGreyDark'>TEXT colorGreyMedium </span><br>		
			<span class='bgGreyLight' style="display:inline-block; width:100px; height:20px"></span> #F7F7F7 bgGreyLight &nbsp; <span class='colorGreyDark'>TEXT colorGreyLight </span><br>

			<span class='bgWhite' style="display:inline-block; width:100px; height:20px"></span> #FFFFFF bgWhite &nbsp; <span class='colorBlueDark'>TEXT colorWhite </span><br>
		</div>
		
		<hr>
		<button type="button" class="btn btnBlue bgBlueLight colorWhite ubuntu-400">Primary New <i class="bi bi-caret-right-fill"></i></button>
		<input type='button' value="Input New" class="btn btnBlue bgBlueLight colorWhite ubuntu-400">
		<a href="#"  class="btn btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i> Ссылка New</a>

		<button type="button" class="btn  btn-sm btnBlue bgBlueLight colorWhite ubuntu-400"><i class='bi bi-caret-right-fill'></i> Primary New   btn-sm </button>
		<input type='button' value="Input New   btn-sm " class="btn  btn-sm  btnBlue bgBlueLight colorWhite ubuntu-400">
		<a href="#"  class="btn   btn-sm btnBlue bgBlueLight colorWhite ubuntu-400">Ссылка New   btn-sm </a>
		
		<hr>
		
		<button type="button" class="btn btnWhite bgGreyLight colorBlueDark ubuntu-400">Primary New</button>
		<input type='button' value="Input New" class="btn btnWhite bgGreyLight colorBlueDarkubuntu-400">
		<a href="#"  class="btn btnWhite bgGreyLight colorBlueDark ubuntu-400">Ссылка New</a>

		<button type="button" class="btn  btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400">Primary New   btn-sm </button>
		<input type='button' value="Input New   btn-sm " class="btn  btn-sm  btnWhite bgGreyLight colorBlueDark ubuntu-400">
		<a href="#"  class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400">Ссылка New <i class="bi bi-caret-right-fill"></i>  btn-sm </a>
		<hr>

		<div class='inputWrapper'>
			<div class='inputHelp'>Календарь</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<input type="text" class="form-control"  id="datepicker" value='27 Января 2024'>
		</div>
		<div style="width:300px; padding:20px; background:#f4f4a4">	
			<ul class='ulRect list-group'>
				<li class="list-group-item"><i class='bi bi-caret-right-fill'></i> 1 текст <span class='liRem'>2q22</span></li>
				<li class="list-group-item">we1 текст <span class='liRem'>d2e2</span></li>				
				<li class="list-group-item">ff1 текст <span class='liRem'>rg22 <i class='bi bi-caret-right-fill'></i></span></li>
				<li class="list-group-item">ewwrr1 текст <span class='liRem'>2522</span></li>				
				<li class="list-group-item">wewr1 текст <span class='liRem'>5222</span></li>
				<li class="list-group-item"><a href="#"><i class='bi bi-caret-right-fill'></i> LINK hjj1 текст <span class='liRem'>7222</span></a></li>				
			</ul>
		</div>	
		
		<div class='inputWrapper'>
			<div class='inputHelp'>Текстовое название</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<input type="text" class="form-control" placeholder="Имя пользователя">
		</div>
		
		<div class='inputWrapper ERR'>
			<div class='inputHelp'>Текстовое название</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<input type="text" class="form-control" placeholder="Имя пользователя">
		</div>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
			  <label class="form-check-label" for="flexCheckChecked">
				Checked checkbox
			  </label>
			</div>
		</div>		
		<div class='inputWrapper'>
			<div class='inputHelp'>Текстовое поле</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<textarea class="form-control" placeholder="Имя пользователя"></textarea>
		</div>
		
		<div class="widgetBlueMedium bgBlueMedium colorWhite">Olimp2024@gmail.com</div>
		

		<div class='row'>
			<div class="col-xxl-5 col-lg-7  col-md-8  col-sm-10  mx-auto " >
				<div class="mx-2 widgetWhite01 ">
					<h2 class="mt-3 mb-1  px-3  pt-2">Базовая регистрация</h2>	
					<div class="inputWrapper">
						<div class="inputHelp">Ваш email</div>
						<div class="inputErr">Сообшение об ошибке</div>
						<input type="text" class="form-control" placeholder="Ваш email">
					</div>
					<div class="inputWrapper">
						<div class="inputHelp">Ваш Пароль</div>
						<div class="inputErr">Сообшение об ошибке</div>
						<input type="password" class="form-control" placeholder="Ваш Пароль">
					</div>
					<div class="inputWrapper">
						<div class="inputHelp">Ваш Пароль повторно</div>
						<div class="inputErr">Сообшение об ошибке</div>
						<input type="password" class="form-control" placeholder="Ваш Пароль">
					</div>
					<div class="inputWrapper">
						<div class="inputHelp">Ваш статус в системе:</div>
						<div class="inputErr">Сообшение об ошибке</div>
						<select name="pets" id="pet-select" class="form-select form-select-sm">

						  <option value="5">Ученик</option>
						  <option value="10">Педагог</option>
						  <option value="15">Администратор</option>
						</select>
					</div>
					<div class="text-center">
						<button type="button" class="btn  btn-sm btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i> Зарегистрироваться </button>
					</div>
				</div>
			</div>
		</div>
		<p><span class='sysQuestion'>Служебное - вопрос</span></p>
		<p> Иконки SPAN 20 </p>	
		<span class='today20'>&nbsp;</span> today20<br>
		
		
		
		<p> Иконки SPAN 32(34) </p>	
		<span class='telegramBlue32'>&nbsp;</span> telegramBlue32<br>
		<span class='vkBlue32'>&nbsp;</span> vkBlue32<br>				
		<span class='userBlue32'>&nbsp;</span> userBlue32<br>	
		<div style="background:#789">	
			<span class='telegramWhite32'>&nbsp;</span> telegramWhite32<br>
			<span class='vkWhite32'>&nbsp;</span> vkWhite32<br>				
			<span class='userWhite32'>&nbsp;</span> userWhite32<br>	
			<span class="messageIcon">&nbsp;</span><br>			
		</div>
@endsection

@section('jsForPage')
 <!--  script -->
 @include( 'include.fileManagerScript')
   <script>
   {{-- Привет разработчикам! Непонятка c гитом? Имя поля задается конкретно  --}}
    $('#lfm').filemanager('image', {prefix: route_prefix});
	$('#lfm2').filemanager('image', {prefix: route_prefix});
	

    $('textarea[name=ce]').ckeditor({
      height: 100,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });

  </script>
@endsection