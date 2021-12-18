<?php

namespace App\Tests;

use App\Controllers\GiftController;
use PHPUnit\Framework\TestCase;

class SenderTest extends TestCase
{
    public function testSenderTestFail1()
    {

        $this->setData(true, true);

        $response = (new GiftController())->sendThanks();

        $data = json_decode($response, true);

        $this->assertArrayHasKey('error', $data);

    }

    public function testSenderTestFail2()
    {

        $this->setData(false, false);

        $response = (new GiftController())->sendThanks();

        $data = json_decode($response, true);

        $this->assertArrayHasKey('error', $data);

    }

    public function testSenderTestSuccessEmail()
    {

        $this->setData(true, false);
        $response = (new GiftController())->sendThanks();
        if(empty($response)) {
            $response = [];
        }

        $this->assertArrayNotHasKey('error', $response);

    }

    public function testSenderTestSuccessPhone()
    {

        $this->setData(false, true);
        $response = (new GiftController())->sendThanks();
        if(empty($response)) {
            $response = [];
        }

        $this->assertArrayNotHasKey('error', $response);

    }

    public function setData($email = false, $phone =false)
    {

        $faker = \Faker\Factory::create();
        $_GET = [];
        $_POST = [];


        $_GET['voucher_id'] = $faker->uuid;

        if($email) {
            $_POST['email'] = $faker->email;
        }

        if($phone) {
            $_POST['senderMobile'] = $faker->e164PhoneNumber;

        }

        $_POST['mobile'] = $_POST['senderMobile'] ? $faker->e164PhoneNumber : null;
        $_POST['friendName'] = $faker->name;
        $_POST['greeting'] = $faker->text(50);
        $_POST['subject'] = $faker->text(25);
        $_POST['from'] = $faker->email;
        $_POST['msg'] = $faker->text(100);
    }
}