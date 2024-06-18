{{-- В зависимомсти от роли пользователя выводим его меню --}}
		@if ( $role == 10 )
			<li class="list-group-item"><i class='bi bi-caret-right-fill'></i> Ученик <span class='liRem'>2q22</span></li>
			<li class="list-group-item">we1 текст <span class='liRem'>d2e2</span></li>				
			<li class="list-group-item">ff1 текст <span class='liRem'>rg22 <i class='bi bi-caret-right-fill'></i></span></li>
			<li class="list-group-item">ewwrr1 текст <span class='liRem'>2522</span></li>				
			<li class="list-group-item">wewr1 текст <span class='liRem'>5222</span></li>
		@elseif ( $role == 20 )
			<li class="list-group-item"><i class='bi bi-caret-right-fill'></i> Педагог <span class='liRem'>2q22</span></li>
			<li class="list-group-item">we1 текст <span class='liRem'>d2e2</span></li>				
			<li class="list-group-item">ff1 текст <span class='liRem'>rg22 <i class='bi bi-caret-right-fill'></i></span></li>
			<li class="list-group-item">ewwrr1 текст <span class='liRem'>2522</span></li>				
			<li class="list-group-item">wewr1 текст <span class='liRem'>5222</span></li>								
		@elseif ( $role == 30 )
			<li class="list-group-item"><a href='{{ route("admin30/userControl") }}'><i class='bi bi-caret-right-fill'></i>Контроль пользователей</a></li>
			<li class="list-group-item"><a href='{{ route("admin30/olympicCreate") }}'><i class='bi bi-caret-right-fill'></i>Создать Олимпиаду <span class='liRem'><i class='bi bi-caret-right-fill'></i></span></a></li>					

											
		@else
			<li class="list-group-item"><i class='bi bi-caret-right-fill'></i> role - н/д <span class='liRem'>2q22</span></li>
		@endif	