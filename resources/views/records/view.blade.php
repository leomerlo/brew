@section('title', $record->title)

@section('body-class',$type_slug.' '.$type_slug.'-'.$record->slug)

@section('styles')
<link rel="stylesheet" href="<?= url("css/site.css");?>">
@endsection

@include('layouts.head')

@include('layouts.menu')

<div class="main-container">

	@includeFirst([
		$type_slug.'.'.$record->id,
		$type_slug.'.'.$record->slug,
		$type_slug.'.default',
		'records.default'
	], ['record' => $record])

</div>

@include('layouts.foot')