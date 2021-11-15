<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patient_id
 * @property integer $exam_speciality_id
 * @property string $description
 * @property string $tab_number
 * @property string $tab_datetime
 * @property string $schedule_datetime
 * @property string $tab_central_vacancy
 * @property string $comments
 * @property string $files
 * @property ExamSpecialty $examSpecialty
 * @property User $user
 */
class MedicalAppointment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medical_appointment';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['patient_id', 'exam_speciality_id', 'description', 'tab_number', 'tab_datetime', 'schedule_datetime', 'tab_central_vacancy', 'comments', 'files'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examSpecialty()
    {
        return $this->belongsTo(ExamSpecialty::class, 'exam_speciality_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
