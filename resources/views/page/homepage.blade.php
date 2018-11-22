<section class="hero" style="background-image:url(<?= url('imgs/'.$fields['bg-image']) ?>)">

	<div class="block">
		<h1 class="title">{{ $fields['homepage-title'] }}</h1>
		<h2 class="subtitulo">{{ $fields['subtitulo'] }}</h2>
	</div>

</section>

<section class="stories">

	<div class="container">
		<div class="row align-items-center">
			<div class="col-6">
				<img src="<?= url('imgs/'.$fields['stories-imagen']); ?>" alt="">
			</div>
			<div class="col-6">
				<h2 class="title">{{ $fields['stories-titulo'] }}</h2>
				<p class="copete">{{ $fields['stories-texto'] }}</p>
				<a href="$fields['stories-link-href']">{{ $fields['stories-link-texto'] }}</a>
			</div>
		</div>
	</div>

</section>