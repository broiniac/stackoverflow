<?php

namespace AppBundle\Service;
use AppBundle\Entity\Project;

/**
 * Awesome service!
 */
class ProjectService
{
    /**
     * usefulMethod description
     *
     * @param string $param
     *
     * @return string some string
     */
    public function usefulMethod($param = 'or not')
    {
        return $param;
    }

    /**
     * anotherUsefulMethod description
     *
     * @return string some string
     */
    public function anotherUsefulMethod()
    {
        return 'yeah';
    }

    /**
     * Do something important with Project.
     *
     * @param Project $project
     *
     * @return Project $project
     */
    public function doSomethingImportant(Project $project)
    {
        return $project;
    }
}
