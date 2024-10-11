<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            
        }
    </style>
</head>
<body>
    <header>
        <h1>ORDEN DE COMPRA DE EZ-BIKER</h1>
    </header>
    <main>
        <h2>Los productos que compraste son:</h2>
        <table>
            <thead>
                <tr>
                    <th>#Producto</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Sub-Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $contador=1;
                    $total+=$->precio * $->cantidad;
                @endphp
                @foreach ($products as $product) 
                    <tr>
                        <td colspan="6" style="text-align: right">
                            <h3>Total: ${{ number_format($totl,2) }}</h3>
                        
                        </td>
                        <td>{{ $contador }}</td>
                        <td>{{ $p->code }}</td>
                        <td>{{ $p->name }}</td>
                        <td style="text-align:center;">${{number_format($p->precio,2)  }}</td>
                        <td style="text-align:center;">{{ $p->cantidad }}</td>
                        <td style="text-align:center;">${{ number_format($p->precio * $p->cantidad)  }}</td>
                    </tr>
                    @php $contador++; @endphp
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>