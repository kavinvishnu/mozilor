<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Imports\ProductImport;
use Session;
use Excel;
use File;
use Log;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product_import_view(Request $request){
    	return view('product.import_view');
    }

    public function product_import(Request $request){
    	set_time_limit(0);
	    //validate the xls file
	    $this->validate($request, array(
	        'file'      => 'required'
	    ));
	 	$errordata = [];
	    if($request->hasFile('file')){
	        $extension = File::extension($request->file->getClientOriginalName());
	        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
	            // Excel::import(new Product,$request->file('file'));
	            $path = $request->file->getRealPath();
	            Excel::import(new ProductImport, $request->file);
           		Session::flash('success', 'Data has successfully imported');
        		return redirect()->back();
	        }
	        else {
            	Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
            	return back();
        	}
	    }else{
	    	Session::flash('error', 'Please Select a file.!! Please upload a valid xls/csv file..!!');
            	return back();
	    }
	    return back();
    }

    public function product_import_format(){
    	$headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename="productfileformat.csv"'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
			 ];	
		$filename="productfileformat.csv";
        $columns=["sno","product_name","price","sku","description"];
        $file = fopen($filename, 'w');
        fputcsv($file, $columns);
        fclose($file);
        return response()->download($filename, 'productfileformat.csv', $headers);
    }

    public function view_product(){
    	$data = Product::all();
		return view('product/view_product')->with('data',$data);
    }

    public function edit_product(Request $request){
    	$id = $request->input('id');
		$data = Product::find($id);
		return view('product/edit_product')->with('data',$data);
    }

    public function edit_product_data(Request $request){
		$id = $request->input('id');
		$product = Product::find($id);
		$product->product_name = $request->input('product_name');
		$product->price = $request->input('price');
		$product->sku = $request->input('sku');
		$product->description = $request->input('description');
		$product->save();
		return redirect('product_view')->with('msg', 'successfully edited');	
    }
}
