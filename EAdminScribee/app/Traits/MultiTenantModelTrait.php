<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {
            $user = auth()->user();
            static::creating(function ($model) {
                $model->created_by_id = auth()->id();
            });
            if (!$user->is_admin) {
                static::addGlobalScope('created_by_id', function (Builder $builder) use ($user) {
                    $column = 'created_by_id';
                    if ($user->is_chairman) {
                        $column = 'chairman_id';
                    } else if ($user->is_dean) {
                        $column = 'dean_id';
                    } else if ($user->is_exam_controller) {
                        $column = 'exam_controller_id';
                    }
                    else if ($user->is_finance) {
                        $column = 'finance_id';
                    }
                    $field = sprintf('%s.%s', $builder->getQuery()->from, $column);
                    $builder->where($field, auth()->id());
                });
            }
        }
    }
}
