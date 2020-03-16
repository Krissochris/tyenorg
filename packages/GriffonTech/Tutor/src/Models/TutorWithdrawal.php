<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorWithdrawal as TutorWithdrawalContract;

class TutorWithdrawal extends Model implements TutorWithdrawalContract
{

    protected $table = 'tutor_withdrawals';

    protected $fillable = ['tutor_id', 'amount', 'note', 'status'];


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

    public function tutor_profile()
    {
        return $this->belongsTo(TutorProfileProxy::modelClass(), 'tutor_id', 'id');
    }


}
