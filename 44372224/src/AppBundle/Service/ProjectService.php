<?php

namespace AppBundle\Service;

use AppBundle\Entity\Project;

/**
 * Awesome service!
 */
class ProjectService
{
    /**
     * Check is this service awesome
     *
     * @return bool answer!
     */
    public function isThisServiceAwesome()
    {
        return true;
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
