@extends('layouts.record')

@section('main')

	<div class="container">
		<h1>{{ $record->title }}</h1>
		<div class="record-data">
			<span class="user">por {{ $record->rel_user->name }}</span> | <span class="date">el {{ $record->dateFormat() }}</span>
		</div>
		
		@include('comments.show',['comments' => $record->comments, 'id' => $record->id])
		
	</div>

@endsection