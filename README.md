sas-api-client
==================

A PHP wrapper around the Share-A-Sale API.

This code is Publisher (Affiliate) specific.

If you are looking for Merchant specific code, check out https://github.com/ooglek/shareasale-merchant-api-sdk

Install
-------

Install http://getcomposer.org/ and run the following command:

```
php composer.phar require clsystems/sas-api-client dev-master
```

Example
-------

Calling from your code:

```php
        use CLSystems\ShareASale\Client;
        
        $service = new Client();
        // See https://account.shareasale.com/a-apiManager.cfm for info
        // Remember to whitelist your calling IP
        $service->setServiceUrl('https://api.shareasale.com');
        $service->setVersion('2.3');
        $service->setAffiliateId([your affiliate id]);
        $service->setToken('[your token]');
        $service->setSecretKey('[your secret key]');
        
        $options = [
            'dateStart' => '6/22/2016',
        ];
        
        $records = $service->activity($options);
        
        var_dump($records);
        
```

## Implemented Service Methods:

* **activity**
* **activitySummary**
* **apitokencount**
* **balance**
* **dailyActivity**
* **couponDeals**
* **edittrail**
* **getMerchantDescription**
* **getProducts**
* **invalidLinks**
* **ledger**
* **merchantCreative**
* **merchantDataFeeds**
* **merchantGiftCard**
* **merchantSearch**
* **merchantSearchProduct**
* **merchantStatus**
* **merchantTimespan**
* **monthlySummary**
* **orderInquiry**
* **paymentSummary**
* **traffic**
* **voidtrail**
