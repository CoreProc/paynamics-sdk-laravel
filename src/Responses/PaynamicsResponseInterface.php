<?php namespace Coreproc\Paynamics\Responses;

use Coreproc\Paynamics\Requests\PaynamicsRequest;
use GuzzleHttp\Psr7\Response;

interface PaynamicsResponseInterface
{

    /**
     * @return PaynamicsRequest
     */
    public function getRequest();

    /**
     * @return Response
     */
    public function getResponse();

}