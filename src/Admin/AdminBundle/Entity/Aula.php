<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aula
 *
 * @ORM\Table(name="aula", indexes={@ORM\Index(name="fk_aula_sector_idx", columns={"sector_id"})})
 * @ORM\Entity
 */
class Aula
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
     * @var \Sector
     *
     * @ORM\ManyToOne(targetEntity="Sector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sector_id", referencedColumnName="id")
     * })
     */
    private $sector;



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
     * @return Aula
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
     * Set sector
     *
     * @param \Admin\AdminBundle\Entity\Sector $sector
     * @return Aula
     */
    public function setSector(\Admin\AdminBundle\Entity\Sector $sector = null)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return \Admin\AdminBundle\Entity\Sector 
     */
    public function getSector()
    {
        return $this->sector;
    }
    
    public function __toString() {
        return $this->nombre;
    }
    
}
