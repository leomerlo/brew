<div class="comment-wrapper">
	@if(count($comments) > 0)
		@foreach($comments as $comment)
			<div class="card">
				<div class="card-body">
					<div class="user"><span>{{ $comment->user->name }}</span> escribió:</div>
					<div class="body">{{ $comment->body }}</div>
					<div class="date">
						creado
						@if($comment->getCreatedHoursAgo() > 0)
							hace {{ $comment->getCreatedHoursAgo() }} horas
						@else
							recien
						@endif
					</div>
				</div>
			</div>
		@endforeach
	@else
		<div class="card">
			<div class="card-body">
				No hay comentarios, podés ser el primero!
			</div>
		</div>
	@endif
</div>