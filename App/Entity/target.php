<?php
namespace App\Entity;

use DateTime;

class Target
{
    protected string $name;
    protected string $firstName;
    protected DateTime $dateOfBirth;
    protected string $codeName;
    protected Nationality $nationality;

    public function __construct($name, $firstName, $dateOfBirth, $codeName, $nationality)
    {
        $this->name = $name;
        $this->firstName = $firstName;
        $this->dateOfBirth = $dateOfBirth;
        $this->codeName = $codeName;
        $this->nationality = $nationality;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of dateOfBirth
     *
     * @return  self
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get the value of codeNam
     */
    public function getCodeName()
    {
        return $this->codeName;
    }

    /**
     * Set the value of codeNam
     *
     * @return  self
     */
    public function setCodeName($codeName)
    {
        $this->codeName = $codeName;

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
};

