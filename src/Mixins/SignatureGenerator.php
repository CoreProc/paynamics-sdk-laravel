<?php namespace CoreProc\Paynamics\Paygate\Mixins;

use CoreProc\Paynamics\Paygate\ClientInterface;
use CoreProc\Paynamics\Paygate\ResponseInterface;

trait SignatureGenerator
{
    public function generateRequestSignature(ClientInterface $client)
    {
        $signString = $this->mid .
            $this->request_id .
            $this->ip_address .
            $this->notification_url .
            $this->response_url .
            $this->fname .
            $this->lname .
            $this->mname .
            $this->address1 .
            $this->address2 .
            $this->city .
            $this->state .
            $this->country .
            $this->zip .
            $this->email .
            $this->phone .
            $this->client_ip .
            $this->amount .
            $this->currency .
            $this->secure3d;

        $cert = $client->getMerchantKey();

        return hash('sha512', $signString . $cert);
    }

    public function generateResponseSignature(ResponseInterface $response)
    {
        $attributes = $this->getAttributes();

        $signString = $attributes['merchantid'] . $attributes['request_id']  . $attributes['response_id'] . $attributes['response_code'] . $attributes['response_message'] .
            $attributes['response_advise']  . $attributes['timestamp'] . $attributes['rebill_id'] . $attributes['merchantkey'];

        return $signString;

    }

}