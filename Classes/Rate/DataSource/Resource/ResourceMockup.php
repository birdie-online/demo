<?php
namespace Classes\Rate\DataSource\Resource;

use Classes\Rate\DataSource\Models\DataSourceModel;

class ResourceMockup
{

    private $pair;

    public function __construct(string $pair)
    {
        $this->pair = $pair;
    }

    public function get(): DataSourceModel
    {
        return new DataSourceModel($this->pair);
    }

    public function save(DataSourceModel $data)
    {

        // $this->save($data)
    }
}

