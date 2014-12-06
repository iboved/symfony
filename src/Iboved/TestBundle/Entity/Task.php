<?php

namespace Iboved\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="task")
 * @ORM\Entity
 */
class Task
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="task", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $task;

    /**
     * @ORM\Column(name="due_date", type="date")
     *
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    private $dueDate;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="tasks")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    public function getId()
    {
        return $this->id;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category = null)
    {
        $this->category = $category;
    }
}
