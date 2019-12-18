<?php
namespace Classes\Rate;

use Classes\Rate\DataProviders\DataProvider;

class Rate
{

    private $dataProvider;

    private $error;

    public function __construct($pair)
    {
        $this->dataProvider = new DataProvider($pair);
    }

    public function get()
    {
        if ($this->dataProvider->isErrorState()) {

            $this->error = "Error occured!";
            // логика для ошибки, например, удаленный сервис не вернул нам данные
        }

        return $this->dataProvider->get();
    }
}

