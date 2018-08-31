<?php

namespace LuceneSearchBundle;

use LuceneSearchBundle\DependencyInjection\Compiler\CategoriesPass;
use LuceneSearchBundle\DependencyInjection\Compiler\TaskPass;
use LuceneSearchBundle\Tool\Install;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LuceneSearchBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    /**
     * @inheritDoc
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TaskPass());
        $container->addCompilerPass(new CategoriesPass());
    }
    public static function getSVersion() {
        $temp = new self();
        return $temp->getVersion();
    }
    /**
     * {@inheritdoc}
     */
    public function getInstaller()
    {
        return $this->container->get(Install::class);
    }

    /**
     * @return string[]
     */
    public function getJsPaths()
    {
        return [
            '/bundles/lucenesearch/js/backend/startup.js',
            '/bundles/lucenesearch/js/backend/settings.js'
        ];
    }

    public function getCssPaths()
    {
        return [
            '/bundles/lucenesearch/css/admin.css'
        ];
    }

    public static function getPackageVersion(){
        return PackageVersionTrait::getVersion(self::class);
    }
    /**
     * @inheritDoc
     */
    protected function getComposerPackageName(): string
    {
        return 'dachcom-digital/lucene-search';
    }

}
