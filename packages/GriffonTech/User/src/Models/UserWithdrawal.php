<?php


namespace GriffonTech\User\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\User\Contracts\UserWithdrawal as UserWithdrawalContract;

class UserWithdrawal extends Model implements UserWithdrawalContract
{

    protected $table = 'user_withdrawals';

    protected $fillable = ['user_id', 'amount', 'note', 'status'];


    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }

    public function getStatus()
    {
        switch ($this->status) {
            case -1:
                return 'Cancelled';
            case  1:
                return 'Active';
            case  2:
                return 'Completed';
            default:
                return 'Unknown';
        }
    }

    public function payment_detail()
    {
        return $this->hasOne(UserPaymentDetailProxy::modelClass(), 'user_id', 'user_id');
    }

}
