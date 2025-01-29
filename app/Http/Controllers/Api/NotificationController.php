<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherSubjectRequest;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function getAllNotificationOfStudent()
    {
        $notifications = Notification::whereHas('teacherSubject', function ($query) {
            $query->whereHas('studentSubjects', function ($q) {
                $q->where('student_id', auth('api')->user()->memberable_id);
            });
        })->orderBy('created_at', 'desc')->get();

        return $notifications;
    }
}
