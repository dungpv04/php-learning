<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    private $employeeModel;

    public function __construct(){
        $this->employeeModel = new Employee();
    }
    public function index()
    {
        
        $employees = $this->employeeModel::all();
        session_start();
        $_SESSION['data'] = [];
        foreach ($employees as $employee) {
            $_SESSION['employees'][$employee['id']] = $employee;
        }
        
        return view('user.index');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if ($this->employeeModel::insert([
                'name'=> $name,
                'email'=> $email,
                'phone'=> $phone,
                'address' => $address
            ])) {
                return redirect()->route('employee.index')->with('success','insert employee successfully');
            }
        }
    }

    public function update(Request $request){
        $id = $request->query('id'); // Access the 'id' query parameter
        return view('user.update', compact('id'));
    }

    public function submitUpdate(Request $request){
        $id = $request->query('id');
        $query = $this->employeeModel::where('id', $id)->update([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'phone'=> $request->input('phone'),
            'address'=> $request->input('address'),
        ]);

        if ($query) {
            return redirect()->route('employee.index')->with('success','');
        }
    }

}
