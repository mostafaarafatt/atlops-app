<?php

namespace Modules\Accounts\Http\Filters;

use App\Http\Filters\BaseFilters;

class UserFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'last_name',
        'email',
        'phone',
        'kind',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->where('name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function last_name($value)
    {
        if ($value) {
            return $this->builder->where('last_name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include users by email.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($value)
    {
        if ($value) {
            return $this->builder->where('email', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include users by phone.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function phone($value)
    {
        if ($value) {
            return $this->builder->where('phone', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include users by phone.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function kind($value)
    {
        if ($value) {
            return $this->builder->where('kind', $value);
        }

        return $this->builder;
    }
}
