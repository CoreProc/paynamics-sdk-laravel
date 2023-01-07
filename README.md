# Paynamics PayGate SDK PHP

## Installation
***
`composer require CoreProc/paynamics-sdk-laravel`


## Usage
***

### Generating your payment request
``` php

use Coreproc\PaynamicsSdk\Requests\PaymentRequest;
use Coreproc\PaynamicsSdk\Requests\ItemRequest;

$itemRequest = ItemRequest::make()
            ->setItemName(<name of item>)
            ->setAmount(<item amount or price>)
            ->setQuantity(<qunatity>);
            
            
$paymentRequest = PaymentRequest::make()
            ->setIpAddress(<server ip address>)
            ->setNotificationUrl()
            ->setResponseUrl()
            ->setCancelUrl()
            ->setFname(<customer first name>)
            ->setLname(<customer last name>)
            ->setAddress1(<customer address line 1>)
            ->setCity(<customer city>)
            ->setState(<customer state>)
            ->setEmail(<customer email>)
            ->setMobile(<customer mobile>)
            ->setClientIp(<client request ip>)
            ->setAmount(<total amount request>)
            ->setCurrency(<currency>)
            ->setTrxtype('sale')
            ->setPmethod(<payment method used>)
            ->setCountry(<country name>)
            ->addItem($itemRequest);
```
You can add multiple items on the payment request. Total amount should be equal to the total of all 
items added in the request.

### Adding discount
You can add discount to the request by simply adding new item to the request with a negative value.
**Note:** the total value of request must be equal to the total value of items added including the discount.

Example
``` php 
/** Item name can be anything you want for exmaple ('Coupon Discount') or etc**/
$itemRequest = ItemRequest::make()
            ->setItemName('Discount')
            ->setAmount(-5000)
            ->setQuantity(1);
            
$paymentRequest->addItem($itemRequest);
```

### Generating paynamics form request 

``` php
use Coreproc\PaynamicsSdk\Services\PaynamicsServiceManager;

/** Currently supports "payment" request only */
$paymentService = PaynamicsServiceManager::make('payment');

return $paymentService->setPaymentType('default')
    ->setRequest($paymentRequest)
    ->generate();
```
This will generate a signed html form base on the payment details you provide on `PaymentRequest`

Payment Types
 - **hsbc** - Set payment type to "hsbc" if you payment method is "bpiinstall" or "hsbcinstall"
 - **default** - All Payment method except "bpiinstall" and "hsbcinstall"

### Generating Payment request using installment
When using installment like "bpiinstall" and "hsbcinstall", you should set the MetaData2 and Secure3d 
in your `PaymentRequest` and instead of passing country name on ->setCountry() you should pass the 
country ISO code.

Example

``` PHP 
$paymentRequest->setMetaData2(<[bank]:[mode]:[term]>)
    ->setSecure3d('try3d')
    ->setCountry('PH')
```
**Metadata2 Modes**

“1” - Absolute 0%

“2” – Regular Installment

“3” – Buy Now Pay Later, Absolute 0%

“4” - Buy Now Pay Later, Regular Installment

“5” – Reduce Interest Installment Promo

**For HSBC**, mode is 1. **For BPI**, on test env, available mode is 2
