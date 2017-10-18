<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * empleados
 *
 * @ORM\Table(name="empleados")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\empleadosRepository")
 */
class empleados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre_Completo", type="string", length=255)
     */
    private $nombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", length=10)
     */
    private $sexo;

    /**
     * @var int
     *
     * @ORM\Column(name="Cedula", type="integer", unique=true)
     */
    private $cedula;

    /**
     * @var int
     *
     * @ORM\Column(name="Telefono", type="integer")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="TipoDeComtrato", type="string", length=255)
     */
    private $tipoDeComtrato;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     *
     * @return empleados
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return empleados
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set cedula
     *
     * @param integer $cedula
     *
     * @return empleados
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return int
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return empleados
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set tipoDeComtrato
     *
     * @param string $tipoDeComtrato
     *
     * @return empleados
     */
    public function setTipoDeComtrato($tipoDeComtrato)
    {
        $this->tipoDeComtrato = $tipoDeComtrato;

        return $this;
    }

    /**
     * Get tipoDeComtrato
     *
     * @return string
     */
    public function getTipoDeComtrato()
    {
        return $this->tipoDeComtrato;
    }
}

