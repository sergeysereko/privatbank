<?php
require 'vendor/autoload.php';

use PrivatBankLib\ExchangedAmount;

?>
<form method="POST" action="index.php">
    <label for="currency">Выберите валюту:</label>
    <select id="currency" name="currency">
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
    </select>
    <br><br>
    <label for="operation">Тип операции:</label>
    <select id="operation" name="operation">
        <option value="buy">Продать</option>
        <option value="sell">Купить</option>
    </select>
    <br><br>
    <label for="amount">Сумма:</label>
    <input type="number" id="amount" name="amount" step="0.01" required>

    <button type="submit">Обменять</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currency = $_POST['currency'];
    $operation = $_POST['operation'];
    $amount = (float)$_POST['amount'];

    if ($operation === 'buy') {
        $exchangedAmount = new ExchangedAmount($currency, "UAH", $amount);
        $result = $exchangedAmount->toDecimal();
        echo "Результат продажи $currency на сумму $amount: $result UAH";
    } elseif ($operation === 'sell') {
        $exchangedAmount = new ExchangedAmount("UAH", $currency , $amount);
        $result = $exchangedAmount->toDecimal();
        echo "Результат покупки $amount UAH: $result $currency";
    }
}
