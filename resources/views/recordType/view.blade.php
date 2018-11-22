@section('title', 'Archivo de '.$type->type)

@section('body-class',$type->slug.' '.$type->slug.'-archive archive')

@section('styles')
<link rel="stylesheet" href="<?= url("css/site.css");?>">
@endsection

@include('layouts.head')

@include('layouts.menu')

<div class="main-container">

@includeFirst([
	$type->slug.'.listing',
	'recordType.default'
], ['type' => $type])

</div>

@include('layouts.foot')