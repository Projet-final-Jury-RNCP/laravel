@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    	<p>
    		<strong>Houps&#xA0;!</strong>
    		Veuillez corriger les éléments suivants&#xA0;:
    	</p>
    	<ul>
    		@foreach ($errors->all() as $error)
    		<li>{{ $error }}</li>
    		@endforeach
    	</ul>
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
@endif
