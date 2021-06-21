<?php
namespace MrTheBank\TrueWallet;

class TrueWallet
{
    private $phone;

    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    public function Redeem($url)
    {
        if (is_null($url)) return false;
        $ch = curl_init();
        $hash = explode('?v=',$url)[1];
        $headers  = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        $postData = [
            'mobile' => $this->phone,
            'voucher_hash' => $url
        ];
        curl_setopt($ch, CURLOPT_URL,"https://gift.truemoney.com/campaign/vouchers/$hash/redeem");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result     = curl_exec($ch);
        //$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return json_decode($result,true);
    }
}