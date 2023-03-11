<?php

namespace Modules\Orders\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Orders\Entities\Order;
use Modules\Orders\Http\Filters\OrderFilter;

class OrderRepository implements CrudRepository
{
    /**
     * @var \Modules\Orders\Http\Filters\OrderFilter
     */
    private $filter;

    /**
     * OrderRepository constructor.
     *
     * @param \Modules\Orders\Http\Filters\OrderFilter $filter
     */
    public function __construct(OrderFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all Orders as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Order::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Orders\Entities\Order
     */
    public function create(array $data)
    {
        /** @var Order $order */
        $order = Order::create($data);

        $order->addAllMediaFromTokens();

        return $order;
    }

    /**
     * Display the given Order instance.
     *
     * @param mixed $model
     * @return \Modules\Orders\Entities\Order
     */
    public function find($model)
    {
        if ($model instanceof Order) {
            return $model;
        }

        return Order::findOrFail($model);
    }

    /**
     * Update the given Order in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $order = $this->find($model);

        $order->update($data);

        $order->addAllMediaFromTokens();

        return $order;
    }

    /**
     * Delete the given Order from storage.
     *
     * @param mixed $model
     * @return void
     * @throws \Exception
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }
}
