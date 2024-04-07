<!DOCTYPE html>

<html lang="en">

@include('frontend.layouts.partials.head')


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>

  @include('frontend.layouts.partials.navbar')

  <div class="nk-main">        
        
    <div class="container">
        {{-- slider/breadcrumb --}}
      @section('slider')
        
      @show

      @section('breadcrumb')
        
      @show
      {{-- end: slider/breadcrumb --}}

      <div class="row vertical-gap">
        <div class="col-lg-8">

        @yield('content')

        </div>
        <div class="col-lg-4">
          @include('frontend.layouts.partials.sidebar')
        </div>
      </div>
    </div>

    <div class="nk-gap-4"></div>


        
    <!-- START: Footer -->
    @include('frontend.layouts.partials.footer')
    <!-- END: Footer -->

        
  </div>

    

    
        <!-- START: Page Background -->

    <img class="nk-page-background-top" src="{{asset('frontend/assets/images/bg-top.png')}}" alt="">
    <img class="nk-page-background-bottom" src="{{asset('frontend/assets/images/bg-bottom.png')}}" alt="">

    <!-- END: Page Background -->

        

    
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0">Search</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form nk-form-style-1">
                    <input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    
@include('frontend.layouts.partials.script')

    
</body>
</html>
