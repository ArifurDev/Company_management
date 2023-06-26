<?php

namespace App\Http\Controllers;

use App\Models\comopany;
use App\Models\empolyee;
use App\Models\empolyeereport;
use App\Models\siteriports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $empolyee = User::where('role', 'empolyees')->latest()->paginate(5);
        $comopanies = comopany::all();
        //create a new empolyee
        return view('dashbord.empolyee.create', compact('empolyee', 'comopanies'));
    }

    /**
     * live search
     */
    public function search(Request $request)
    {
        $output = ' ';
        $empolyee = User::where('role', 'empolyees')->orWhere('compony_name', 'Like', '%'.$request->search.'%')->orWhere('name', 'Like', '%'.$request->search.'%')->orWhere('email', 'Like', '%'.$request->search.'%')->orWhere('number', 'Like', '%'.$request->search.'%')->paginate(5);

        foreach ($empolyee as $empolye) {
            $output .=

            '<tr>
            <td> '.$empolye->compony_name.' </td>
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
            'number' => 'required',
            'role' => 'required',
            'compony_name' => 'required',
        ]);
        $comopany_id =  comopany::where('compony_name',$request->compony_name)->value('id');
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'number' => $request->number,
            'role' => $request->role,
            'compony_name' => $request->compony_name,
            'compony_id' => $comopany_id,
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);
        $notification = array(
            'message' => 'Account Create Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
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
        $comopanies = comopany::all();
        $empolyee = User::find($id);

        return view('dashbord.empolyee.edit', compact('empolyee', 'comopanies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comopany_id =  comopany::where('compony_name',$request->compony_name)->value('id');

        User::find($id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'gender' => $request->gender,
            'number' => $request->number,
            'compony_name' => $request->compony_name,
            'compony_id' => $comopany_id,
        ]);
        $notification = array(
            'message' => 'Account Update Successfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        $notification = array(
            'message' => 'Account delete Successfully',
            'alert-type' => 'info'
            );
        return redirect()->back()->with($notification);
    }


    /**
     *selected company all information show
     */
    public function info($id)
    {
      $empolyeereport = empolyeereport::where('compony_id',$id)->get();
      $com_name = comopany::where('id',$id)->value('compony_name');
      $empolyee_count = User::where('compony_id',$id)->count();

     $com_site_reports = siteriports::where('company',$com_name )->get();

      return view('dashbord.company.info',compact('empolyeereport','empolyee_count','com_name','com_site_reports'));
    }
}
