<?php

namespace Modules\Categories\Repositories;

use Modules\Categories\Entities\subCategory;
use Modules\Categories\Http\Filters\subCategoryFilter;
use Modules\Contracts\ChildCrudRepository;


class SubCategoryRepository implements ChildCrudRepository
{
    /**
     * @var \Modules\Services\Http\Filters\subCategoryFilter
     */
    private $filter;

    /**
     * ServiceRepository constructor.
     *
     * @param \Modules\Services\Http\Filters\subCategoryFilter $filter
     */
    public function __construct(subCategoryFilter $filter)
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
        return $category->sub_categories()->filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Services\Entities\subCategory
     */
    public function create($category, array $data)
    {
        $sub_category = $category->sub_categories()->create($data);

        return $sub_category;
    }

    /**
     * Display the given subCategory instance.
     *
     * @param mixed $model
     * @return \Modules\Services\Entities\subCategory
     */
    public function find($model)
    {
        if ($model instanceof subCategory) {
            return $model;
        }

        return subCategory::findOrFail($model);
    }

    /**
     * Update the given subCategory in the storage.
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
     * Delete the given subCategory from storage.
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
