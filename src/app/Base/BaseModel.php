<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * @param array $options
     * @return $this|self
     */
    public function save(array $options = []) : self
    {
        if (parent::save($options)) {
            return $this;
        }
        $className = get_class($this);

        return new $className;
    }
}
