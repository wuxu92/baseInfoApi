<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/30
 * Time: 10:15
 */

namespace cat;

use libs\Category;
use model\IpComplex;
use model\IpSimple;

class IpCat extends Category {

    public function indexAction() {
        echo "<h3>hello cat index</h3>";
    }

    public function queryAction() {
        $ip = $_GET['ip'];
        if (empty($ip)) {
            $this->retObj->append('参数不正确')
                ->json(true);
        }

        $type = $this->getParam('type', 'simple');

        if ($type == 'simple') $ip = new IpSimple($ip);
        else $ip = new IpComplex($ip);
        // $ip = new IpSimple($ip);

        //var_dump($ip); exit;
        $data = $ip->getIpInfo();

        $this->retObj->append($data)
            ->json(true);


        return array(
            'request' => 'ipQuery'
        );
    }
}