<?php

namespace Admin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horario
 *
 * @ORM\Table(name="horario", indexes={@ORM\Index(name="fk_horario_unidad_academica1_idx", columns={"unidad_academica_id"}), @ORM\Index(name="fk_horario_anio_academico1_idx", columns={"anio_academico_id"}), @ORM\Index(name="fk_horario_periodo_lectivo1_idx", columns={"periodo_lectivo_id"}), @ORM\Index(name="fk_horario_materia1_idx", columns={"comision_id"}), @ORM\Index(name="fk_horario_dia_semana1_idx", columns={"dia_semana_id"}), @ORM\Index(name="fk_horario_aula1_idx", columns={"aula_id"}), @ORM\Index(name="fk_horario_tipo_clase1_idx", columns={"tipo_clase_id"})})
 * @ORM\Entity
 */
class Horario
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
     * @var \DateTime
     *
     * @ORM\Column(name="hs_comienzo_clase", type="time", nullable=false)
     */
    private $hsComienzoClase;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hs_finaliz_clase", type="time", nullable=false)
     */
    private $hsFinalizClase;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="date", nullable=false)
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="date", nullable=false)
     */
    private $fechaHasta;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=45, nullable=true)
     */
    private $observaciones;

    /**
     * @var \AnioAcademico
     *
     * @ORM\ManyToOne(targetEntity="AnioAcademico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="anio_academico_id", referencedColumnName="id")
     * })
     */
    private $anioAcademico;

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
     * @var \Comision
     *
     * @ORM\ManyToOne(targetEntity="Comision")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comision_id", referencedColumnName="id")
     * })
     */
    private $comision;

    /**
     * @var \DiaSemana
     *
     * @ORM\ManyToOne(targetEntity="DiaSemana")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dia_semana_id", referencedColumnName="id")
     * })
     */
    private $diaSemana;

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
     * @var \TipoClase
     *
     * @ORM\ManyToOne(targetEntity="TipoClase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_clase_id", referencedColumnName="id")
     * })
     */
    private $tipoClase;

    /**
     * @var \UnidadAcademica
     *
     * @ORM\ManyToOne(targetEntity="UnidadAcademica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_academica_id", referencedColumnName="id")
     * })
     */
    private $unidadAcademica;



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
     * Set hsComienzoClase
     *
     * @param \DateTime $hsComienzoClase
     * @return Horario
     */
    public function setHsComienzoClase($hsComienzoClase)
    {
        $this->hsComienzoClase = $hsComienzoClase;

        return $this;
    }

    /**
     * Get hsComienzoClase
     *
     * @return \DateTime 
     */
    public function getHsComienzoClase()
    {
        return $this->hsComienzoClase;
    }

    /**
     * Set hsFinalizClase
     *
     * @param \DateTime $hsFinalizClase
     * @return Horario
     */
    public function setHsFinalizClase($hsFinalizClase)
    {
        $this->hsFinalizClase = $hsFinalizClase;

        return $this;
    }

    /**
     * Get hsFinalizClase
     *
     * @return \DateTime 
     */
    public function getHsFinalizClase()
    {
        return $this->hsFinalizClase;
    }

    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return Horario
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     * @return Horario
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Horario
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
     * Set anioAcademico
     *
     * @param \Admin\AdminBundle\Entity\AnioAcademico $anioAcademico
     * @return Horario
     */
    public function setAnioAcademico(\Admin\AdminBundle\Entity\AnioAcademico $anioAcademico = null)
    {
        $this->anioAcademico = $anioAcademico;

        return $this;
    }

    /**
     * Get anioAcademico
     *
     * @return \Admin\AdminBundle\Entity\AnioAcademico 
     */
    public function getAnioAcademico()
    {
        return $this->anioAcademico;
    }

    /**
     * Set aula
     *
     * @param \Admin\AdminBundle\Entity\Aula $aula
     * @return Horario
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
     * Set comision
     *
     * @param \Admin\AdminBundle\Entity\Comision $comision
     * @return Horario
     */
    public function setComision(\Admin\AdminBundle\Entity\Comision $comision = null)
    {
        $this->comision = $comision;

        return $this;
    }

    /**
     * Get comision
     *
     * @return \Admin\AdminBundle\Entity\Comision 
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * Set diaSemana
     *
     * @param \Admin\AdminBundle\Entity\DiaSemana $diaSemana
     * @return Horario
     */
    public function setDiaSemana(\Admin\AdminBundle\Entity\DiaSemana $diaSemana = null)
    {
        $this->diaSemana = $diaSemana;

        return $this;
    }

    /**
     * Get diaSemana
     *
     * @return \Admin\AdminBundle\Entity\DiaSemana 
     */
    public function getDiaSemana()
    {
        return $this->diaSemana;
    }

    /**
     * Set periodoLectivo
     *
     * @param \Admin\AdminBundle\Entity\PeriodoLectivo $periodoLectivo
     * @return Horario
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

    /**
     * Set tipoClase
     *
     * @param \Admin\AdminBundle\Entity\TipoClase $tipoClase
     * @return Horario
     */
    public function setTipoClase(\Admin\AdminBundle\Entity\TipoClase $tipoClase = null)
    {
        $this->tipoClase = $tipoClase;

        return $this;
    }

    /**
     * Get tipoClase
     *
     * @return \Admin\AdminBundle\Entity\TipoClase 
     */
    public function getTipoClase()
    {
        return $this->tipoClase;
    }

    /**
     * Set unidadAcademica
     *
     * @param \Admin\AdminBundle\Entity\UnidadAcademica $unidadAcademica
     * @return Horario
     */
    public function setUnidadAcademica(\Admin\AdminBundle\Entity\UnidadAcademica $unidadAcademica = null)
    {
        $this->unidadAcademica = $unidadAcademica;

        return $this;
    }

    /**
     * Get unidadAcademica
     *
     * @return \Admin\AdminBundle\Entity\UnidadAcademica 
     */
    public function getUnidadAcademica()
    {
        return $this->unidadAcademica;
    }
}
