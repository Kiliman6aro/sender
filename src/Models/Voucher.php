<?php

namespace App\Models;


use Faker\Factory;

class Voucher
{
    public $id;

    public $senderName;

    public $myMobile;

    public $myEmail;

    /**
     * Mock method. Really this activerecord and this method find record in database.
     * @param null $id
     * @return void
     */
    public static function find($id): Voucher
    {
        $faker = Factory::create();
        $model = new Voucher();
        $model->id = $id;
        $model->senderName = $faker->name;
        $model->myMobile = $faker->e164PhoneNumber();
        $model->myEmail = $faker->email();
        return $model;

    }
}