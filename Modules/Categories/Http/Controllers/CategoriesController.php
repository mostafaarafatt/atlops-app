<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Categories\Http\Requests\CategoryRequest;
use Modules\Categories\Repositories\CategoryRepository;

class CategoriesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     *
     * @param CategoryRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only(['create', 'store']);
        $this->middleware('permission:update_categories')->only(['edit', 'update']);
        $this->middleware('permission:delete_categories')->only(['destroy']);
        $this->middleware('permission:show_categories')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->repository->all();

        return view('categories::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('categories::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->repository->create($request->all());

        flash(trans('categories::categories.messages.created'))->success();

        return redirect()->route('dashboard.categories.show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Category $category)
    {
        $category = $this->repository->find($category);
        $subcategories = $category->sub_categories()->paginate(10);
        $services = $category->services()->paginate(10);

        return view('categories::categories.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('categories::categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = $this->repository->update($category, $request->all());

        flash(trans('categories::categories.messages.updated'))->success();

        return redirect()->route('dashboard.categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $this->repository->delete($category);

        flash(trans('categories::categories.messages.deleted'))->error();

        return redirect()->route('dashboard.categories.index');
    }
}
