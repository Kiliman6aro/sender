<?php

namespace App\Tests;

use App\Http\Request\Sender\SenderHttpRequest;
use App\Library\Container;
use App\Library\Translator;
use Illuminate\Validation\Factory;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    public function testFail1()
    {

        $senderHttpRequest = (new SenderHttpRequest(new Factory(new Translator(), new Container()), $this->setData(true, true)));
        $senderValidation = $senderHttpRequest->getValidator();

        $this->assertTrue($senderValidation->fails());

    }

    public function testFail2()
    {

        $senderHttpRequest = (new SenderHttpRequest(new Factory(new Translator(), new Container()), $this->setData(false, false)));
        $senderValidation = $senderHttpRequest->getValidator();

        $this->assertTrue($senderValidation->fails());

    }

    public function testSuccess1()
    {

        $senderHttpRequest = (new SenderHttpRequest(new Factory(new Translator(), new Container()), $this->setData(true, false)));
        $senderValidation = $senderHttpRequest->getValidator();

        $this->assertFalse($senderValidation->fails());

    }

    public function testSuccess2()
    {

        $senderHttpRequest = (new SenderHttpRequest(new Factory(new Translator(), new Container()), $this->setData(false, true)));
        $senderValidation = $senderHttpRequest->getValidator();

        $this->assertFalse($senderValidation->fails());

    }


    public function setData($email = false, $phone =false)
    {

        $faker = \Faker\Factory::create();
        $data = [];


        if($email) {
            $data['email'] = $faker->email;
        }

        if($phone) {
            $data['senderMobile'] = $faker->e164PhoneNumber;
        }

        $data['mobile'] = $data['senderMobile'] ? $faker->e164PhoneNumber : null;
        $data['friendName'] = $faker->name;
        $data['greeting'] = $faker->text(50);
        $data['subject'] = $faker->text(25);
        $data['from'] = $faker->email;
        $data['msg'] = $faker->text(100);

        return $data;
    }
}