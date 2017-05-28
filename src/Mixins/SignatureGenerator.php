<?php namespace CoreProc\Paynamics\Paygate\Mixins;

use CoreProc\Paynamics\Paygate\ClientInterface;

trait SignatureGenerator
{
    public function generateRequestSignature(ClientInterface $client)
    {

        switch($this->_method) {
            /*
             * For Refund / Reverse Payment
             *
             **/
            case 'reversePayment':
                $signString =  $client->getMerchantId() .
                    $this->request_id .
                    $this->org_trxid .
                    $this->ip_address .
                    $this->notification_url .
                    $this->response_url .
                    $this->amount .
                    $client->getMerchantKey();
                break;

            case 'rebill':
                $signString =  $client->getMerchantId() .
                    $this->request_id .
                    $this->ip_address .
                    $this->org_trxid .
                    $this->token_id .
                    $this->notification_url .
                    $this->response_url .
                    $this->amount .
                    $client->getMerchantKey();
                break;

            case 'query':
                $signString =  $client->getMerchantId() .
                    $this->request_id .
                    $this->org_trxid .
                    $this->org_trxid2 .
                    $this->ip_address .
                    $this->notification_url .
                    $this->response_url .
                    $client->getMerchantKey();
                break;

            case 'disputeQuery':
                $signString =  $client->getMerchantId() .
                    $this->request_id .
                    $this->dispute_start_date .
                    $this->dispute_end_date .
                    $this->ip_address .
                    $this->notification_url .
                    $this->response_url .
                    $client->getMerchantKey();
                break;

            default:
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

        unset($this->attributes['_method']);

        $this->signature = hash('sha512', $signString);
    }
}