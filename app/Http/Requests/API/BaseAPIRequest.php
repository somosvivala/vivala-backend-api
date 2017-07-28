<?php

namespace App\Http\Requests\API;

use Response;
use InfyOm\Generator\Request\APIRequest;
use InfyOm\Generator\Utils\ResponseUtil;

class BaseAPIRequest extends APIRequest
{
    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        \Log::info('erros: '.json_encode($errors));
        $messages = implode(' ', array_flatten($errors));

        return Response::json(ResponseUtil::makeError($messages, $errors), 400);
    }
}
