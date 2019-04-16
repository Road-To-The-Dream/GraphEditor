<?php

namespace App\Services\ActiveRecord;

use App\Core\ConnectionManager;

/**
 * Class Client
 * @package App\Services\ActiveRecord
 */
class Client extends AbstractModel
{
    private $id;
    private $login;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param $login
     * @return $this
     */
    public function setLogin($login): self
    {
        $this->login = $login;

        return $this;
    }

    public function __construct()
    {
        $this->initConnection();
    }

    public function update()
    {
        // TODO: Implement save() method.
    }

    public function insert()
    {
        $query = "INSERT INTO clients (login, create_at) VALUES (:login, {$this->getCreateAt()})";
        $parameters = [
            ':login' => $this->getLogin()
        ];

        return ConnectionManager::executionQuery($query, $parameters);
    }

    public function getClientId()
    {
        $query = 'SELECT id FROM clients WHERE login = ' . "'{$this->getLogin()}'";

        return ConnectionManager::executionQuery($query);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
