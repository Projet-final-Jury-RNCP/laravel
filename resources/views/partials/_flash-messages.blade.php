
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif


@if(Session::has('flash_message_success'))

<div class="container">
    <div class="alert alert-dismissible alert-success fade show m-3" role="alert">
        {{ session('flash_message_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

@endif


@if(Session::has('flash_message_error'))

<div class="container">
    <div class="alert alert-dismissible alert-danger fade show m-3" role="alert">
        {{ session('flash_message_error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

@endif
