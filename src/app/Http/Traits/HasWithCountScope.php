<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Query\Expression;

trait HasWithCountScope
{

    /**
     * @param QueryBuilder|EloquentBuilder $query
     * @param string|array                 $name
     */
    public function scopeWithCount($query, $name)
    {
        $relations = is_array($name) ? $name : array_slice(func_get_args(), 1);

        if (empty($query->columns)) {
            $query->select(['*']);
        }

        foreach ($relations as $key => $constraint) {
            list($name, $alias, $constraint) = $this->parseWithCountConstraint($key, $constraint);

            $query->selectSub($this->getRelatedCountSubQuery($name, $constraint), $alias);
        }
    }


    /**
     * @param string        $name
     * @param \Closure|null $constraint
     * @return \Illuminate\Database\Query\Builder
     */
    public function getRelatedCountSubQuery($name, $constraint = null)
    {
        /** @var Relation|HasOneOrMany|HasMany $relation */
        $relation = call_user_func([$this, $name]);
        $related = $relation->getRelated();
        $relatedKey = $relation->getForeignKey();
        $key = $relation->getQualifiedParentKeyName();

        /** @var QueryBuilder|EloquentBuilder $subQuery */
        $subQuery = $related->newQuery();
        $subQuery->select(new Expression('COUNT(*)'));
        $subQuery->whereRaw("{$relatedKey} = {$key}");

        if ($constraint) {
            $subQuery->where($constraint);
        }

        if ($subQuery instanceof EloquentBuilder) {
            return $subQuery->getQuery();
        }

        return $subQuery;
    }


    /**
     * @param string          $key
     * @param string|\Closure $constraint
     * @return array
     */
    protected function parseWithCountConstraint($key, $constraint = null)
    {
        list($name, $constraint) = is_string($key) ? [$key, $constraint] : [$constraint, null];

        list($name, $alias) = $this->parseWithCountAlias($name);

        return [$name, $alias, $constraint];
    }


    /**
     * @param $name
     * @return array
     */
    protected function parseWithCountAlias($name)
    {
        $names = preg_split('/\s+(as)\s+/i', $name);

        if (count($names) > 1) {
            $name = $names[0];
            $alias = $names[1];
        } else {
            $alias = $name.'_count';
        }

        return [$name, $alias];
    }
}
