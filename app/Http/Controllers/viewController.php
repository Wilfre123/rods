<?php

namespace App\Http\Controllers;
use App\Models\userModel;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function view(){

  $datas = userModel::all();      
 return view ('view.view', compact('datas'));     
    }
    public function insertData(Request $request){
    
    $datas = userModel::all();
    $request->validate([
    'name1' => 'required',
    'name2' => 'required'
      ]);
       
    userModel::create([
     'name1' => $request->input('name1'),
     'name2' => $request->input('name2')
      ]);
      return view ('view.view', compact('datas'));
    }
    public function deleteData($id){
   
        $data = userModel::find($id);
        if ($data) {
            $data->delete();
        }
    }
    public function findData($id){

        $datas1 = userModel::find($id);
        $datas = userModel::all();


        return view('view.view', compact('datas1','datas'));

    }
    public function updateData(Request $request){

        $request->validate([
            'name1' => 'Required',
            'name2' => 'Required'
        ]);

        $data= userModel::findOrFail($request->id);

        if ($request->has('name1')) {
            $data->name1 = $request->input('name1');
        }
        if ($request->has('name2')) {
            $data->name2 = $request->input('name2');
        }
        $data->save();

        return redirect()->back()->with('success', 'Updated Successfully');
    }
    public function processString(Request $request){
        
  $datas = userModel::all(); 
 // Validate the inputs (arrays required)
 $request->validate([
    'name1' => 'required|array',
    'name2' => 'required|array',
]);

// Get the input arrays
$input1 = $request->input('name1');
$input2 = $request->input('name2');

// Use implode to join the arrays into strings
$name1 = implode(',', $input1);
$name2 = implode(',', $input2);

$item = new userModel();
$item->name1 =  $name1;
$item->name2 = $name2;
$item->save();


// Now you can process or return the joined strings
return view('view.view', ['datas'=>$datas]);

    }
}
