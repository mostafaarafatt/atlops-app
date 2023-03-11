<?php


Breadcrumbs::for('dashboard.subcategories.create', function ($breadcrumb, $category) {
    $breadcrumb->parent('dashboard.categories.show', $category);
    $breadcrumb->push(trans('categories::subcategories.actions.create'), route('dashboard.subcategories.create', $category));
});

Breadcrumbs::for('dashboard.subcategories.show', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.categories.show', $item[0]);
    $breadcrumb->push($item[1]->name, route('dashboard.subcategories.show', [$item[0], $item[1]]));
});

Breadcrumbs::for('dashboard.subcategories.edit', function ($breadcrumb, $item) {
    $breadcrumb->parent('dashboard.categories.show', $item[0]);
    $breadcrumb->push(trans('categories::subcategories.actions.edit'), route('dashboard.subcategories.edit', [$item[0], $item[1]]));
});
