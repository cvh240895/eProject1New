@extends('layouts.master')

@section('title', 'Customer Management')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
        .hide{
            display : none;
        }
        .error{
            color : red;
        }
    </style>
@stop


@section('content')
        <div class="container">
        <!-- choose the search type -->        
        <select name="typeSearch" id="type">
            <option value="">Choose a search type</option>
            <option value="acc">Search by customer account</option> 
            <option value="id">Search by customer id</option> 
            <option value="num">Search by customer phone number</option>
            <option value="email">Search by customer email</option>
        </select>
        <!-- button to check kind of search type -->
        <button onclick="check()" >Check</button>
        <!-- search input corresponding to the search type  -->
        <div class="form-group">
            <input type="text" class="form-controller hide" id="searchByNumber" name="searchByNumber"></input>
            <input type="text" class="form-controller hide" id="searchByAcc" name="searchByAcc"></input>
            <input type="text" class="form-controller hide" id="searchById" name="searchById"></input>
            <input type="text" class="form-controller hide" id="searchByEmail" name="searchByEmail"></input>
        </div>
        <!-- button for show the result after search -->
        <button class="btnsearch hide" id="btnSearch" onclick="search()">Search</button>
        <!-- table of result after search -->
        <table border="1" class="cus hide" id = "cus">
            <thead>
                <tr>
                    <th></th>
                    <th>Information</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@stop

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript">
    function check(){
        let typeSearch = document.getElementById("type");
        let btnSearch = document.getElementById("btnSearch");
        //alert when type of search be not chosen
        if(typeSearch.value==""){
            alert("Type of search must be chosen");
        }else if(typeSearch.value=="num"){
        //search by phone number
            //show the input for search by number and hide other input
            document.getElementById("searchByNumber").classList.remove("hide");
            document.getElementById("searchByAcc").classList.add("hide");
            document.getElementById("searchById").classList.add("hide");
            document.getElementById("searchByEmail").classList.add("hide");
            btnSearch.classList.remove("hide");
            //js for search by phone number
            $('#searchByNumber').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/searchByNumber') }}',
                    data: {
                        'searchByNumber': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        //search by account
            //show the input for search by account and hide other input
        }else if(typeSearch.value == "acc"){
            document.getElementById("searchByAcc").classList.remove("hide");
            document.getElementById("searchByNumber").classList.add("hide");
            document.getElementById("searchByEmail").classList.add("hide");
            document.getElementById("searchById").classList.add("hide");
            btnSearch.classList.remove("hide");
            //js for search by account
            $('#searchByAcc').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/searchByAcc') }}',
                    data: {
                        'searchByAcc': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        //search by id
            //show the input for search by id and hide other input
        }else if(typeSearch.value == "id"){
            document.getElementById("searchByAcc").classList.add("hide");
            document.getElementById("searchByNumber").classList.add("hide");
            document.getElementById("searchById").classList.remove("hide");
            document.getElementById("searchByEmail").classList.add("hide");
            btnSearch.classList.remove("hide");
            //js for search by id
            $('#searchById').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/searchById') }}',
                    data: {
                        'searchById': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });   
        //search by email
            //show the input for search by email and hide other input    
        }else if(typeSearch.value == "email"){
            document.getElementById("searchByAcc").classList.add("hide");
            document.getElementById("searchByNumber").classList.add("hide");
            document.getElementById("searchById").classList.add("hide");
            document.getElementById("searchByEmail").classList.remove("hide");
            btnSearch.classList.remove("hide");
            //js for search by email
            $('#searchByEmail').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/searchByEmail') }}',
                    data: {
                        'searchByEmail': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });   
    }
}
        </script>
<script>
    //js for show the result after search
    function search(){
        let number = document.getElementById("searchByNumber").value;
        let acc = document.getElementById("searchByAcc").value;
        let id = document.getElementById("searchById").value;
        let email = document.getElementById("searchByEmail").value;
        let type = document.getElementById("type").value;
        //check search type and information to search enter or not
        if(type == "" && number=="" && acc=="" && id == "" && email ==""){
            alert("Search type must be chosen and information for seach must be enter");
        }else if(type != ""&&number=="" && acc=="" && id == "" && email =="" ){
            alert("Information for seach must be enter");
        }else if(type!="" && (number!=""||acc!=""||id!=""||email!="")){
            document.getElementById("cus").classList.remove("hide");
        }
        
    }
    //js for redirect to change password page
    function editpwd(id){
        window.location.href = "pwdChangeForm/"+id;
    }
    //js for redirect to change phone number page
    function editphone(id){
        window.location.href = "changePNForm/"+id;
    }
    //js for redirect to change email page
    function editemail(id){
        window.location.href = "changeEmailForm/"+id;
    }
</script>
@stop