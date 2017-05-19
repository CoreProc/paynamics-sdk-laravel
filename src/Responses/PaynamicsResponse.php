<?php namespace Coreproc\Paynamics\Responses;

use Coreproc\Paynamics\Requests\PaynamicsRequest;
use Coreproc\Paynamics\Requests\PaynamicsRequestInterface;
use Psr\Http\Message\ResponseInterface;

class PaynamicsResponse implements PaynamicsResponseInterface
{

    /**
     * @var PaynamicsRequest
     */
    private $request;
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     * @param PaynamicsRequest $request
     */
    public function __construct(ResponseInterface $response, PaynamicsRequestInterface $request)
    {
        $this->setRequest($request);
        $this->setResponse($response);
    }

    /**
     * @return PaynamicsRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param PaynamicsRequest $request
     */
    private function setRequest(PaynamicsRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return ResponseInterface
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