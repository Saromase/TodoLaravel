@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edition du statut</div>

                <div class="card-body">
                    @if ($errors->any())
                        @include('helper.modal_error', ['errors' => $errors])
                    @endif
                    <form action="{{(isset($status)) ? route('postitStatusUpdate') : route('postitStatusCreate')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom ..." value="{{ (isset($status)) ? $status->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="color">Couleur</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="#fff" value="{{ (isset($status)) ? $status->color : '' }}">
                        </div>

                        <input type="hidden" value="{{ (isset($status)) ? $status->id : '' }}" name="id">
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
