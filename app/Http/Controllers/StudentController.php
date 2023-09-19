<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request) {
        $validatedPayload = $request->validate([
            'name' => 'required|max:255',
            'birthdate' => 'required',
            'address' => 'required',
            'phone' => 'required|number|max:14',
        ]);

        Student::create([
            'name' => $validatedPayload['name'],
            'birthdate' => $validatedPayload['birthdate'],
            'address' => $validatedPayload['address'],
            'phone' => $validatedPayload['phone'],
        ]);

        return;
    }
}
