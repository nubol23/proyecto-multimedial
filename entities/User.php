<?php

namespace entities;

require_once 'Token.php';
require_once 'Sale.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
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
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * Each user has a unique session token
     * @ORM\OneToMany(targetEntity="Token", mappedBy="user", cascade={"all"}, orphanRemoval=true)
     * @var ArrayCollection
     */
    private $tokens;

    /**
     * @ORM\ManyToOne(targetEntity="Position", inversedBy="user")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id", nullable=false)
     * @var Position
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="Sale", mappedBy="user", cascade={"all"})
     * @var ArrayCollection
     */
    private $sales;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tokens = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add token.
     *
     * @param \entities\Token $token
     *
     * @return User
     */
    public function addToken(\entities\Token $token)
    {
        $this->tokens[] = $token;

        return $this;
    }

    /**
     * Remove token.
     *
     * @param \entities\Token $token
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeToken(\entities\Token $token)
    {
        return $this->tokens->removeElement($token);
    }

    /**
     * Get tokens.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Set position.
     *
     * @param \entities\Position $position
     *
     * @return User
     */
    public function setPosition(\entities\Position $position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position.
     *
     * @return \entities\Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add sale.
     *
     * @param \entities\Sale $sale
     *
     * @return User
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
        return "User[username: ".$this->username.
            ", position: ".$this->position->getPosition().
            "]\n";
    }
}
