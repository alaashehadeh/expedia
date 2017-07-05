@extends('welcome')
@section('content')
    @if(count($result) == 0)
        <div class="alert alert-danger text-center lead">We are sorry, no result found</div>
    @endif
    @if(count($result) > 0)
        <div class="alert alert-info text-center lead">We found {{count($result)}} offer for you</div>

        <!-- search result -->
        <div class="row">
            @foreach($result as $value)
                <div class="col-md-4">
                    <div class="card">
                        <div class="hotelImage">
                            <a href="{{$value['hotelInfositeUrl']}}" target="_blank"> <img
                                        src="{{$value['hotelImageUrl']}}"/> </a>
                        </div>
                        <h4><a href="{{$value['hotelInfositeUrl']}}" target="_blank">{{$value['name']}}</a></h4>
                        <h5>{{$value['destination']}}</h5>

                        <div class="stars">
                            <input id="input-2" name="star" value="{{$value['hotelStarRating']}}" disabled
                                   class="rating rating-loading" data-size="xs" data-show-clear="false"
                                   data-show-caption="false">
                        </div>
                        <div class="desc">
                            {{$value['description']}}
                        </div>

                        <div class="row">
                            <div class="col-md-4 lead">
                                {{$value['lengthOfStay']}} Nights
                            </div>
                            <div class="col-md-8 lead">
                                @if($value['percentSavings'] > 0)
                                    <div class="old-price">
                                        <strike>{{$value['originalPricePerNight'].' '.$value['currency'] }}
                                            /Night</strike>
                                    </div>
                                @endif
                                {{$value['averagePriceValue'].' '.$value['currency'] }}/Night

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection