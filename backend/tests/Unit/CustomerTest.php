<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */


    private $defaultHeader = [
        'Accept' => 'application/json'
    ];

    public $customer1 = array(

        'first_name' => 'AK',
        'last_name' => 'KK',
        'email' => 'AK@gmail.com',
        'phone_no' => ' 0123456789',
        'address_line_one' => ' Victoria Court  ',
        'address_line_two' => ' Princess Road',
        'city' => ' Liverpool ',
        'postal_code' => 'l3 8ha',
        
    );

    public $customer2 = array(

        'first_name' => 'BK',
        'last_name' => 'KK',
        'email' => 'BK@gmail.com',
        'postal_code' => 'l3 8ha',
        'phone_no' => ' 0123453789',
        'address_line_one' => ' Victoria Court  ',
        'address_line_two' => ' Princess Road',
        'city' => ' Liverpool'
        
    );

    public function testPostValidData()
    {

        $data = array(
            $this->customer1,
            $this->customer2
        );
        
        
        foreach ($data as $value) {
        
            $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $value);
            $res->assertStatus(200);
        }
     
    }

    public function testPostSameEmails()
    {

        $temp1 = array_merge([], $this->customer1);
        $temp2 = array_merge([], $this->customer2);
        $temp1['email'] = 'same@gmail.com';
        $temp2['email'] = 'same@gmail.com';

        $data =  array(
            $temp1,
            $temp2,
        );

        
        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $temp1);
        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $temp2);


        foreach ($data as $value) {
            $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $value);
            $res->assertStatus(400);
        }
    }


    public function testPostSameNumbers()
    {   
        $temp1 = array_merge([], $this->customer1);
        $temp2 = array_merge([], $this->customer2);
        $temp1['phone_no'] = '1234567890';
        $temp2['phone_no'] = '1234567890';
        
        $data =  array(
            $temp1,
            $temp2,
        );

        
        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $temp1);
        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $temp2);


        foreach ($data as $value) {
            $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $value);
            $res->assertStatus(400);
        }
    }



    public function testPostMissingValues()
    {   
        $temp1 = array_merge([], $this->customer1);
        $temp2 = array_merge([], $this->customer2);

        unset($temp1['phone_no']);
        unset($temp2['address_line_one']);
        
        $data =  array(
            $temp1,
            $temp2,
        );


        foreach ($data as $value) {
            $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $value);
            $res->assertStatus(422);
        }
    }



    public function testUpdateValidData()
    {
        $data =  array(
            $this->customer1,
            // $this->customer2
        );

    

        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $data[0]);

        foreach ($data as $value) {
            $res = $this->withHeaders($this->defaultHeader)->put('/api/user/1', $value);
            $res->assertStatus(200);
        }
    }



    public function testUpdateDuplicateEmailAndNumber()
    {
        // update cust2 data with cust1 values
        // should return status 409 
        // because of dup email
        $data =  array(
            $this->customer1
        );

        
        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $this->customer1);
        $res = $this->withHeaders($this->defaultHeader)->post('/api/user', $this->customer2);

        foreach ($data as $value) {
            $res = $this->withHeaders($this->defaultHeader)->put('/api/user/2', $value);
            $res->assertStatus(409);
        }
    }


    public function testOtherCases(){

        $nameLength = array_merge([], $this->customer1);
        $nameLength['first_name'] = 'A    ';


        $postalLength = array_merge([], $this->customer1);
        $postalLength['postal_code'] = 'HUGE VALUE';

        $invalidNameType = array_merge([], $this->customer1);
        $invalidNameType['first_name'] = 'Cant12 Be a Name';

        $invalidPhoneType = array_merge([], $this->customer1);
        $invalidPhoneType['phone_no'] = 'Cant12 Be a Name';

        $data =  array(
            array(
                $nameLength,
                422
            ),
            array(
                $postalLength,
                422
            ),
            array(
                $invalidNameType,
                422
            ),
            array(
                $invalidPhoneType,
                422
            )
        );

        foreach ($data as $value) {
            $res = $this->withHeaders($this->defaultHeader)->post('/api/user/', $value[0]);
            $res->assertStatus($value[1]);
        }

    }

}
