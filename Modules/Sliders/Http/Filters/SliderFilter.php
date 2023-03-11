<?php

namespace Modules\Sliders\Http\Filters;

use App\Http\Filters\BaseFilters;

class SliderFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'subtitle'
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('title', "%$value%");
        }

        return $this->builder;
    }


    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function subtitle($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('sub_title', "%$value%");
        }

        return $this->builder;
    }

}
