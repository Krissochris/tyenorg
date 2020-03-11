<?php
namespace GriffonTech\User\Models;


use GriffonTech\Blog\Models\BlogProxy;
use GriffonTech\CouponSystem\Models\UserCouponProxy;
use GriffonTech\Tutor\Models\TutorProfile;
use GriffonTech\Tutor\Models\TutorProfileProxy;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \GriffonTech\User\Contracts\User as UserContract;
use GriffonTech\User\Notifications\CustomerResetPassword;

class User extends Authenticatable implements UserContract
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'is_verified',
        'phone_number', 'photo', 'status', 'subscribed_to_news_letter',
        'token', 'tutor_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tutor_profile()
    {
        return $this->hasOne(TutorProfileProxy::modelClass(), 'user_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany(BlogProxy::modelClass(), 'user_id', 'id');
    }

    public function coupon_code()
    {
        return $this->hasOne(UserCouponProxy::modelClass(), 'user_id', 'id');
    }

    public function user_referral()
    {
        return $this->hasOne(UserReferralProxy::modelClass(), 'user_id', 'id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassword($token));
    }

    public function makeProUser()
    {
        $this->is_pro_user = 1;
        // create the user coupon code
        if ($this->update()) {
            $this->coupon_code()->firstOrCreate([
                'user_id' => $this->id,
                'coupon_code' => $this->username.'-'.rand(100000,999999)
            ]);
            return true;
        }
        return false;
    }

    public function removeProUser()
    {
        $this->is_pro_user = 0;
        if ($this->update()) {
            $coupon_code = $this->coupon_code()->where(['user_id' => $this->id])
                ->first();
            if ($coupon_code) {
                $coupon_code->delete();
            }
            return true;
        }
        return false;
    }
}
