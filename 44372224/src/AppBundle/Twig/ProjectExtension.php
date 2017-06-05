<?php

namespace AppBundle\Twig;

use AppBundle\Entity\Project;
use AppBundle\Service\ProjectService;
use Twig_Environment;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * ProjectExtension is a Twig extension definind
 *     some filters, functions and stuff.
 *
 * @see https://twig.sensiolabs.org/doc/2.x/advanced.html#creating-an-extension
 * @see https://symfony.com/doc/current/templating/twig_extension.html
 */
class ProjectExtension extends \Twig_Extension
{
    /**
     * @var ProjectService
     */
    protected $projectService;

    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @param ProjectService $projectService
     */
    public function __construct(
        ProjectService $projectService,
        Twig_Environment $twig,
        EntityManager $em,
        RequestStack $requestStack,
        $isAwesome = false
    ) {
        $this->projectService = $projectService;
        $this->twig = $twig;
        $this->em = $em;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter(
                'renderLogo',
                [$this, 'renderLogo'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'renderProjectSelector',
                [$this, 'renderProjectSelector'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    /**
     * Renders logo for project.
     *
     * @param Project|null $project
     *
     * @return string html img tag
     */
    public function renderLogo(Project $project = null)
    {
        if ($project) {
            return "<img
                src='{$project->getLogoUrl()}'
                alt='{$project->getTitle()}'>";
        }
    }

    /**
     * Renders very important widget in any place you need!
     *
     * @return string html with widget
     */
    public function renderProjectSelector()
    {
        $repo = $this->em->getRepository('AppBundle:Project');

        // #NOTICE: Wee need master request info, because our widget
        //     is rendered and called as subrequest.
        $masterRequest = $this->requestStack->getMasterRequest();

        // #NOTICE: You need second parameter as default value in case there is no id in masterRequest route.
        $currentProjectId = $masterRequest->get('id', 0);

        $currentProject = $repo->find($currentProjectId);
        if ($currentProject) {
            $this->projectService->doSomethingImportant($currentProject);
        }
        $projects = $repo->findAll();

        return $this->twig->render('project/widget.html.twig', [
            'currentProject' => $currentProject,
            'projects' => $projects,
        ]);
    }
}
