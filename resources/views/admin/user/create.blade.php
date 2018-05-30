@extends('layouts.public')

@section('title')
Créer un nouvel utilisateur
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
  		<div class="card-header">Créer un nouvel utilisateur</div>
  		<div class="card-block" style="padding: 1.5rem">

<!--         <div class="row"> -->
<!--             <div class="col-md-12"> -->

			@include('partials._form-errors')

			<!-- The form to create a new user -->
			<form action="{{ url('/admin/user/create') }}" method="POST">

  				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
				    <label for="content">Login</label>
				    <input type="text" name="username" placeholder="Identifiant" class="form-control" value="{{ old('username') }}">
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
				    <input type="text" name="name" placeholder="Nom" class="form-control" value="{{ old('name') }}">
				    <small class="text-danger">{{ $errors->first('name') }}</small>
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				    <label for="content">Email</label>
				    <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
				    <small class="text-danger">{{ $errors->first('email') }}</small>
				</div>

				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
				    <label for="content">Role</label>
    				<select name="role" class="form-control">
    					<option value="management">management</option>
    					<option value="management">responsable_du_stock</option>
    					<option value="management">cuisinier</option>
    				</select>
				    <small class="text-danger">{{ $errors->first('role') }}</small>
				</div>

			    <button type="submit" class="btn btn-primary">Créer</button>
			</form>

<!--             </div> -->
<!--         </div> -->

    	</div>
    </div>

</div>
@stop