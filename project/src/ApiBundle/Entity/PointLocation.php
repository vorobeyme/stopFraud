<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointLocation
 *
 * @ORM\Table("point_location")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\PointLocationRepository")
 */
class PointLocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="point_id", type="integer")
     */
    private $pointId;

    /**
     * @var integer
     *
     * @ORM\Column(name="latitude", type="integer")
     */
    private $latitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="longitude", type="integer")
     */
    private $longitude;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pointId
     *
     * @param integer $pointId
     * @return PointLocation
     */
    public function setPointId($pointId)
    {
        $this->pointId = $pointId;

        return $this;
    }

    /**
     * Get pointId
     *
     * @return integer 
     */
    public function getPointId()
    {
        return $this->pointId;
    }

    /**
     * Set latitude
     *
     * @param integer $latitude
     * @return PointLocation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return integer 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param integer $longitude
     * @return PointLocation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return integer 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
