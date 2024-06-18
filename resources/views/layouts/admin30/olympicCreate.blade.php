@extends('layouts.app')

@section('title', 'Создание Олимпиады')

@section ('content')
	
		<div class='row'>
			<div class="  col-sm-10  mx-auto " >
				<div class="mx-2 widgetWhite01 ">
					<h2 class="mt-3 mb-1  px-3  pt-2">Создание Олимпиады</h2>	
					<form action="{{ route('admin30/olympicAdd') }}" class="space-y-5 mt-5" method='post'>
						@csrf
						<div class="inputWrapper @error('password_confirmation') ERR @enderror">
							<div class="inputHelp">Название Олимпиады</div>
							<div class="inputErr">	@error('password_confirmation')	{{  $message }}	@enderror </div>
							<input name='name' type="text" class="form-control" placeholder="Название Олимпиады">
						</div>
						<div class="inputWrapper">
							<div class="inputHelp">Категория Олимпиады</div>
							<div class="inputErr">Сообшение об ошибке</div>
							<select name="type" id="pet-select" class="form-select form-select-sm">
							  <option value="1">ОПК</option>
							  <option value="2">Аксиос</option>
							  <option value="3">Наше наследие</option>
							</select>
						</div>						
						<div class="inputWrapper @error('password') ERR @enderror">
							<div class="inputHelp">Анонс</div>
							<div class="inputErr">	@error('password')	{{  $message }}	@enderror </div>
							<textarea name="preview_text" class="form-control"></textarea>
						</div>
						<div class="inputWrapper @error('password_confirmation') ERR @enderror">
							<div class="inputHelp">Основное изображение</div>
							<div class="inputErr">	@error('password_confirmation')	{{  $message }}	@enderror </div>
							<div class="input-group mb-3">
								<button class="btn btnBlue bgBlueLight colorWhite ubuntu-400" type="button" id="lfm" data-input="thumbnail" data-preview="holder"><i class="bi bi-image"></i> Выбор изображения</button>
								<input id="thumbnail"  type="text" class="form-control relativePath" placeholder="Путь к изображению"  name="pict_main">
							</div>
							<div id="holder" style="margin:15px auto 10px; max-height:100px; text-align:center" class='imgControlAdmin'></div>							
						</div>						
						<div class="inputWrapper  @error('email') ERR @enderror">
							<div class="inputHelp">Основное описание</div>
							<div class="inputErr">	@error('email')	{{  $message }}	@enderror </div>
							<textarea name="content" class="form-control"></textarea>
						</div>


						

						<div class="text-center">
							<button type="submit" class="btn  btn-sm btnBlue bgBlueLight colorWhite ubuntu-400"><i class="bi bi-caret-right-fill"></i> Создать Олимпиаду </button>
						</div>
					</form>	
				</div>
			</div>
		</div>
		
@endsection

@section('jsForPage')
 <!--  script -->
 @include( 'include.fileManagerScript')
   <script>
   {{-- Привет разработчикам! Непонятка c гитом? Имя поля задается конкретно  --}}
    $('#lfm').filemanager('image', {prefix: route_prefix});
	//$('#lfm2').filemanager('image', {prefix: route_prefix});
	
	$('textarea[name=content]').ckeditor({
      height: 100,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });

  </script>
@endsection