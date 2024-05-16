<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
            <h1>Order Status...!</h1>
   {{-- <table>
        <thead>
        <tr>
        <th><b>Product Name:</b> {{$name}}</th><br>
        <th><b>Product Price:</b>{{$price}}</th><br>
        <th><b>Product Quantity:</b>{{$qty}}</th><br>
        <th><b>Total Price:</b>{{$total}}</th><br>
        
        </tr>
        </thead>
    </table> --}}
    
    @foreach ($orders as $order)
    <table>
        <thead>
            <tr>
                <th><b>Product Name:</b> {{$order->name}}</th><br>
                <th><b>Product Price:</b>{{$order->price}}</th><br>
                <th><b>Product Qty:</b>{{$order->qty}}</th><br>
                <th><b>Total Price:</b>{{$order->total}}</th><br>
                
            </tr>
        </thead>
    </table>
    @endforeach

    <h3>{{$content == "OTW" ? "On The Way" : ($content == "P" ? "Pending" : "Deliverd")}} </h3>
</body>
</html>