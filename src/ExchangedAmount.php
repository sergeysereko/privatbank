<?php
namespace PrivatBankLib;

class ExchangedAmount
{
    private $from;
    private $to;
    private $amount;
    private $exchangeRates;

    public function __construct($from, $to, $amount){
        $this->from = strtoupper($from);
        $this->to = strtoupper($to);
        $this->amount = $amount;
        $this->exchangeRates = $this->getExchangeRates();
    }

    private function getExchangeRates(){
        $url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
        $data = file_get_contents($url);
        return json_decode($data, true);
    }

    private function getRate($currency, $type = 'buy'){
        foreach ($this->exchangeRates as $rate){
            if($rate['ccy'] == $currency && $rate['base_ccy'] == 'UAH'){
                return $rate[$type];
            }
        }
        return null;
    }

    public function toDecimal()
    {
        if ($this->from == 'UAH'){
            //Если конвертируем гривну в другую валюту
            $rate = $this->getRate($this->to, 'sale');
             if($rate){
                return round($this->amount/$rate,2);
             } else{
                 return null;
             }
        }else if($this->to == 'UAH'){
            //Если конвертации гривны из другой валюты
            $rate = $this->getRate($this->from, 'buy');
            if($rate ){
                return round($this->amount * $rate, 2);
                }else
            {
                return null;
            }
       }

    }

}