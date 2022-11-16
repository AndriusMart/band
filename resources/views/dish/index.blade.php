@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Dishes</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($dishes as $dish)
                        <li class="list-group-item">
                            <div class="hotels-list">
                                <div class="content">
                                    <h2><span>Title: </span>{{$dish->title}}</h2>
                                    <h4><span>Price: </span>{{$dish->price}}</h4>
                                    <h4><span>Time: </span>{{$dish->time}}</h4>
                                    <h5>
                                        <span>Country: </span>
                                        <a href="{{route('r_show', $dish->getRestaurant->id)}}">
                                            {{$dish->getRestaurant->title}}
                                        </a>
                                    </h5>
                                    @if($dish->getPhotos()->count())
                                    <h5><a href="{{$dish->lastImageUrl()}}" target="_BLANK">Photos: [{{$dish->getPhotos()->count()}}]</a> </h5>
                                    @endif
                                </div>
                                <div class="buttons">
                                    <a href="{{route('d_show', $dish)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >=10)
                                    <a href="{{route('d_edit', $dish)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('d_delete', $dish)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No dishes found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection