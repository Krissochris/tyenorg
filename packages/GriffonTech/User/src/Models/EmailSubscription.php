<?php


namespace GriffonTech\User\Models;


use Illuminate\Database\Eloquent\Model;
use \GriffonTech\User\Contracts\EmailSubscription as EmailSubscriptionInterface;

class EmailSubscription extends Model implements EmailSubscriptionInterface
{
    protected $table = 'email_subscriptions';

    protected $fillable = [
        'email'
    ];
}
