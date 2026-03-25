<!DOCTYPE html>
<html lang="en">
  <head>
    <x-head-content />
  </head>
  <body>

  
    
  
  <div class="site-wrap">

    <x-navbar />
    
    @php $heroBg = asset('images/hero_bg_2.jpg'); @endphp
    <div class="site-blocks-cover overlay" style="background-image: url('{{ $heroBg }}');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
            <h1 class="mb-4">Where Luxury Meets Convenience</h1>
            <!-- <p class="mb-5">1105 Madison Plaza Suite 120 Chesapeake, CA, California</p> -->
            <!-- <p><a href="#" class="btn btn-primary px-5 py-3">Take a Tour</a></p> -->
          </div>
        </div>
      </div>
    </div>


    <div class="property-search-bar">
      <div class="container">
        <form action="{{ route('properties.search') }}" method="GET" class="search-form-horizontal">
          <div class="row align-items-end">
            <div class="col-md-3 mb-3 mb-md-0">
              <label for="keyword">Keyword</label>
              <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Location or property name">
            </div>
            <div class="col-md-2 mb-3 mb-md-0">
              <label for="bedrooms">Bedrooms</label>
              <select id="bedrooms" name="bedrooms" class="form-control">
                <option value="any">Any</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
              </select>
            </div>
            <div class="col-md-2 mb-3 mb-md-0">
              <label for="min_price">Min Price (£)</label>
              <input type="number" id="min_price" name="min_price" class="form-control" placeholder="0" min="0" step="500">
            </div>
            <div class="col-md-2 mb-3 mb-md-0">
              <label for="max_price">Max Price (£)</label>
              <input type="number" id="max_price" name="max_price" class="form-control" placeholder="Any" min="0" step="500">
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
              <div class="d-flex align-items-end h-100">
                <label class="mr-3 mb-0 d-flex align-items-center" style="white-space:nowrap;">
                  <input type="checkbox" name="pet_friendly" value="1" class="mr-1"> Pet Friendly
                </label>
                <button type="submit" class="btn btn-primary btn-block py-2"><span class="icon-search mr-1"></span> Search</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Browse Properties</h2>
            <p>Discover our handpicked selection of premium properties available for monthly rental.</p>
          </div>
        </div>
        <div class="row">
          @foreach ($properties as $index => $property)
          @php $cardImg = asset($property->main_image_url ?? 'images/img_1.jpg'); @endphp
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($index % 4 + 1) * 100 }}">
            <a href="{{ route('property.show', $property->id) }}" class="unit-9">
              <div class="image" style="background-image: url('{{ $cardImg }}');"></div>
              <div class="unit-9-content">
                <h2>{{ $property->location_name ?? $property->location_name }}</h2>
                <span>£ {{ number_format($property->rent_amount) }} / {{ $property->rent_period }}</span>
              </div>
            </a>
          </div>
          @endforeach

          <div class="col-md-12 text-center mt-5" data-aos="fade-up">
            <a href="{{ route('properties') }}" class="btn btn-primary">Browse All Properties</a>
          </div>
        </div>
      </div>
    </div>
    

    
    @php
        $featured3 = $properties->take(3);
        $feat0Img = isset($featured3[0]) ? asset($featured3[0]->main_image_url ?? 'images/img_2.jpg') : '';
        $feat1Img = isset($featured3[1]) ? asset($featured3[1]->main_image_url ?? 'images/img_3.jpg') : '';
        $feat2Img = isset($featured3[2]) ? asset($featured3[2]->main_image_url ?? 'images/img_1.jpg') : '';
    @endphp
    <div class="site-section">

      <div class="container">

        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto" data-aos="fade-up">
            <h2 class="mb-5">Featured Properties</h2>
            <p>A closer look at some of our most sought-after homes.</p>
          </div>
        </div>
        
        <div class="site-block-retro d-block d-md-flex">

          @if ($featured3->count() > 0)
          <a href="{{ route('property.show', $featured3[0]->id) }}" class="col1 unit-9 no-height" data-aos="fade-up" data-aos-delay="100">
            <div class="image" style="background-image: url('{{ $feat0Img }}');"></div>
            <div class="unit-9-content">
              <h2>{{ $featured3[0]->location_name }}</h2>
              <span>£ {{ number_format($featured3[0]->rent_amount) }} / {{ $featured3[0]->rent_period }}</span>
            </div>
          </a>
          @endif

          <div class="col2 ml-auto">

            @if ($featured3->count() > 1)
            <a href="{{ route('property.show', $featured3[1]->id) }}" class="col2-row1 unit-9 no-height" data-aos="fade-up" data-aos-delay="200">
              <div class="image" style="background-image: url('{{ $feat1Img }}');"></div>
              <div class="unit-9-content">
                <h2>{{ $featured3[1]->location_name }}</h2>
                <span>£ {{ number_format($featured3[1]->rent_amount) }} / {{ $featured3[1]->rent_period }}</span>
              </div>
            </a>
            @endif

            @if ($featured3->count() > 2)
            <a href="{{ route('property.show', $featured3[2]->id) }}" class="col2-row2 unit-9 no-height" data-aos="fade-up" data-aos-delay="300">
              <div class="image" style="background-image: url('{{ $feat2Img }}');"></div>
              <div class="unit-9-content">
                <h2>{{ $featured3[2]->location_name }}</h2>
                <span>£ {{ number_format($featured3[2]->rent_amount) }} / {{ $featured3[2]->rent_period }}</span>
              </div>
            </a>
            @endif

          </div>

        </div>
        
      </div>
    </div>

    
    <x-team-testimonials bg="" />
    

    
    

    <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto" data-aos="fade-up">
            <h2 class="mb-5">News &amp; Events</h2>
            <p>Stay up to date with rental market insights, new listings, and practical advice for tenants and landlords from our local property team.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <a href="single"><img src="{{ asset('images/img_4.jpg') }}" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="single">Fugit nam obcaecati fuga itaque</a></h2>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <a href="single"><img src="{{ asset('images/img_2.jpg') }}" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="single">Fugit nam obcaecati fuga itaque</a></h2>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <a href="single"><img src="{{ asset('images/img_3.jpg') }}" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="single">Fugit nam obcaecati fuga itaque</a></h2>
              
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="bg-primary" data-aos="fade">
      <div class="container">
        <div class="row">
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-facebook text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-twitter text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-instagram text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-linkedin text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-pinterest text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-youtube text-white"></span></a>
        </div>
      </div>
    </div>

    <x-footer />

  </div>

  <x-scripts />
    
  </body>
</html>
