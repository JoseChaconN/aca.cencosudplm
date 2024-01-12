<?php

namespace App\Observers;

use App\Models\User;
use App\Models\ActivityLog;

class LogsObserver
{
    public function created($model)
    {
        if ($model instanceof User) {
            $this->logAction($model, 'insert');
        }
    }

    public function updated($model)
    {
        if ($model instanceof User) {
            $this->logAction($model, 'update');
        }
    }

    protected function logAction($model, $action)
    {
        ActivityLog::create([
            'action' => $action,
            'table_name' => $model->getTable(),
            'data' => json_encode(['asd' => 1]),
            'user_id' => 1,
        ]);
    }
}
