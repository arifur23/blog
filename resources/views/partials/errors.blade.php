@if (count($errors)>0)
        div.alert <alert-danger>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
        </alert-danger>
@endif