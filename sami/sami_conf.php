<?php

$dir = dirname(__DIR__).'/src';

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('tests')
    ->in($dir)
;

$versions = GitVersionCollection::create($dir)
    ->addFromTags('v1.0.*')
    ->add('1.0', '1.0 branch')
    ->add('master', 'master branch')
;

return new Sami($iterator, array(
    'theme'                => 'enhanced',
    'versions'             => $versions,
    'title'                => 'Erdiko API',
    'build_dir'            => __DIR__.'/build/%version%',
    'cache_dir'            => __DIR__.'/cache/%version%',
    //  'simulate_namespaces'  => true, 
    'default_opened_level' => 2,
));