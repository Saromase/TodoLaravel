@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edition du post It</div>

                <div class="card-body">
                    <form action="{{(isset($post)) ? route('postitUpdate') : route('postitCreate')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ (isset($post)) ? $post->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ (isset($post)) ? $post->description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Statut</label>
                            <select class="form-control" id="status" name="status">
                                @foreach ($statusList as $status)
                                    <option value="{{ $status->id }}" style="background-color : {{$status->color}}" {{ (isset($post) && $status->id === $post->status) ? 'selected' : ''}}>{{ $status->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" value="{{ (isset($post)) ? $post->id : '' }}" name="id">
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
