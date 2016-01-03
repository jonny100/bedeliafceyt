<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sector
 *
 * @ORM\Table(name="sector", indexes={@ORM\Index(name="fk_sector_edificio1_idx", columns={"edificio_id"})})
 * @ORM\Entity
 */
class Sector
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var \Edificio
     *
     * @ORM\ManyToOne(targetEntity="Edificio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="edificio_id", referencedColumnName="id")
     * })
     */
    private $edificio;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Sector
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set edificio
     *
     * @param \Admin\AdminBundle\Entity\Edificio $edificio
     * @return Sector
     */
    public function setEdificio(\Admin\AdminBundle\Entity\Edificio $edificio = null)
    {
        $this->edificio = $edificio;

        return $this;
    }

    /**
     * Get edificio
     *
     * @return \Admin\AdminBundle\Entity\Edificio 
     */
    public function getEdificio()
    {
        return $this->edificio;
    }
    
    public function __toString() {
        return $this->nombre.' - '.$this->edificio;
    }
    
}
