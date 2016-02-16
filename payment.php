<?php
require_once("lib/Twocheckout.php");

Twocheckout::privateKey('BFA68F83-6A19-487E-BF65-5D464CAA455A');
Twocheckout::sellerId('901309068');
Twocheckout::sandbox(true);

  try {
      $charge = Twocheckout_Charge::auth(array(
          "merchantOrderId" => "123",
          "token"      => $_POST['token'],
          "currency"   => 'USD',
          "total"      => '10.00',
          "billingAddr" => array(
              "name" => 'Testing Tester',
              "addrLine1" => '123 Test St',
              "city" => 'Columbus',
              "state" => 'OH',
              "zipCode" => '43123',
              "country" => 'USA',
              "email" => 'example@2co.com',
              "phoneNumber" => '555-555-5555'
          )
      ));

      if ($charge['response']['responseCode'] == 'APPROVED') {
          echo "Thanks for your Order!";
          echo "<h3>Return Parameters:</h3>";
          echo "<pre>";
          print_r($charge);
          echo "</pre>";

      }
  } catch (Twocheckout_Error $e) {
      print_r($e->getMessage());
  }


 ?>
