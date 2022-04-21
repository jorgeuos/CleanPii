<?php
/**
 * Copyright (c) 2022 Jorge Powers
 * @link https://jorgeuos.github.io/
 * @license https://github.com/jorgeuos/CleanPii/blob/main/LICENSE MIT License
 */
namespace Piwik\Plugins\CleanPii;

class CleanPii extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return [
            'CronArchive.getArchivingAPIMethodForPlugin' => 'getArchivingAPIMethodForPlugin',
        ];
    }

    // support archiving just this plugin via core:archive
    public function getArchivingAPIMethodForPlugin(&$method, $plugin)
    {
        if ($plugin == 'CleanPii') {
            $method = 'CleanPii.getExampleArchivedMetric';
        }
    }
}
