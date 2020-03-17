<?php

namespace GriffonTech\Tutor\Models;

use GriffonTech\Course\Models\CourseProxy;
use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use \GriffonTech\Tutor\Contracts\TutorProfile as TutorContract;
use Illuminate\Support\Facades\DB;

class TutorProfile extends Model implements TutorContract
{

    protected $fillable = [
        'user_id', 'name', 'title', 'description', 'photo','phone_number','email', 'phone',
        'facebook_url', 'website_url', 'linkedIn_url', 'youtube_url',
        'status','amount_balance', 'total_earned_amount', 'tutor_application_id',
        'bank_name', 'bank_account_number', 'bank_account_name', 'btc_wallet_address',
        'paypal_email_address'
    ];

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }

    public function tutor_application_courses()
    {
        return $this->hasMany(TutorCourseProxy::modelClass(), 'tutor_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(CourseProxy::modelClass(), 'tutor_id', 'id');
    }


    public function withdrawals()
    {
        return $this->hasMany(TutorWithdrawalProxy::modelClass(), 'tutor_id', 'id');
    }


    public function getStatus()
    {
        switch ($this->status) {
            case -1:
                return 'UnActive';
            case  1:
                return 'Active';
            default:
                return 'Unknown';
        }
    }


    /*public function getStatusAttribute($value)
    {
        switch ($value) {
            case -1:
                return 'UnActive';
            case  1:
                return 'Active';
            default:
                return 'Unknown';
        }
    }*/


    public function credit($amount)
    {
        if (is_numeric($amount)) {
            $amount = floatval($amount);
            $this->forceFill([
                'amount_balance' => $this->amount_balance + $amount,
                'total_earned_amount' => $this->total_earned_amount + $amount
            ]);
            if ($this->update()) {
                // create a new payment request
                // add an activity log for the tutor to be notified
                //
                return true;
            }
        }
        return false;
    }

    public function debit($amount)
    {
        if (is_numeric($amount)) {
            $amount = floatval($amount);
            $this->forceFill([
                'amount_balance' => $this->amount_balance - $amount,
            ]);
            if ($this->update()) {
                return true;
            }
        }
        return false;
    }



    public function deactivate()
    {
        try {
            DB::beginTransaction();
            $this->update([
                'status' => -1
            ]);

            $courses = $this->courses;

            if (!$courses->isEmpty()) {
                foreach ($courses as $course) {
                    if (!$course->deactivate()) {
                        throw new \Exception(sprintf('Could not deactivate course with id %s ', $course->id));
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return false;
        }
        return true;
    }


    public function activate()
    {
        try {
            DB::beginTransaction();
            $this->update([
                'status' => 1
            ]);

            $courses = $this->courses;

            if (!$courses->isEmpty()) {
                foreach ($courses as $course) {
                    if (!$course->activate()) {
                        throw new \Exception(sprintf('Could not activate course with id %s ', $course->id));
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return false;
        }
        return true;
    }

}
