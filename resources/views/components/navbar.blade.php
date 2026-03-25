<div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_61_3377)"><path d="M30.2709 30.125V0H25.0224L18.0375 7.31731V30.125H16.1625V8.98419L9.18756 16.2911V30.125H4.40625V28.1411C5.86475 27.7309 6.9375 26.3899 6.9375 24.8021C6.9375 22.8894 5.38144 21.3334 3.46875 21.3334C1.55606 21.3334 0 22.8894 0 24.8021C0 26.3899 1.07275 27.7309 2.53125 28.141V30.125H0V32H32V30.125H30.2709ZM13.6156 26.6667H11.7406V24H13.6156V26.6667ZM13.6156 20.6667H11.7406V18H13.6156V20.6667ZM23.3197 26.6667H21.4447V24H23.3197V26.6667ZM23.3197 20.6667H21.4447V18H23.3197V20.6667ZM23.3197 14.6667H21.4447V12H23.3197V14.6667ZM26.8636 26.6667H24.9886V24H26.8636V26.6667ZM26.8636 20.6667H24.9886V18H26.8636V20.6667ZM26.8636 14.6667H24.9886V12H26.8636V14.6667ZM26.8636 8.66669H24.9886V6H26.8636V8.66669Z" fill="#AC9559"></path></g><defs><clipPath id="clip0_61_3377"><rect width="32" height="32" fill="white"></rect></clipPath></defs>
                </svg>
                <a href="{{ route('index') }}" class="text-white h2 mb-0">
                  <span class="text-white">SD & Partners Properties</span>
                </a>
              </h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li {{ request()->routeIs('index') ? 'class=active' : '' }}>
                    <a href="{{ route('index') }}">Home</a>
                  </li>
                  <li {{ request()->routeIs('about') ? 'class=active' : '' }}>
                    <a href="{{ route('about') }}">About</a>
                  </li>
                  <li {{ request()->routeIs('properties') ? 'class=active' : '' }}>
                    <a href="{{ route('properties') }}">Properties</a>
                  </li>
                  <li {{ request()->routeIs('news') ? 'class=active' : '' }}>
                    <a href="{{ route('news') }}">News</a>
                  </li>
                  <li {{ request()->routeIs('contact') ? 'class=active' : '' }}>
                    <a href="{{ route('contact') }}">Contact</a>
                  </li>
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>
