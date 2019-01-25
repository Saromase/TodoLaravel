@extends('layouts.app')

@section('scripts')
<script>
    var events = []
    @foreach($events as $event)
        var store = {
            title       : '{{ $event->title }}',
            description : '{{ $event->description }}',
            start       : '{{ $event->start }}',
            end         : '{{ $event->end }}',
        }
        events.push(store);
    @endforeach
</script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
    <script src="{{ asset('js/helper/request.js') }}" defer></script>
@endsection

@include('helper.modal_event')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Calendrier
        </div>
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>

@endsection
