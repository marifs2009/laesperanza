
    
<!-- Common Banner Area -->
    <section id="common_banner" style="background-image: url({{ asset('storage/' . $page->page_banner) }});background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h1 style="font-size:60px;font-weight:500;color: white;">{{$page->page_title}}</h1>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span><a href='{{route($page->page_slug)}}'>{{$page->page_title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Faqs Area -->
    <section id="" class="section_padding" style="width:90%; margin:0 auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="news_sidebar_heading">
                        <h3>{{$page->page_title}}</h3>
                    </div>
                    <p>{{$page->page_subtitle}}</p>
                    <div id="page_content" style="padding-top:20px">    
                        {!! $page->page_content !!}   
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="news_area_sidebar_area">
                        <div class="news_sidebar_content">
                            <div class="news_sidebar_heading">
                                <h3>Services</h3>
                            </div>
                           <div class="news_sidebar_content_inner">
                            <ul class="news_sidebar_category">
                                @if(!empty($services))
                                    @foreach($services as $service)
                                        <li>
                                            <a href="{{ route($service->page_slug)}}">{{ $service->page_title }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

