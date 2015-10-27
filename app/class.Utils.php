<?php
/**
 * Created by PhpStorm.
 * User: mrt
 * Date: 24.10.2015
 * Time: 19:27
 */

namespace RMB\Classes {

        function _L( $module, $message) {
            $ts = date( 'Y.m.d H:m:s' );
            echo $ts . ' ['.$module.'] '.$message."\n";
        }













}