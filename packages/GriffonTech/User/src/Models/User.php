<?php
namespace GriffonTech\User\Models;


use GriffonTech\Blog\Models\BlogProxy;
use GriffonTech\Tutor\Models\TutorProfile;
use GriffonTech\Tutor\Models\TutorProfileProxy;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \GriffonTech\User\Contracts\User as UserContract;

class User extends Authenticatable implements UserContract
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'is_verified', 'phone_number', 'is_pro_user', 'photo', 'status', 'subscribed_to_news_letter'
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
}
