@if(!empty($tenant))
    @foreach($tenant as $tv)
        {!! $tv['name'] or '' !!}
        @endforeach
@endif