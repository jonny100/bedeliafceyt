<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrera
 *
 * @ORM\Table(name="carrera")
 * @ORM\Entity
 */
class Carrera
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_abreviado", type="string", length=45, nullable=false)
     */
    private $nombreAbreviado;



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
     * @return Carrera
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
     * Set nombreAbreviado
     *
     * @param string $nombreAbreviado
     * @return Carrera
     */
    public function setNombreAbreviado($nombreAbreviado)
    {
        $this->nombreAbreviado = $nombreAbreviado;

        return $this;
    }

    /**
     * Get nombreAbreviado
     *
     * @return string 
     */
    public function getNombreAbreviado()
    {
        return $this->nombreAbreviado;
    }
    
    public function __toString() {
        return $this->nombre;
    }
    
}
