<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Src\Follow;

/**
 * Class Event.
 *
 */
class Event
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $causer;

    public $relation;

    public $targets;

    public $class;

    /**
     * Event constructor.
     *
     * @param Model $causer
     * @param string $relation
     * @param int|array                             $targets
     * @param string $class
     */
    public function __construct(Model $causer, string $relation, $targets, string $class)
    {
        $this->causer = $causer;
        $this->relation = $relation;
        $this->targets = $targets;
        $this->class = $class;
    }

    public function getRelationType()
    {
        return Follow::RELATION_TYPES[$this->relation];
    }

    public function getTargetsCollection()
    {
        return \forward_static_call([$this->targets->classname, 'find'], (array) $this->targets->ids);
    }
}
