<?php

namespace App\Http\Request\Sender;

use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;

class SenderHttpRequest
{
    private $factory;
    private $data;

    public function __construct(Factory $factory, $data)
    {
        $this->factory = $factory;
        $this->data = $data;
    }

    public function getValidator(): Validator
    {

        return $this->factory->make($this->data, [

            'email' => [
                'required_without:senderMobile',
                'email',
                function ($attribute, $value, $fail) {
                    if ($value && $this->data['senderMobile']) {
                        return $fail('Can choose only one type of sending');
                    }
                }
            ],

            'senderMobile' => [
                'required_without:email',
                'numeric',
            ],
            'friendName' => 'required|string',
            'greeting' => 'required|string',
            'subject' => 'required|string',
            'from' => 'required|string',
            'msg' => 'required|string',
        ],
            [
                'email.required_without' => 'Please provide your email or senderMobile.',
                'senderMobile.required_without' => 'Please provide your senderMobile or email.',
            ]

        );
    }
}