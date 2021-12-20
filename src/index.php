<?php
require_once 'vendor/autoload.php';


use App\Controllers\GiftController;

$faker = \Faker\Factory::create();

$_GET['voucher_id'] = $faker->uuid;

$_POST['email'] = $faker->email;

//random defining you  have mobile or no
$_POST['senderMobile'] =  $faker->e164PhoneNumber;
$_POST['mobile'] = $_POST['senderMobile'] ? $faker->e164PhoneNumber : null;
$_POST['friendName'] = $faker->name;
$_POST['greeting'] = $faker->text(50);
$_POST['subject'] = $faker->text(25);
$_POST['from'] = $faker->email;
$_POST['msg'] = $faker->text(100);


(new GiftController())->sendThanks($_GET['voucher_id']);

