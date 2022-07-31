<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.pages.admins.index',['admins'=>Admin::with('media')->role('admin')->get()]);
    }


    public function create()
    {
      return view('admin.pages.admins.create');
    }


    public function store(Request $request)
    {
      $data = $request->validate([
          'name'=>'required',
          'password'=>'required',
          'image'=>'required',
      ]);

      $admin = Admin::create([
          'name'=>$data['name'],
          'password'=>Hash::make($data['password']),
      ]);

      $admin->addMedia($data['image'])->toMediaCollection('images');

      $admin->assignRole('admin');

      return redirect()->route('admins.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(Admin $admin)
    {

        return view('admin.pages.admins.edit',['admin'=>$admin]);
    }


    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'name'=>'required',
        ]);

      $admin->update([
        'name'=>$data['name'],
        'password'=>Hash::make($request->password),
      ]);

      if($request->hasFile('image')){
        $admin->addMedia($request->image)->toMediaCollection('images');

      }


      return redirect()->route('admins.index');

    }


    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index');
    }
}
