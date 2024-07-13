<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Row;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('index');
    }

    public function generateForm(Request $request){
        $noOfRows = $request->rows;
        $data = compact('noOfRows');
        return view('form')->with($data);
    }

    public function store(Request $request){
        $formName = $request->input('formName');
        $rows = $request->input('rows');

        $form = Form::create(['name' => $formName]);

        foreach($rows as $row){
            Row::create([
                'first_name' => $row['firstName'],
                'last_name' => $row['lastName'],
                'qualification' => $row['qualification'],
                'dob' => $row['dob'],
                'form_id' => $form->id
            ]);
        }

        return url('/list');
    }

    public function viewList(Request $request){
        $forms = Form::all();
        $data = compact('forms');
        return view('list')->with($data);
    }

    public function edit(Request $request){
        $rows = Row::where('form_id', $request->id)->get();
        $form = Form::find($request->id); 
        $data = compact('rows','form');
        return view('edit')->with($data);
    }

    public function update(Request $request){
        $rows = $request->input('rows');
        $form_id = $request->input('form_id');
        $form_name = $request->input('formName');
        $form = Form::find($form_id);
        $form->name = $form_name;
        $form->save();
        foreach($rows as $row){
            $Row = Row::find($row['rowId']);
            if($Row){
                $Row->first_name = $row['firstName'];
                $Row->last_name = $row['lastName'];
                $Row->qualification = $row['qualification'];
                $Row->dob = $row['dob'];
                $Row->save();
            }
        }
        $message = " Form has been updated successfully!";
        return redirect('/list')->with('message', $message);
    }
}
