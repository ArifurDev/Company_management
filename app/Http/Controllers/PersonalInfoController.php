<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $personal_info =  PersonalInfo::all();
      return $personal_info;
      die();
      return view('dashbord.admin.Personal_info.index',compact('personal_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.admin.Personal_info.create');
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
            $request->url => 'url',
        ]);
        //PersonalInfo data store
        PersonalInfo::create([
            'email' => $request->email,
            'site_name' => $request->site_name,
            'url' => $request->url,
            'user_name' => $request->user_name,
            'user_id' => $request->user_id,
            'password' => $request->password,
            'verifi_code' => $request->verifi_code,
            'payment_date' => $request->payment_date,
            'why_create' => $request->why_create,
            'number' => $request->number,
            'note' => $request->note,
            'created_at' => now(),
        ]);
        $notification = array(
            'message' => 'Information submit Successfully',
            'alert-type' => 'success'
            );
       return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInfo $personalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal = PersonalInfo::find($id);
        return view('dashbord.admin.Personal_info.edit',compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PersonalInfo::find($id)->update([
            'email' => $request->email,
            'site_name' => $request->site_name,
            'url' => $request->url,
            'user_name' => $request->user_name,
            'user_id' => $request->user_id,
            'password' => $request->password,
            'verifi_code' => $request->verifi_code,
            'payment_date' => $request->payment_date,
            'why_create' => $request->why_create,
            'number' => $request->number,
            'note' => $request->note,
        ]);

        $notification = array(
            'message' => 'Information update Successfully',
            'alert-type' => 'success'
            );
       return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalInfo  $personalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PersonalInfo::find($id)->delete();
        $notification = array(
            'message' => 'Information Deleted',
            'alert-type' => 'success'
            );
       return redirect()->back()->with($notification);
    }
}
