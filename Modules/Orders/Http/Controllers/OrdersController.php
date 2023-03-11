<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Orders\Entities\Order;
use Modules\Orders\Http\Requests\OrderRequest;
use Modules\Orders\Repositories\OrderRepository;

class OrdersController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     *
     * @param OrderRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->middleware('permission:read_orders')->only(['index']);
        $this->middleware('permission:create_orders')->only(['create', 'store']);
        $this->middleware('permission:update_orders')->only(['edit', 'update']);
        $this->middleware('permission:delete_orders')->only(['destroy']);
        $this->middleware('permission:show_orders')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = $this->repository->all();

        return view('orders::orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('orders::orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(OrderRequest $request)
    {
        $order = $this->repository->create($request->all());

        flash(trans('orders::orders.messages.created'))->success();

        return redirect()->route('dashboard.orders.show', $order);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Order $order)
    {
        $order = $this->repository->find($order);

        return view('orders::orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function edit(Order $order)
    {
        return view('orders::orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order = $this->repository->update($order, $request->all());

        flash(trans('orders::orders.messages.updated'))->success();

        return redirect()->route('dashboard.orders.show', $order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Order $order)
    {
        $this->repository->delete($order);

        flash(trans('orders::orders.messages.deleted'))->error();

        return redirect()->route('dashboard.orders.index');
    }
}
