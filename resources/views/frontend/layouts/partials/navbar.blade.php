
<!--
    Additional Classes:
        .nk-header-opaque
-->
<header class="nk-header nk-header-opaque">
  <!-- START: Top Contacts -->
  <div class="nk-contacts-top">
      <div class="container">
          <div class="nk-contacts-left">
              <ul class="nk-social-links">
                  <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook fa-lg"></span></a></li>
                  <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube fa-lg"></span></a></li>
                  <li><a class="nk-social-facebook" href="#"><span class="fa-solid fa-users fa-lg"></span></a></li>
              </ul>
          </div>
          <div class="nk-contacts-right">
              <ul class="nk-contacts-icons">
                <li>
                    <a href="{{route('login')}}" target="_blank">
                        <span class="fa fa-user fa-lg"></span>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalSearch">
                        <span class="fa fa-search fa-lg"></span>
                    </a>
                </li>
              </ul>
          </div>
      </div>
  </div>
  <!-- END: Top Contacts -->
  
      
  
      <!--
          START: Navbar
  
          Additional Classes:
              .nk-navbar-sticky
              .nk-navbar-transparent
              .nk-navbar-autohide
      -->
  <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
    <div class="container">
      <div class="nk-nav-table">
        <a href="{{route('home')}}" class="nk-nav-logo">
          <img src="{{asset('frontend/assets/images/logo.png')}}" alt="GoodGames" width="199">
        </a>
        <ul class="nk-nav nk-nav-right d-none d-lg-table-cell nk-nav-web" data-nav-mobile="#nk-nav-mobile">
          @foreach ($commonData['main_menus'] as $menu)
            @if ($menu->childrenCategories->count())
              <li class=" nk-drop-item">
                <a href="{{route('cat_posts', $menu->slug)}}">
                  {{$menu->name}}
                </a>
                <ul class="dropdown">
                  @foreach ($menu->childrenCategories as $sub_menu)
                    @include('frontend.layouts.partials.subnav', ['sub_menu' => $sub_menu])
                  @endforeach
                </ul>
              </li>
            @else
              <li>
                <a href="{{route('cat_posts', $menu->slug)}}">
                  {{$menu->name}}
                </a>
              </li>
            @endif
          @endforeach
          

        </ul>

            {{-- icon for mobile menu --}}
        <ul class="nk-nav nk-nav-right nk-nav-icons">
          <li class="single-icon d-lg-none">
            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
              <span class="nk-icon-burger">
                <span class="nk-t-1"></span>
                <span class="nk-t-2"></span>
                <span class="nk-t-3"></span>
              </span>
            </a>
          </li>
        </ul>
        {{-- end: icon for mobile menu --}}

      </div>
    </div>
  </nav>
      <!-- END: Navbar -->
  
  </header>
  
      
      
          <!--
      START: Navbar Mobile
  
      Additional Classes:
          .nk-navbar-left-side
          .nk-navbar-right-side
          .nk-navbar-lg
          .nk-navbar-overlay-content
  -->
  <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
      <div class="nano">
          <div class="nano-content">
              <a href="index.html" class="nk-nav-logo">
                  <img src="{{asset('frontend/assets/images/logo.png')}}" alt="" width="120">
              </a>
              <div class="nk-navbar-mobile-content">
                  <ul class="nk-nav">
                      <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <!-- END: Navbar Mobile -->
  
      