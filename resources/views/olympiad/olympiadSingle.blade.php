@extends('layouts.app')

@section('title'){{$olympiadSingle['name']}}@endsection

@section ('content')
@php
	//dump( $olympiadSingle );
@endphp
<h2>{{$olympiadSingle['name'] }}</h2>
@isset($olympiadSingle['tour'] )
{{-- Есть туры у этой олимпиады --}}
<ul class="ulRect list-group">
	@foreach($olympiadSingle['tour'] as $key => $tour)

		<li class="list-group-item">
			<i class="bi bi-caret-right-fill"></i> id:{{ $tour['id_tour']}}  {{ $tour['tour_name'] }}
				<div class="editBlockRight">
						@php
							if (isset( auth()->user() -> role )) { $role = auth()->user() -> role; } else { $role = 0; } 
						@endphp
						@if ( $role == 10 )
							Ученик
						@elseif ( $role == 20 )
							Педагог
						@elseif ( $role == 30 )
						
						{{--	Admin	--}}
							<a href="{{ route('admin30/olympicTourEdit', [ 'id' => $olympiadSingle['id_olimpiad'],  'type' => $olympiadSingle['type'], 'name' => $olympiadSingle['name'], 'id_tour' => $olympiadSingle['tour'][$key]['id_tour'] ]) }}" title="Редактирование"><i class="bi bi-pencil-square"></i></a> 
							<a href="{{ route('admin30/olympicTourDelete', [ 'id' => $olympiadSingle['id_olimpiad'],  'type' => $olympiadSingle['type'], 'name' => $olympiadSingle['name'] ]) }}" title="Удаление"><i class="bi bi-trash3"></i></a> 
							<a href="{{ route('admin30/olympicTourNew', [ 'id' => $olympiadSingle['id_olimpiad'],  'type' => $olympiadSingle['type'], 'name' => $olympiadSingle['name'] ]) }}" title="Добавить тур"><i class="bi bi-bag-plus-fill"></i></a> 
				
						@endif
				</div>
		</li>
	
	@endforeach
				
		
</ul>
			

@endisset
<div class='row'>
<img class="olympiadSingleIMG" src="{{$olympiadSingle['pictUrl']}}" alt="{{ $olympiadSingle['name']}}">
{!! $olympiadSingle['content']!!}
</div><!-- class='row' -->

@endsection

