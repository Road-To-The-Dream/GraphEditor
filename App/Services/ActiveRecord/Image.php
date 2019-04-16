<?php

namespace App\Services\ActiveRecord;

use App\Core\ConnectionManager;

/**
 * Class Image
 * @package App\Services\ActiveRecord\
 */
class Image extends AbstractModel
{
    private $imageName;
    private $path;
    private $clientId;

    /**
     * @return mixed
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param $imageName
     * @return $this
     */
    public function setImageName($imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $path
     * @return Image
     */
    public function setPath($path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param $clientId
     * @return Image
     */
    public function setClientId($clientId): self
    {
        $this->clientId = $clientId;

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

    public function getAll()
    {
        $query = "SELECT im.id, im.image_name, im.path, im.create_at FROM images im
                    JOIN clients cl on cl.id = im.client_id 
                  WHERE cl.id = {$this->getClientId()}";

        $imageInfo = ConnectionManager::executionQuery($query);

        $dataCount = count($imageInfo);

        $imageList = [];
        for ($i = 0; $i < $dataCount; $i++) {
            $objImage = new self();
            $objImage->setImageName($imageInfo[$i]['image_name'])
                     ->setPath($imageInfo[$i]['path'])
                     ->setCreateAt($imageInfo[$i]['create_at']);

            $imageList[] = $objImage;
        }

        return $imageList;
    }

    public function insert()
    {
        $query = "INSERT INTO images (image_name, path, client_id, create_at) VALUES (:imageName, :path, {$this->getClientId()}, {$this->getCreateAt()})";
        $parameters = [
            ':imageName' => $this->getImageName(),
            ':path' => $this->getPath()
        ];

        return ConnectionManager::executionQuery($query, $parameters);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
