
@if(isset($success) && is_array($success))
    <div class="alert alert-success">
        <p>Traitement effectué&#xA0;:</p>
        <ul>
            @foreach ($success as $success)
                <li>{{ $success }}</li>
            @endforeach
        </ul>
    </div>
@endif
