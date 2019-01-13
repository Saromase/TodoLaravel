@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($statusList))
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Couleur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statusList as $status)
                    <tr>
                        <th scope="row">{{$status->name}}</th>
                        <td style="background-color : {{$status->color}}; width : 5%;"></td>
                        <td style="width : 10%">
                            <a href="{{ route('postitStatusEdit', ['id' => $status->id])}}" title="Modifier"><button type="button" class="btn btn-outline-light btn-sm"><i class="fas fa-edit"></i></button></a>
                            <a href="{{ route('postitStatusDeleteOne', ['id' => $status->id])}}" title="Supprimer"><button type="button" class="btn btn-outline-light btn-sm"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{route('postitStatusAdd')}}"><button type="button" class="btn btn-outline-success btn-sm" style="position: absolute; left: 91%; bottom: 7%;"><i class="fas fa-plus"></i></button></a>
</div>
@endsection
