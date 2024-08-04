<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    private DatabaseNotification $model;

    public function __construct(DatabaseNotification $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications()->paginate(10,['*'],'page',$request->get('page'));
        $view = view('admin.layouts.components.notification',[
           'notifications' =>  $notifications
        ])->render();
        return response()->json([
            'view' => $view,
            'currentPage' => $notifications->currentPage(),
            'lastPage' => $notifications->lastPage()
        ],200);
    }

    public function read(Request $request)
    {        
        $this->model->where('notifiable_type','App\Models\User')->where('notifiable_id',auth()->id())
            ->latest()
            ->whereNull('read_at')
            ->limit(10)
            ->update([
                'read_at' => Carbon::now()
            ]);
        return redirect()->back();
    }
}
