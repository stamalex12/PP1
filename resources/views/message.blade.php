@if(session('success'))
<div class="row">
	<div class="">
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('success') }}
		</div>
	</div>
</div>
@endif

@if(session('fail'))
	<div class="row">
		<div class="">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ session('fail') }}
			</div>
		</div>
	</div>
@endif