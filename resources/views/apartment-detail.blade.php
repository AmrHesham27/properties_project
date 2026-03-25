<!DOCTYPE html>
<html lang="en">
  <head>
    <x-head-content />
  </head>
  <body>

  <div class="site-wrap">

    <x-navbar />

    @php $propertyBg = $property->main_image_url ? asset($property->main_image_url) : asset('images/hero_bg_1.jpg'); @endphp

    <div class="site-blocks-cover inner-page-cover overlay"
      style="background-image: url('{{ $propertyBg }}');"
      data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white">{{ $property->location_name }}</h1>
            <p>£ {{ number_format($property->rent_amount) }} / {{ ucfirst($property->rent_period) }}</p>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
      <div class="featured-property-half d-flex">
        <div class="image" style="background-image: url('{{ $propertyBg }}');"></div>
        <div class="text">
          <h2>Property Information</h2>
          <p class="mb-5">{{ Str::limit($property->description, 200) }}</p>
          <ul class="property-list-details mb-5">
            <li class="text-black">Property Name: <strong class="text-black">{{ $property->location_name }}</strong></li>
            @if ($property->location_name)
            <li>Location: <strong>{{ $property->location_name }}</strong></li>
            @endif
            @if ($property->bedrooms_count)
            <li>Bedrooms: <strong>{{ $property->bedrooms_count }}</strong></li>
            @endif
            @if ($property->full_bathrooms_count)
            <li>Full Bathrooms: <strong>{{ $property->full_bathrooms_count }}</strong></li>
            @endif
            <li>Rent: <strong>£ {{ number_format($property->rent_amount) }} / {{ ucfirst($property->rent_period) }}</strong></li>
            @if ($property->pet_friendly)
            <li>Pet Friendly: <strong>Yes</strong></li>
            @endif
          </ul>
          <p><a href="{{ route('contact') }}" class="btn btn-primary px-4 py-3">Contact Us</a></p>
        </div>
      </div>
    </div>



    {{-- Image Gallery --}}
    @if ($property->image_urls && count($property->image_urls) > 0)
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Property Gallery</h2>
          </div>
        </div>
        <div class="row gallery-wrap">
          @foreach ($property->image_urls as $imgIndex => $imgUrl)
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ ($imgIndex % 3 + 1) * 100 }}">
            <a href="{{ asset($imgUrl) }}" class="gallery-item">
              <img src="{{ asset($imgUrl) }}" alt="Property image {{ $imgIndex + 1 }}" class="img-fluid" style="width: 100%; height: 260px; object-fit: cover; border-radius: 6px; display: block;">
              <span class="gallery-overlay"><span class="icon-search"></span></span>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <style>
      .gallery-item {
        position: relative;
        display: block;
        overflow: hidden;
        border-radius: 6px;
        box-shadow: 0 2px 15px rgba(0,0,0,.1);
        transition: box-shadow .3s ease;
      }
      .gallery-item:hover {
        box-shadow: 0 5px 25px rgba(0,0,0,.2);
      }
      .gallery-item img {
        transition: transform .4s ease;
      }
      .gallery-item:hover img {
        transform: scale(1.05);
      }
      .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,.35);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity .3s ease;
        border-radius: 6px;
      }
      .gallery-overlay span {
        color: #fff;
        font-size: 28px;
      }
      .gallery-item:hover .gallery-overlay {
        opacity: 1;
      }
    </style>

    @endif

    {{-- Highlighted Features --}}
    @if ($property->highlighted_features && count($property->highlighted_features) > 0)
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Highlighted Features</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($property->highlighted_features as $floor)
          <div class="col-md-6 mb-5" data-aos="fade-up">
            <h4 class="text-primary mb-3">{{ $floor['floor'] }}</h4>
            <ul class="list-unstyled">
              @foreach ($floor['items'] as $item)
              <li class="mb-1"><span class="icon-check text-primary mr-2"></span> {{ $item }}</li>
              @endforeach
            </ul>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    {{-- Amenities --}}
    @if ($property->amenities && count($property->amenities) > 0)
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Amenities</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($property->amenities as $amenity)
          <div class="col-md-4 col-lg-3 mb-3" data-aos="fade-up">
            <p class="mb-0"><span class="icon-check text-primary mr-2"></span> {{ $amenity }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    {{-- Neighbourhood & Getting Around --}}
    @if ($property->neighborhood || ($property->getting_around && count($property->getting_around) > 0))
    <div class="site-section">
      <div class="container">
        <div class="row">
          @if ($property->neighborhood)
          <div class="col-md-6 mb-5" data-aos="fade-up">
            <h3 class="text-primary mb-3">Neighbourhood</h3>
            <p>{{ $property->neighborhood }}</p>
          </div>
          @endif
          @if ($property->getting_around && count($property->getting_around) > 0)
          <div class="col-md-6 mb-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-primary mb-3">Getting Around</h3>
            <ul class="list-unstyled">
              @foreach ($property->getting_around as $item)
              <li class="mb-2"><span class="icon-check text-primary mr-2"></span> {{ $item }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
      </div>
    </div>
    @endif

    {{-- Map --}}
    @if ($property->map_iframe_html)
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h3 class="text-primary mb-4">Location Map</h3>
            {!! $property->map_iframe_html !!}
          </div>
        </div>
      </div>
    </div>
    @endif

    
    <x-team-testimonials />  
    


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

  @if ($property->image_urls && count($property->image_urls) > 0)
  <script>
    $(document).ready(function(){
      $('.gallery-wrap').magnificPopup({
        delegate: '.gallery-item',
        type: 'image',
        gallery: { enabled: true, navigateByImgClick: true, preload: [0, 1] },
        mainClass: 'mfp-fade',
        removalDelay: 160
      });
    });
  </script>
  @endif
    
  </body>
</html>
