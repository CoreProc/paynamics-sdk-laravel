<?php namespace CoreProc\Paynamics\Paygate\Mixins;

use CoreProc\Paynamics\Paygate\ClientInterface;

trait SignatureGenerator
{
    public function generateRequestSignature(ClientInterface $client)
    {
        /*
         * For Refund
         *
         **/
        if ( ! empty($this->org_trxid)) {
            $signString =  $client->getMerchantId() .
                $this->request_id .
                $this->org_trxid .
                $this->ip_address .
                $this->notification_url .
                $this->response_url .
                $this->amount .
                $client->getMerchantKey();
        }

        /*
         * For Responsive Payment
         *
         **/
        else {
            $signString = $client->getMerchantId() .
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
                $this->secure3d .
                $client->getMerchantKey();
        }

        $this->signature = hash('sha512', $signString);
    }
}