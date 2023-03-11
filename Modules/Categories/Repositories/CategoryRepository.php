<?php

namespace Modules\Categories\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Categories\Entities\Category;
use Modules\Categories\Http\Filters\CategoryFilter;

class CategoryRepository implements CrudRepository
{
    /**
     * @var \Modules\Categories\Http\Filters\CategoryFilter
     */
    private $filter;

    /**
     * CategoryRepository constructor.
     *
     * @param \Modules\Categories\Http\Filters\CategoryFilter $filter
     */
    public function __construct(CategoryFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all Categories as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Category::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Categories\Entities\Category
     */
    public function create(array $data)
    {
        /** @var Category $category */
        $category = Category::create($data);

        $category->addAllMediaFromTokens();

        return $category;
    }

    /**
     * Display the given Category instance.
     *
     * @param mixed $model
     * @return \Modules\Categories\Entities\Category
     */
    public function find($model)
    {
        if ($model instanceof Category) {
            return $model;
        }

        return Category::findOrFail($model);
    }

    /**
     * Update the given Category in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $category = $this->find($model);

        $category->update($data);

        $category->addAllMediaFromTokens();

        return $category;
    }

    /**
     * Delete the given Category from storage.
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
