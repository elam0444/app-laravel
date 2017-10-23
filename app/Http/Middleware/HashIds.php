<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\HashId;
use Illuminate\Http\Request;
//use Log;
use App\Http\Responses\Response;

/**
 * Class HashIds
 * @package App\Http\Middleware
 */
class HashIds
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!empty($request->hashedId)) {
                $request->request->add(["id" => HashId::decode($request->hashedId)]);
            }

            if (!empty($request->hashedUserId)) {
                $request->request->add(['user_id' => HashId::decode($request->hashedUserId)]);
            }

            return $next($request);
        } catch (\Exception $e) {
            //Log::error($e);
            return Response::buildDefaultResponse(
                trans('responses.error'),
                trans('responses.resource_not_valid')
            );
        }
    }
}
