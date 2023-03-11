<?php

Breadcrumbs::for('dashboard.blogs.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('blogs::blogs.plural'), route('dashboard.blogs.index'));
});

Breadcrumbs::for('dashboard.blogs.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.blogs.index');
    $breadcrumb->push(trans('blogs::blogs.actions.create'), route('dashboard.blogs.create'));
});

Breadcrumbs::for('dashboard.blogs.show', function ($breadcrumb, $blog) {
    $breadcrumb->parent('dashboard.blogs.index');
    $breadcrumb->push($blog->id, route('dashboard.blogs.show', $blog));
});

Breadcrumbs::for('dashboard.blogs.edit', function ($breadcrumb, $blog) {
    $breadcrumb->parent('dashboard.blogs.show', $blog);
    $breadcrumb->push(trans('blogs::blogs.actions.edit'), route('dashboard.blogs.edit', $blog));
});
