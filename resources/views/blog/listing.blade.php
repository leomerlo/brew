<div class="container">

	<h1 class="mb-4">Blog</h1>

	<div class="row">

		@if (count($type->records))
			@foreach($type->records as $record)

			<div class="col-4">

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= url('imgs/'.$fields[$record->id]['image']); ?>" alt="{{ $record->title }}">
				  <div class="card-body">
				  	<h2 class="card-title"><a href="{{ route('record.view', [ 'slug' => $record->slug ])}}">{{ $record->title }}</a></h2>
				  	<h3 class="card-subtitle mb-2 text-muted">{{ $record->dateFormat() }}</h3>
				    <p class="card-text">{{ strlen($fields[$record->id]['cuerpo']) > 100 ? substr($fields[$record->id]['cuerpo'], 0, 100).'...' : $fields[$record->id]['cuerpo'] }}</p>
				  </div>
				</div>

			</div>
			@endforeach
		@else
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h2>No se encontraron records del tipo {{ $type->type }}</h2>
				</div>
			</div>
		</div>
		@endif

	</div>

</div>