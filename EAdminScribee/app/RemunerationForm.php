<?php

namespace App;

use App\Observers\RemunerationFormObserver;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class RemunerationForm extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'remuneration_forms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'examiner',
        'term',
        'year',
        'batch',
        'exam_type',
        'exam_date_theory',
        'exam_date_practical',
        'ref',
        'date',
        'subject',
        'quantity1',
        'rate1',
        'amount1',
        'quantity2',
        'rate2',
        'amount2',
        'quantity3',
        'rate3',
        'amount3',
        'quantity4',
        'rate4',
        'amount4',
        'quantity5',
        'rate5',
        'amount5',
        'quantity6',
        'rate6',
        'amount6',
        'quantity7',
        'rate7',
        'amount7',
        'quantity8',
        'rate8',
        'amount8',
        'quantity9',
        'rate9',
        'amount9',
        'total_amount',
        'deduction',
        'net_amount',
        'in_words',
        'chairman_id',
        'dean_id',
        'exam_controller_id',
        'finance_id',
        'created_by_id',
        'status_id',
    ];

    protected static function booted()
    {
        self::observe(RemunerationFormObserver::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function chairman()
    {
        return $this->belongsTo(User::class, 'chairman_id');
    }


    public function dean()
    {
        return $this->belongsTo(User::class, 'dean_id');
    }

    public function exam_controller()
    {
        return $this->belongsTo(User::class, 'exam_controller_id');
    }

    public function finance()
    {
        return $this->belongsTo(User::class, 'finance_id');
    }


    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function logs()
    {
        return $this->morphMany(AuditLog::class, 'subject');
    }
}
