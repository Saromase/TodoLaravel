@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts->chunk(4) as $chunk) 
    <div class="row justify-content-center">
        @foreach ($chunk as $post)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header" style="background-color : {{ $post->color}}">{{$post->name}}</div>

                <div class="card-body" style="height : 15em;">
                    {{ str_limit($post->description, $limit = 150, $end = '...') }}
                </div>

                <div class="card-footer">
                    <a href="{{ route('postitEdit', ['id' => $post->id])}}" title="Modifier"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i></button></a>
                    <a href="{{ route('postitDeleteOne', ['id' => $post->id])}}" title="Supprimer"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fas fa-trash-alt"></i></button></a>
                    <a href="#" title="Supprimer"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fas fa-copy"></i></button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    <a href="{{route('postitAdd')}}"><button type="button" class="btn btn-outline-success btn-sm" style="position: absolute; left: 91%; bottom: 7%;"><i class="fas fa-plus"></i></button></a>

</div>
@endsection
