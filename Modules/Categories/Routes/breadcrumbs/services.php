<?php


Breadcrumbs::for('dashboard.services.create', function ($breadcrumb, $category) {
    $breadcrumb->parent('dashboard.categories.show', $category);
    $breadcrumb->push(trans('categories::services.actions.create'), route('dashboard.services.create', $category));
});

Breadcrumbs::for('dashboard.services.show', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.categories.show', $item[0]);
    $breadcrumb->push($item[1]->name, route('dashboard.services.show', [$item[0], $item[1]]));
});

Breadcrumbs::for('dashboard.services.edit', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.categories.show', $item[0]);
    $breadcrumb->push(trans('categories::services.actions.edit'), route('dashboard.services.edit', [$item[0], $item[1]]));
});
