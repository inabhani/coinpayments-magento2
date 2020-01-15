<?php

namespace Coinpayments\CoinPayments\Model;

use Coinpayments\CoinPayments\Api\InvoiceInterface;
use Magento\Sales\Model\Order;
use Coinpayments\CoinPayments\Helper\Data;

class Invoice extends AbstractApi implements InvoiceInterface
{

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $currencyId
     * @param $invoiceId
     * @param $amount
     * @param $dispayValue
     * @return mixed
     * @throws \Exception
     */
    public function createMerchant($clientId, $clientSecret, $currencyId, $invoiceId, $amount, $dispayValue)
    {
        $requestData = [
            "invoiceId" => $invoiceId,
            "amount" => [
                "currencyId" => $currencyId,
                "displayValue" => $dispayValue,
                "value" => $amount
            ],
        ];

        $action = Data::API_MERCHANT_INVOICE_ACTION;

        $requestParams = [
            'method' => 'POST',
            'action' => $action,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ];

        $headers = $this->getRequestHeaders($requestParams, $requestData);

        return $this->sendPostRequest($action, $headers, $requestData);
    }

    /**
     * @param $clientId
     * @param int $currencyId
     * @param string $invoiceId
     * @param int $amount
     * @param string $displayValue
     * @return mixed
     */
    public function createSimple($clientId, $currencyId = 5057, $invoiceId = 'Validate invoice', $amount = 1, $displayValue = '0.01')
    {

        $action = Data::API_SIMPLE_INVOICE_ACTION;

        $requestParams = [
            'clientId' => $clientId,
            'invoiceId' => $invoiceId,
            'amount' => [
                'currencyId' => $currencyId,
                "displayValue" => $displayValue,
                'value' => $amount
            ]
        ];

        return $this->sendPostRequest($action, [], $requestParams);
    }


}