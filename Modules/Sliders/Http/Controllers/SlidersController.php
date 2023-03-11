<?php

namespace Modules\Sliders\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sliders\Entities\Slider;
use Modules\Sliders\Http\Requests\SliderRequest;
use Modules\Sliders\Repositories\SliderRepository;

class SlidersController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var SliderRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     *
     * @param SliderRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(SliderRepository $repository)
    {
        $this->middleware('permission:read_sliders')->only(['index']);
        $this->middleware('permission:create_sliders')->only(['create', 'store']);
        $this->middleware('permission:update_sliders')->only(['edit', 'update']);
        $this->middleware('permission:delete_sliders')->only(['destroy']);
        $this->middleware('permission:show_sliders')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $sliders = $this->repository->all();

        return view('sliders::sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('sliders::sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(SliderRequest $request)
    {
        $slider = $this->repository->create($request->all());

        flash(trans('sliders::sliders.messages.created'))->success();

        return redirect()->route('dashboard.sliders.show', $slider);
    }

    /**
     * Display the specified resource.
     *
     * @param Slider $slider
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Slider $slider)
    {
        $slider = $this->repository->find($slider);

        return view('sliders::sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return Application|Factory|View
     */
    public function edit(Slider $slider)
    {
        return view('sliders::sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $slider = $this->repository->update($slider, $request->all());

        flash(trans('sliders::sliders.messages.updated'))->success();

        return redirect()->route('dashboard.sliders.show', $slider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Slider $slider)
    {
        $this->repository->delete($slider);

        flash(trans('sliders::sliders.messages.deleted'))->error();

        return redirect()->route('dashboard.sliders.index');
    }
}
