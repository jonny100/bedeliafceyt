<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 *
 * @ORM\Table(name="materia", indexes={@ORM\Index(name="fk_materia_periodo_lectivo1_idx", columns={"periodo_lectivo_id"}), @ORM\Index(name="fk_materia_carrera1_idx", columns={"carrera_id"})})
 * @ORM\Entity
 */
class Materia
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
     * @ORM\Column(name="codigo", type="string", length=45, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carrera_id", referencedColumnName="id")
     * })
     */
    private $carrera;

    /**
     * @var \PeriodoLectivo
     *
     * @ORM\ManyToOne(targetEntity="PeriodoLectivo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="periodo_lectivo_id", referencedColumnName="id")
     * })
     */
    private $periodoLectivo;



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
     * Set codigo
     *
     * @param string $codigo
     * @return Materia
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Materia
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
     * Set carrera
     *
     * @param \Admin\AdminBundle\Entity\Carrera $carrera
     * @return Materia
     */
    public function setCarrera(\Admin\AdminBundle\Entity\Carrera $carrera = null)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get carrera
     *
     * @return \Admin\AdminBundle\Entity\Carrera 
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * Set periodoLectivo
     *
     * @param \Admin\AdminBundle\Entity\PeriodoLectivo $periodoLectivo
     * @return Materia
     */
    public function setPeriodoLectivo(\Admin\AdminBundle\Entity\PeriodoLectivo $periodoLectivo = null)
    {
        $this->periodoLectivo = $periodoLectivo;

        return $this;
    }

    /**
     * Get periodoLectivo
     *
     * @return \Admin\AdminBundle\Entity\PeriodoLectivo 
     */
    public function getPeriodoLectivo()
    {
        return $this->periodoLectivo;
    }
    
    public function __toString() {
        return $this->codigo.' - '.$this->nombre;
    }
    
}
