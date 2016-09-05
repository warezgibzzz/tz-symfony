<?php
/**
 * Created by PhpStorm.
 * User: gibz
 * Date: 05.09.16
 * Time: 14:28
 */

namespace Gibz\NewsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gibz\NewsBundle\Entity\Article;

class LoadSampleArticles implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 100; $i++) {
            $article = new Article();
            $article->setTitle('Test Article #'.$i);
            $article->setBody('Test Article Body #'.$i);

            $manager->persist($article);
        }

        $manager->flush();
    }
}