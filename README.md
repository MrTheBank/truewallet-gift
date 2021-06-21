# Installation

```
composer require mrthebank/truewallet
```

# Usage
```php
use MrTheBank\TrueWallet\TrueWallet;

$tw = new TrueWallet('YOUR PHONE NUMBER');
$ret = $tw->Redeem('https://gift.truemoney.com/campaign/?v=XXXXXXXXXXXXXXXXXX');

if ($ret['status']['code'] != 'SUCCESS' && $ret['data']['voucher']['member'] == '1') {
    echo $ret['data']['voucher']['amount_baht']; // X.XX
} else {
    echo $ret['status']['message'];
    echo $ret['status']['code'];
}
```

If you want to see full response then do

```php
use MrTheBank\TrueWallet\TrueWallet;

$tw = new TrueWallet('YOUR PHONE NUMBER');
$ret = $tw->Redeem('https://gift.truemoney.com/campaign/?v=XXXXXXXXXXXXXXXXXX');

echo '<pre>';
print_r($ret);
echo '</pre>'
```

# Reference
https://github.com/Mixzis/truewalletgift-php/blob/main/rb_tw.class.php

# License
The MIT License (MIT)
