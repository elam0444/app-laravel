<?php

namespace App\Traits;

use App\Helpers\HashId;

/**
 * Class HashableModel
 * @package App\Traits
 */
trait HashableModel
{
    /**
     * Get the hashed id to mask the auto incremented id used for the model
     *
     * @return string
     */
    public function getHashedId()
    {
        return HashId::encodeId($this->id);
    }
}

