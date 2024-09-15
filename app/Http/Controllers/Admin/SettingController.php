<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Admin\SettingRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $model, $view, $title, $user;

    public function __construct(SettingRepository $model, User $user)
    {
        $this->model = $model;
        $this->view = "settings";
        $this->title = "Settings";
        $this->user = $user;
    }

    public function index()
    {
        $medias = $this->user->findOrFail(auth()->user()->id)->medias;
        return view('admin.settings.index', compact('medias'));
    }
    public function show($name = null)
    {
        if ($name) {
            $model = $this->model->find($name);
        } else {
            $model = $this->model->first();
        }
        if (!$model) {
            return redirect()->back();
        }
        return view('admin.settings.index', ['model' => $model, 'title' => $this->title]);
    }

    public function update($name, Request $request)
    {
        $model = $this->model->find($name);
        // $this->authorize('update', $model);
        $validated = $request->validate([
            'values' => 'array'
        ]);
        $model->update($validated);

        return redirect()->back()->with('message', 'Setting Updated Successfully');
    }
}
