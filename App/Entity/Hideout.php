<?php
namespace App\Entity;

use App\Entity\Nationality;
use App\Entity\HideoutType;

class Hideout
{
    protected int $idHideout;
    protected string $adress;
    protected int $code;
    protected string $city;
    protected Nationality $nationality;
    protected HideoutType $hideoutType;

    public function __construct(
        $idHideout, $adress, $code, $city, $nationality, $hideoutType
    ) {
        $this->idHideout= $idHideout;
        $this->adress = $adress;
        $this->code = $code;
        $this->city = $city;
        $this->nationality = $nationality;
        $this->hideoutType = $hideoutType;
    }

    /**
     * Get the value of id
     */
    public function getIdHideout()
    {
        return $this->idHideout;
    }


    /**
     * Get the value of adress
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set the value of nationality
     *
     * @return  self
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get the value of hideoutType
     */
    public function getHideoutType()
    {
        return $this->hideoutType;
    }

    /**
     * Set the value of hideoutType
     *
     * @return  self
     */
    public function setHideoutType($hideoutType)
    {
        $this->hideoutType = $hideoutType;
        
        return $this;
    }
}
