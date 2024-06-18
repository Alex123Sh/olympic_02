<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>
	
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/personal/styleGeneral.css" rel="stylesheet">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--link href="/css/tailwind.min.css" rel="stylesheet"> < Конфликты -->
	<link href="/css/tailwindCSS.css" rel="stylesheet"> <!-- Персональные правила -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body class="d-flex flex-column h-100 ubuntu-400 colorBlueDark">
    
<header>
  <!-- Fixed navbar -->
	<div class="topWidgetLogo">
		<div class="container" style="position:relative">
			
			<a href="#" class='logoWrapperTop'>
				<span class='logoPict'></span>
				<span class='logoText ubuntu-300'>Свято-Тихоновские олимпиады</span>
			</a>
			
			<a href="#" class='vkLink'><span class='vkBlue32'>&nbsp;</span></a>
			<a href="#" class='telegramLink'><span class='telegramBlue32'>&nbsp;</span></a>
			
		</div>
	</div>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bgBlueDark topWidgetMenu">
		<div class="container">	
			<div class="container-fluid bgBlueDark">
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
				  <li class="nav-item">
					<a class="nav-link" aria-current="page" href="/">Главная</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href='{{ route("opkShowStart") }}'>ОПК</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href='{{ route("aksiosShowStart") }}'>Аксиос</a>
				  </li>				  
				  <li class="nav-item">
					<a class="nav-link" href='{{ route("ovioShowStart") }}'>Наше наследие</a>
				  </li>					  
				  <li class="nav-item">
					<a class="nav-link" href='{{ route("sandbox") }}'>Песочница</a>
				  </li>	
				</ul>

			  </div>
			</div>
			<div class='userInfoWrapper colorGreyLight' data-bs-toggle="collapse" data-bs-target="#userTopMenu" aria-expanded="false" aria-controls="userTopMenu" >
				<div class="d-none d-lg-block d-md-none">
					<div class="userInfoInner">
						@guest	{{-- Пользователь не авторизован --}}
						<!-- div class="userStatus">Администратор</div -->
						<div class="userName">Вход</div>
						@endguest
						@auth {{-- Пользователь авторизирован --}}
						@php
							$role = auth()->user() -> role ;
							$name = auth()->user() -> name ; 
						@endphp
						
						<div class="userStatus">
							@if ( $role == 10 )
								Ученик
							@elseif ( $role == 20 )
								Педагог
							@elseif ( $role == 30 )
								Администратор								
							@else
								role - н/д
							@endif							
						</div>
						<div class="userName">{{ $name }}</div>						
						@endauth
					</div>
				</div>
				<div class="userWhite32">&nbsp;</div>
			</div>
				<script> 
					urlLogin = '{{ route("login") }}'; 
					URL_GLOBAL= "{{URL :: to ('/')}}";  
					_token = "{{ csrf_token() }}";
				</script>			
			<div id="userTopMenu" class="bgGreyMedium collapse">
				
				<div class="text-center preloaderUserTopMenu">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>			
				<div class="answerErrUserTopMenu">
					Текст ошибки.
				</div>
				@guest	{{-- Пользователь не авторизован --}}
				<div class="inputWrapper">
					<div class="inputHelp">Ваш email</div>
					<div class="inputErr">Сообшение об ошибке</div>
					<input type="text" class="form-control" placeholder="Ваш email" name="email">
				</div>
				<div class="inputWrapper">
					<div class="inputHelp">Ваш пароль</div>
					<div class="inputErr">Сообшение об ошибке</div>
					<input type="password" class="form-control" placeholder="Ваш пароль" name="password">
				</div>	
				<button id='authorizationAjax' type="button" class="btn btnBlue bgBlueLight colorWhite ubuntu-400" style="width:100%">Войти<i class="bi bi-caret-right-fill"></i></button>
							
				
				<a href='{{ route("forgot") }}' class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400" style="width:100%">Восстановить пароль</a>
				<a href='{{ route("register") }}' class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400" style="width:100%">Регистрация</a>
				@endguest
				@auth {{-- Пользователь автризирован, в зависимости от роли пользователя выводим пункты меню --}}

				<ul class='ulRect list-group'>
					@include('include/adminMenu')
					<li class="list-group-item"><a href='{{ route("logout") }}'><i class='bi bi-caret-right-fill'></i>Выход<span class='liRem'>:)</span></a></li>				
				</ul>
				@endauth
			</div>		
			
		</div>	
  </nav>
  
</header>
	
<!-- Begin page content -->
	<main class="flex-shrink-0 @isset($classMain)  {{ $classMain }} @endisset" >
		<div class="container">	
@yield('content')
			<div class="otherResourceWrapper">
				<h2>При поддержке</h2>
				<a class="otherResource" href="#"><img src='/demo/pictPage/demo_01.jpg'></a>
				<a class="otherResource" href="#"><img src='/demo/pictPage/demo_02.jpg'></a>		
				<a class="otherResource" href="#"><img src='/demo/pictPage/demo_03.jpg'></a>		
			</div>	

		</div><!-- class="container" -->
	</main>

<footer class="footer mt-auto py-3 bgBlueDark colorWhite">
  <div class="container">
		<div class='row'>
			<div class="col-12 col-sm-7 col-lg-4">
				<a href="#" class="logoWrapperBottom">
					<span class="logoPict"></span>
					<span class="logoText ubuntu-300">Свято-Тихоновские олимпиады</span>
				</a>
				<a href="#" class="linkFooter colorWhite">Oб олимпиадах</a><br>
				<a href="#" class="linkFooter colorWhite">Мои результаты</a><br>				
				<a href="#" class="linkFooter colorWhite">Организатор олимпиад</a><br>
				<a href="#" class="linkFooter colorWhite">Контакты</a><br>				
				<a href="#" class="linkFooter colorWhite">Обратная связь</a><br>

			</div>
			<div class="col-12 col-sm-5 col-lg-3">
				<span class='contactFooterInner colorBlueLight'>КОНТАКТЫ</span><br><br>
				<div class="widgetBlueMedium bgBlueMedium colorWhite">+7 900 000 00 00</div><br><br>
				<div class="widgetBlueMedium bgBlueMedium colorWhite">+7 900 000 00 00</div><br><br>
				<div class="widgetBlueMedium bgBlueMedium colorWhite">Olimp2024@gmail.com</div><br><br>
				<a href="#" class='vkLink'><span class='vkWhite32'>&nbsp;</span></a>
				<a href="#" class='telegramLink'><span class='telegramWhite32'>&nbsp;</span></a>
			</div>		
			<div class="col-12 col-sm-12 col-lg-5">
				<span class='messageIcon'>&nbsp;</span><br>
				<span class="messageComment">Напишите нам, чтобы получить бесплатную консультацию</span>
				<input type="text" class="form-control" placeholder="Ваш Email">
				<textarea class="form-control" placeholder="Задайте вопрос"></textarea>
				<input type="button" value="Отправить вопрос" class="btn btnBlue bgBlueLight colorWhite ubuntu-400">
			</div>		
		</div>
		<div class='copyright colorGreyMedium'>&copy; Copyright 2024</div>
		
		
  </div>
</footer>


    <script src="/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/personal/scriptMain.js"></script>

@yield('jsForPage')		
	
<div id="controlWidth" class="printNo">
	TEST)
	<div class="dataGrid d-none d-xxl-block" data-grid="sizeXXL">XXL  	≥1400px</div>
	<div class="dataGrid d-none d-xl-block  d-xxl-none" data-grid="sizeXL">XL ≥1200px</div>
	<div class="dataGrid d-none d-lg-block d-xl-none" data-grid="sizeLG">LG ≥992px</div>
	<div class="dataGrid d-none d-md-block d-lg-none" data-grid="sizeMD">MD ≥768px</div>
	<div class="dataGrid d-none d-sm-block d-md-none" data-grid="sizeSM">SM ≥576px</div>
	<div class="dataGrid d-sm-none " data-grid="sizeSmall"><576px  мелочь</div>
	
	<button id="horizontalDimensionBTN">?HorDim?</button>
	<div id="horizontalDimensionVal">***</div>
	<button id="testBTN">?HorDim?</button>
	<div id="testOut">***</div>	
	<style> #controlWidth {position:fixed; width:200px; right:5px; bottom:5px; background:#aaa; border:1px solid #555; padding:5px; font-size:12px; z-index:100000} </style>
	<script>
	$(document).ready(function(){
		$("#horizontalDimensionBTN").click(function()
		{	//	Получение размера окна
			let width = $(window).width();
			$("#horizontalDimensionVal").html(width);
		});



	});

	</script>
</div> 	
  </body>
</html>