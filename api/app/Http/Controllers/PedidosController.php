<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Product;
use App\Models\ProductoPedido;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;





class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = Pedido::select(['pedidos.*','users.name','users.email','users.img'
    ])->join('users','pedidos.id_user','=','users.id')
    ->orderBy('pedidos.id','DESC')
    ->get();

    $all = [];
    foreach ($data as $item) {
        $products = ProductoPedido::select(['productos_pedidos.*','products.name','products.img','products.description'])
        ->join('products','productos_pedidos.id_product','=' ,'products.id')
        ->where('id_product',$item->id)
        ->get();

        $all [] = [
            'pedido'=>$item, 
            'productos'=>$products
        ];
        
    }

        return response()->json([
            'success'=>true,
            'data'=>$all
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
        //En caso de que no se haya iniciado sesion
        $usuario = User::where('email',$request->email)->first();

        if($usuario==null){
            $usuario = new User();
            $usuario->name = $request->name.' '.$request->lastname;
            $usuario->email = $request->email;
            $password = explode("@",$request->email)[0];
            $usuario->password = Hash::make($password);
            $usuario->img = 'default.jpg';
            $usuario->save();
        }

        //add pedido
        //Este funciona para poder agregar los productos
        $reglas = Validator::make($request->all(),[
            'address'=>'required|min:3',
            'code'=>'required|min:5',
            'country'=>'required|min:5',
            'state'=>'required|min:3',
            'phone'=>'required|min:10',
            'references'=>'required|min:3',
            'total'=>'required|numeric',
            'name'=>'required|min:3',
            'email'=>'required|email',
            'lastname'=>'required|min:3',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
        }else{
            $pedido = new Pedido();
            $pedido->address = $request->address;
            $pedido->code = $request->code;
            $pedido->country = $request->country;
            $pedido->state = $request->state;
            $pedido->phone = $request->phone;
            $pedido->references = $request->references;
            $pedido->status = 'En preparacion...';
            $pedido->total = $request->total;
            $pedido->id_user = $usuario->id;
            $pedido->save();

            //insertar productos
            foreach ($request->productos as $p) {
                $prod = Product::find($p["id_producto"]);
                $prodpe =  new ProductoPedido();
                $prodpe->id_pedido = $pedido->id;
                $prodpe->id_product = $p["id_producto"];
                $prodpe->cantidad= $p["cantidad"];
                $prodpe->precio = $prod->price;
                $prodpe->save();
            }

            return response()->json([
                'status'=>'success'
            ]);
        }
        /*
        $validacion = $request->validate([
            'address'=>'required|min:3',
            'code'=>'required|min:5',
            'country'=>'required|min:5',
            'state'=>'required|min:3',
            'phone'=>'required|min:10',
            'references'=>'required|min:3',
            'status'=>'required|min:3',
            'total'=>'required|numeric',
            'name'=>'required|min:3',
            'email'=>'required|email',
            'lastname'=>'required|min:3',
        ]);

        //En caso de que no se haya iniciado sesion
        $usuario = User::where('email',$request->email)->first();

        if($usuario==null){
            $usuario = new User();
            $usuario->name = $request->name.' '.$request->lastname;
            $usuario->email = $request->email;
            $usuario->password = explode("@",$request->email)[0];
            $usuario->password = Hash::make($password);
            $usuario->img = 'default.jpg';
            $usuario->save();
        }

        //Agregar un pedido
        $pedido = new Pedido();
        $pedido->address = $request->address;
        $pedido->code = $request->code;
        $pedido->country = $request->country;
        $pedido->state = $request->state;
        $pedido->phone = $request->phone;
        $pedido->references = $request->references;
        $pedido->status = 'En preparacion...';
        $pedido->total = $request->total;
        $pedido->id_user = $usuario->id;
        $pedido->save();

        return response()->json([
            'status'=>'success',
            'pedido'=>$pedido
        ]);
        */

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pedido::select(['pedidos.*','users.name','users.email','users.img'
    ])->join('users','pedidos.id_user','=','users.id')
    ->orderBy('pedidos.id','DESC')
    ->get();

    $all = [];
    foreach ($data as $item) {
        $products = ProductoPedido::select(['productos_pedidos.*','products.name','products.img','products.description'])
        ->join('products','productos_pedidos.id_product','=' ,'products.id')
        ->where('products_pedidos.id_product',$data->id)
        ->get();

        $all [] = [
            'pedido'=>$item, 
            'productos'=>$products
        ];
        
    }

        return response()->json([
            'success'=>true,
            'data'=>$all
        ]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function generarPDF()
    {
        $name="Jose";
        $pdf = Pdf::loadView('reports.compra',[]);
        return $pdf->stream();
    }
}

