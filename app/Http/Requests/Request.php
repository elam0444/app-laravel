<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use App\Http\Responses\Response;

/**
 * Class Request
 * @package App\Http\Requests
 */
abstract class Request extends FormRequest
{
    /**
     * DEPRECATED: Laravel 5.4. Function used to override the response when a JSON is returned, to comply with the response defined in the
     * custom response.
     *
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    /*public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return Response::buildDefaultResponse(trans('responses.error'), trans('responses.request_default'), $errors);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }*/

    /**
     * Laravel 5.5. Function used to override the response when a JSON is returned, to comply with the response defined in the
     * custom response.
     *
     * @param Validator $validator
     * @return JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ValidationException
     * @internal param array $errors
     */
    protected function failedValidation(Validator $validator) {
        if ($this->ajax() || $this->wantsJson()) {
            //AJAX
            throw new HttpResponseException(
                Response::buildDefaultResponse(trans('responses.error'), trans('responses.request_default'), $validator->errors()->all())
            );
        } else {
            // POST
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }
    }

    /**
     * Get the response for a forbidden operation.
     *
     * @return \Illuminate\Http\Response|JsonResponse|Response
     */
    public function forbiddenResponse()
    {
        if ($this->ajax() || $this->wantsJson()) {
            return Response::buildDefaultResponse(trans('responses.error'), trans('responses.not_enough_permissions'));
        } else {
            return new Response('Forbidden', 403);
        }
    }

    /**
     * Overwritten function to sanitize string data when it is validated.
     *
     * @return array
     */
    public function validationData()
    {
        $this->sanitize();

        return parent::validationData();
    }

    /**
     * Sanitize string input to not save html code.
     */
    public function sanitize()
    {
        $input = $this->all();
        foreach ($input as $index => $item) {
            if (!empty($this->rules()[$index])) {
                $isEmail = collect(explode('|', $this->rules()[$index]))->contains('email');
                if ($isEmail) {
                    $input[$index] = trim($item);
                }

                $isString = collect(explode('|', $this->rules()[$index]))->contains('string');
                if ($isString) {
                    $input[$index] = htmlspecialchars($item, ENT_QUOTES);
                }
            }
        }

        $this->request->add($input);
    }
}
