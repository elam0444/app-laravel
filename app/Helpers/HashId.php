<?php

namespace App\Helpers;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HashId
 * @package App\Helpers
 */
class HashId
{
    /**
     * @param Model $model
     * @return string
     */
    public static function encode(Model $model)
    {
        $hash = new Hashids('', config("voiq.hash_id_length"));

        return $hash->encode($model->getKey());
    }

    /**
     * Encode an integer id
     *
     * @param int $id
     * @return string
     */
    public static function encodeId($id)
    {
        $hash = new Hashids("", config("voiq.hash_id_length"));

        return $hash->encode($id);
    }

    /**
     * Decode a hashed id
     *
     * @param string $key
     * @return bool|integer
     */
    public static function decode($key)
    {
        $hash = new Hashids("", config("voiq.hash_id_length"));
        $decodedHash = $hash->decode($key);
        if (empty($decodedHash)) {
            return false;
        }

        return array_shift($decodedHash);
    }
}
