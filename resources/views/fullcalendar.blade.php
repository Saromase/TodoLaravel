@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection

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
