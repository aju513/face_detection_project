<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Repositories\Admin\UserRepository;
use App\UI\UserUI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title, $media;

    public function __construct(UserRepository $model, Media $media)
    {
        $this->model = $model;
        $this->ui = new UserUI;
        $this->view = "users";
        $this->title = "Users";
        $this->media = $media;
    }

    public function profile()
    {
        $model = Auth::user();
        $breadcrumbs = $this->generateBreadCrumbs($model, 'Profile');
        $view = "admin.users.user-profile";
        return view($view, [
            'model' => $model,
            'title' => $this->title,
            'breadcrumbs' => $breadcrumbs,
            'ui' => $this->ui
        ]);
    }

    public function profileUpdate($id, Request $request)
    {

        $query = $this->model;
        $model = $query->find($id);

        $rules = $this->ui->getProfileUpdateRules($model) + ['medias' => 'array|nullable'];

        $data = $request->validate($rules, $this->ui->getMessages());

        $data['roles'] = $model->roles;

        $model = $this->model->update($id, $data);

        if ($model && $model->media) {
            $model->medias()->sync($data['medias'] ?? []);
        }

        $log = new ActivityLogHelper();
        $log->log('Updated', ":causer.name Updated Profile", [
            'url' => $request->fullUrl()
        ]);
        return redirect()->route('admin.dashboard')->with('message', 'Successfully Updated Profile');
    }

    public function changePassword()
    {
        $model = $user = Auth::user();
        ;
        $breadcrumbs = $this->generateBreadCrumbs($model, 'Change-Password');
        $view = "admin.users.change-password";
        return view($view, [
            'model' => $model,
            'title' => $this->title,
            'breadcrumbs' => $breadcrumbs,
            'ui' => $this->ui
        ]);
    }

    public function storeChangePassword(Request $request, $id)
    {
        $data = $request->validate($this->ui->getChangePasswordRules());
        $user = Auth::user();
        if (!(Hash::check($data['current_password'], $user->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($data['current_password'], $data['password']) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
        $data['password'] = bcrypt($data['password']);
        $data['roles'] = $user->roles;
        $this->model->update($id, $data);

        return redirect()->back()->with("message", "Password successfully changed!");
    }
    public function updateAccountSetting(Request $request)
    {

        $rules = [
            'medias' => 'array|nullable',
            'medias.*' => 'url|nullable', // Ensures each media URL is valid
        ];

        $messages = [
            'medias.array' => 'The media items must be provided in a valid array format.',
            'medias.*.url' => 'Each media item must be a valid URL.',
        ];

        $data = $request->validate($rules, $messages);


        $user = Auth::user();


        foreach ($data['medias'] as $media_id => $url) {
            if ($url) {
                $user->medias()->updateOrCreate(
                    ['media_id' => $media_id],
                    ['url' => $url]
                );
            } else {

                $user->medias()->where('media_id', $media_id)->delete();
            }
        }

        $log = new ActivityLogHelper();
        $log->log('Updated', ":causer.name Updated Profile", [
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.dashboard')->with('message', 'Successfully Updated Profile');
    }


}
