<?php

use Rector\CodingStyle\Rector\ClassConst\VarConstantCommentRector;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::CODING_STYLE);
    $containerConfigurator->import(SetList::CODING_STYLE_ADVANCED);
    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SetList::EARLY_RETURN);
    $containerConfigurator->import(SetList::NAMING);
    $containerConfigurator->import(SetList::ORDER);
    $containerConfigurator->import(LevelSetList::UP_TO_PHP_80);
    $containerConfigurator->import(SetList::TYPE_DECLARATION);
    $containerConfigurator->import(SetList::TYPE_DECLARATION_STRICT);

    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [__DIR__ . '/config', __DIR__ . '/src', __DIR__ . '/spec']);

    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_80);

    $parameters->set(Option::SKIP, [
        VarConstantCommentRector::class,
    ]);
};
