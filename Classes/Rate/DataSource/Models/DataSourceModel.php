<?php
namespace Classes\Rate\DataSource\Models;

class DataSourceModel
{

    public $pair;

    public $expiringTime;

    public $value;

    /*
     * заглушка для тестовых данных
     */
    public function __construct($pair)
    {
        $this->pair = $pair;

        $this->value = floatval(rand(1100, 8000)/100);

        $mult = (rand(1, 10) > 5) ? - 1 : 1;

        $this->expiringTime = time() + ($mult * rand(1, 100));
    }
}

