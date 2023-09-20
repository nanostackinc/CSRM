<?php

namespace App\Http\Controllers;

use App\Models\Parent_;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        return Student::all();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            if ($request->input('parents')) {
                Validator::make($request->all(), [
                    'parents.*.relationId' => 'required|number|exists:relations,id',
                    'parents.*.name' => 'required|max:255',
                    'parents.*.occupation' => 'required|max:255',
                    'parents.*.address' => 'required',
                    'parents.*.phone' => 'required|number|max:14',
                ]);
            }

            $validatedPayload = $request->validate([
                'name' => 'required|max:255',
                'birthdate' => 'required',
                'address' => 'required',
                'phone' => 'required|number|max:14',
            ]);

            $studentId = Student::create([
                'name' => $validatedPayload['name'],
                'birthdate' => $validatedPayload['birthdate'],
                'address' => $validatedPayload['address'],
                'phone' => $validatedPayload['phone'],
            ])->id;

            $parents = $request->input('parents');
            foreach ($parents as $parent) {
                Parent_::create([
                    'student_id' => $studentId,
                    'relation_id' => $parent['relationId'],
                    'name' => $parent['name'],
                    'occupation' => $parent['occupatino'],
                    'address' => $parent['address'],
                    'phone' => $parent['phone'],
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
