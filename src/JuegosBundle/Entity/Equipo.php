<?php

namespace JuegosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="JuegosBundle\Repository\EquipoRepository")
 */
class Equipo
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Juego", type="string", length=255)
     */
    private $juego;

    /**
     * @var string
     *
     * @ORM\Column(name="ranking", type="string", length=255)
     */
    private $ranking;

    /**
     * @var string
     *
     * @ORM\Column(name="integrantes", type="string", length=255)
     */
    private $integrantes;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255)
     */
    private $foto;

    /**
     * Many Equipo have Many Jugador.
     * @ORM\ManyToMany(targetEntity="Jugador", inversedBy="equipo")
     * @ORM\JoinTable(name="jugador_equipo")
     */
    private $jugador;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Equipo
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
     * Set juego
     *
     * @param string $juego
     *
     * @return Equipo
     */
    public function setJuego($juego)
    {
        $this->juego = $juego;

        return $this;
    }

    /**
     * Get juego
     *
     * @return string
     */
    public function getJuego()
    {
        return $this->juego;
    }

    /**
     * Set ranking
     *
     * @param string $ranking
     *
     * @return Equipo
     */
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * Get ranking
     *
     * @return string
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Set integrantes
     *
     * @param string $integrantes
     *
     * @return Equipo
     */
    public function setIntegrantes($integrantes)
    {
        $this->integrantes = $integrantes;

        return $this;
    }

    /**
     * Get integrantes
     *
     * @return string
     */
    public function getIntegrantes()
    {
        return $this->integrantes;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Equipo
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugador = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add jugador
     *
     * @param \JuegosBundle\Entity\Jugador $jugador
     *
     * @return Equipo
     */
    public function addJugador(\JuegosBundle\Entity\Jugador $jugador)
    {
        $this->jugador[] = $jugador;

        return $this;
    }

    /**
     * Remove jugador
     *
     * @param \JuegosBundle\Entity\Jugador $jugador
     */
    public function removeJugador(\JuegosBundle\Entity\Jugador $jugador)
    {
        $this->jugador->removeElement($jugador);
    }

    /**
     * Get jugador
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJugador()
    {
        return $this->jugador;
    }
    public function __toString()
    {
        return $this->nombre;
    }
}
