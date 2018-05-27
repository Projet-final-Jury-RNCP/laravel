@extends('layouts.public')

@section('title')
Modifier l'utilisateur {{ $user->name }}
@stop

@section('content')

@push('scripts-end')
<script type="text/javascript">
$( document ).ready(function() {

	$("#choiceicon span")
// 	.css("color", "grey")
	.on('click', function() {
		var classIcon = $( this ).attr('class');

		$("#iconchoiced").attr('class', classIcon);
		$("#icon").val(classIcon);
	})
	;

});
</script>
@endpush

<!-- https://getbootstrap.com/docs/4.0/components/forms/ -->

<div class="container">

    <br>

	<div class="card">
  		<div class="card-header">Icon, titre, description</div>
  		<div class="card-block" style="padding: 1.5rem">

			@include('partials._form-errors')

		    <form action="{{ url('/admin/user/' . $user->id) }}" method="POST" role="form" enctype="multipart/form-data">

		        {{ csrf_field() }}
		        {{ method_field('PUT') }}

				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
		            <label for="content">Login</label>
		    		<input disabled="disabled" type="text" name="name" placeholder="Identifiant" value="{{ !is_null(old('username'))?old('username'):$user->username }}" class="form-control">
		            <small class="text-danger">{{ $errors->first('username') }}</small>
		        </div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				    <label for="content">Mot de passe</label>
				    <input type="password" name="password" placeholder="Mot de passe" class="form-control" value="{{ old('password') }}">
				    <small class="text-danger">{{ $errors->first('password') }}</small>
				</div>

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
				    <label for="content">Mot de passe (à confirmer)</label>
				    <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" class="form-control" value="{{ old('password_confirmation') }}">
				    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
				</div>

				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		            <label for="content">Nom</label>
		    		<input type="text" name="name" placeholder="Nom" value="{{ !is_null(old('name'))?old('name'):$user->name }}" class="form-control">
		            <small class="text-danger">{{ $errors->first('name') }}</small>
		        </div>

		        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		            <label for="content">Email</label>
		    		<input type="email" name="email" placeholder="Email" value="{{ !is_null(old('email'))?old('email'):$user->email }}" class="form-control">
		            <small class="text-danger">{{ $errors->first('email') }}</small>
		        </div>

				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
				    <label for="content">Role</label>
    				<select name="role" class="form-control">
    					<option value="management" {{ ($user->role=='management'?'selected':'') }}>management</option>
    					<option value="management" {{ ($user->role=='responsable_du_stock'?'selected':'') }}>responsable_du_stock</option>
    					<option value="management" {{ ($user->role=='cuisinier'?'selected':'') }}>cuisinier</option>
    				</select>
				    <small class="text-danger">{{ $errors->first('role') }}</small>
				</div>

				<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
				    <label for="content">Actif ?</label>
				    <input type="checkbox" name="active" placeholder="Confirmation du mot de passe" class="form-control" value="1" {{ $user->active?'checked':'' }} >
				    <small class="text-danger">{{ $errors->first('active') }}</small>
				</div>

		        <button type="submit" class="btn btn-primary">Enregistrer</button>
		    </form>

    	</div>
    </div>

</div>
@stop