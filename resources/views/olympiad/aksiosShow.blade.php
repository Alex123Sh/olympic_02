@extends('layouts.app')

@section('title', 'Олимпиады АКСИОС')

@section ('content')

	<div class='row singleOlympiad'>
		<div class='col-xl-2 col-lg-5 col-12' >
			<div class="pict"> <img class='logoOlympiad' src='/css/personal/pictCSS/aksios188.png'></div>
		</div>	
		<div class='col-xl-4 col-lg-7 col-12 '>	
			<div class="title"><h2>Аксиос</h2></div>
		</div>	
		<div class='col-xl-3 col-lg-6 col-12' >
			<div class="link">
				<a href="#" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400"><i class="bi bi-caret-right-fill"></i>  Новости по турам</a><br>
				<a href="#" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400"><i class="bi bi-caret-right-fill"></i>  Материалы и задания прошлых лет</a><br>
			</div>
		</div>
		<div class='col-xl-3 col-lg-6 col-12'>
			<div class='link' >
				<a href="#" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400"><i class="bi bi-caret-right-fill"></i>  Новости по турам</a><br>
				<a href="#" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400"><i class="bi bi-caret-right-fill"></i>  Туры</a><br>
				<a href="#" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400"><i class="bi bi-caret-right-fill"></i>  Материалы и задания прошлых лет</a><br>
				<a href="#" class="btn   btn-sm btnWhite bgGreyLight colorBlueDark ubuntu-400"><i class="bi bi-caret-right-fill"></i>  Туры</a><br>				
			</div>
		</div>			
	</div>
<h2>Олимпиада АКСИОС</h2>

<div class='row'>
@foreach( $olympiadS as $olympiad )

	
 
			<div class='col-lg-6 col-12'>
				<div class="boxOlympiad bgGreyLight">
					<div class='editBlockRight'>
						@php
							if (isset( auth()->user() -> role )) { $role = auth()->user() -> role; } else { $role = 0; } 
						@endphp
						@if ( $role == 10 )
							Ученик
						@elseif ( $role == 20 )
							Педагог
						@elseif ( $role == 30 )
							<a href="{{ route('admin30/olympicEdit', $olympiad -> id ) }}" title="Редактирование"><i class="bi bi-pencil-square"></i></a> 
							<a href="{{ route('admin30/olympicDelete', [ 'id' => $olympiad -> id, 'type' => $olympiad -> type] ) }}" title="Удаление"><i class="bi bi-trash3"></i></a> 
							<a href="{{ route('admin30/olympicTourNew', [ 'id' => $olympiad -> id,  'type' => $olympiad -> type, 'name' => $olympiad -> name ]) }}" title="Добавить тур"><i class="bi bi-bag-plus-fill"></i></a> 
						@endif
					</div>		
					<div class="container">
						<div class='row'>
							<div class="col-lg-4 col-12 imgWrapper"><img src='{{ $olympiad -> pictUrl }}'></div>
							<div class="col-lg-8 col-12 infoWrapper">
								<h5>{{ $olympiad -> name }}</h5>
								{{ $olympiad -> preview_text }}
							</div>
						</div>
					</div>
					<a href="{{ route('olympiadSingle', $olympiad -> id ) }}">&nbsp;</a>
				</div>
			</div>


@endforeach
</div><!-- class='row' -->
<div class='tailwindCSS'>
{{ $olympiadS->links() }}
</div>
@endsection

@section('jsForPage')

@endsection