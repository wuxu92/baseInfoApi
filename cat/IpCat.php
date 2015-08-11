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
        $ip = $this->getParam('ip');
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

        // ignore below
        return array(
            'request' => 'ipQuery'
        );
    }

    public function qqwryAction() {

        $ip = $this->getParam('ip');
        if (empty($ip)) {
            $this->retObj->append('参数不正确')
                ->json(true);
        }

        if ( !filter_var($ip, FILTER_VALIDATE_IP)) {
            $this->retObj->append('ip参数格式不正确')
                ->json(true);
        }

        $qqwry = new \qqwry(APP_ROOT . '/ext/qqwry.dat');
        //var_dump(serialize($qqwry));
        list($addr1,$addr2)=$qqwry->q($ip);
        $addr1=iconv('GB2312','UTF-8',$addr1);
        $addr2=iconv('GB2312','UTF-8',$addr2);
        $this->retObj->append(array($addr1, $addr2))
            ->json(true);

        //$arr=$qqwry->q('64.233.187.99');
        //$arr[0]=iconv('GB2312','UTF-8',$arr[0]);
        //$arr[1]=iconv('GB2312','UTF-8',$arr[1]);
        //echo $arr[0],'|',$arr[1],"<br/>";
    }
}