<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Jobs\UpdatePost;
use App\Http\Requests\CategoryRequest;

use App\Models\Totalcategory;
use App\Models\Category;

use LaravelLocalization;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Totalcategory::class, 'totalcategory');
    }
                     protected function resourceAbilityMap()
                     {
                         return [
                             'index' => 'viewAny',
                           'trash' => 'viewAny',
                             'show' => 'view',
                             'create' => 'create',
                             'store' => 'create',
                         ];
                     }
            protected function resourceMethodsWithoutModels()
            {
                return ['index', 'create', 'store', 'trash'];
            }

    /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
    public function index()
    {
        //
        $totalcategories = Totalcategory::with(['categories' => function ($query) {
            $query->where('language', LaravelLocalization::getCurrentLocale());
        }])->get();

        return view('admin.categories.index', compact('totalcategories'));
    }
public function trash()
{
    $totalcategories = Totalcategory::with(['categories' => function ($query) {
        $query->where('language', LaravelLocalization::getCurrentLocale())->onlyTrashed();
    }])->get();

    return view('admin.categories.trash', compact('totalcategories'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, ?Totalcategory $totalcategory = null)
    {
        //
        $language = $request->language ?? LaravelLocalization::getCurrentLocale();
        $categories = Category::where('language', $language)->get();
        return view('admin.categories.create', compact('totalcategory', 'language', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, ?Totalcategory $totalcategory = null)
    {
        //
        $data = $request->safe()->all();

        $category = new Category();

        if (is_null($totalcategory)) {
            $totalcategory = new Totalcategory();
            $totalcategory->save();
        }
        $category->totalcategory()->associate($totalcategory);
        $category->fill($data);
        $category->save();

        /* *
        check has the current category some parent category.
        if the category has the parent, get posts attached to this category, then detach everything, and attach the current category and the parent category.
        */
        UpdatePost::dispatchIf($category->parent, $category)->onQueue('syncpost')->delay(now()->addMinutes(1));

        session()->flash('message', trans('categories/flash.store'));
        return to_route('admin.categories.edit', ['category' => $category->id, 'language' => $category->language]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        Gate::authorize('edit-category');

        $language = $category->language;
        $translates = $category->where('totalcategory_id', $category->totalcategory_id)->where('language', '!=', $language)->get();
        $categories = $category->where('language', LaravelLocalization::getCurrentLocale())->where('id', '!=', $category->id)->get();

        return view('admin.categories.edit', compact('category', 'language', 'translates', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        Gate::authorize('update-category');

        $data = $request->safe()->all();

        $category->fill($data);
        $category->save();

        /* *
        check has the current category some parent category.
        if the category has the parent, get posts attached to this category, then detach everything, and attach the current category and the parent category.
        */
        UpdatePost::dispatchIf($category->parent, $category)->onQueue('syncpost')->delay(now()->addMinutes(1));

        session()->flash('message', trans('categories/flash.update'));
        return to_route('admin.categories.edit', ['category' => $category->id, 'language' => $category->language]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        Gate::authorize('destroy-category');

        $category->delete();

        session()->flash('message', trans('categories/flash.delete'));
        return to_route('admin.categories.index');
    }
        public function restore(Category $category)
        {
            Gate::authorize('restore-category');

            if ($category->trashed()) {
                $category->restore();
            }
            session()->flash('message', trans('categories/flash.restore'));
            return to_route('admin.categories.trash');
        }
    public function forceDelete(Totalcategory $totalcategory, Category $category)
    {
        Gate::authorize('forceDelete-category');

        if ($category->trashed()) {
            $category->forceDelete();

            if (count($totalcategory->categories) == 0) {
                $totalcategory->delete();
            }

            session()->flash('message', trans('categories/flash.force-delete'));
        }
        return to_route('admin.categories.trash');
    }
}
