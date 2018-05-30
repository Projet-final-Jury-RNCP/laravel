@extends('layouts.public')

@section('title')
Liste des utilisateurs
@stop

@section('content')

<!--

https://v4-alpha.getbootstrap.com/migration/

.panel to .card, now built with flexbox.
.panel-default removed and no replacement.

.panel-heading to .card-header

.panel-body to .card-block

https://www.quackit.com/bootstrap/bootstrap_4/tutorial/bootstrap_tables.cfm


https://getbootstrap.com/docs/4.1/migration/
https://getbootstrap.com/docs/4.1/utilities/display/
hidden -> d-none d-md-block d-lg-none


 -->

<div class="container">

    <br>

	<div class="card">
  		<div class="card-header clearfix">

  		Utilisateurs

      <div class="btn-group pull-right">
        <a href="{{ url('/admin/user/create') }}" class="btn btn-info btn-sm">Ajouter</a>
      </div>

  		</div>
  		<div class="card-block">

@include('partials._form-errors')


@if ( count($arrayUser) == 0 )

                <div class="media well">
                    <div class="media-body">
                        <h4 class="media-heading">Aucun utilisateur</h4>
                    	<a href="{{ url('/admin/user/create') }}">Ajouter un utilisateur</a>
                    </div>
                </div>

@else
	<!-- Display the complete list of users with links for deleting and modifying -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover"><!--  table-sm -->
            <thead class="thead-dark">
                <tr>
                	<th>Id</th>
                    <th>Name</th>
                    <th class="hidden-on-small">Email</th>
                    <th class="hidden-on-small">Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arrayUser as $user)
                    <tr style="{{ $user->active?:'text-decoration: line-through;' }}">
                    	<td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="hidden-on-small">{{ $user->email }}</td>
                        <td class="hidden-on-small">{{ $user->role }}</td>
                        <td>

	<a href="{{ url('/admin/user/' . $user->id . '/edit') }}" class="btn btn-success btn-sm">Modifier</a>

    <form action="{{ url('/admin/user/' . $user->id) }}" method="POST" role="form" style="display: inline">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
    </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $arrayUser->links() }}	<!-- pagination + justify-content-center : https://laravel.com/docs/5.6/pagination    -->

@endif

    </div>

    </div>

</div>

@stop