<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categoria;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::select([
            'products.*',
            'categorias.categoria'
        ])
        ->join('categorias', 'products.id_categoria', '=', 'categorias.id')
        ->orderBy('products.id', 'ASC')
        ->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $reglas = Validator::make($request->all(),[
            'trademark' => 'required|min:3',
            'nameProduct' => 'required|min:3',
            'priceProduct' => 'required|numeric',
            'id_categoria' => 'required',
            'imgProduct' => 'required',
            'descriptionProduct' => 'required|min:3'
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
        }else{
            $data = new Product();
            $data->trademark = $request->trademark;
            $data->nameProduct = $request->nameProduct;
            $data->priceProduct = $request->priceProduct;
            $data->imgProduct = $request->imgProduct;
            $data->id_categoria= $request->id_categoria;
            $data->descriptionProduct=$request->descriptionProduct;
            $data->save();

            return response()->json([
                'status'=>'success'
            ]);
        }
    }

    public function sendEmail($token,$name)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);
        $reglas = Validator::make($request->all(), [
            'trademark' => 'required|min:3',
            'nameProduct' => 'required|min:3',
            'priceProduct' => 'required|numeric',
            'id_categoria' => 'required',
            'descriptionProduct' => 'required|min:3'
        ]);
        if (!$data) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Producto no encontrado'
            ], 404);
        }
        if ($reglas->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error de validación',
                'errors' => $reglas->errors()
            ], 400);
        }
        $data->fill($request->all());
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Producto actualizado correctamente',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        if($data != null){
            $data -> delete();
        } return response()->json([
            'status'=>'success'
        ]);
    }

    public function totalProducts()
    {
        $totalProducts = Product::count();
        return response()->json(['total' => $totalProducts]);
    }

    public function upload(Request $request){
        if ($request->hasFile('file')){
            $file  = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('products/'),$filename);

            return response()->json(['filename' =>  $filename]);
        }
        return response()->json(['error' => 'No se propocionó ningun archivo'],
        400);
    }

    public function verCategorias()
        {
            $categorias = Categoria::all();
            return response()->json($categorias);
        }
}
