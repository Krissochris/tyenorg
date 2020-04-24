<div class="bg-dark text-white" id="footer">
    <div class="container page__container">
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="brand d-flex align-items-center mb-4">
                    <img src="{{ asset('images/logo-white.png') }}" style="width: 70px;" alt="logo" >
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
                                <a href="{{ route('pages.view', 'page_how_it_works') }}">How it Works</a>
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
                                <a href="{{ route('pages.view', 'page_become_an_affiliate') }}">Become an Affiliate</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_values_to_expect') }}">Values we give</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_join_forum') }}">Join Business Forums</a>
                            </li>
                            <li class="">
                                <a href="{{ route('pages.view', 'page_join_tyen_club') }}">Join TYEN Club</a>
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
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="wt-footer-bot-left">
                    <p class="copyrights-text">
                        Copyright © <strong> TYEN </strong> - All Right Reserved.
                    </p>

                    <p class="text-white">Proudly Powered by: <strong> TYCT INITIATIVE (RC No: 127873) </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
