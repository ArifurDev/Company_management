<?php

namespace App\Http\Controllers;

use App\Models\empolyee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class EmpolyeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $empolyee = User::where('role','empolyees')->latest()->paginate(5);
        //create a new empolyee
        return view('dashbord.empolyee.create',compact('empolyee'));
    }
    /**
     * live search
     */

    public function search(Request $request)
    {
        $output=" ";
        $empolyee =User::where('role','empolyees')->orWhere('name','Like','%'.$request->search.'%')->orWhere('email','Like','%'.$request->search.'%')->orWhere('number','Like','%'.$request->search.'%')->paginate(5);


        foreach($empolyee as $empolye)
        {
            $output.=

            '<tr>
            <td> '.$empolye->name.' </td>
            <td> '.$empolye->email.' </td>
            <td> '.$empolye->role.' </td>
            <td> '.$empolye->number.' </td>
            <td> '.$empolye->created_at.' </td>
            <td> '.'
            <a  class="btn btn-primary" href="/edit/empolyee/'.$empolye->id.'" title="edit">
                 '.'<i class="mdi mdi-border-color"></i></a>

            <a  class="btn btn-primary" href="/delete/empolyee/'.$empolye->id.'" title="delete forever">
                '.'<i class="mdi mdi-delete"></i></a>
            '.' </td>
            </tr>';

        }
        return response($output);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

          DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "gender" => $request->gender,
            "number" => $request->number,
            "role" => $request->role,
            "password" => bcrypt('$request->password'),
            "created_at" => now(),
         ]);
         return back()->withSuccess('Empolyee Account Create Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function show(empolyee $empolyee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empolyee = User::find($id);
        return view('dashbord.empolyee.edit',compact('empolyee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                User::find($id)->update([
                'name'=>$request->name,
                'role'=>$request->role,
                'gender'=>$request->gender,
                'number'=>$request->number,
               ]);

         return back()->withSuccess('Account Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        User::find($id)->delete();
        return back()->withSuccess('Account delete Successfully');
    }
}
