<?php
namespace entities;

require_once 'Agency.php';
require_once 'User.php';
require_once 'Bill.php';
require_once 'Medicine.php';

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sale")
 */
class Sale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $units;

    /**
     * @ORM\Column(type="float")
     */
    private $sale_price;

    /**
     * @ORM\ManyToOne(targetEntity="Agency", inversedBy="sale")
     * @ORM\JoinColumn(name="agency_id", referencedColumnName="id", nullable=false)
     * @var Agency
     */
    private $agency;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sale")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * @var User
     */
    private $user;

    // Custom Many to Many
    /**
     * @ORM\ManyToOne(targetEntity="Bill", inversedBy="sale")
     * @ORM\JoinColumn(name="bill_id", referencedColumnName="id", nullable=false)
     * @var Bill
     */
    private $bill;

    /**
     * @ORM\ManyToOne(targetEntity="Medicine", inversedBy="sale")
     * @ORM\JoinColumn(name="medicine_id", referencedColumnName="id", nullable=false)
     * @var Medicine
     */
    private $medicine;


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
     * Set units.
     *
     * @param int $units
     *
     * @return Sale
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units.
     *
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set salePrice.
     *
     * @param float $salePrice
     *
     * @return Sale
     */
    public function setSalePrice($salePrice)
    {
        $this->sale_price = $salePrice;

        return $this;
    }

    /**
     * Get salePrice.
     *
     * @return float
     */
    public function getSalePrice()
    {
        return $this->sale_price;
    }

    /**
     * Set agency.
     *
     * @param \entities\Agency $agency
     *
     * @return Sale
     */
    public function setAgency(\entities\Agency $agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get agency.
     *
     * @return \entities\Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set user.
     *
     * @param \entities\User $user
     *
     * @return Sale
     */
    public function setUser(\entities\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \entities\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set bill.
     *
     * @param \entities\Bill $bill
     *
     * @return Sale
     */
    public function setBill(\entities\Bill $bill)
    {
        $this->bill = $bill;

        return $this;
    }

    /**
     * Get bill.
     *
     * @return \entities\Bill
     */
    public function getBill()
    {
        return $this->bill;
    }

    /**
     * Set medicine.
     *
     * @param \entities\Medicine $medicine
     *
     * @return Sale
     */
    public function setMedicine(\entities\Medicine $medicine)
    {
        $this->medicine = $medicine;

        return $this;
    }

    /**
     * Get medicine.
     *
     * @return \entities\Medicine
     */
    public function getMedicine()
    {
        return $this->medicine;
    }
}
