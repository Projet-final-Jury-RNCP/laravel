
@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Houps&#xA0;!</strong> Veuillez corriger les éléments suivants&#xA0;:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
