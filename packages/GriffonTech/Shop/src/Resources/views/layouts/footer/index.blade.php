<div class="bg-dark text-white" id="footer">
    <div class="container page__container">
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="brand d-flex align-items-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" style="width: 70px;" alt="logo" >
                </a>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <h5>Quick Links</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="">
                                <a href="{{ route('pages.view', 'page_about_us') }}">About Us</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'how_it_works') }}">How it Works</a>
                            </li>
                            <li class="">
                                <a href="{{ route('faqs.index') }}">Faqs</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_contact_us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <h5>Company Links</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="">
                                <a href="{{ route('pages.view', 'page_disclaimer') }}">Disclaimer</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_terms_&_conditions') }}">Terms and Conditions</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_privacy_policy') }}">Privacy Policy</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_become_an_affiliate') }}">Become and Affiliate</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_values_to_expect') }}">Values we give</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_values_to_expect') }}">Join Forum</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_values_to_expect') }}">Join TYEN Club</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        {{--<h5>Account</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="">
                                <a href="#">Login</a>
                            </li>
                            <li class="">
                                <a href="#">Sign up</a>
                            </li>
                            <li class="">
                                <a href="#">Edit Account</a>
                            </li>
                            <li class="">
                                <a href="#">Payout</a>
                            </li>
                        </ul>--}}
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <h5>Contact us</h5>
                        <p class="text-light">
                            {{ setting('contact_address') }}
                        </p>

                        <div class="d-flex ">

                            <a href="{{ setting('facebook_url') }}" class="btn btn-facebook btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-facebook"></i></a>
                            <a href="{{ setting('twitter_url') }}" class="btn btn-twitter btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-twitter"></i></a>
                            <a href="{{ setting('instagram_url') }}" class="btn btn-instagram btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-instagram"></i></a>
                            <a href="{{ setting('whatsapp_url') }}" class="btn btn-success btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-whatsapp"></i></a>
                            <a href="{{ setting('telegram_url') }}" class="btn btn-primary btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-telegram"></i></a>
                        </div>
                        <div class="d-flex mt-3">
                            <p> <i class="fa fa-phone "></i>
                                {{ setting('phone_number_1') }}
                            </p>
                        </div>
                        <div class="d-flex mt-3">
                            <p>
                                <i class="fa fa-envelope"></i>
                                {{ setting('email_address_1') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>























{{--
<footer class="footer_area">
    <div class="container">
        <div class="section_padding_100_70">
            <div class="row">
                <!-- Footer About Area Start -->
                <div class="col-12 col-md-6 col-lg">
                    <div class="footer_about_us footer-single-part">
                        <div class="title">
                            <h4>About TYEN</h4>
                            <!-- Useful Links Title -->
                            <div class="underline"></div>
                        </div>
                        <p>
                            Hello and welcome to tyen org.
                        </p>
                        <div class="footer_social_links">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Footer About Area End -->

                <!-- Contact info Area Start -->
                <div class="col-12 col-md-6 col-lg">
                    <div class="footer_contact_info footer-single-part">
                        <div class="title">
                            <h4>get in touch</h4>
                            <!-- Useful Links Title -->
                            <div class="underline"></div>
                        </div>
                        <!-- single contact info start -->
                        <div class="footer_single_contact_info">
                            <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                            <p>Address</p>
                        </div>
                        <!-- single contact info start -->
                        <div class="footer_single_contact_info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="tel:{{setting('phone_number_1')}}"> {{ setting('phone_number_1') }} </a>
                            <a href="tel:{{setting('phone_number_2')}}"> {{ setting('phone_number_2') }}</a>
                        </div>
                        <!-- single contact info start -->
                        <div class="footer_single_contact_info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <a href="mailto:{{ setting('email_address_1') }}"> {{ setting('email_address_1') }} </a>
                            <a href="mailto:{{ setting('email_address_2') }}"> {{ setting('email_address_2') }}</a>
                        </div>
                    </div>
                </div>
                <!-- Contact info Area End -->

                <!-- Useful Links Area Start -->
                <div class="col-12 col-md-6 col-lg">
                    <div class="important_links footer-single-part">
                        <div class="title">
                            <h4>useful links</h4>
                            <div class="underline"></div>
                        </div>
                        <!-- Links Start -->
                        <div class="links">
                            <a href="{{ route('courses.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> All Our Courses</a>
                            <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Customer Support</a>
                            <a href="{{ route('pages.view', 'page_terms_&_conditions') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Terms &amp; Conditions</a>
                            <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Community Forums</a>
                        </div>
                    </div>
                </div>

                <!-- Useful Links Area Start -->
--}}
{{--                <div class="col-12 col-md-6 col-lg">--}}{{--

--}}
{{--                    <div class="important_links footer-single-part">--}}{{--

--}}
{{--                        <div class="title">--}}{{--

--}}
{{--                            <h4>Subscribe Newsletter</h4>--}}{{--

--}}
{{--                            <div class="underline"></div>--}}{{--

--}}
{{--                        </div>--}}{{--

--}}
{{--                        <div class="newsletter_from">--}}{{--

--}}
{{--                            <form action="#">--}}{{--

--}}
{{--                                <div class="form-group">--}}{{--

--}}
{{--                                    <input type="email" class="form-control" id="email" placeholder="Enter Your E-mail" required>--}}{{--

--}}
{{--                                </div>--}}{{--

--}}
{{--                                <button type="submit" class="btn blog-btn w-100">Submit <i class="fa fa-paper-plane"></i></button>--}}{{--

--}}
{{--                            </form>--}}{{--

--}}
{{--                        </div>--}}{{--

--}}
{{--                    </div>--}}{{--

--}}
{{--                </div>--}}{{--


            </div>
        </div>
    </div>

    <!-- Bottom Footer Area Start -->
    <div class="footer_bottom_area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_bottom">
                        <p>Powered by <i class="fa fa-heart" aria-hidden="true"></i> by Tyen.org </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
--}}
