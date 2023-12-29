<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CustomerController extends Controller{

    // validator conditions used while updating and 
    // creating customers
    private $validatorConditions = [
        'first_name' => 'required|min:2|max:40',
        'last_name' => 'required|min:2|max:40',
        'phone_no' => 'string|required|max:10',
        'email' => 'required|email',
        'address_line_one' => 'required|min:2|max:100',
        'address_line_two' => 'required|min:2|max:100',
        'postal_code' => 'string|required|max:8',
        'city' => 'required|max:50',
    ];

    // returns true if a record exists as per the 
    // provided key and value
    private function checkRecordExists(string $key, string $value) {
        return Customer::where($key, $value)->first() != null;
    }

    // returns true if str only contain letters 
    private function containsOnlyLetters($str) {
        return preg_match('/^[A-Za-z]+$/', $str) === 1;
    }

    // validates first_name, last_name and phone_no
    // by making sure names only have letters 
    // and phone no only have numbers
    private function extraValidations($first_name, $last_name, $phone_no) {

        if (!ctype_digit($phone_no)) {
            return array(
                'isError' => true,
                "errors" => ['phone_no' => ['Phone Number must only have numeric values']],
                'status' => 422
            );
        }

        if (!$this->containsOnlyLetters($first_name)) {
            return array(
                'isError' => true,
                'errors' => ['first_name' => ['First Name must only have letters']],
                'status' => 422
            );
        }
        if (!$this->containsOnlyLetters($last_name)) {
            return array(
                'isError' => true,
                'errors' => ['last_name' => ['Last Name must only have letters']],
                'status' => 422
            );
        }

        return array('isError' => false);
    }


    // returns a list of all the custombers 
    // TODO: in future paginating can be implemented
    // but considering the current scope of the project
    // its not required
    public function index(Request $req){
        
        $records = Customer::all();

        return response()->json($records, 200);
    }

    // post method
    public function store(Request $req){

        $validated = $req->validate($this->validatorConditions);

        // validating names and phone_no
        $output = $this->extraValidations($validated['first_name'], $validated['last_name'], $validated['phone_no']);

        // if validation fails, return errors along with status
        if ($output['isError']) {
            return response()->json(['errors' => $output['errors']], $output['status']);
        }

        // transforming email and postal code
        $validated["email"] = strtolower($validated["email"]);
        $validated["postal_code"] = strtoupper($validated["postal_code"]);

        // removing white space from all 
        // the data
        foreach ($validated as $key => $value) {
            $validated[$key] = trim($value);
        }

        // if record exists, throw error
        if ($this->checkRecordExists('email', $validated['email']) != null) {
            return response()->json(['error' => 'Customer with email \'' . $validated["email"] . '\' already exists'], 400);
        }
        
        if ($this->checkRecordExists('phone_no', $validated['phone_no']) != null) {
            return response()->json(['error' => 'Customer with Phone Number \'' . $validated["phone_no"] . '\' already exists'], 400);
        }

        // create new customer
        try {
            $customerData = Customer::create($validated);
            return response()->json($customerData, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Unable to create record'], 500);
        }
    }



    public function update(Request $req, $id)
    {
        
        // validating names and phone_no
        $validated = $req->validate($this->validatorConditions);
    
        // if validation fails, return errors along with status
        $output = $this->extraValidations($validated['first_name'], $validated['last_name'], $validated['phone_no']);
        
        if ($output['isError']) {
            return response()->json(['errors' => $output['errors']], $output['status']);
        }

        // transforming email and postal code
        $validated['email'] = strtolower($validated['email']);
        $validated['postal_code'] = strtoupper($validated['postal_code']);

        // removing white space from all the data
        foreach ($validated as $key => $value) {
            $validated[$key] = trim($value);
        }

        // get the custober using id
        $customerData = Customer::find($id);
        if (!$customerData) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        // if record exists, with same email / phone_no
        // throw error
        if ($customerData->email != $validated["email"] && $this->checkRecordExists('email', $validated['email'], $id) != null) {
            return response()->json(['error' => 'Customer with email \'' . $validated["email"] . '\' already exists'], 409);
        }

        if ($customerData->phone_no != $validated["phone_no"] && $this->checkRecordExists('phone_no', $validated['phone_no'], $id) != null) {
            return response()->json(['error' => 'Customer with Phone Number \'' . $validated["phone_no"] . '\' already exists'], 409);
        }

        // Update the record
        try {
            $customerData->update($validated);
            return response()->json($customerData, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Unable to update record'], 500);
        }
    }
}
