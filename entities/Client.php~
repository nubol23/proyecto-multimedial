<?php
namespace entities;

require_once 'Origin.php';
require_once 'Bill.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client
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
     * @ORM\Column(type="string")
     */
    private $nit;

    /**
     * @ORM\ManyToOne(targetEntity="Origin", inversedBy="client")
     * @ORM\JoinColumn(name="origin_id", referencedColumnName="id", nullable=true)
     * @var Origin
     */
    private $origin;

    /**
     * @ORM\OneToMany(targetEntity="Bill", mappedBy="client", cascade={"all"})
     * @var ArrayCollection
     */
    private $bills;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bills = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name.
     *
     * @param string $name
     *
     * @return Client
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
     * Set nit.
     *
     * @param string $nit
     *
     * @return Client
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit.
     *
     * @return string
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set origin.
     *
     * @param \entities\Origin $origin
     *
     * @return Client
     */
    public function setOrigin(\entities\Origin $origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin.
     *
     * @return \entities\Origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Add bill.
     *
     * @param \entities\Bill $bill
     *
     * @return Client
     */
    public function addBill(\entities\Bill $bill)
    {
        $this->bills[] = $bill;

        return $this;
    }

    /**
     * Remove bill.
     *
     * @param \entities\Bill $bill
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBill(\entities\Bill $bill)
    {
        return $this->bills->removeElement($bill);
    }

    /**
     * Get bills.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBills()
    {
        return $this->bills;
    }

    public function __toString()
    {
        return "Client[name: ".$this->name.
            ", nit: ".$this->nit.
            ", origin: ".$this->origin->getState().
            "]\n";
    }
}
