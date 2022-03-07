<?php

namespace App\Traits;

use App\Models\Tag;

trait Taggable{

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable', 'model_has_tags');
    }

}
