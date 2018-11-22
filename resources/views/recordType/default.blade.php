<div class="container">

	<h1>Listado de {{ $type->type }}</h1>

	<div>

		@if (count($type->records))
			@foreach($type->records as $record)
			<div class="card">
				<div class="card-body">
					<h2 class="card-title"><a href="{{ route('record.view', [ 'id' => $record->id ])}}">{{ $record->title }}</a></h2>
					<h3 class="card-subtitle mb-2 text-muted">
						{{ $record->dateFormat() }}
					</h3>
				</div>
			</div>
			@endforeach
		@else
		<div class="card">
			<div class="card-body">
				<h2>No se encontraron records del tipo {{ $type->type }}</h2>
			</div>
		</div>
		@endif

	</div>

</div>