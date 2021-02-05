<?php

namespace App\Helpers;

use App\Models\Hub;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasHubs
{
    public function tags()
    {
        return $this->hubs;
    }

    public function syncTags(array $hubs)
    {
        $this->save();
        $this->hubs()->sync($hubs);
    }

    public function removeTags()
    {
        $this->hubs()->detach();
    }

    public function hubs(): morphToMany
    {
        return $this->morphToMany(Hub::class, 'taggable');
    }
}
