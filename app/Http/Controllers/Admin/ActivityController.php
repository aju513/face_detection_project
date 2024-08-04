<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\UI\ActivityUI;
use App\Repositories\Admin\ActivityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;

    public function __construct(ActivityRepository $model)
    {
        $this->model = $model;
        $this->ui = new ActivityUI();
        $this->view = "activities";
        $this->title = "Activities";
    }

    public function show($id, Request $request)
    {       
        $model = Activity::with(['causer'])->findOrFail($id);
        $this->checkPermission($this->ui->getPermission('index'));
        $params = $request->query();
        $form = "$this->dir.$this->view.form";
        $breadcrumbs = $this->generateBreadCrumbs($params, 'show');
        $view = "$this->dir/$this->view/show";
        return view($view, [
            'ui' => $this->ui,
            'model' => $model,
            'form' => $form,
            'params' => $params,
            'title' => $this->title,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
