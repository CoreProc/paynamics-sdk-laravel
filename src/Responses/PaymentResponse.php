<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Psr\Http\Message\ResponseInterface;

class PaymentResponse
{
    /**
     * @var ResponseInterface
     */
    public ResponseInterface $response;

    /**
     * PaymentResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Create new instance of payment response
     *
     * @param ResponseInterface $response
     * @return PaymentResponse
     */
    public static function make(ResponseInterface $response): PaymentResponse
    {
        return new self($response);
    }

    /**
     * Get response in array form
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'body' => $this->response->getBody(),
            'header' => $this->response->getHeaders(),
            'status' => $this->response->getStatusCode(),
            'redirect' => $this->response->getHeaderLine('X-Guzzle-Redirect-History'),
        ];
    }
}
