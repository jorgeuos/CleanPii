<?php
/**
 * Copyright (c) 2022 Jorge Powers
 * @link https://jorgeuos.github.io/
 * @license https://github.com/jorgeuos/CleanPii/blob/main/LICENSE MIT License
 */

namespace Piwik\Plugins\CleanPii\Model;

use Piwik\Common;
use Piwik\Db;
// use Piwik\Plugins\CleanPii\CleanPii;

class CleanPiiModel
{
    public function getBlob(): array {

        $db = Db::get();
        /**
         * @todo Get table to search
         * Hardcoded for testing purposes.
         */
        $table = "matomo_archive_blob_2021_05";
        $getValuesSql = "SELECT idsite, name, date1, date2, value, ts_archived
                                FROM %s";
        $sql      = sprintf($getValuesSql, $table);
        $dataRows = $db->fetchAll($sql);
        return $dataRows;
    }
}