@component('shop::emails.layouts.master')

    <div>
        <div style="text-align: center;">
            <a href="{{ config('app.url') }}">
                @include ('shop::emails.layouts.logo')
            </a>
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
            {{ setting('application_name', 'Tyen') }}
        </div>

        <div>
            <p>This mail is to verify that the email address you entered on Tyenorg.com belongs to you. </p>
            <p>Kindly click the "Verify Your Account" button below to verify your account.</p>

            <div  style="margin-top: 40px; text-align: center">
                <a href="{{ route('user.verify', $data['token']) }}" style="font-size: 16px;
            color: #FFFFFF; text-align: center; background: #0031F0; padding: 10px 100px;text-decoration: none;">
                    {!! __('shop::app.mail.user.verification.verify') !!}
                </a>
            </div>

            <b> ALTERNATIVE METHOD </b>
            <p>
                Long press the button, copy the attached link and paste directly on your logged in Chrome browser to verify.
            </p>
            <p>
                Please REPLY "VERIFICATION COMPLETED" to this message after you are done. This is to verify that you ain't a bot.
            </p>
            <p>
                If you encounter any issue, send full explanation here with screenshots if necessary.
            </p>
            <p>
                We are forever here to assist you further.
            </p>
            <p>
                Tap the "Verification button" Now!
            </p>
        </div>

    </div>

@endcomponent
