<?php
namespace entities;

require_once 'Sale.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bill")
 */
class Bill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_time;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="bill")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=false)
     * @var Client
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="Sale", mappedBy="bill", cascade={"all"})
     * @var ArrayCollection
     */
    private $sales;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sales = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set totalPrice.
     *
     * @param float $totalPrice
     *
     * @return Bill
     */
    public function setTotalPrice($totalPrice)
    {
        $this->total_price = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice.
     *
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * Set dateTime.
     *
     * @param \DateTime $dateTime
     *
     * @return Bill
     */
    public function setDateTime($dateTime)
    {
        $this->date_time = $dateTime;

        return $this;
    }

    /**
     * Get dateTime.
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * Set client.
     *
     * @param \entities\Client $client
     *
     * @return Bill
     */
    public function setClient(\entities\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return \entities\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add sale.
     *
     * @param \entities\Sale $sale
     *
     * @return Bill
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
        $text = "Bill[\n".
            "\t Name: ".$this->client->getName()."\n".
            "\t Nit/Ci: ".$this->client->getNit()."\n".
            "\t Time: ".$this->date_time->format('Y-m-d H:i:s')."\n";
        if (sizeof($this->sales) > 0){
            $text = $text.
                "\t Cashier: ".$this->sales[0]->getUser()->getUsername()."\n".
                "\t Agency: ".$this->sales[0]->getAgency()->getLocation()."\n";
        }
        $text = $text."\t Sales: [\n";
        foreach ($this->sales as $sale){
            $text = $text.
                "\t\t Medicine name: ".$sale->getMedicine()->getName()."\n".
                "\t\t Units: ".$sale->getUnits()."\n".
                "\t\t Price: ".$sale->getSalePrice()."\n";
        }
        $text = $text."\t ]\n";

        $text = $text."\t Total price: ".$this->total_price."\n".
            "]\n";

        return $text;
    }
}
