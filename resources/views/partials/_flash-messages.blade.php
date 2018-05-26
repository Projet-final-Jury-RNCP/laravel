
<!--

http://anytch.com/flash-messages-in-laravel-5/

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>

$('div.alert').delay(5000).slideUp(300);
 -->

@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
@if(Session::has('flash_message_delete'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
@endif



<!--

https://laravel.sillo.org/infyom/
https://github.com/laracasts/flash

        Flash::success('Ville deleted successfully.');

    flash('Message')->success(): Set the flash theme to "success".
    flash('Message')->error(): Set the flash theme to "danger".
    flash('Message')->warning(): Set the flash theme to "warning".
    flash('Message')->overlay(): Render the message as an overlay.
    flash()->overlay('Modal Message', 'Modal Title'): Display a modal overlay with a title.
    flash('Message')->important(): Add a close button to the flash message.
    flash('Message')->error()->important(): Render a "danger" flash message that must be dismissed.

 -->



<!--

https://laravel.sillo.org/creer-une-application-avec-laravel-5-5-les-categories-1-2/

<div class="container">
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        OK {{ session('ok') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
 -->


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
