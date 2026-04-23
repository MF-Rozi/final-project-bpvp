@extends('landing.master')

@section('content')

<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
            <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                <h1>Detail Attraction</h1>
            </div><!-- //.HERO-TEXT -->
        </div>
        <!--- END COL -->
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END SECTION TOP -->

<!-- START SINGLE PROPERTY DETAILS -->
<section class="property_single_details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="property_single_details_slide">
                    <img src="{{ asset('/storage/landing/assets/img/2.jpg') }}" class="img-fluid" alt="About-Slide">
                </div>
                <div class="property_single_details_price">
                    <h1>{{ $attraction->name }}</h1>
                    <h4>Rp.{{ number_format($attraction->ticket_price) }} <span class="small">/Pax</span></h4>
                    <p>{{ $attraction->address }}</p>
                    <ul>
                        <li><i class="fa fa-check"></i>Zone: {{ $attraction->zone->name }}</li>
                    </ul>
                </div>
                <div class="property_single_details_description">
                    <h4>Attraction Description</h4>
                    <p>{{ $attraction->description }}</p>
                </div>
                <div class="property_info">
                    <div class="row">
                        <div class="single_similar_property">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single_property">
                                        <img src="{{ asset('/storage/landing/assets/img/property/1.jpg') }}" class="img-fluid" alt="" />
                                        <div class="single_property_description text-center">
                                            <span><i class="fa fa-object-group"></i>{{ $attraction->zone->attractions->count() }} Attractions</span>

                                        </div>
                                        <div class="single_property_content">
                                            <h4><a href="#">{{ $attraction->zone->name }}</a></h4>
                                            <p>{{ $attraction->zone->description }}
                                            </p>

                                        </div>
                                        <div class="single_property_price">
                                            Per PAX <span>Rp. {{ $attraction->zone->price_range }}</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <!--- END SINGLE PROPERTY -->
                                </div>
                                <!--- END COL -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="single_property_form">
                    <h4>Review The Attraction</h4>
                    <form class="form" name="enq" method="post" action="{{ route('landing.attraction.review.store') }}" onsubmit="return validation();">
                        @csrf
                        <input type="hidden" name="reviewable_id" value="{{ $attraction->id }}">
                        <input type="hidden" name="reviewable_type" value="{{ get_class($attraction) }}">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" name="user_name" class="form-control" id="first-name" placeholder="Name" required="required">
                                @error('user_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="" disabled selected>Rating</option>
                                    <option value="5">⭐⭐⭐⭐⭐</option>
                                    <option value="4">⭐⭐⭐⭐</option>
                                    <option value="3">⭐⭐⭐</option>
                                    <option value="2">⭐⭐</option>
                                    <option value="1">⭐</option>
                                </select>
                                @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 mbnone">
                                <textarea rows="6" name="comment" class="form-control" id="comment" placeholder="Your Message" required="required"></textarea>
                                @error('comment')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="actions">
                                    <input type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-lg btn-contact-bg" title="Submit Your Message!" />
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!--- END COL -->

            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="property_info">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 class="card-title">Reviews</h5>
                            <div class="card">
                                <div class="card-body">
                                    @forelse($attraction->reviews as $review)
                                    <div class="review">
                                        <h5>{{ $review->user_name }}</h5>
                                        <div class="rating single_property_price">
                                            @for($i = 1; $i <= 5; $i++) @if($i <=$review->rating)
                                                <i class="fa fa-star"></i>
                                                @else
                                                <i class="fa fa-star-o"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                    @empty
                                    <p>No reviews yet.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




</section>
<!-- START SINGLE PROPERTY DETAILS -->


@endsection
