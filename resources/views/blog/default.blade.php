@extends('layouts.record')

@section('main')

	<div class="container">
		<div class="row">
			<div class="col-8 offset-2">
				<div class="post-info">
					<h1>{{ $record->title }}</h1>
					<div class="record-data">
						<span class="user">por {{ $record->rel_user->name }}</span> | <span class="date">el {{ $record->dateFormat() }}</span>
					</div>
				</div>
		
				<div class="post-content">
					<img class="post-imagen" src="<?= url('imgs/'.$fields['image']); ?>" alt="">
					<p>{{ $fields['cuerpo'] }}</p>
				</div>

				@include('comments.show',['comments' => $record->comments, 'id' => $record->id])

			</div>
		</div>
		
	</div>

@endsection