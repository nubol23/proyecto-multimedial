<?php

namespace entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="medicine")
 */
class Medicine
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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity_in_box;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="medicine")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id", nullable=false)
     * @var Manufacturer
     */
    private $manufacturer;

    /**
     * @ORM\OneToMany(targetEntity="Sale", mappedBy="medicine", cascade={"all"})
     * @var ArrayCollection
     */
    private $sales;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Medicine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price.
     *
     * @param float $price
     *
     * @return Medicine
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantityInBox.
     *
     * @param int $quantityInBox
     *
     * @return Medicine
     */
    public function setQuantityInBox($quantityInBox)
    {
        $this->quantity_in_box = $quantityInBox;

        return $this;
    }

    /**
     * Get quantityInBox.
     *
     * @return int
     */
    public function getQuantityInBox()
    {
        return $this->quantity_in_box;
    }

    /**
     * Set stock.
     *
     * @param int $stock
     *
     * @return Medicine
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock.
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set manufacturer.
     *
     * @param Manufacturer $manufacturer
     *
     * @return Medicine
     */
    public function setManufacturer(Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer.
     *
     * @return Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sales = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sale.
     *
     * @param \entities\Sale $sale
     *
     * @return Medicine
     */
    public function addSale(\entities\Sale $sale)
    {
        $this->sales[] = $sale;

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
        return $this->sales->removeElement($sale);
    }

    /**
     * Get sales.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSales()
    {
        return $this->sales;
    }

    public function __toString()
    {
        return "Medicine[name: ".$this->name.
            " price: ".$this->price.
            " manufacturer: ".
            $this->manufacturer->getName().
            "]\n";
    }
}
