<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorApplicationSubmission as TutorApplicationSubmissionContract;

class TutorApplicationSubmission extends Model implements TutorApplicationSubmissionContract
{
    protected $table = 'tutor_application_submissions';

    protected $fillable = ['tutor_profile_id', 'status'];

    public function tutor_profile()
    {
        return $this->belongsTo(TutorProfileProxy::modelClass(), 'tutor_profile_id', 'id');
    }
}
