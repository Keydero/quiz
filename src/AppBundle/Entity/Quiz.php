<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="quiz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuizRepository")
 */
class Quiz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;
    /**
     * @ORM\ManyToOne(
     targetEntity="Theme", inversedBy="quizs")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id");
     */
    private $theme;
    /**
     * @ORM\ManyToOne(
     targetEntity="Category", inversedBy="quizs")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id");
     */
     private $category;
    /**
     * Get id
     *
     * @return int
     */
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
    * @ORM\OneToMany(targetEntity="Question", mappedBy="quiz")
    */ 
    private $questions;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Quiz
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
     * Set theme
     *
     * @param \AppBundle\Entity\Theme $theme
     *
     * @return Quiz
     */
    public function setTheme(\AppBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \AppBundle\Entity\Theme
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Quiz
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
     * Set description
     *
     * @param string $description
     *
     * @return Quiz
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quizs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add quiz
     *
     * @param \AppBundle\Entity\Question $quiz
     *
     * @return Quiz
     */
    public function addQuiz(\AppBundle\Entity\Question $quiz)
    {
        $this->quizs[] = $quiz;

        return $this;
    }

    /**
     * Remove quiz
     *
     * @param \AppBundle\Entity\Question $quiz
     */
    public function removeQuiz(\AppBundle\Entity\Question $quiz)
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

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return Quiz
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
