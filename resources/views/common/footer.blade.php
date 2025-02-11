    <!-- Cta Area -->
    <section id="cta_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon">
                            <img src="{{asset('assets/img/common/email.png')}}" alt="icon">
                        </div>
                        <div class="cta_content">
                            <h4>Get the latest news and offers</h4>
                            <h2>Subscribe to our newsletter</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cat_form">
                        <form id="cta_form_wrappper">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your mail address">
                                <button class="btn btn_theme btn_md" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer  -->
    <footer id="footer_area" style="background-image: url({{ asset('assets/img/footer-bg.png') }});background-repeat: no-repeat;background-position: bottom;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <a href="{{url('/')}}">
                            <!-- <img src="{{ asset('storage/'.@$logo) }}" alt="logo" style="height:90px;"> -->
                            <img src="{{ asset('img/logo.png') }}" alt="logo" style="height:90px;">
                        </a>
                    </div>
                    <div class="footer_first_area">
                        <div class="footer_inquery_area">
                            <h5>Visit Us at our office</h5>
                            <a href="#">
                                {!! @$businessAddress !!}
                            </a>                             
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Call us for any help</h5>
                            <a href="tel:+911244381042"><span>{{@$businessContact}}</span></a>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Mail to our support team</h5>
                            <a href="mailto:{{@$businessEmail}}"><span>{{@$businessEmail}}</span></a></li>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Follow us on</h5>
                            <ul class="soical_icon_footer">
                                <li><a href="#!"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Domestic Packages</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li>
                                <a href=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>International Packages</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li>
                                <a href=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Quick Links</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li>
                                <a href=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="background-color:black;padding:20px; margin-top:50px;">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>{{ @$copyright }}</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="{{asset('assets/img/common/cards.png')}}" alt="img">
                    </div>
                </div>
                <div class="co-lg-12 col-md-12 col-sm-12 col-12">
                    <small style="font-size:12px;color:#ccc;">Note : All claims, disputes and litigation relating to online booking through this website anywhere from India or abroad shall be subject to jurisdiction of Courts of Delhi only. All Images shown here are for representation purpose only.</small>
                </div>
            </div>
        </div>
    </footer>  
