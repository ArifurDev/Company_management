<?php

namespace App\Http\Controllers;

use App\Models\comopany;
use App\Models\siteriports;
use Illuminate\Http\Request;

class adminwebreportController extends Controller
{
    public function index()
    {
        $reportinfo = siteriports::latest()->paginate(30);
        $reportinfo_treshed = siteriports::onlyTrashed()->get();

        return view('dashbord.admin.adminwebreportshow', compact('reportinfo', 'reportinfo_treshed'));
    }

    public function create()
    {
        $componies = comopany::all();

        return view('dashbord.admin.adminreportesweb', compact('componies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            $request->url => 'url',
        ]);
        //siterepord data store
        siteriports::create([
            'company' => $request->company,
            'email' => $request->email,
            'site_name' => $request->site_name,
            'url' => $request->url,
            'user_name' => $request->user_name,
            'user_id' => $request->user_id,
            'password' => $request->password,
            'verifi_code' => $request->verifi_code,
            'payment_date' => $request->payment_date,
            'created_at' => now(),
        ]);

        return back()->withSuccess('Information submit Successfully');
    }

   public function edit($id)
   {
       $componies = comopany::all();
       $sitereports = siteriports::find($id);

       return view('dashbord.admin.adminwebreportedit', compact('sitereports', 'componies'));
   }

    public function update(Request $request, $id)
    {
        if ($request->site_name || $request->url || $request->user_name || $request->user_id || $request->password || $request->verifi_code || $request->payment_date) {
            siteriports::find($id)->update([
                'company' => $request->company,
                'email' => $request->email,
                'site_name' => $request->site_name,
                'url' => $request->url,
                'user_name' => $request->user_name,
                'user_id' => $request->user_id,
                'password' => $request->password,
                'verifi_code' => $request->verifi_code,
                'payment_date' => $request->payment_date,
            ]);

            return back()->withSuccess('Information update Successfully');
        } else {
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

    /**
     * web report search
     */
    public function search(Request $request)
    {
        $output = ' ';
        $siteriports = siteriports::where('company', 'Like', '%'.$request->search.'%')->orWhere('email', 'Like', '%'.$request->search.'%')->orWhere('site_name', 'Like', '%'.$request->search.'%')->orWhere('url', 'Like', '%'.$request->search.'%')->orWhere('user_name', 'Like', '%'.$request->search.'%')->orWhere('user_id', 'Like', '%'.$request->search.'%')->orWhere('password', 'Like', '%'.$request->search.'%')->orWhere('verifi_code', 'Like', '%'.$request->search.'%')->orWhere('payment_date', 'Like', '%'.$request->search.'%')->get();

        foreach ($siteriports as $siteriport) {
            $output .=

            '<tr>
            <td> '.$siteriport->company.' </td>
            <td> '.$siteriport->email.' </td>
            <td> '.$siteriport->site_name.' </td>
            <td> '.$siteriport->url.' </td>
            <td> '.$siteriport->user_name.' </td>
            <td> '.$siteriport->user_id.' </td>
            <td> '.$siteriport->password.' </td>
            <td> '.$siteriport->verifi_code.' </td>
            <td> '.$siteriport->payment_date.' </td>
            <td> '.$siteriport->created_at.' </td>
            <td> '.'
            <a  class="btn btn-primary" href="/adminwebreport/edit/'.$siteriport->id.'" title="edit">
                 '.'<i class="mdi mdi-border-color"></i></a>

            <a  class="btn btn-primary" href="/adminwebreport/destroy/'.$siteriport->id.'" title="edit">
                '.'<i class="mdi mdi-delete"></i></a>
            '.' </td>
            </tr>';
        }

        return response($output);
    }
}
