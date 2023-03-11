<?php

Breadcrumbs::for('dashboard.sliders.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('sliders::sliders.plural'), route('dashboard.sliders.index'));
});

Breadcrumbs::for('dashboard.sliders.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.sliders.index');
    $breadcrumb->push(trans('sliders::sliders.actions.create'), route('dashboard.sliders.create'));
});

Breadcrumbs::for('dashboard.sliders.show', function ($breadcrumb, $slider) {
    $breadcrumb->parent('dashboard.sliders.index');
    $breadcrumb->push($slider->id, route('dashboard.sliders.show', $slider));
});

Breadcrumbs::for('dashboard.sliders.edit', function ($breadcrumb, $slider) {
    $breadcrumb->parent('dashboard.sliders.show', $slider);
    $breadcrumb->push(trans('sliders::sliders.actions.edit'), route('dashboard.sliders.edit', $slider));
});
