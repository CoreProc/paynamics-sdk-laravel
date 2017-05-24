<?php namespace CoreProc\Paynamics\Paygate\Contracts;

use Psr\Http\Message\ResponseInterface as GuzzleResponseInterface;

interface ResponseInterface
{

    /**
     * @return GuzzleResponseInterface
     */
    public function getResponse();

    /**
     * @return string
     */
    public function getRedirectUrl();

}