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
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="text-white">About Us</h1>
          <p>We are a dedicated rental agency helping tenants and landlords find the right match across trusted neighborhoods.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <img src="{{ asset('images/img_1.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-lg-6">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
          <h2 class="mb-5">Our Office</h2>
          <p>Our office is the hub for property viewings, tenant support, and landlord services, where our team guides every step of the rental journey with clear communication and local expertise.</p>
        </div>
        </div>
      </div>
    </div>
  </div> -->

    
    <div class="site-section">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
          <h2 class="mb-5">Team</h2>
          <p>Our team combines market knowledge, responsive service, and hands-on support to make renting straightforward for both first-time tenants and experienced property owners.</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 mb-5 mb-lg-5">
          <div class="team-member">

            <img src="{{ asset('images/placeholder-person.svg') }}" alt="Stewart Donovan" class="img-fluid">

            <div class="text">

              <h2 class="mb-2 font-weight-light h4">Stewart Donovan</h2>
              <span class="d-block mb-2 text-white-opacity-05">Co Founder</span>
              <p class="mb-4">
                <span class="d-block"><span class="icon-calendar mr-1"></span> 14/08/1999</span>
                <span class="d-block"><span class="icon-phone mr-1"></span> +44 7736 319892</span>
                <span class="d-block"><span class="icon-envelope mr-1"></span> Stewartboy14@hotmail.com</span>
              </p>
              <p>
                <a href="mailto:Stewartboy14@hotmail.com" class="text-white p-2"><span class="icon-envelope"></span></a>
                <a href="tel:+447736319892" class="text-white p-2"><span class="icon-phone"></span></a>
                <a href="mailto:Sdonovan300@hotmail.com" class="text-white p-2"><span class="icon-briefcase"></span></a>
              </p>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-5 mb-5 mb-lg-5">
          <div class="team-member">

            <img src="{{ asset('images/placeholder-person.svg') }}" alt="Derek Donovan" class="img-fluid">

            <div class="text">

              <h2 class="mb-2 font-weight-light h4">Derek Donovan</h2>
              <span class="d-block mb-2 text-white-opacity-05">Co Founder</span>
              <p class="mb-4">
                <span class="d-block"><span class="icon-calendar mr-1"></span> 08/02/2001</span>
                <span class="d-block"><span class="icon-phone mr-1"></span> +44 7777 126069</span>
                <span class="d-block"><span class="icon-envelope mr-1"></span> Derek084@outlook.com</span>
              </p>
              <p>
                <a href="mailto:Derek084@outlook.com" class="text-white p-2"><span class="icon-envelope"></span></a>
                <a href="tel:+447777126069" class="text-white p-2"><span class="icon-phone"></span></a>
                <a href="mailto:Sdonovan300@hotmail.com" class="text-white p-2"><span class="icon-briefcase"></span></a>
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

    

    
    <div class="site-section">

      <div class="container">

        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto" data-aos="fade-up">
            <h2 class="mb-5">Featured Properties</h2>
            <p>A closer look at some of our most sought-after homes.</p>
          </div>
        </div>
        
        @php
            $feat0Img = isset($properties[0]) ? asset($properties[0]->main_image_url ?? 'images/img_2.jpg') : '';
            $feat1Img = isset($properties[1]) ? asset($properties[1]->main_image_url ?? 'images/img_3.jpg') : '';
            $feat2Img = isset($properties[2]) ? asset($properties[2]->main_image_url ?? 'images/img_1.jpg') : '';
        @endphp
        <div class="site-block-retro d-block d-md-flex">

          @if (isset($properties[0]))
          <a href="{{ route('property.show', $properties[0]->id) }}" class="col1 unit-9 no-height" data-aos="fade-up" data-aos-delay="100">
            <div class="image" style="background-image: url('{{ $feat0Img }}');"></div>
            <div class="unit-9-content">
              <h2>{{ $properties[0]->location_name }}</h2>
              <span>£ {{ number_format($properties[0]->rent_amount) }} / {{ $properties[0]->rent_period }}</span>
            </div>
          </a>
          @endif

          <div class="col2 ml-auto">

            @if (isset($properties[1]))
            <a href="{{ route('property.show', $properties[1]->id) }}" class="col2-row1 unit-9 no-height" data-aos="fade-up" data-aos-delay="200">
              <div class="image" style="background-image: url('{{ $feat1Img }}');"></div>
              <div class="unit-9-content">
                <h2>{{ $properties[1]->location_name }}</h2>
                <span>£ {{ number_format($properties[1]->rent_amount) }} / {{ $properties[1]->rent_period }}</span>
              </div>
            </a>
            @endif

            @if (isset($properties[2]))
            <a href="{{ route('property.show', $properties[2]->id) }}" class="col2-row2 unit-9 no-height" data-aos="fade-up" data-aos-delay="300">
              <div class="image" style="background-image: url('{{ $feat2Img }}');"></div>
              <div class="unit-9-content">
                <h2>{{ $properties[2]->location_name }}</h2>
                <span>£ {{ number_format($properties[2]->rent_amount) }} / {{ $properties[2]->rent_period }}</span>
              </div>
            </a>
            @endif

          </div>

        </div>
        
      </div>
    </div>

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
    
  </body>
</html>
