<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorApplicationSubmission as TutorApplicationSubmissionContract;

class TutorApplicationSubmission extends Model implements TutorApplicationSubmissionContract
{
    protected $table = 'tutor_application_submissions';

    protected $fillable = ['tutor_application_id', 'status'];


    public function tutor_application()
    {
        return $this->belongsTo(TutorApplicationProxy::modelClass(), 'tutor_application_id', 'id');
    }

}
