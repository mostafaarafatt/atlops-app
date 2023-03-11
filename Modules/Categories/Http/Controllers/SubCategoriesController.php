<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\subCategory;
use Modules\Categories\Http\Requests\SubCategoryRequest;
use Modules\Categories\Repositories\SubCategoryRepository;

class SubCategoriesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var SubCategoryRepository
     */
    private $repository;


    /**
     * categoryController constructor.
     *
     * @param SubCategoryRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(SubCategoryRepository $repository)
    {
        $this->middleware('permission:read_subcategories')->only(['index']);
        $this->middleware('permission:create_subcategories')->only(['create', 'store']);
        $this->middleware('permission:update_subcategories')->only(['edit', 'update']);
        $this->middleware('permission:delete_subcategories')->only(['destroy']);
        $this->middleware('permission:show_subcategories')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Category $category)
    {
         $subcategories = $this->repository->all($category);
        return view('categories::categories.show', compact('category', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Category $category)
    {
        return view('categories::subcategories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubCategoryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(SubCategoryRequest $request, Category $category)
    {
        $subcategory = $this->repository->create($category, $request->all());

        flash(trans('categories::subcategories.messages.created'))->success();

        return redirect()->route('dashboard.subcategories.show', [$category, $subcategory]);
    }

    /**
     * Display the specified resource.
     *
     * @param SubCategory $subcategory
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Category $category, SubCategory $subcategory)
    {
        $subcategory = $this->repository->find($subcategory);

        return view('categories::subcategories.show', compact('category', 'subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubCategory $subcategory
     * @return Application|Factory|View
     */
    public function edit(Category $category, SubCategory $subcategory)
    {
        return view('categories::subcategories.edit', compact('category', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubCategoryRequest $request
     * @param SubCategory $subcategory
     * @return RedirectResponse
     */
    public function update(SubCategoryRequest $request, Category $category, SubCategory $subcategory)
    {
        $subcategory = $this->repository->update($subcategory, $request->all());

        flash(trans('categories::subcategories.messages.updated'))->success();

        return redirect()->route('dashboard.subcategories.show', [$category, $subcategory]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubCategory $subcategory
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category, SubCategory $subcategory)
    {
        $this->repository->delete($subcategory);

        flash(trans('categories::subcategories.messages.deleted'))->error();

        return redirect()->route('dashboard.categories.show', $category);
    }
}
