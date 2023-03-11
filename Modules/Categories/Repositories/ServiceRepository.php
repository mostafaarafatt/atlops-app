<?php

namespace Modules\Categories\Repositories;

use Modules\Categories\Entities\Service;
use Modules\Categories\Http\Filters\ServiceFilter;
use Modules\Contracts\ChildCrudRepository;


class ServiceRepository implements ChildCrudRepository
{
    /**
     * @var \Modules\Categories\Http\Filters\ServiceFilter
     */
    private $filter;

    /**
     * ServiceRepository constructor.
     *
     * @param \Modules\Categories\Http\Filters\ServiceFilter $filter
     */
    public function __construct(ServiceFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all images as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all($category)
    {
        return $category->services()->filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Categories\Entities\Service
     */
    public function create($category, array $data)
    {
        $sub_category = $category->services()->create($data);

        return $sub_category;
    }

    /**
     * Display the given Service instance.
     *
     * @param mixed $model
     * @return \Modules\Categories\Entities\Service
     */
    public function find($model)
    {
        if ($model instanceof Service) {
            return $model;
        }

        return Service::findOrFail($model);
    }

    /**
     * Update the given Service in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $sub_category = $this->find($model);

        $sub_category->update($data);

        return $sub_category;
    }

    /**
     * Delete the given Service from storage.
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
