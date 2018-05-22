<?php

namespace Core;

use Fixtures\HeroesFixture;
use Fixtures\SkillsFixture;
use Fixtures\SkillsHeroesFixture;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return [
            new FrameworkBundle,
        ];
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'S0ME_SECRET',
        ]);
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->add('/data', 'kernel:data');
    }

    public function data()
    {
        return new JsonResponse([
            'heroes'       => HeroesFixture::DATA,
            'skills'       => SkillsFixture::DATA,
            'skillsHeroes' => SkillsHeroesFixture::DATA,
        ]);
    }

    /**
     * Override cache dir
     *
     * @return string
     */
    public function getCacheDir()
    {
        return __DIR__ . '/../../var/cache/' . $this->environment;
    }

    /**
     * Override logs dir
     *
     * @return string
     */
    public function getLogDir()
    {
        return __DIR__ . '/../../var/logs/';
    }
}
