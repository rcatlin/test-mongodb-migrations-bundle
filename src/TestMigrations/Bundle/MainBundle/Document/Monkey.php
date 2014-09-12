<?php

namespace TestMigrations\Bundle\MainBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class Monkey
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $name;

    /**
     * @ODM\Collection
     * @ODM\ReferenceMany(targetDocument="TestMigrations\Bundle\MainBundle\Document\Hobby")
     */
    protected $hobbies;
    public function __construct()
    {
        $this->hobbies = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add hobby
     *
     * @param TestMigrations\Bundle\MainBundle\Document\Hobby $hobby
     */
    public function addHobby(Hobby $hobby)
    {
        $this->hobbies[] = $hobby;
    }

    /**
     * Remove hobby
     *
     * @param TestMigrations\Bundle\MainBundle\Document\Hobby $hobby
     */
    public function removeHobby(Hobby $hobby)
    {
        $this->hobbies->removeElement($hobby);
    }

    /**
     * Get hobbies
     *
     * @return Doctrine\Common\Collections\Collection $hobbies
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }
}
