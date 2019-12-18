<?php
namespace Classes\Rate\DataSource;

use Classes\Rate\DataSource\Resource\ResourceMockup;
use Classes\Rate\DataSource\Models\DataSourceModel;

class CacheDataSource implements DataSourceInterface
{

    private $resource;

    public function __construct(string $pair)
    {
        $this->resource = new ResourceMockup($pair);
    }

    public function get(): DataSourceModel
    {
        return $this->resource->get();
    }

    public function revalidate(DataSourceModel $data, int $expiringTime)
    {
        $data->expiringTime = $expiringTime;

        $this->resource->save($data);
    }
}