<?php

namespace App\Services;

use App\RemunerationForm;
use App\Status;
use App\User;
use Illuminate\Support\Str;

class AuditLogService
{
    public static function generateLogs(RemunerationForm $remunerationForm)
    {
        $changes      = [];
        $statuses     = Status::pluck('name', 'id');
        $users        = User::pluck('name', 'id');
        $signatures   = User::pluck('signature_picture', 'id');  // Fetch signature pictures

        $previous = null;

        foreach ($remunerationForm->logs as $log) {
            $current = json_decode($log->properties, true);
            unset($current['status'], $current['id']);

            if (isset($previous)) {
                $differences   = array_diff_assoc($current, $previous);
                $value         = [
                    'user'    => $log->user->name,
                    'time'    => $log->created_at,
                    'comment' => null,
                    'changes' => [],
                    'signature' => $signatures[$log->user_id] ? 'storage/signature_pictures/' . $signatures[$log->user_id] : null  // Add signature picture handling
                ];

                foreach ($differences as $key => $difference) {
                    $previousValue = $previous[$key] ?? null;
                    $currentValue  = $current[$key] ?? null;

                    if (Str::endsWith($key, '_at') || $previousValue == $currentValue) {
                        continue;
                    }

                    if ($key == 'status_id') {
                        $previousValue = $previousValue ? $statuses[$previousValue] : null;
                        $currentValue  = $statuses[$currentValue];
                        $key           = Str::replaceFirst('_id', '', $key);
                        // if (in_array($difference, [3, 4, 6, 7, 11, 12, 14, 15])) {
                        //     $column = in_array($difference, [3, 4]) ? 'dean_id' : 'exam_controller_id';
                        //     $value['comment'] = $remunerationForm->comments->where('user_id', $current[$column])->first()->comment_text ?? 'No comment';
                        // }
                        if (in_array($difference, [3, 4, 6, 7, 11, 12, 14, 15])) {
                            $column = null;

                            // Determine the column based on the value of $difference
                            if (in_array($difference, [3, 4])) {
                                $column = 'dean_id';
                            } elseif (in_array($difference, [6, 7])) {
                                $column = 'exam_controller_id';
                            } elseif (in_array($difference, [11, 12])) {
                                $column = 'chairman_id';
                            } elseif (in_array($difference, [14, 15])) {
                                $column = 'finance_id';
                            }

                            // Get the comment based on the identified column
                            if ($column) {
                                $value['comment'] = $remunerationForm->comments->where('user_id', $current[$column])->first()->comment_text ?? 'No comment';
                            }
                        }

                    } elseif (in_array($key, ['chairman_id','dean_id', 'exam_controller_id', 'finance_id'])) {
                        $previousValue = $previousValue ? $users[$previousValue] : null;
                        $currentValue  = $users[$currentValue];
                        $key           = Str::replaceFirst('_id', '', $key);
                    }

                    $changesString = '<b>' . Str::of($key)->replace('_', ' ')->title() . '</b>: ';
                    $changesString .= $previousValue ? 'from ' . $previousValue . ' to ' . $currentValue : 'set to ' . $currentValue;
                    $value['changes'][] = $changesString;
                }

                $changes[] = $value;
            }

            $previous = $current;
        }

        return $changes;
    }
}
