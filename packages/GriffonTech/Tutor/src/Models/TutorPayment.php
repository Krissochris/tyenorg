<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorPayment as TutorPaymentContract;

class TutorPayment extends Model implements TutorPaymentContract
{
    protected $table = 'tutor_payments';

    protected $fillable = ['tutor_id', 'course_id', 'course_batch_id', 'amount'];


    public function tutor()
    {
        return $this->belongsTo(TutorProfileProxy::modelClass(), 'tutor_id', 'id');
    }

}
