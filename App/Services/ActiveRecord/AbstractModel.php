<?php

namespace App\Services\ActiveRecord;

use App\Core\ConnectionManager;

/**
 * Class AbstractModel
 * @package App\Services\ActiveRecord
 */
abstract class AbstractModel
{
    protected $createAt;
    protected $updateAt;

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt($createAt): void
    {
        $this->createAt = $createAt;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param mixed $updateAt
     */
    public function setUpdateAt($updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    protected function initConnection(): void
    {
        ConnectionManager::getInstance();
    }

    abstract protected function update();
    abstract protected function insert();
    abstract protected function delete();
}
