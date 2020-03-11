<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorWithdrawal as TutorWithdrawalContract;

class TutorWithdrawal extends Model implements TutorWithdrawalContract
{

    protected $table = 'tutor_withdrawals';

    protected $fillable = ['tutor_id', 'amount', 'note', 'status'];


}
