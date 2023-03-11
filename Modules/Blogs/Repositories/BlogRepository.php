<?php

namespace Modules\Blogs\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Blogs\Entities\Blog;
use Modules\Blogs\Http\Filters\BlogFilter;

class BlogRepository implements CrudRepository
{
    /**
     * @var \Modules\Blogs\Http\Filters\BlogFilter
     */
    private $filter;

    /**
     * BlogRepository constructor.
     *
     * @param \Modules\Blogs\Http\Filters\BlogFilter $filter
     */
    public function __construct(BlogFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all Blogs as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Blog::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Blogs\Entities\Blog
     */
    public function create(array $data)
    {
        /** @var Blog $blog */
        $blog = Blog::create($data);

        $blog->addAllMediaFromTokens();

        return $blog;
    }

    /**
     * Display the given Blog instance.
     *
     * @param mixed $model
     * @return \Modules\Blogs\Entities\Blog
     */
    public function find($model)
    {
        if ($model instanceof Blog) {
            return $model;
        }

        return Blog::findOrFail($model);
    }

    /**
     * Update the given Blog in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $blog = $this->find($model);

        $blog->update($data);

        $blog->addAllMediaFromTokens();

        return $blog;
    }

    /**
     * Delete the given Blog from storage.
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
