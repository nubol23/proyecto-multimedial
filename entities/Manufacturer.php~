<?php
namespace entities;
require_once 'Medicine.php';
require_once 'Sale.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="manufacturer")
 */
class Manufacturer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * Manufacturer can manufacture many medicines
     * @ORM\OneToMany(targetEntity="Medicine", mappedBy="manufacturer", cascade={"all"})
     * @var ArrayCollection
     */
    private $medicines;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medicines = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Manufacturer
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
     * Add medicine.
     *
     * @param \entities\Medicine $medicine
     *
     * @return Manufacturer
     */
    public function addMedicine(Medicine $medicine)
    {
        $this->medicines[] = $medicine;

        return $this;
    }

    /**
     * Remove medicine.
     *
     * @param \entities\Medicine $medicine
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMedicine(\entities\Medicine $medicine)
    {
        return $this->medicines->removeElement($medicine);
    }

    /**
     * Get medicines.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicines()
    {
        return $this->medicines;
    }
}
