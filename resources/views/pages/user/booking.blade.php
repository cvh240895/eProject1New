@extends('layouts.master')

@section('title', 'Home Page')

@section('style-libraries')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop

@section('styles')
    <style>
        .hide{
            display : none;
        }
        .error{
            color : red;
        }
    </style>
@stop

@section('content')
    <form method="POST">
        <legend>Booking Order</legend>
        <select name="ticket_type" id="type">
            <option value="">Chose a ticket which you want to order</option>
            @if(!empty($data))
                @foreach($data as $i=>$product)
                    <option value="{{$product->id}}">{{$product->pro_name}}</option>
                @endforeach
            @endif
            <button onclick="check()">Check</button>
        <div id="quantity" class="quantity hide">
            <p>Quantity</p> <input type="text" required name="quantity">
            @error('quantity')
                <span style="color :red">{{messages}}</span>
            @enderror
            <button type="submit">Add to cart</button>
        </div>
    </form>
    <button onclick="cart()">Go to cart</button>
@stop

@section('script')
    <script type="text/javascript">
        function check(){
            if(document.getElementById("type").value==""){
                alert("Please choose a ticket for order");
            }else{
                document.getElementById("quantity").classList.remove("hide");
            }
        }
        function cart(){
            window.location.href = "cart";
        }
    </script>
@stop