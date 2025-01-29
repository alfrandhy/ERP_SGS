<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('code', 'ASC')->paginate(50);  
        return view('project.customer.index', compact('customers')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $rules = [  
        //     'customer' => 'required',  
        //     'code' => 'required',
        //     'location' => 'required',
        //     'attention' => 'required',
        //     'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'  
        // ];

        // if(!empty($request->logo)){
        //     //maka proses berikut yang dijalankan
        //     $fileName = 'foto-'.uniqid().'.'.$request->logo->getClientOriginalExtension();
        //     //setelah tau fotonya sudah masuk maka tempatkan ke public
        //     $request->foto->move(public_path('image'), $fileName);
        // } else {
        //     $fileName = 'nophoto.jpg';
        // }

        // $request->validate($rules);
        // $customer = Customer::create($request->all());

        // melakukan validasi data
    $request->validate([
        'customer' => 'required|max:125|unique',
        'code' => 'required|max:5|unique',
        'location' => 'max:255',
        'attention' => 'max:125',
        'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ],
    [
        'customer.required' => 'Customer wajib diisi',
        'customer.max' => 'Nama maksimal 125 karakter',
        'code.required' => 'Code wajib diisi',
        'code.max' => 'Code maksimal 5 karakter',
        'logo.max' => 'Foto maksimal 2 MB',
        'logo.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'logo.image' => 'File harus berbentuk image'
    ]);
    
    //jika file foto ada yang terupload
    if(!empty($request->logo)){
        //maka proses berikut yang dijalankan
        $fileName = 'foto-'.uniqid().'.'.$request->logo->extension();
        //setelah tau fotonya sudah masuk maka tempatkan ke public
        $request->logo->move(public_path('image'), $fileName);
    } else {
        $fileName = 'nophoto.jpg';
    }
    
    //tambah data produk
    DB::table('customers')->insert([
        'customer'=>$request->customer,
        'code'=>$request->code,
        'attention'=>$request->attention,
        'location'=>$request->location,
        'logo'=>$fileName,
        'created_at'=>now(),
        'updated_at'=>now()
    ]);

        return redirect()->route('customer.index')  
            ->with('success', 'Customer Added Successfully.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('project.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // $rules = [  
        //     'customer' => 'required',  
        //     'code' => 'required',
        //     'location' => 'required',
        //     'attention' => 'required',
        //     'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'  
        // ];

        // if(!empty($request->logo)){
        //     //maka proses berikut yang dijalankan
        //     $fileName = 'foto-'.uniqid().'.'.$request->logo->getClientOriginalExtension();
        //     //setelah tau fotonya sudah masuk maka tempatkan ke public
        //     $request->foto->move(public_path('image'), $fileName);
        // } else {
        //     $fileName = $customer->logo;
        // }

        // $customer->update([  
        //     'customer' => $request->get('customer'),  
        //     'code' => $request->get('code'),  
        //     'location' => $request->get('location'),  
        //     'attention' => $request->get('attention'),  
        //     'logo' => $request->get('logo')
        // ]);

        // $request->validate($rules);
        // $customer->update($request->all());

        // validasi data

    $request->validate([
        'customer' => 'required|max:125|unique',
        'code' => 'required|max:5|unique',
        'location' => 'max:255',
        'attention' => 'max:125',
        'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
    ],
    [
        'customer.required' => 'Customer wajib diisi',
        'customer.max' => 'Nama maksimal 125 karakter',
        'code.required' => 'Code wajib diisi',
        'code.max' => 'Code maksimal 5 karakter',
        'logo.max' => 'Foto maksimal 2 MB',
        'logo.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'logo.image' => 'File harus berbentuk image'
    ]);
 
 
    //foto lama
    $fotoLama = DB::table('customers')->select('logo')->where('customer',$customer)->get();
    foreach($fotoLama as $f1){
        $fotoLama = $f1->logo;
    }
 
    //jika foto sudah ada yang terupload
    if(!empty($request->logo)){
        //maka proses selanjutnya
        if(!empty($fotoLama->logo)) unlink(public_path('image'.$fotoLama->logo));
        //proses ganti foto
        $fileName = 'foto-'.$request->customer.'.'.$request->logo->extension();
        //setelah tau fotonya sudah masuk maka tempatkan ke public
        $request->logo->move(public_path('image'), $fileName);
    } else{
        $fileName = $fotoLama;
    }
 
    //update data produk
    DB::table('customers')->where('customer',$customer)->update([
        'customer'=>$request->customer,
        'code'=>$request->code,
        'attention'=>$request->attention,
        'location'=>$request->location,
        'logo'=>$fileName,
        'updated_at'=>now()
    ]);

        return redirect()->route('customer.index')  
            ->with('success', 'Customer Added Successfully.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();  
        return redirect()  
            ->route('customer.index')  
            ->with('success', 'Customer updated successfully.');
    }
}
