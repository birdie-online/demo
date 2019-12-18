<?php
namespace Classes\Rate\DataSource;

use Classes\Rate\DataSource\Models\DataSourceModel;

interface DataSourceInterface
{

    public function get(): DataSourceModel;

    public function revalidate(DataSourceModel $data, int $expiringTime);
}

