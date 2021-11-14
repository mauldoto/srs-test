<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DataRequest;

use Session;

class UserController extends Controller
{
    function login(UserRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        Session::forget('user');
        $response = Http::post('https://slab.srs-ssms.com/api/admin/loginuserlab/' . $email . '/' . $password);
        if ($response["success"]) {
            Session::put('user', $response);
            return redirect('/data-sample')->with(['success' => 'Login Berhasil']);
        }

        return back()->withErrors(['errors' => 'Error, Login Gagal']);
    }

    function loginView(Request $request)
    {
        return view('auth.login');
    }

    function mainView(Request $request)
    {
        $data = $request->session()->has('data') ? $request->session()->get('data') : false;

        return view('contents.sample', [
            'dataSample' => $data,
            'loginInfo'  => $request->session()->has('success')
        ]);
    }

    function getSampledata(DataRequest $request)
    {
        $sampleId = $request->sample_id;

        $response = Http::get('https://slab.srs-ssms.com/api/admin/gethasilanalisas/' . $sampleId);
        $data = [];
        $data['data_sample_id'] = $response['data_sampels_id'];
        $data['tahun'] = $response['tahun'];
        $data['simbol'] = $response['simbol'];
        $data['parameters_id_s'] = $response['parameters_id_s'];
        $data['kode_contoh'] = $response['kode_contoh'];
        $data['batch'] = $response['batch'];
        $data['hasil'] = $response['hasil'];
        $data['no_lab'] = $response['no_lab'];

        return redirect('/data-sample')->with(['data' => $data]);
    }

    function logout(Request $request)
    {
        Session::flush();
        return redirect('/login');
    }

}
