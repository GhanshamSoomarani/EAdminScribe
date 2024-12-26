<?php

namespace App\Observers;

use App\RemunerationForm;
use App\Notifications\NewFormNotification;
use App\Notifications\SentForAnalysisNotification;
use App\Notifications\StatusChangeNotification;
use App\Notifications\SubmittedAnalysisNotification;
use App\Role;
use App\Status;
use Illuminate\Support\Facades\Notification;

class RemunerationFormObserver {
    /**
     * Handle the remuneration form "creating" event.
     *
     * @param  \App\RemunerationForm  $remunerationForm
     * @return void
     */
    public function creating(RemunerationForm $remunerationForm)
    {
        $processingStatus = Status::whereName('Processing')->first();
        $remunerationForm->status()->associate($processingStatus);
    }

    /**
     * Handle the remuneration form "created" event.
     *
     * @param  \App\RemunerationForm  $remunerationForm
     * @return void
     */
    public function created(RemunerationForm $remunerationForm)
    {
        $admins = Role::find(1)->users;
        Notification::send($admins, new NewFormNotification($remunerationForm));
    }

    /**
     * Handle the remuneration form "updated" event.
     *
     * @param  \App\RemunerationForm  $remunerationForm
     * @return void
     */
    public function updated(RemunerationForm $remunerationForm)
    {
        if ($remunerationForm->isDirty('status_id')) {
            $creator = $remunerationForm->created_by; // Get the creator

            if (in_array($remunerationForm->status_id, [10, 2, 5])) {
                if ($remunerationForm->status_id == 10) {
                    $user = $remunerationForm->chairman;
                } elseif ($remunerationForm->status_id == 2) {
                    $user = $remunerationForm->dean;
                } elseif ($remunerationForm->status_id == 5) {
                    $user = $remunerationForm->exam_controller;
                } else {
                    $user = $remunerationForm->finance;
                }

                Notification::send($user, new SentForAnalysisNotification($remunerationForm));
            } elseif (in_array($remunerationForm->status_id, [3, 4, 6, 7, 11, 12, 14, 15])) {
                // Send notification to creator instead of admins
                Notification::send($creator, new SubmittedAnalysisNotification($remunerationForm));
            } elseif (in_array($remunerationForm->status_id, [3, 4, 6, 7, 11, 12, 14, 15])) {
                $creator->notify(new StatusChangeNotification($remunerationForm));
            }
        }
    }
}
