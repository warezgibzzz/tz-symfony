<?php
/**
 * Created by PhpStorm.
 * User: gibz
 * Date: 05.09.16
 * Time: 13:09
 */

namespace Gibz\NewsBundle\Controller;


use Doctrine\ORM\Tools\Pagination\Paginator;
use Gibz\NewsBundle\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    /**
     * @Template()
     *
     * @param $page
     * @return array
     */
    public function indexAction($page = 1)
    {
        $offset = 0;
        if ($page > 1) {
            $offset = ($this->getParameter('gibz_news.news_per_page') * ($page - 1));
        }
        $queryBuilder = $this->get('doctrine.orm.entity_manager')->createQueryBuilder();

        $query = $queryBuilder
            ->select('articles')
            ->from('GibzNewsBundle:Article', 'articles')
            ->setMaxResults($this->getParameter('gibz_news.news_per_page'));
        if ($page > 1) {
            $query->setFirstResult($offset);
        }

        $paginator = new Paginator($query);

        return [
            'page' => $page,
            'articles' => $paginator,
            'offset' => $offset + 1,
            'news_per_page' => $this->getParameter('gibz_news.news_per_page'),
            'page_count' => floor($paginator->count() / $this->getParameter('gibz_news.news_per_page'))
        ];
    }

    /**
     * @Template()
     *
     * @param $slug
     * @return array
     */
    public function showAction($slug)
    {
        $article = $this->getDoctrine()->getRepository('GibzNewsBundle:Article')->findOneBy(['slug' => $slug]);

        return [
            'slug' => $slug,
            'article' => $article
        ];
    }
}