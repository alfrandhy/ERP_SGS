<?php

namespace App\Http\Controllers;

use App\Models\Boq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BoqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boqs = Boq::orderBy('boq_code', 'ASC')->paginate(50);  
        return view('project.boq.index', compact('boqs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.boq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate([
            'boq_code' => 'required|max:255|unique:boqs',
            'project_code_id' => 'required',
            'part_dwg_no' => 'required|max:255',
            'description' => 'required',
            'detail_description' => 'nullable',
            'dimension' => 'required|max:255',
            'material' => 'required|max:255',
            'qty' => 'required|max:255',
            'unit' => 'required|max:255',
        ],
        [
            'boq_code.required' => 'Customer wajib diisi',
            'boq_code.max' => 'Nama maksimal 255 karakter',
            'project_code_id.required' => 'Project Code wajib diisi',
            'part_dwg_no.required' => 'Part No. wajib diisi',
            'part_dwg_no.max' => 'Nama maksimal 255 karakter',
            'description.required' => 'Description wajib diisi',
            'dimension.required' => 'Dimension wajib diisi',
            'dimension.max' => 'Nama maksimal 255 karakter',
            'material.required' => 'Material wajib diisi',
            'material.max' => 'Nama maksimal 255 karakter',
            'qty.required' => 'QTY wajib diisi',
            'qty.max' => 'Nama maksimal 255 karakter',
            'unit.required' => 'Unit wajib diisi',
            'unit.max' => 'Nama maksimal 255 karakter',
        ]);
        
        //tambah data produk
        DB::table('boqs')->insert([
            'boq_code'=>$request->boq_code,
            'project_code_id'=>$request->project_code_id,
            'part_dwg_no'=>$request->part_dwg_no,
            'description'=>$request->description,
            'detail_description'=>$request->detail_description,
            'dimension'=>$request->dimension,
            'material'=>$request->material,
            'qty'=>$request->qty,
            'unit'=>$request->unit,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    
            return redirect()->route('boq.index')  
                ->with('success', 'BOQ Added Successfully.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Boq $boq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boq $boq)
    {
        return view('project.boq.edit', compact('boq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boq $boq)
    {
        $request->validate([
            'boq_code' => 'required|unique:boqs|max:255',
            'project_code_id' => 'required',
            'part_dwg_no' => 'required|max:255',
            'description' => 'required',
            'detail_desctiption' => 'nullable',
            'dimension' => 'required|max:255',
            'material' => 'required|max:255',
            'qty' => 'required|max:255',
            'unit' => 'required|max:255'
        ],
        [
            'boq_code.required' => 'Customer wajib diisi',
            'boq_code.max' => 'Nama maksimal 255 karakter',
            'project_code_id.required' => 'Project Code wajib diisi',
            'part_dwg_no.required' => 'Part No. wajib diisi',
            'part_dwg_no.max' => 'Nama maksimal 255 karakter',
            'description.required' => 'Description wajib diisi',
            'dimension.required' => 'Dimension wajib diisi',
            'dimension.max' => 'Nama maksimal 255 karakter',
            'material.required' => 'Material wajib diisi',
            'material.max' => 'Nama maksimal 255 karakter',
            'qty.required' => 'QTY wajib diisi',
            'qty.max' => 'Nama maksimal 255 karakter',
            'unit.required' => 'Unit wajib diisi',
            'unit.max' => 'Nama maksimal 255 karakter',
        ]);
        
        //update data produk
        DB::table('boqs')->where('boq',$boq)->update([
            'boq_code'=>$request->boq_code,
            'project_code_id'=>$request->project_code_id,
            'part_dwg_no'=>$request->part_dwg_no,
            'description'=>$request->description,
            'detail_desctiption'=>$request->detail_desctiption,
            'dimension'=>$request->dimension,
            'material'=>$request->material,
            'qty'=>$request->qty,
            'unit'=>$request->unit,
            'updated_at'=>now()
        ]);
    
            return redirect()->route('boq.index')  
                ->with('success', 'BOQ Updated Successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boq $boq)
    {
        $boq->delete();  
        return redirect()  
            ->route('boq.index')  
            ->with('success', 'BOQ Deleted successfully.');
    }
}
