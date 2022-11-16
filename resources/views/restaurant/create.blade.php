@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>New Restaurant</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('r_store')}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">City</span>
                            <input type="text" name="city" class="form-control" value="{{old('city')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Address</span>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Time (from-to)</span>
                            <input type="text" name="time" class="form-control" value="{{old('time')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection