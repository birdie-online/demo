<?php
namespace Classes\Rate\DataProviders;

use Classes\Rate\DataSource\CacheDataSource;
use Classes\Rate\DataSource\DBDataSource;
use Classes\Rate\DataSource\HttpDataSource;
use Classes\Rate\RateProps;

class DataProvider
{

    private $data;

    private $error;

    public function __construct(string $pair)
    {
        $cacheDataSource = new CacheDataSource($pair);

        $this->data = $cacheDataSource->get();

        if (! $this->isValid()) {

            $dBDataSource = new DBDataSource($pair);

            $this->data = $dBDataSource->get();

            if (! $this->isValid()) {

                $httpDataSource = new HttpDataSource($pair);

                $this->data = $httpDataSource->get();

                if (! $this->data->value) {

                    $this->error = true;
                }

                $dBDataSource->revalidate($this->data, time() + (RateProps::ValidDbMinutesInterval * 60));
            }

            $dBDataSource->revalidate($this->data, time() + (RateProps::ValidCacheMinutesInterval * 60));
        }
    }

    public function get()
    {
        return $this->data->value;
    }

    public function isErrorState()
    {
        return $this->error;
    }

    private function isValid()
    {
        return ($this->data->value && $this->data->expiringTime < time());
    }
}

