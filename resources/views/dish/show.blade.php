@extends('layouts.app')
@section('content')

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-back">
                            <h2>dish</h2>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="content">
                            <div class="show-l">
                                <div class="show-info">

                                    <div class="line"><span>title: </span>
                                        <h5>{{$dish->title}}</h5>
                                    </div>
                                    <div class="line"><span>price: </span>
                                        <h5>{{$dish->price}}</h5>
                                    </div>
                                    <div class="line"><small>Restaurant: </small>
                                        <h5>{{$dish->getRestaurant->title}}</h5>
                                    </div>
                                    <div class="line"><span>rating: </span>
                                        <h5>{{$dish->rating ?? 'X'}}</h5>
                                    </div>
                                </div>
                                <div>
                                    @if($dish->getPhotos()->count())
                                    @forelse($dish->getPhotos as $photo)
                                    <img src="{{$photo->url}}" class="show-img">
                                    @empty
                                    <h3>No Photos</h3>
                                    @endforelse
                                    @else
                                    <img src="<?= asset('images/nophoto.jpg') ?>" class="show-img" />
                                    @endif
                                </div>
                            </div>

                            
                            {{-- <h2 class="title">About!</h2>
                                    <div class="line">
                                        <p>{{$items->about}}</p>
                                    </div>
                        </div> --}}
                        @php
                        $votes = json_decode($dish->votes ?? json_encode([]));
                        @endphp
                        @if(in_array(Auth::user()->id, $votes))
                        <div>You already rated this item</div>

                        @else
                        <form action="{{route('rate', $dish)}}" method="post">
                            <select name="rate">
                                @foreach(range(1, 10) as $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-info">Rate</button>
                        </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
@endsection
