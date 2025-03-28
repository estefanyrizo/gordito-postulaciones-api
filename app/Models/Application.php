<?php

namespace App\Models;

use App\Traits\SerializesDatetimes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use SerializesDatetimes;

    protected $table = 'applications';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'monthly_expected_salary' => 'float',
    ];

    public function applicationStatus(): BelongsTo {
        return $this->belongsTo(ApplicationStatus::class, 'application_status_id');
    }

    public function availability(): BelongsTo {
        return $this->belongsTo(Availability::class, 'availability_id');
    }

    public function employmentType(): BelongsTo {
        return $this->belongsTo(EmploymentType::class, 'employment_type_id');
    }

    public function workModality(): BelongsTo {
        return $this->belongsTo(WorkModality::class, 'work_modality_id');
    }

    public function educations(): HasMany {
        return $this->hasMany(Education::class, 'application_id');
    }

    public function experiences(): HasMany {
        return $this->hasMany(Experience::class, 'application_id');
    }
}
