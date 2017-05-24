<?php namespace CoreProc\Paynamics\Paygate\Contracts;

use Psr\Http\Message\ResponseInterface as GuzzleResponseInterface;

interface ResponseInterface
{

    /**
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * @return GuzzleResponseInterface
     */
    public function getResponse();

}