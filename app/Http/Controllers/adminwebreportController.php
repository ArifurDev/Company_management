<?php

namespace App\Http\Controllers;

use App\Models\siteriports;
use Illuminate\Http\Request;

class adminwebreportController extends Controller
{
    public function index()
    {
        $reportinfo =siteriports::latest()->paginate(30);
        $reportinfo_treshed =siteriports::onlyTrashed()->get();
        return view('dashbord.admin.adminwebreportshow',compact('reportinfo','reportinfo_treshed'));

    }
    public function create()
    {
        return view('dashbord.admin.adminreportesweb');
    }
    public function store(Request $request)
    {
        $request->validate([
            $request->url => "url",
        ]);
        //siterepord data store
        siteriports::create([
            "site_name" => $request->site_name,
            "url" => $request->url,
            "user_name" => $request->user_name,
            "user_id" => $request->user_id,
            "password" => $request->password,
            "verifi_code" => $request->verifi_code,
            "payment_date" => $request->payment_date,
            "created_at" => now(),
         ]);
         return back()->withSuccess('Information submit Successfully');

   }
   public function edit( $id)
    {
       $sitereports = siteriports::find($id);
       return view('dashbord.admin.adminwebreportedit',compact('sitereports'));
    }
    public function update(Request $request,$id)
    {
        if($request->site_name || $request->url || $request->user_name ||$request->user_id ||$request->password ||$request->verifi_code ||$request->payment_date){
            siteriports::find($id)->update([
                "site_name" => $request->site_name,
                "url" => $request->url,
                "user_name" => $request->user_name,
                "user_id" => $request->user_id,
                "password" => $request->password,
                "verifi_code" => $request->verifi_code,
                "payment_date" => $request->payment_date,
              ]);
                return back()->withSuccess('Information update Successfully');

        }else {
            return back();
        }

    }
    public function destroy($id)
    {
         siteriports::find($id)->delete();
         return back()->withSuccess('Information tem delete ');
    }
    public function restor($id)
    {
         siteriports::onlyTrashed()->find($id)->restore();
         return back()->withSuccess('Information restore Successfully');

    }
    public function delete($id)
    {
         siteriports::onlyTrashed()->find($id)->forceDelete();
         return back()->withSuccess('Site info Deleted Forever!');


    }

}
