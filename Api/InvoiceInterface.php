<?php

namespace Coinpayments\CoinPayments\Api;

interface InvoiceInterface
{

    /**
     * @param $clientId
     * @param $currencyId
     * @param $invoiceId
     * @param $amount
     * @return mixed
     */
    public function createSimple($clientId, $currencyId, $invoiceId, $amount);

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $currencyId
     * @param $invoiceId
     * @param $amount
     * @return mixed
     */
    public function createMerchant($clientId, $clientSecret, $currencyId, $invoiceId, $amount);

    /**
     * @return mixed
     */
    public function createInvoice();

    /**
     * @return mixed
     */
    public function updateInvoice();
}