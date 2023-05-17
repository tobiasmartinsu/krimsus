@if(Session::has('error'))
    {{Session::get('error')}}

@endif