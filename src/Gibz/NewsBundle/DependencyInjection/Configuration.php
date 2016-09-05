<?php

namespace Gibz\NewsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\IntegerNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gibz_news');

        // Pagination config
        $rootNode
            ->children()
                ->integerNode('news_per_page')
                    ->defaultValue(10)
                ->end()
            ->end();

        return $treeBuilder;
    }
}
