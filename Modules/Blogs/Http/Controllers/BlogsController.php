<?php

namespace Modules\Blogs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blogs\Entities\Blog;
use Modules\Blogs\Http\Requests\BlogRequest;
use Modules\Blogs\Repositories\BlogRepository;

class BlogsController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var BlogRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     *
     * @param BlogRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(BlogRepository $repository)
    {
        $this->middleware('permission:read_blogs')->only(['index']);
        $this->middleware('permission:create_blogs')->only(['create', 'store']);
        $this->middleware('permission:update_blogs')->only(['edit', 'update']);
        $this->middleware('permission:delete_blogs')->only(['destroy']);
        $this->middleware('permission:show_blogs')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = $this->repository->all();

        return view('blogs::blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('blogs::blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(BlogRequest $request)
    {
        $blog = $this->repository->create($request->all());

        flash(trans('blogs::blogs.messages.created'))->success();

        return redirect()->route('dashboard.blogs.show', $blog);
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Blog $blog)
    {
        $blog = $this->repository->find($blog);

        return view('blogs::blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {
        return view('blogs::blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog = $this->repository->update($blog, $request->all());

        flash(trans('blogs::blogs.messages.updated'))->success();

        return redirect()->route('dashboard.blogs.show', $blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Blog $blog)
    {
        $this->repository->delete($blog);

        flash(trans('blogs::blogs.messages.deleted'))->error();

        return redirect()->route('dashboard.blogs.index');
    }
}
