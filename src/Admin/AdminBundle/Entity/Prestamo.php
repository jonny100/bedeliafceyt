<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestamo
 *
 * @ORM\Table(name="prestamo", indexes={@ORM\Index(name="fk_prestamo_motivo_prestamo1_idx", columns={"motivo_prestamo_id"}), @ORM\Index(name="fk_prestamo_aula1_idx", columns={"aula_id"})})
 * @ORM\Entity
 */
class Prestamo
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
     * @ORM\Column(name="quien_retira", type="string", length=45, nullable=true)
     */
    private $quienRetira;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_retirada", type="time", nullable=true)
     */
    private $horaRetirada;

    /**
     * @var string
     *
     * @ORM\Column(name="quien_devuelve", type="string", length=45, nullable=true)
     */
    private $quienDevuelve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_devuelve", type="time", nullable=true)
     */
    private $horaDevuelve;

    /**
     * @var string
     *
     * @ORM\Column(name="Observaciones", type="string", length=45, nullable=true)
     */
    private $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \Aula
     *
     * @ORM\ManyToOne(targetEntity="Aula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aula_id", referencedColumnName="id")
     * })
     */
    private $aula;

    /**
     * @var \MotivoPrestamo
     *
     * @ORM\ManyToOne(targetEntity="MotivoPrestamo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motivo_prestamo_id", referencedColumnName="id")
     * })
     */
    private $motivoPrestamo;

    
    public function __construct() {
        $this->fecha = new \DateTime("now");
        $this->horaRetirada = new \DateTime("now");
    }
    

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
     * Set quienRetira
     *
     * @param string $quienRetira
     * @return Prestamo
     */
    public function setQuienRetira($quienRetira)
    {
        $this->quienRetira = $quienRetira;

        return $this;
    }

    /**
     * Get quienRetira
     *
     * @return string 
     */
    public function getQuienRetira()
    {
        return $this->quienRetira;
    }

    /**
     * Set horaRetirada
     *
     * @param \DateTime $horaRetirada
     * @return Prestamo
     */
    public function setHoraRetirada($horaRetirada)
    {
        $this->horaRetirada = $horaRetirada;

        return $this;
    }

    /**
     * Get horaRetirada
     *
     * @return \DateTime 
     */
    public function getHoraRetirada()
    {
        return $this->horaRetirada;
    }

    /**
     * Set quienDevuelve
     *
     * @param string $quienDevuelve
     * @return Prestamo
     */
    public function setQuienDevuelve($quienDevuelve)
    {
        $this->quienDevuelve = $quienDevuelve;

        return $this;
    }

    /**
     * Get quienDevuelve
     *
     * @return string 
     */
    public function getQuienDevuelve()
    {
        return $this->quienDevuelve;
    }

    /**
     * Set horaDevuelve
     *
     * @param \DateTime $horaDevuelve
     * @return Prestamo
     */
    public function setHoraDevuelve($horaDevuelve)
    {
        $this->horaDevuelve = $horaDevuelve;

        return $this;
    }

    /**
     * Get horaDevuelve
     *
     * @return \DateTime 
     */
    public function getHoraDevuelve()
    {
        return $this->horaDevuelve;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Prestamo
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Prestamo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set aula
     *
     * @param \Admin\AdminBundle\Entity\Aula $aula
     * @return Prestamo
     */
    public function setAula(\Admin\AdminBundle\Entity\Aula $aula = null)
    {
        $this->aula = $aula;

        return $this;
    }

    /**
     * Get aula
     *
     * @return \Admin\AdminBundle\Entity\Aula 
     */
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * Set motivoPrestamo
     *
     * @param \Admin\AdminBundle\Entity\MotivoPrestamo $motivoPrestamo
     * @return Prestamo
     */
    public function setMotivoPrestamo(\Admin\AdminBundle\Entity\MotivoPrestamo $motivoPrestamo = null)
    {
        $this->motivoPrestamo = $motivoPrestamo;

        return $this;
    }

    /**
     * Get motivoPrestamo
     *
     * @return \Admin\AdminBundle\Entity\MotivoPrestamo 
     */
    public function getMotivoPrestamo()
    {
        return $this->motivoPrestamo;
    }
}
