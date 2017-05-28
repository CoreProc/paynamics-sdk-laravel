# Paynamics PayGate SDK PHP
A PHP library for Paynamics PayGate API

## Usage

##### Initialize Client
Vanilla PHP:
```
$client = new \CoreProc\Paynamics\Paygate\Client([
    'merchant_id'     => 'YOUR MERCHANT ID,
    'merchant_key'    => 'YOUR MERCHANT KEY',
    'sandbox'         => (true|false),
    'sandbox_url'     => 'TESTING URL',
    'production_url'  => 'PRODUCTION URL',
]);
```

##### Create Request Body 
Please refer to the API Documentation for the request body parameters.
```
$requestBody = new \CoreProc\Paynamics\Paygate\RequestBody([
    'request_id' => substr(uniqid(), 1, 13),
    'fname' => 'Paynamics',
    'lname' => 'Buyer',
    'address1' => '101 Oval St.',
    'city' => 'Pasig City',
    'state' => 'Metro Manila',
    'country' => 'PH',
    'zip' => '1600',
    'email' => 'buyer@example.com',
    'phone' => '+63 123 4567',
    'mobile' => '+63 999 123 4567',
    'currency' => 'PHP',
    'descriptor_note' => 'PayGate Sample Merchant',

    'notification_url' => 'http://example.com/notify',
    'response_url' => 'http://example.com/success',
    'cancel_url' => 'http://example.com/cancel',
    'mtac_url' => 'http://example.com/tnc',
    'mlogo_url' => 'http://example.com/assets/logo.png',
]);
```

##### Create Item Group and add Item
Add item details (name,quantity,amount) one by one using the `addItem` method.
```
$items = new \CoreProc\Paynamics\Paygate\ItemGroup;

$items->addItem([
    'name' => 'Sample Item',
    'quantity' => 1,
    'amount' => 100,
]);
```
##### Set Item Group to the request body
This will bind the items accordingly to the request body and computes its total amount.
```
$requestBody->setItemGroup($items);
```

##### Execute
All request by the `Client` will return an auto-submit form in string.
```
$client->responsivePayment($requestBody);
```

#### Laravel Support
1. Add Provider to `config/app.php`.
```
CoreProc\Paynamics\Paygate\Laravel\ServiceProvider::class
```

2. Add Facade to `config/app.php`.
```
'Paygate' => CoreProc\Paynamics\Paygate\Laravel\Facades\Paygate::class
```

3. Execute `php artisan vendor:publish --provider="\CoreProc\Paynamics\Paygate\Laravel\ServiceProvider"`.

4. Add the following to your `.env` file
```
PAYGATE_MERCHANT_ID=<YOUR MERCHANT ID>
PAYGATE_MERCHANT_KEY=<YOUR MERCHANT KEY>
PAYGATE_SANDBOX=<TRUE|FALSE>
PAYGATE_SANDBOX_URL=<PAYNAMICS_TESTING_URL>
PAYGATE_PRODUCTION_URL=<PAYNAMICS_PRODUCTION_URL>
```
