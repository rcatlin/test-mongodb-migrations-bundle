<?php

namespace TestMigrations\Bundle\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use TestMigrations\Bundle\MainBundle\Document\Monkey;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/monkey/new/{name}")
     */
    public function newMonkeyAction($name)
    {
        $monkey = new Monkey();
        $monkey->setName($name);

        $dm = $this->getDocumentManager();
        $dm->persist($monkey);
        $dm->flush();

        return new Response(
            sprintf(
                'Created Monkey %s',
                $name
            )
        );
    }

    /**
     * @Route("monkey/{name}")
     */
    public function findMonkeyAction($name)
    {
        $monkey = $this->getDocumentManager()
            ->createQueryBuilder('TestMigrations\Bundle\MainBundle\Document\Monkey')
            ->field('name')->equals($name)
            ->getQuery()
            ->getSingleResult()
        ;

        if ($monkey) {
            $message = sprintf(
                '%s is monkeying around. [%s]',
                $monkey->getName(),
                $monkey->getId()
            );
        } else {
            $message = sprintf(
                '%s is nowhere to be found.',
                $name
            );
        }
        
        return new Response($message);
    }

    protected function getDocumentManager()
    {
        return $this->get('doctrine_mongodb')->getManager();
    }
}
