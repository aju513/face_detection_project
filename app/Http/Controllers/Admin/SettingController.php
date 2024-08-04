<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\SettingRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $model, $view, $title;

    public function __construct(SettingRepository $model)
    {
        $this->model = $model;
        $this->view = "settings";
        $this->title = "Settings";
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
