<?php
/**
 * Copyright (c) 2022 Jorge Powers
 * @link https://jorgeuos.github.io/
 * @license https://github.com/jorgeuos/CleanPii/blob/main/LICENSE MIT License
 */

namespace Piwik\Plugins\CleanPii;

use Piwik\View;
use Piwik\Common;
use Piwik\Notification;
use Piwik\Piwik;
use Piwik\Plugins\CleanPii\Model\CleanPiiModel;
/**
 * A controller lets you for example create a page that can be added to a menu. For more information read our guide
 * http://developer.piwik.org/guides/mvc-in-piwik or have a look at the our API references for controller and view:
 * http://developer.piwik.org/api-reference/Piwik/Plugin/Controller and
 * http://developer.piwik.org/api-reference/Piwik/View
 */
class Controller extends \Piwik\Plugin\Controller
{

    /*
     * CleanPiiModel
     *
     * @var \Piwik\Plugins\CleanPii\Model\CleanPiiModel
     */
    protected $db;

    public function __construct(
        CleanPiiModel $db
    ){
        $this->db = $db;
    }

    public function index()
    {
        return $this->renderTemplate('index', []);
    }

    public function checkForPiiInBlob()
    {
        Piwik::checkUserHasSuperUserAccess();
        $dataRows = $this->db->getBlob();
        echo "<pre>";
        foreach ($dataRows as $row) {
            $needle = "?contactid=";
            $chunks = gzuncompress($row['value']);
            if (strpos($chunks,$needle)){
                $unserialized_multi = Common::safe_unserialize($chunks);
                foreach ($unserialized_multi as $serialized) {
                    if (strpos($serialized, $needle)){
                        $chunk = Common::safe_unserialize($serialized);
                        print_r($chunk);
                        echo "\n";
                    }
                }
            }
        }
        echo "</pre>";
    }
}
