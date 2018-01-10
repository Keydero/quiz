<?php 
// src/AppBundle/Entity/Product.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="themes")
 */
class Theme
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
              /**
     * @ORM\ManyToOne(
     targetEntity="Category", inversedBy="themes")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id");
     */
    private $category;
      /**
     * @ORM\OneToMany(targetEntity="Quiz", mappedBy="theme")
     */ 
    private $quizs;

    public function __construct() {

    }
    public function __toString() {
    return (string)$this->name;
}
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Theme
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * Add quiz
     *
     * @param \AppBundle\Entity\Quiz $quiz
     *
     * @return Theme
     */
    public function addQuiz(\AppBundle\Entity\Quiz $quiz)
    {
        $this->quizs[] = $quiz;

        return $this;
    }

    /**
     * Remove quiz
     *
     * @param \AppBundle\Entity\Quiz $quiz
     */
    public function removeQuiz(\AppBundle\Entity\Quiz $quiz)
    {
        $this->quizs->removeElement($quiz);
    }

    /**
     * Get quizs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuizs()
    {
        return $this->quizs;
    }
}
