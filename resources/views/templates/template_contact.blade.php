<!-- Common Banner Area -->
<section data-template="common" id="common_banner" style="background-image: url({{ asset('storage/' . $page->page_banner) }});background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="common_bannner_text">
                    <h1 style="font-size:60px;font-weight:500;color: white;">{{$page->page_title}}</h1>
                    <ul>
                        <li>
                            <span><i class="fas fa-home"></i></span>
                            <a href="{{route('/')}}">Home</a>
                        </li>
                        <li><span><i class="fas fa-circle"></i></span><a href='{{route($page->page_slug)}}'>{{$page->page_title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="" class="section_padding" style="width:90%; margin:0 auto">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="news_sidebar_heading">
                    <h3>{{$page->page_title}}</h3>
                </div>
                <p>{{$page->page_subtitle}}</p>
            </div>
        </div>
        <div class="contact_main_form_area_two">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact_left_top_heading">
                        <div id="page_content" style="padding-top:20px">    
                            {!! $page->page_content !!}   
                        </div>
                    </div>
                    <div class="contact_form_two">
                        <form action="" id="contact_form_content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="first_name" class="form-control bg_input" placeholder="First name*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control bg_input" placeholder="Last name*">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control bg_input" placeholder="Email address (Optional)">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="mobile" class="form-control bg_input"
                                            placeholder="Mobile number*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control bg_input" rows="5" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn_theme btn_md">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_two_left_wrapper">
                        <h3>Contact details</h3>
                        <div class="contact_details_wrapper">
                            <div class="contact_detais_item">
                                <h3>Help line</h3>
                                <h4><a href="tel:+01-234-567-890">{!!$businessContact!!}</a></h4>
                            </div>
                            <div class="contact_detais_item">

                                <h3>Support mail</h3>
                                <h4><a href="mailto:{{$businessEmail}}">{{$businessEmail}}</a></h4>
                            </div>
                            <div class="contact_detais_item">
                                <h3>Office Address</h3>
                                <h4>{!!$businessAddress!!}</h4>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


                <div class="col-lg-12 mt-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.887684690493!2d77.0376039!3d28.422645700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d227f95555563%3A0x40677a1cff10b70b!2sLa%20Esperanza%20Travels!5e0!3m2!1sen!2sin!4v1737924344099!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
</section>
