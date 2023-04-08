<?php

namespace App\Base;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BaseEntity extends Model
{
    /**
     * @param array $options
     * @return $this|self
     */
    public function save(array $options = []) : self
    {
        try {
            if (isset($this->code) || isset($options['code'])) {
                $options['code'] = create_unique_code_for_table($this->getTable());
            }
        } catch (Exception $exception) {
            Log::error('Failed to set code on entity before saving', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);
        }

        if (parent::save($options)) {
            return $this;
        }
        $className = get_class($this);

        return new $className;
    }
}
