<?php
namespace entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="origin")
 */
class Origin
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
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="Client", mappedBy="origin", cascade={"all"})
     * @var ArrayCollection
     */
    private $clients;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set state.
     *
     * @param string $state
     *
     * @return Origin
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Add client.
     *
     * @param \entities\Client $client
     *
     * @return Origin
     */
    public function addClient(\entities\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client.
     *
     * @param \entities\Client $client
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClient(\entities\Client $client)
    {
        return $this->clients->removeElement($client);
    }

    /**
     * Get clients.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

}
