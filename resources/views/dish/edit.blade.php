@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Update dish</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('d_update', $dish)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title', $dish->title)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price', $dish->price)}}">
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo[]" multiple class="form-control">
                        </div>
                        <div class="img-small-ch mt-3">
                            @forelse($dish->getPhotos as $photo)
                            <div class="img">
                                <label for="{{$photo->id}}-del-photo">X</label>
                                <input type="checkbox" value="{{$photo->id}}" id="{{$photo->id}}-del-photo" name="delete_photo[]">
                                <img src="{{$photo->url}}">
                            </div>
                            @empty
                            <h2>No photos yet.</h2>
                            @endforelse
                        </div>

                        <select name="restaurant_id" class="form-select mt-3">
                            <option value="0">Choose restaurant</option>
                            @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}" @if($restaurant->id == old('restaurant', $dish->restaurant_id)) selected @endif>{{$restaurant->title}}</option>
                            @endforeach
                        </select>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection