<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comision
 *
 * @ORM\Table(name="comision", indexes={@ORM\Index(name="fk_comision_materia_idx", columns={"materia_id"})})
 * @ORM\Entity
 */
class Comision
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
     * @var \Materia
     *
     * @ORM\ManyToOne(targetEntity="Materia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="materia_id", referencedColumnName="id")
     * })
     */
    private $materia;



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
     * @return Comision
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
     * Set materia
     *
     * @param \Admin\AdminBundle\Entity\Materia $materia
     * @return Comision
     */
    public function setMateria(\Admin\AdminBundle\Entity\Materia $materia = null)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * Get materia
     *
     * @return \Admin\AdminBundle\Entity\Materia 
     */
    public function getMateria()
    {
        return $this->materia;
    }
    
    public function __toString() {
        return $this->nombre.' - '.$this->materia;
    }
    
}
