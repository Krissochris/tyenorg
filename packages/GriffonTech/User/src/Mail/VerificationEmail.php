<?php

namespace GriffonTech\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Verification Mail class
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationData;

    public function __construct($verificationData) {
        $this->verificationData = $verificationData;
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\View\View
     */
    public function build()
    {
        return $this->to($this->verificationData['email'])
            ->from(env('SHOP_MAIL_FROM'), env('MAIL_FROM_NAME'))
            ->subject(trans('shop::app.mail.user.verification.subject'))
            ->view('shop::emails.user.verification-email')->with('data', ['email' => $this->verificationData['email'], 'token' => $this->verificationData['token']]);
    }
}
