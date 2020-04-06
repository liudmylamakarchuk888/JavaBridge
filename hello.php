#!/usr/bin/php

<?php
//define ("JAVA_DEBUG", true);
require_once "java/Java.inc";

ini_set("max_execution_time", 0);
$sys = java("java.lang.System");

// fetch classes and compile them to native code.
// use local poi.jar, if installed
try {
    // java_require("$here/exceltest.jar;$here/../../unsupported/poi.jar");
    $myObj = new java("com.fss.plugin.iPayPipe");

    $resourcePath = "c:\\resourcepath";
    $keystorePath = "c:\\resourcepath";
    $receiptURL = "http://www.demomerchant.com/result.jsp";
    $errorURL = "http://www.demomerchant.com/error.jsp";
    $action = "1"; //1 – Purchase, 4 – Pre Auth, 8 - Inquiry, 11 – Token
    $aliasName = 'tasleem';
    $currency = '512';
    $language = 'USA';
    $amount = '10.000';
    $trackID = '109088888';
    $cardNumber = "4000000000000002";
    //Tokenization Parameters needs to send only during Token Transactions
    $tokenFlag = 2; // tokenFlag value will be 2 for transaction using token
    $tokenNumber = "40000098745632196374150002"; // Token Number if tokenFlag
    //User Defined Fields
    $udf1 = "Udf1";
    $udf2 = "Udf2";
    $udf3 = "Udf3";
    $udf4 = "Udf4";
    $udf5 = "Udf5";
    $udf6 = "Udf6";
    $udf7 = "Udf7";
    $udf8 = "Udf8";
    $udf9 = "Udf9";
    $udf10 = "Udf10";
    $udf11 = "Udf11";
    $udf12 = "Udf12";
    $udf13 = "Udf13";
    $udf14 = "Udf14";
    $udf15 = "Udf15";
    //Set Values
    $myObj->setResourcePath(trim($resourcePath));
    $myObj->setKeystorePath(trim($resourcePath));
    $myObj->setAlias(trim($aliasName));
    $myObj->setAction(trim($action));
    $myObj->setCurrency(trim($currency));
    $myObj->setLanguage(trim($language));
    $myObj->setResponseURL(trim($receiptURL));
    $myObj->setErrorURL(trim($errorURL));
    $myObj->setAmt($amount);
    $myObj->setTrackId($trackid);
    // $myObj->setTokenFlag($tokenFlag);
    // $myObj->setTokenNumber($tokenNumber);
    // $myObj->setUdf1($udf1);
    // $myObj->setUdf2($udf2);
    // $myObj->setUdf3($udf3);
    // $myObj->setUdf4($udf4);
    // $myObj->setUdf5($udf5);
    // $myObj->setUdf6($udf6);
    // $myObj->setUdf7($udf7);
    // $myObj->setUdf8($udf8);
    // $myObj->setUdf9($udf9);
    // $myObj->setUdf10($udf10);
    // $myObj->setUdf11($udf11);
    // $myObj->setUdf12($udf12);
    // $myObj->setUdf13($udf13);
    // $myObj->setUdf14($udf14);
    // $myObj->setUdf15($udf15);
    $val = $myObj->performPaymentInitializationHTTP();

    // $myObj->setAlias(trim($aliasName));
    // $myObj->setResourcePath(trim($resourcePath));
    // $myObj->setAction(trim($action));
    // $myObj->setAmt(trim($amount));
    // $myObj->setCurrency(trim($currency));
    // $myObj->setLanguage($language);
    // $myObj->setTransId($comment);
    // $myObj->setKeystorePath(trim($keystorePath));
    // $myObj->setResponseURL(trim($receiptURL));
    // $myObj->setErrorURL(trim($errorURL));
    // $val = $myObj->performTransaction();

    // $val1 = $myObj->getResult();
    if($val==0){
      $url=$myObj->getWebAddress();
      echo $url;
      header( 'Location:'.$url ) ;
    }else{
      $error = $myObj->getError();
      echo "error".$error;
    }

    echo $val;


} catch (JavaException $e) {
    echo ($e);exit;
    // java_require("$here/exceltest.jar;http://php-java-bridge.sf.net/poi.jar");
}

?>
