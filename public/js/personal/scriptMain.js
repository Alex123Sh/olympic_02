$(function() 
{
	$(window).scroll(function()
	{
		// Верхнее меню
		positionWindowTop = $(window).scrollTop(); //$('#control').offset().top;
		//console.log( positionWindowTop + '-ss1123');
		if( positionWindowTop >= 110  )
		{
			//$('.topWidgetLogo').hide(0,0);
			$ ('.topWidgetMenu').addClass('correctionTop');
		}
		else
		{
			//$('.topWidgetLogo').show(0,0);
			$ ('.topWidgetMenu').removeClass('correctionTop');			
		}			
	});	


	/* Локализация datepicker */

	$.datepicker.regional['ru'] = {
		closeText: 'Закрыть',
		prevText: 'Предыдущий',
		nextText: 'Следующий',
		currentText: 'Сегодня',
		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
		monthNamesShort: ['Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря'],
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		weekHeader: 'Не',
		dateFormat: 'd M yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};

	$.datepicker.setDefaults($.datepicker.regional['ru']);
	$("#datepicker").datepicker();

	// Скрытие меню пользователя НЕ КАТИТ!  ПРи вводе пароля выплывает подсказка браузера - получаем выход мыши.
	/*
	$('#userTopMenu').mouseleave( function()
	{
		$('#userTopMenu').collapse('hide');
	});
	*/
	
	$('#authorizationAjax').click( function()
	{	//	Авторизация AJAX
		let email = $('#userTopMenu input[name=email]').val();
		let password = $('#userTopMenu input[name=password]').val();		
		$('#userTopMenu .preloaderUserTopMenu').show();
		$('#userTopMenu .answerErrUserTopMenu').show().html("");
	    $.ajax({
          url: URL_GLOBAL + "/authorizationAjax",
          type:"POST",
          data:{
            "_token": _token,
			/* */
            email:email,
            password:password,
			
          },
          success:function(response){
			//   console.log(response);
			$('#userTopMenu .preloaderUserTopMenu').hide();
			if( response == 'authorizationERR' )
			{
				$('#userTopMenu .answerErrUserTopMenu').show().html("Не верная комбинация логина и пароля");
			}
			else
			{
				window.location.href = URL_GLOBAL; 
			}
			
			
          }
         });
	});

	$('form').submit( function()
	{
		$obj = $(this);
		$obj.find('input[type=checkbox]').each(function(i,elem){
				let name = $(elem).attr('name');
				let isChecked = $(elem).prop('checked');
				let val = '0';
				if(isChecked) { val = '1'; } 
				//console.log(t + '  ' + isChecked);
				$(elem).after("<input type='hidden' value='"+val+"' name='"+name+"'>");
				$(elem).removeAttr('name');
				
		});
		console.log('привет чекбоксам');
	
		return true;
	});
	
});