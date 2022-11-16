@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                    <h2>Change restaurant</h2>
                </div>
                </div>
                <div class="card-body">
                    <form action="{{route('r_update', $restaurant)}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title',$restaurant->title)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">City</span>
                            <input type="text" name="city" class="form-control" value="{{old('season',$restaurant->city)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Address</span>
                            <input type="text" name="address" class="form-control" value="{{old('season',$restaurant->address)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Time (from-to)</span>
                            <input type="text" name="time" class="form-control" value="{{old('season',$restaurant->time)}}">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection