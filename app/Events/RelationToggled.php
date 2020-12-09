<?php

namespace App\Events;

/**
 * Class RelationToggled.
 */
class RelationToggled extends Event
{
    public $results = [];

    public $attached = [];

    public $detached = [];

    /**
     * RelationToggled constructor.
     *
     * @param \Illuminate\Database\Eloquent\Model $causer
     * @param                                     $relation
     * @param                                     $targets
     * @param                                     $class
     * @param array                               $results
     */
    public function __construct(\Illuminate\Database\Eloquent\Model $causer, $relation, $targets, $class, array $results = [])
    {
        parent::__construct($causer, $relation, $targets, $class);

        $this->results = $results;
        $this->attached = $results['attached'] ?? [];
        $this->detached = $results['detached'] ?? [];
    }
}
