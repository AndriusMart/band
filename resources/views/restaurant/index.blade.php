@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Restaurants</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($restaurants as $restaurant)
                        <li class="list-group-item">
                            <div class="hotels-list">
                                <div class="content">
                                    <h2>{{$restaurant->title}}</h2>
                                    <h2>{{$restaurant->city}}</h2>
                                    <h2>{{$restaurant->address}}</h2>

                                </div>
                                <div class="buttons">
                                    <a href="{{route('r_show', $restaurant)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >=10)
                                    <a href="{{route('r_edit', $restaurant)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('r_delete', $restaurant)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No countries found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection