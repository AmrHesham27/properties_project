<!DOCTYPE html>
<html lang="en">
  <head>
    <x-head-content />
  </head>
  <body>

  <div class="site-wrap">

    <x-navbar />

    @php $heroBg = asset('images/hero_bg_1.jpg'); @endphp
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ $heroBg }}');"
    data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="text-white">Properties</h1>
          <p>Browse our full collection of available properties.</p>
        </div>
      </div>
    </div>
  </div>


    <div class="property-search-bar" style="margin-top:-60px; margin-bottom:30px;">
      <div class="container">
        @php $f = $filters ?? []; @endphp
        <form action="{{ route('properties.search') }}" method="GET" class="search-form-horizontal">
          <div class="row align-items-end">
            <div class="col-md-3 mb-3 mb-md-0">
              <label for="keyword">Keyword</label>
              <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Location or property name" value="{{ $f['keyword'] ?? '' }}">
            </div>
            <div class="col-md-2 mb-3 mb-md-0">
              <label for="bedrooms">Bedrooms</label>
              <select id="bedrooms" name="bedrooms" class="form-control">
                <option value="any">Any</option>
                @for ($b = 1; $b <= 4; $b++)
                <option value="{{ $b }}" {{ ($f['bedrooms'] ?? '') == $b ? 'selected' : '' }}>{{ $b }}{{ $b === 4 ? '+' : '' }}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-2 mb-3 mb-md-0">
              <label for="min_price">Min Price (£)</label>
              <input type="number" id="min_price" name="min_price" class="form-control" placeholder="0" min="0" step="500" value="{{ $f['min_price'] ?? '' }}">
            </div>
            <div class="col-md-2 mb-3 mb-md-0">
              <label for="max_price">Max Price (£)</label>
              <input type="number" id="max_price" name="max_price" class="form-control" placeholder="Any" min="0" step="500" value="{{ $f['max_price'] ?? '' }}">
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
              <div class="d-flex align-items-end h-100">
                <label class="mr-3 mb-0 d-flex align-items-center" style="white-space:nowrap;">
                  <input type="checkbox" name="pet_friendly" value="1" class="mr-1" {{ !empty($f['pet_friendly']) ? 'checked' : '' }}> Pet Friendly
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
            @if (!empty($f))
            <h2 class="mb-5">Search Results</h2>
            <p>{{ $properties->count() }} {{ Str::plural('property', $properties->count()) }} found.
              <a href="{{ route('properties') }}" class="text-primary">Clear filters</a>
            </p>
            @else
            <h2 class="mb-5">Browse Properties</h2>
            <p>Discover our handpicked selection of premium properties available for monthly rental.</p>
            @endif
          </div>
        </div>
        <div class="row" id="properties-grid">

          @foreach ($properties as $index => $property)
          @php $cardImg = asset($property->main_image_url ?? 'images/img_1.jpg'); @endphp
          <div class="col-md-6 col-lg-3 mb-5 property-card {{ $index >= 8 ? 'd-none' : '' }}" data-aos="fade-up" data-aos-delay="{{ ($index % 4 + 1) * 100 }}">
            <a href="{{ route('property.show', $property->id) }}" class="unit-9">
              <div class="image" style="background-image: url('{{ $cardImg }}');"></div>
              <div class="unit-9-content">
                <h2>{{ $property->location_name ?? $property->title }}</h2>
                <span>£ {{ number_format($property->rent_amount) }} / {{ $property->rent_period }}</span>
              </div>
            </a>
          </div>
          @endforeach

        </div>

        @if ($properties->count() > 8)
        <div class="text-center mt-4" id="load-more-wrap">
          <button class="btn btn-primary px-5 py-3" id="load-more-btn">Load More</button>
        </div>
        @endif

      </div>
    </div>

    
    <x-team-testimonials bg="" />
    


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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var btn = document.getElementById('load-more-btn');
      if (!btn) return;
      btn.addEventListener('click', function () {
        var hidden = document.querySelectorAll('#properties-grid .property-card.d-none');
        var count = 0;
        hidden.forEach(function (el) {
          if (count < 4) {
            el.classList.remove('d-none');
            count++;
          }
        });
        if (document.querySelectorAll('#properties-grid .property-card.d-none').length === 0) {
          document.getElementById('load-more-wrap').style.display = 'none';
        }
      });
    });
  </script>
    
  </body>
</html>
