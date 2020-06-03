<?php

namespace GriffonTech\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Registration Mail class
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->to($this->data['email'])
                ->from(env('SHOP_MAIL_FROM'), env('MAIL_FROM_NAME'))
                ->subject(trans('shop::app.mail.user.registration.customer-registration'))
                ->view('shop::emails.user.registration')->with('data', $this->data);
    }
}
