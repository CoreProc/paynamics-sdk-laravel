<?php namespace CoreProc\Paynamics\Paygate;

use CoreProc\Paynamics\Paygate\Contracts\ResponseInterface;
use Psr\Http\Message\ResponseInterface as GuzzleResponseInterface;
use Psr\Http\Message\UriInterface;

class PaygateResponse implements ResponseInterface
{

    /**
     * @var GuzzleResponseInterface
     */
    private $response;

    /**
     * @var UriInterface
     */
    private $redirectUrl;

    /**
     * @param GuzzleResponseInterface $response
     * @param UriInterface $redirectUrl
     */
    public function __construct(GuzzleResponseInterface $response, UriInterface $redirectUrl)
    {
        $this->response = $response;
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return GuzzleResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl->__toString();
    }
}