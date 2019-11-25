<?php
namespace entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="agency")
 */
class Agency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="Sale", mappedBy="agency", cascade={"all"})
     * @var ArrayCollection
     */
    private $sale;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sale = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set location.
     *
     * @param string $location
     *
     * @return Agency
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add sale.
     *
     * @param \entities\Sale $sale
     *
     * @return Agency
     */
    public function addSale(\entities\Sale $sale)
    {
        $this->sale[] = $sale;

        return $this;
    }

    /**
     * Remove sale.
     *
     * @param \entities\Sale $sale
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSale(\entities\Sale $sale)
    {
        return $this->sale->removeElement($sale);
    }

    /**
     * Get sale.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSale()
    {
        return $this->sale;
    }
}
