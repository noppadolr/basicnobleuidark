<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\supplier;

class SupplierController extends Controller
{
    public function SupplierAll(){
        $supp = supplier::query()->latest()->get();
        return view('backend.supplier.supplier_all',compact('supp'));
    }
    //end method
    public function AddSupplier(Request $request){
//               dd($request->all());
        supplier::insert([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('supplier.all')->with('supplierAdded','Supplier Added');
    }
    //End AddSupplier method






}
