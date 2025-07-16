<link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />

<style>
    .contain {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        /* background-color: #d3f470ff; */
        background-image: url("{{getWebsiteConfig('autoupdate_background_tin') ?? asset('frontend/assets/images/auto/background_news.jpg')}}");
        background-size: cover;
        border-radius: 8px;
    }

    .logo-default {
        max-width: 40%;
        height: auto;
        margin-bottom: 10px;
    }

   ul {
    list-style-type: none;
    padding: 0;
    
    }

    li {
        margin: 10px 0;
        /* Biến li thành flex container */
        display: flex; 
        /* Căn chỉnh các mục (a và span) theo chiều ngang */
        align-items: center; /* Căn giữa theo chiều dọc nếu có chiều cao khác nhau */
        /* Đẩy span sang phải hết mức có thể */
        justify-content: space-between; 
    }

    a {
        text-decoration: none;
        color: #222;
    }

    a:hover {
        text-decoration: underline;
    }

    span {
        font-size: 0.9em;
        color: #666;
        /* Đảm bảo span không bị tràn ra ngoài nếu nội dung quá dài */
        white-space: nowrap; 
    }
</style>

<div class="contain">
    <div id="logo" class="me-lg-5">
        <img class="logo-default" src="{{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}">
    </div><!-- #logo end -->
    <ul>
        @foreach ($hotPosts as $post)
            <li>
                <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
                <span>{{ $post->published_date }}</span>
                
            </li>
        @endforeach
    </ul>
    {{$hotPosts->links()}}
</div>



<!-- <script src="{{asset('backend/assets/vendor/js/bootstrap.js')}}"></script> -->