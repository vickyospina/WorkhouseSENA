<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de compra</title>
<style>
    body {
        position: relative;
        color: #555555;
        background: #FFFFFF; 
        font-family: Arial, sans-serif;
        font-size: 14px;
     
    }
    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
      
    }
    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }
    #fact {
        /*position: relative;*/
        float: left;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
      
    }
    section {
        clear: left;
    }
 
    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }
 
    #faccomprador {
        width: 50%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom:20px;
    }
    #faccomprador thead {
        padding: 20px;
        background: #25282b;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }
    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }
    #facproducto thead {
        padding: 20px;
        background: #17191b;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }
</style>

<body>
  
    <header>
         <div id="logo">
           
        </div>  
        <div>
            <table id="datos">
                <thead>
                    <tr>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                           
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
          
                <p><strong>Id Compra N?? {{$compra->id}}</strong></p>
                <p style="font-size: 10px;"><strong>Estado:  {{$compra->estado}} </strong></p>
        </div>
    </header>
    <br>

   
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>Usuario</th>
                        <th>Fecha Compra</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($usuarios as $usuario)
                        @if($compra->idUsuario == $usuario->id)
                        <td> {{$usuario->nombre}} </td>
                        @endif
                        @endforeach
                        <td>{{$compra->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Compra</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleCompras as $detalleCompra)
                    <tr>
                        @foreach ($productos as $producto)
                            @if($detalleCompra->idProducto == $producto->id)
                            <td>{{$producto->nombreProducto}}</td>
                            @endif
                            @endforeach
                        <td>{{$detalleCompra->cantidad}}</td>
                        <td>s/ {{$detalleCompra->precio}}</td>
                        <td>s/ {{number_format($detalleCompra->cantidad*$detalleCompra->precio,2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                
                   
                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{number_format($subtotal,2)}}<p>
                        </td>
                    </tr>
                  
                
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL COMPRA:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{number_format($compra->precioTotal,2)}}<p>
                        </td>
                    </tr>
                  
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        Ferreter??a L??pez
        <div id="datos">
            <p id="encabezado">
               
            </p>
        </div>
    </footer>
</body>

</html>