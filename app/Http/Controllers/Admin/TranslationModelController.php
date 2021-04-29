<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryDestroyRequest;
use App\Http\Requests\Admin\CategoryEditRequest;
use App\Http\Requests\Admin\CategoryIndexRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TranslationModelController extends Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Model
     */
    protected $translationModel;

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var array
     */
    protected $extraTranslationFields = ['name' => 'text'];

    /**
     * @var array
     */
    protected $extraModelFields = [];

    /**
     * @var boolean
     */
    protected $isVisibleIncluded;

    /**
     * @var boolean
     */
    protected $isSlugIncluded;

    /**
     * @var bool
     */
    protected $hasOrder = false;

    /**
     * @var array
     */
    protected $counts = [];

    /**
     * @var string|null
     */
    protected $titles;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    protected function _index(Request $request)
    {

        $filter_search = $request->get('filter_search') ?? null;
        $filter_created_at = $request->get('filter_created_at') ?? null;
        $filter_status_id = $request->get('filter_status_id') ?? null;

        $data = $this->model::query()
            ->with(['translations' => function ($query) {
                get_current_translation($query);
            }]);
        $data->withCount($this->counts);

        foreach($this->extraTranslationFields as $key=> $extraField)
        {
            $data->whereHas('translations', function($query) use ($key, $extraField, $request) {
                $value = $request->get("filter_" . $key);
                if($extraField == 'date')
                {
                    $query->where($key, Carbon::parse($value));
                }
                else {
                    $query->where($key, 'like', "%" . $value . '%');
                }
            });
        }

        if ($filter_created_at) {
            $data = $data->where('created_at', Carbon::parse($filter_created_at));
        }

        if ($filter_status_id) {
            $data = $data->statusFilter($filter_status_id);
        }

        $data = $data->paginate($request->get('per_page') ?? 10);

        return view("admin.$this->route.index", [
            'data' => $data,
        ]);
    }

    protected function _create(Request $request)
    {
        return view("admin.$this->route.create-edit");
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    protected function _store(Request $request): RedirectResponse
    {
        try {
            \DB::transaction(function () use ($request) {
                $value = [];
                if($this->isVisibleIncluded)
                {
                    $value['visible'] = $request->get('visible');
                }
                if($this->hasOrder)
                {
                    $value['order_no'] = $this->model::max('order_no') + 1;
                }
                $data = $this->model::create($value);

                $translations = language_data_collector(collect($this->extraTranslationFields)->keys()->toArray(), [$this->key => $data->id]);
                $translations = $translations->map(function ($translation) {
                    if($this->isSlugIncluded)
                    {
                        $translation['slug'] = Str::slug($translation['name']);
                    }
                    return $translation;
                });

                $this->translationModel::insert($translations->toArray());
            });
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(__("Couldn't Save it. Please Try Again!"));
        }

        return redirect()->route("admin.$this->route.index")->with("success", __("Successfully Created"));
    }

    protected function _edit(Request $request, $id)
    {
        $data = $this->model::whereId($id)->with(['translations'])->firstOrFail();

        return view("admin.$this->route.create-edit", [
            'data' => $data
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    protected function _update(Request $request, $id): RedirectResponse
    {
        $data = $this->model::whereId($id)->with(['translations'])->firstOrFail();
        if($this->isVisibleIncluded)
        {
            $data->visible = $request->get('visible');
            $data->saveOrFail();
        }

        $translations = language_data_collector(collect($this->extraTranslationFields)->keys()->toArray(), [$this->key => $data->id]);
        $translations->each(function ($translation) use ($data) {
            $old_translations = $data->translations->where('language_id', $translation['language_id'])->first();
            if($this->isSlugIncluded)
            {
                if (optional($old_translations)->name != $translation['name']) {
                    $translation['slug'] = Str::slug($translation['name']);
                } else {
                    $translation['slug'] = optional($old_translations)->slug;
                }
            }
            $old_translations->fill($translation)->save();
        });

        return redirect()->route("admin.$this->route.index")->with('success', __("Successfully Updated"));
    }

    protected function _destroy(Request $request, $id)
    {
        $data = $this->model::whereId($id)->with(['translations'])->firstOrFail();

        $data->delete();

        return redirect()->route("admin.$this->route.index")->with('success', __("Successfully Deleted"));
    }
}
