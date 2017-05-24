<?php namespace CoreProc\Paynamics\Paygate;

use CoreProc\Paynamics\Paygate\Contracts\RequestInterface;
use Coreproc\Paynamics\Paygate\Contracts\ResponseInterface;
use Psr\Http\Message\ResponseInterface as GuzzleResponseInterface;

class Response implements ResponseInterface
{

    /**
     * @var Request
     */
    private $request;
    /**
     * @var GuzzleResponseInterface
     */
    private $response;

    /**
     * @param GuzzleResponseInterface $response
     * @param Request $request
     */
    public function __construct(GuzzleResponseInterface $response, RequestInterface $request)
    {
        $this->setRequest($request);
        $this->setResponse($response);
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     */
    private function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return GuzzleResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     */
    private function setResponse($response)
    {
        $this->response = $response;
    }
}