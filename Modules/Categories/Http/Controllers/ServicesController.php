<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\Service;
use Modules\Categories\Http\Requests\ServiceRequest;
use Modules\Categories\Repositories\ServiceRepository;

class ServicesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var ServiceRepository
     */
    private $repository;


    /**
     * categoryController constructor.
     *
     * @param ServiceRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(ServiceRepository $repository)
    {
        $this->middleware('permission:read_services')->only(['index']);
        $this->middleware('permission:create_services')->only(['create', 'store']);
        $this->middleware('permission:update_services')->only(['edit', 'update']);
        $this->middleware('permission:delete_services')->only(['destroy']);
        $this->middleware('permission:show_services')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Category $category)
    {
        $services = $this->repository->all($category);
        return view('categories::categories.show', compact('category', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Category $category)
    {
        return view('categories::services.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(ServiceRequest $request, Category $category)
    {
        $service = $this->repository->create($category, $request->all());

        flash(trans('categories::services.messages.created'))->success();

        return redirect()->route('dashboard.services.show', [$category, $service]);
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Category $category, Service $service)
    {
        $service = $this->repository->find($service);

        return view('categories::services.show', compact('category', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Category $category, Service $service)
    {
        return view('categories::services.edit', compact('category', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request, Category $category, Service $service)
    {
        $service = $this->repository->update($service, $request->all());

        flash(trans('categories::services.messages.updated'))->success();

        return redirect()->route('dashboard.services.show', [$category, $service]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category, Service $service)
    {
        $this->repository->delete($service);

        flash(trans('categories::services.messages.deleted'))->error();

        return redirect()->route('dashboard.categories.show', $category);
    }
}
