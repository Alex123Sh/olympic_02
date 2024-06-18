@extends('layouts.app')

@section('title', 'Редактирование Тура))')



@section('content')



  <div class="container">
@php
//dump( $tourData );

@endphp
    <div class="row">
	<p>Редактирование тура к олимпиаде:<br> ID={{$id}}
	Категория олимпиады:<b>
						@if ( $type == 1 )
								 ОПК
							@elseif ( $type == 2 )
								 Аксиос
							@elseif ( $type == 3 )
								Наше наследие
							@else
								type - н/д
							@endif
</b>
<br>
	название конкретной Олимпиады<i>*{{ $name }}*</i></p>

      <div class="col-12">
<form method='post' action="{{ route( 'admin30/olympicTourUpdate', [ 'id' => $id, 'type' => $type, 'name' => $name, 'id_tour' => $tourData->id ]) }} ">
		@csrf
		<input type='hidden' name = 'tour_id' value="{{ $tourData->id }}">
		
		<div class='inputWrapper'>
			<div class='inputHelp'>Название тура (2)</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<input value='{{  $tourData -> tour_name }}' name='tour_name' type="text" class="form-control" placeholder="Название тура">
		</div>
		<div class="row">
			<div class='col-6'>
				<div class='inputWrapper'>
					<div class='inputHelp'>3). Начало тура</div>
					<div class='inputErr'>Сообшение об ошибке</div>
					<input value='{{  $tourData -> tour_start }}' name='tour_start' type="text" class="form-control"  id="datepicker" value=''>
				</div>
			</div>	
			<div class='col-6'>
				<div class='inputWrapper'>
					<div class='inputHelp'>4). Окончание тура</div>
					<div class='inputErr'>Сообшение об ошибке</div>
					<input value='{{  $tourData -> tour_end }}' name='tour_end' type="text" class="form-control"  value=''>
					<script>window.onload = function() { $("input[name=tour_end]").datepicker(); }</script>
				</div>
			</div>					
		</div>	
		<span class='sysQuestion'> Сюда-же  переместить задание сроков подачи заявки, подачи результатов.<br>Все что связанно со временем/датами собрать в одно место. По факту есть две даты начало/окончание, все остальное высчитывается относительно этих дат.<br>Типо заявки можно подавать за 5 дней до начала тура. За 2 дня до начала тура - прием заявок прекрашается. </span>
		<div class='inputWrapper'> 
			<div class="form-check">
			  <input   name='tour_close' class="form-check-input" type="checkbox" id="tour_close" @if($tourData -> tour_close) checked="" @endif >
			  <label class="form-check-label" for="tour_close">
				5). После завершения тура запретить подачу заявки.
				<span class='sysQuestion'>Возможно оговорка или описка. После завершения тура куда подавать заявку в принципе? <br>Наверное заявки можно подавать за 3-5-7 дней до начала тура? После завершения тура куда подавать заявку и зачем? <i>Частенько бывает нужна пострегистрация</i> - <b>как вариант открываем возможноть подачи заявки для кокретного педагога</b>? <i>Прямая ссылка...</i> Это не вариант, такую ссылку можно сохранить в закладках...</span>
			  </label>
			</div>
		</div>	
		<div class='inputWrapper'>
			<div class='inputHelp'>6). Комментарий (виден пользователям рядом с кнопкой подачи заявки в списке актуальных туров и в личном кабинете около заявки)</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<textarea  name='tour_comment_teacher' class="form-control" placeholder="Комментарий">{{  $tourData -> tour_comment_teacher }}</textarea>
		</div>			
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='tour_show_archive'class="form-check-input" type="checkbox" id="tour_show_archive" @if($tourData -> tour_show_archive) checked="" @endif>
			  <label class="form-check-label" for="tour_show_archive">
				7). Показывать тур в архиве заданий 
			  </label>
			</div>
		</div>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='tour_application_one' class="form-check-input" type="checkbox" id="tour_application_one" @if($tourData -> tour_application_one) checked="" @endif>
			  <label class="form-check-label" for="tour_application_one">
				8). Запретить подавать одному пользователю(педагогу) больше 1 заявки на определенный тур от 1 школы 
				<span class='sysQuestion'>Педагог может сам дополнять поданную заявку? Типо была заявка на 20 учеников, потом добавилось еше 5 учеников?<br>Дубликаты учеников система не пустит в принципе.</span>
			  </label>
			</div>
		</div>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='teacher_only'class="form-check-input" type="checkbox" id="teacher_only" @if($tourData -> teacher_only) checked="" @endif>
			  <label class="form-check-label" for="teacher_only">
				9) Разрешить подавать заявки пользователям только со статусом “Педагог”
			  </label>
			</div>
		</div>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='schoolboy_only'class="form-check-input" type="checkbox" id="schoolboy_only" @if($tourData -> schoolboy_only) checked="" @endif>
			  <label class="form-check-label" for="schoolboy_only">
				10) Разрешить подавать заявки пользователям только со статусом “Ученик”
			  </label>
			</div>
		</div>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='applications_moderation' class="form-check-input" type="checkbox" id="applications_moderation" @if($tourData -> applications_moderation) checked="" @endif>
			  <label class="form-check-label" for="applications_moderation">
				11) Включить модерацию заявок 
			  </label>
			</div>
		</div>


<span class='sysQuestion'> - Вообше вынести в саму заявку для администратора весь этот список<br>
	Статусы модерации:<br>
	  - Заявка поставлена в очередь на модерацию<br>
	  - Заявка отклонена<br>
	  - Заявка модерируется методистом<br>
	  - Принята без отправки заданий<br>
	  - Заявка принята<br>
	  - Заявка принята, работа(ты) на проверке!<br>
	  - Заявка рассмотрена. Внесите изменения указанные модератором и известите его<br>
</span>	  



		<div class='inputWrapper'>
			<div class='inputHelp'>12) Показать задания за *** дней до даты проведения тура. Прикрутиь поверку на ввод только числа в валидации </div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<input name='advance_day' type="text" class="form-control" placeholder="Показать задания за *** дней" value="{{ $tourData -> advance_day }}">
		</div>		
<span class='sysQuestion'> - Вообше вынести в саму заявку для администратора <br>
13) Произвольный текст - результат модерации - Наверное индивидуальный для каждой заявки?
</span>	
<div class='inputWrapper'>
14) Запретить подавать заявки, если организационно - правовая форма:
	<div class="row">
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_university' class="form-check-input" type="checkbox" @if($tourData -> type_university) checked="" @endif id="type_university" >
			  <label class="form-check-label" for="type_university">
				ВУЗ 
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_vicariate' class="form-check-input" type="checkbox" @if($tourData -> type_vicariate) checked="" @endif id="type_vicariate" >
			  <label class="form-check-label" for="type_vicariate">
				Викарианство 
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_sunday_school' class="form-check-input" type="checkbox" @if($tourData -> type_sunday_school) checked="" @endif id="type_sunday_school" >
			  <label class="form-check-label" for="type_sunday_school">
				Воскресная школа 
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_gymnasium' class="form-check-input" type="checkbox" @if($tourData -> type_gymnasium) checked="" @endif id="type_gymnasium" >
			  <label class="form-check-label" for="type_gymnasium">
				Гимназия 
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_department' class="form-check-input" type="checkbox" @if($tourData -> type_department) checked="" @endif id="type_department" >
			  <label class="form-check-label" for="type_department">
				Департамент образования 
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_orphanage' class="form-check-input" type="checkbox" @if($tourData -> type_orphanage) checked="" @endif id="type_orphanage" >
			  <label class="form-check-label" for="type_orphanage">
				Детский дом
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_spiritual_educational_center' class="form-check-input" type="checkbox" @if($tourData -> type_spiritual_educational_center) checked="" @endif id="type_spiritual_educational_center" >
			  <label class="form-check-label" for="type_spiritual_educational_center">
				Духовно просветительный центр
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_institute_for_advanced_studies' class="form-check-input" type="checkbox" @if($tourData -> type_institute_for_advanced_studies) checked="" @endif id="type_institute_for_advanced_studies">
			  <label class="form-check-label" for="type_institute_for_advanced_studies">
				Институт повышения квалификации
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_institute_for_educational_development' class="form-check-input" type="checkbox" @if($tourData -> type_institute_for_educational_development) checked="" @endif id="type_institute_for_educational_development" >
			  <label class="form-check-label" for="type_institute_for_educational_development">
				Институт развития образования
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_information_and_methodological_center' class="form-check-input" type="checkbox" @if($tourData -> type_information_and_methodological_center) checked="" @endif id="type_information_and_methodological_center" >
			  <label class="form-check-label" for="type_information_and_methodological_center">
				Информационно-методический центр
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_college' class="form-check-input" type="checkbox" @if($tourData -> type_college) checked="" @endif id="type_college" >
			  <label class="form-check-label" for="type_college">
				Колледж
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_committee' class="form-check-input" type="checkbox" @if($tourData -> type_committee) checked="" @endif id="type_committee" >
			  <label class="form-check-label" for="type_committee">
				Комитет образования
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_lyceum' class="form-check-input" type="checkbox" @if($tourData -> type_lyceum) checked="" @endif id="type_lyceum" >
			  <label class="form-check-label" for="type_lyceum">
				Лицей
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_ministry' class="form-check-input" type="checkbox" @if($tourData -> type_ministry) checked="" @endif id="type_ministry"  >
			  <label class="form-check-label" for="type_ministry">
				Министерство образования
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_oroik' class="form-check-input" type="checkbox" @if($tourData -> type_oroik) checked="" @endif id="type_oroik" >
			  <label class="form-check-label" for="type_oroik">
				ОРОиК
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_orthodox_school' class="form-check-input" type="checkbox" @if($tourData -> type_orthodox_school) checked="" @endif id="type_orthodox_school" >
			  <label class="form-check-label" for="type_orthodox_school">
				Православная общеобразовательная школа или гимназия
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_technical_college' class="form-check-input" type="checkbox" @if($tourData -> type_technical_college) checked="" @endif id="type_technical_college"  >
			  <label class="form-check-label" for="type_technical_college">
				Техникум
			  </label>
			</div>		
		</div>			
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_control' class="form-check-input" type="checkbox" @if($tourData -> type_control) checked="" @endif id="type_control"  >
			  <label class="form-check-label" for="type_control">
				Управление или отдел образования
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_specialized_school' class="form-check-input" type="checkbox" @if($tourData -> type_specialized_school) checked="" @endif id="type_specialized_school" >
			  <label class="form-check-label" for="type_specialized_school">
				Училище
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_center_for_continuing_education' class="form-check-input" type="checkbox" @if($tourData -> type_center_for_continuing_education) checked="" @endif id="type_center_for_continuing_education" >
			  <label class="form-check-label" for="type_center_for_continuing_education">
				Центр дополнительного образования
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_education_center' class="form-check-input" type="checkbox" @if($tourData -> type_education_center) checked="" @endif id="type_education_center" >
			  <label class="form-check-label" for="type_education_center">
				Центр образования (школа)
			  </label>
			</div>		
		</div>			
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_parochial_school' class="form-check-input" type="checkbox" @if($tourData -> type_parochial_school) checked="" @endif id="type_parochial_school" >
			  <label class="form-check-label" for="type_parochial_school">
				Церковно-приходская школа
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_school' class="form-check-input" type="checkbox" @if($tourData -> type_school) checked="" @endif id="type_school" >
			  <label class="form-check-label" for="type_school">
				Школа
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_school_of_languages' class="form-check-input" type="checkbox" @if($tourData -> type_school_of_languages) checked="" @endif id="type_school_of_languages" >
			  <label class="form-check-label" for="type_school_of_languages">
				Школа с углубленным изучением иностранных языков
			  </label>
			</div>		
		</div>			
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_school_of_subjects' class="form-check-input" type="checkbox" @if($tourData -> type_school_of_subjects) checked="" @endif id="type_school_of_subjects" >
			  <label class="form-check-label" for="type_school_of_subjects">
				Школа с углубленным изучением отдельных предметов
			  </label>
			</div>		
		</div>
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_school_of_ethnocultural' class="form-check-input" type="checkbox" @if($tourData -> type_school_of_ethnocultural) checked="" @endif id="type_school_of_ethnocultural" >
			  <label class="form-check-label" for="type_school_of_ethnocultural">
				Школа с этнокультурным компонентом
			  </label>
			</div>		
		</div>		
		<div class='col-6'> 
			<div class="form-check">
			  <input name='type_boarding_school' class="form-check-input" type="checkbox" @if($tourData -> type_boarding_school) checked="" @endif id="type_boarding_school" >
			  <label class="form-check-label" for="type_boarding_school">
				Школа-интернат (пансион)
			  </label>
			</div>		
		</div>

	</div>  
</div>	  
<span class='sysQuestion'>	  
15). Запретить подавать результаты тура участникам (галка - да/нет). одиночный участник или педагог<br>Как пересекается с 9,10 пунктами? 
</span>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='hide_results' class="form-check-input" type="checkbox" @if($tourData -> hide_results) checked="" @endif id="hide_results" >
			  <label class="form-check-label" for="hide_results">
				16). Скрыть результаты
			  </label>
			</div>
		</div>
		<div class='inputWrapper'>
			<div class='inputHelp'>17). Запретить скачивать благодарственные письма, тем кто загрузил менее ** результатов. 0 - полный запрет, 1000 - всем можно. без галки. Прикрутить поверку на ввод только числа в валидации </div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<input name='disable_download_letters' type="text" class="form-control" placeholder="К-во результатов" value="{{ $tourData -> disable_download_letters }}" >
		</div>		
<span class='sysQuestion'>
18). Отключить скачивание дипломов и благ.писем - Как пересекается с 17п? Получается, что можно скачать только диплом при запрете скачивания благ.писем? 
П.17 относится к количеству загруженных результатов, если не включить, то всем выдаются, можно выбрать 3, 5, 10 участников...
</span>
		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='statistics_year' class="form-check-input" type="checkbox" @if($tourData -> statistics_year) checked="" @endif id="statistics_year" >
			  <label class="form-check-label" for="statistics_year">
				19). Не участвует в статистике за год
			  </label>
			</div>
		</div>
<span class='sysQuestion'>
20). Отслеживать муниципальные дубли (галка - да/нет). - Разбираться или вообще перенести на следующий этап, как вариант - проверять учеников в заявке ? 
По фио, дате рождения, школе, классу в качестве идентификатора ученика.<br>
<b>Уже договорились - идентификация по ФИО и дате рождения.  Дубикаты - не проходят ни при каких условиях.</b>
<br>
В случае если обнаружены уже имеющиеся результаты участника - система не пропускает (см. в ТЗ). 
Опция отслеживания должна быть включаемая.<b>Однозначно при вводе участников тура - проверка на дубликаты. Бред будет если ученик сам подал заявку и он же попадает в заявке от всего класса. Примерно как меня дважды вписать в зарплатную ведомость)).  </b> 
</span>
		<div class='inputWrapper'>
		  <input type="color" id="color_button" name="color_button"  value="{{ $tourData -> color_button }}" >
		  <label for="color_button">21). Цвет кнопки</label>
		</div>
		<div class='inputWrapper'>
		  <input type="color" id="color_shadow" name="color_shadow"   value="{{ $tourData -> color_shadow }}">
		  <label for="color_shadow">21). тень объема кнопки</label>
		</div>		


<span class='sysQuestion'>
Отключение редактирования результатов и заявок
22). Запретить загрузку новых результатов
23). Запретить редактирование и загрузку результата
24). Запретить пользователю редактировать заявку<br> 
По моему логичнее ввести дату - до которой можно редактировать заявку и аналогично  ввести дату - до которой можно редактировать результаты 
Связать с датой проведения тура - то есть начиная с определенной даты. С возможностью вручную запрещать простым включением галочки например.<br>
Зачем галка - это усложнение логики. Поставили для загрузки новых результатов "+3"  - Результаты тура можно загружать в течении 3 дней с момента окончания тура<br>
Поставили 0 - результаты нельзя загружать вообше. Только как система будет работать при запрете загрузки результатов? 
</span>

		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='delete_application' class="form-check-input" type="checkbox"  @if($tourData -> delete_application) checked="" @endif id="delete_application" >
			  <label class="form-check-label" for="delete_application">
				25). Запретить пользователю удалять заявку
			  </label>
			</div>
		</div>

		<div class='inputWrapper'>
			<div class="form-check">
			  <input name='show_other_application' class="form-check-input" type="checkbox" id="flexCheckChecked" @if($tourData -> show_other_application) checked="" @endif>
			  <label class="form-check-label" for="flexCheckChecked">
				26). Запретить пользователю видеть чужие заявки в сводной таблице заявок 
			  </label>
			</div>
		</div>



Файлы (задания, ключи, доп информация).


<div class='row'>
	<div class='col-4 fileTourWrapper'>
		<h6 class="text-center">Файлы с вопросами:</h6>
		<div ondrop="uploadFileAdm30Ajax(event, 1)" ondragover="return false" class="wrapperDD widgetGreyMediumCSS">
			<div class="innerDD">
				<div class='infoDD' id="infoDD1">
					<p class='level1'>Перетащите файл сюда<br> или</p>
					<div class='level2'><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>
					<p class='level3'>Файл успешно загружен.<br>Можно добавить новый файл.</p>
					<p class='level4'>Отказ в загрузке,<br>не допустимый тип файла.</p>				
				</div>
				<input type="button" value="Выбрать файл" class="btn btnBlue bgBlueLight colorWhite ubuntu-400" onclick="fileExplorerAdm30Ajax('1');">
				<input type="file" id="selectfile1" multiple class='sysDD'>
			</div>
		</div>
		@foreach ($tourData -> files as $file)

			@if( $file -> file_type == 1) 
				<div class='fileTour'><a href="{{ asset('storage')}}{{$file -> system_path}}" download='{{$file -> original_name}}'>{{$file -> original_name}}</a><span class='fileTourDel' data-rec="{{$file -> id}}"><i class="bi bi-x-square"></i></span></div>	
			@endif
		@endforeach
	</div><!-- class='col-4' -->
	<div class='col-4 fileTourWrapper'>
		<h6 class="text-center">Файлы с ключами/ответами:</h6>
		<div ondrop="uploadFileAdm30Ajax(event, 2)" ondragover="return false" class="wrapperDD widgetGreyMediumCSS">
			<div class="innerDD">
				<div class='infoDD' id="infoDD2">
					<p class='level1'>Перетащите файл сюда<br> или</p>
					<div class='level2'><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>
					<p class='level3'>Файл успешно загружен.<br>Можно добавить новый файл.</p>
					<p class='level4'>Отказ в загрузке,<br>не допустимый тип файла.</p>				
				</div>
				<input type="button" value="Выбрать файл" class="btn btnBlue bgBlueLight colorWhite ubuntu-400" onclick="fileExplorerAdm30Ajax('2');">
				<input type="file" id="selectfile2" multiple class='sysDD'>
			</div>
		</div>	
			@foreach ($tourData -> files as $file)

				@if( $file -> file_type == 2) 
					<div class='fileTour'><a href="{{ asset('storage')}}{{$file -> system_path}}" download='{{$file -> original_name}}'>{{$file -> original_name}}</a><span class='fileTourDel' data-rec="{{$file -> id}}"><i class="bi bi-x-square"></i></span></div>	
				@endif
			@endforeach			
	</div><!-- class='col-4' -->
	<div class='col-4 fileTourWrapper'>
		<h6 class="text-center">Файлы с дополнительными материалами:</h6>
		<div ondrop="uploadFileAdm30Ajax(event, 3)" ondragover="return false" class="wrapperDD widgetGreyMediumCSS">
			<div class="innerDD">
				<div class='infoDD' id="infoDD3">
					<p class='level1'>Перетащите файл сюда<br> или</p>
					<div class='level2'><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>
					<p class='level3'>Файл успешно загружен.<br>Можно добавить новый файл.</p>
					<p class='level4'>Отказ в загрузке,<br>не допустимый тип файла.</p>				
				</div>
				<input type="button" value="Выбрать файл" class="btn btnBlue bgBlueLight colorWhite ubuntu-400" onclick="fileExplorerAdm30Ajax('3');">
				<input type="file" id="selectfile3" multiple class='sysDD'>
			</div>
		</div>
		
		@foreach ($tourData -> files as $file)

			@if( $file -> file_type == 3) 
				<div class='fileTour'><a href="{{ asset('storage')}}{{$file -> system_path}}" download='{{$file -> original_name}}'>{{$file -> original_name}}</a><span class='fileTourDel' data-rec="{{$file -> id}}"><i class="bi bi-x-square"></i></span></div>	
			@endif
		@endforeach
	</div><!-- class='col-4' -->
</div><!-- class='row'-->

		<div class='inputWrapper'>
			<div class='inputHelp'>30). Дополнительная информация для прошедших модерацию ( текстовое поле)</div>
			<div class='inputErr'>Сообшение об ошибке</div>
			<textarea  name='additional_ok_moderation' class="form-control" placeholder="Дополнительная информация для прошедших модерацию">{{ $tourData -> additional_ok_moderation }}</textarea>
		</div>	
		<button type="submit" class="btn btnBlue bgBlueLight colorWhite ubuntu-400">Применить обновления<i class="bi bi-caret-right-fill"></i></button>
</form>

{{--
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<p>Заготовки всяки разны,  уберу конечно.</p>

Где-то должен быть ТИП ТУРА - задается общая конфигурация тура ( модерируется или нет + прочее)



Особенности  заявок<br>

Автор заявки отображается только для Администратора, в общедоступном списке заявок автор и его личные данные не отображается.
В личном кабинете педагога - выводим только его заявки с текущим статусом модерации.<br>

Метки<br>
Каждой заявке Администратор может поставить <br>
- комментарий для педагога<br>
- комментарий для модератора ( виден только модератору)<br>
- метки, видные всем<br>
- метки видные только модератору<br>


      <div class="col-12">
        <h2 class="mt-4">CKEditor</h2>
        <textarea name="ce" class="form-control"></textarea>
      </div>
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
--}}
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


    $(document).ready(function()
	{
		$('.fileTourWrapper').on('click', '.fileTourDel', function()
		{
				let $obj = $(this);
				let idRec = $obj.data('rec');
				//let path = $obj.closest('.fileTour').find('a').attr('href');
				
				//console.log(idRec + ' удаляемая запись ' + path);
				$.ajax({
					type: 'POST',
					url: '{{ route( "admin30/fileTourDelete" )}}',
					//contentType: false,
					//processData: false,
						data: {
							"_token": '{{ csrf_token() }}',
							"idRec" :idRec,
							
						},
					success:function(msg) 
					{
						console.log( msg );
						if( msg == 'deleteOk' )
						{	//	Удаляем плашку с файлом со страницы
							$obj.closest('.fileTour').remove();
						}
					}
				});				
		});
		
	});	
		//	Загрузка файлов Админом для туров + запись в БД оригинального имени, + к какому туру относится + к какой категории относиться ( задачи(1), ответы(2), прочее(3))
		function uploadFileAdm30Ajax(e, objDD) {
			//alert('111');
			e.preventDefault();
			let idTemp = "rezDD" + objDD;
			fileObjTemp = e.dataTransfer.files;
			fileUploadAdm30Ajax(e.dataTransfer.files, objDD);
		
		};
		 
		function fileExplorerAdm30Ajax(objDD) {
			let idInput = 'selectfile' + objDD;
			document.getElementById(idInput).click();
			document.getElementById(idInput).onchange = function() {
			let fileObjTemp = document.getElementById(idInput).files;
			fileUploadAdm30Ajax(fileObjTemp, objDD);
			};
		};	
		
		function fileUploadAdm30Ajax(file_obj, objDD) 
		{
			if(file_obj != undefined) 
			{
				$('#infoDD'+ objDD + " .level1" ).hide();	//	Переташите файл сюда
				$('#infoDD'+ objDD + " .level2" ).show();	// Прелоадер
				$('#infoDD'+ objDD + " .level3" ).hide();	//	Успешная загрузка
				$('#infoDD'+ objDD + " .level4" ).hide();	// ОТказ - не верный тип файла		
				var form_data = new FormData();
				for(i=0; i<file_obj.length; i++) {  
					form_data.append('file[]', file_obj[i]);  
				};
				form_data.append('_token', '{{ csrf_token() }}');
				form_data.append('type_file', objDD); // категория файла
				// определяем ID тура
				let tour_id = $('input[name=tour_id]').val();
				console.log( 'идентификатор блока:'+objDD);
				form_data.append('tour_id', tour_id);
				$.ajax({
					type: 'POST',
					url: '{{ route( "admin30/fileUpdateTour" )}}',
					contentType: false,
					processData: false,
						data: //{
							//"_token": '{{ csrf_token() }}',
							form_data,
						//},
					success:function(msg) {
						$('#infoDD'+ objDD + " .level2" ).hide();	// Прелоадер
						if( msg == 'mimeTypeErr')
						{
							$('#infoDD'+ objDD + " .level4" ).show();	// ОТказ - не верный тип файла	
						}
						else
						{
							console.log(objDD);
							let $obj = $('#infoDD'+objDD ).closest('.fileTourWrapper');
							console.log($obj);
							$('#infoDD'+ objDD + " .level3" ).show();	//	Успешная загрузка
							$obj.append("<div class='fileTour'><a href='{{ asset('storage')}}"+msg+'</div>');
						}	

						$('#selectfile' + objDD).val('');
					}
				});
			}
		};
		

	
  </script>
@endsection

{{--

tour_name	varchar(255)	2) Название тура
tour_start	date	3) Начало тура
tour_end	date	4). Окончание тура
tour_close	INT	Уточнить 5). После завершения тура запретить подачу заявки.
tour_comment_teacher	TEXT	6). Комментарий (виден пользователям
tour_show_archive	INT	7). Показывать тур в архиве заданий
tour_application_one	INT	8). Запретить подавать одному пользователю(педагогу) больше 1 заявки на определенный тур от 1 школы 
teacher_only	INT	9) Разрешить подавать заявки пользователям только со статусом “Педагог”
schoolboy_only	INT	10) Разрешить подавать заявки пользователям только со статусом “Ученик”
applications_moderation	INT	11) Включить модерацию заявок
advance_day	INT	12) Показать задания за *** дней до даты проведения тура.
type_university	INT	ВУЗ 14) Запретить подавать заявки, если организационно - правовая форма: 
type_vicariate	INT	Викарианство
type_sunday_school	INT	Воскресная школа
type_gymnasium	INT	Гимназия
type_department	INT	Департамент образования
type_orphanage	INT	Детский дом
type_spiritual_educational_center	INT	Духовно просветительный центр
type_institute_for_advanced_studies	INT	Институт повышения квалификации
type_institute_for_educational_development	INT	Институт развития образования
type_information_and_methodological_center	INT	Информационно-методический центр
type_college	INT	Колледж
type_committee	INT	Комитет образования
type_lyceum	INT	Лицей
type_ministry	INT	Министерство образования
type_oroik	INT	ОРОиК
type_orthodox_school	INT	Православная общеобразовательная школа или гимназия
type_technical_college	INT	Техникум
type_control	INT	Управление или отдел образования
type_specialized_school	INT	Училище
type_center_for_continuing_education	INT	Центр дополнительного образования
type_education_center	INT	Центр образования (школа)
type_parochial_school	INT	Церковно-приходская школа
type_school	INT	Школа
type_school_of_languages	INT	Школа с углубленным изучением иностранных языков
type_school_of_subjects	INT	Школа с углубленным изучением отдельных предметов
type_school_of_ethnocultural	INT	Школа с этнокультурным компонентом
type_boarding_school	INT	Школа-интернат (пансион)
hide_results	INT	16). Скрыть результаты
advance_day	INT	17). Запретить скачивать благодарственные письма, тем кто загрузил менее ** результатов. 
statistics_year	INT	19). Не участвует в статистике за год
color_button	varchar(255)	21). Цвет кнопки
color_shadow	varchar(255)	21). тень объема кнопки
delete_application	INT	25). Запретить пользователю удалять заявку
show_other_application	INT	26). Запретить пользователю видеть чужие заявки в сводной таблице заявок 
additional_ok_moderation	text	30). Дополнительная информация для прошедших модерацию ( текстовое поле)


--}}