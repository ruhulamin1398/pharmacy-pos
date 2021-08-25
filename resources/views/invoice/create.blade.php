@extends('includes.app')
@section('content')


<div class="container pt-4 ">
    <div class="row">
        <div class="col-12 col-md-8">



            <table class="table table-striped table-hover table-bordered  " id="example">
                <thead class="thead-dark" >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Comapny Name</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i=1;
                    @endphp
                    @foreach ( $medicines as $medicine)

                    <tr>
                        <th scope="row">{{$i++}} </th>
                        <td>{{$medicine->name}} </td>
                        <td> {{$medicine->company}} </td>
                        <td>{{$medicine->price}}</td>
                        <td class="text-center">

                            <!-- update area -->

                            <div class="btn btn-success btn-sm btn-raised" onclick="addToCart( {{$medicine->id}},'{{$medicine->name}}','{{$medicine->price}}',)">
                                <i class="fas fa-shopping-cart" aria-hidden="true">

                                </i>
                            </div>





                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>

        </div>






        <div class="col-12 col-md-4 special-color-dark text-white p-4 rounded-top  ">

            <div class="row  ">

                <div class=" col-12 p-2 pb-0 special-color-dark text-white  font-weight-bold">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-light font-weight-bold text-left ">Sub Total :</div>
                        </div>
                        <div class="col-6" class="text-light font-weight-bold text-right" id="subTotal">0</div>
                    </div>



                    <hr class="bg-light">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-light font-weight-bold text-left ">discount :</div>
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control form-control-sm  " min="0" id="discount" value="0">
                        </div>

                    </div>




                    <hr class="bg-light">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-light font-weight-bold text-left ">Total :</div>
                        </div>
                        <div class="col-6" class="text-light font-weight-bold text-right" id="total"> 0</div>
                    </div>


                    <hr class="bg-light">
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6" class="text-light font-weight-bold " id="total">

                            <form action="{{route('invoices.store')}}" method="post" id="completeSaleForm">
                                @csrf
                                <input type="number" name="sub_total" value="0" id="sub_total" hidden>
                                <input type="number" name="discount" value="0" id="discount_total" hidden>
                                <input type="number" name="amount" value="0" id="amount_total" hidden>
                            </form>
                            <div class="btn btn-success  " onclick="completeSale()"> SELL</div>

                        </div>
                    </div>

                </div>






              
                <div class="col-12 p-4 pt-0">

                    <table class="table table-striped table-sm table-light ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">price</th>
                            </tr>
                        </thead>
                        <tbody id="cartTable">

                        </tbody>
                    </table>

                </div>



            </div>





        </div>

    </div>
</div>
</div>




@endsection


@section('js')

<script>
    var cart = {};
    var total_cart_price = 0;



    function printCart() {
        var html = "";
        var itr = 1;
        total_cart_price = 0;
        $.each(cart, function(i) {
            total_cart_price += cart[i].total;
            html += '<tr><th>' + itr++ + '</th> <td scope="row">' + cart[i].name + '</td>  <td >' + cart[i].quantity + '</td> <td >' + cart[i].total + '</td> <td > <div class="btn btn-danger btn-sm btn-raised" onclick="deleteFromCart(' + cart[i].id + ')" ><i class="fas fa-trash" aria-hidden="true"> </i> </div></td> </tr>';
        });
        $("#cartTable").html(html);

        var discount = $("#discount").val().trim();
        $("#subTotal").html(total_cart_price);
        $("#total").text(total_cart_price - discount);

        // inserting on form 
        $("#sub_total").val(total_cart_price);
        $("#discount_total").val(discount);
        $("#amount_total").val(total_cart_price - discount);
        


    }


    $("#discount").on('input', function() {
        printCart();
    })

    function addToCart(id, name, price) {

        var quantity = prompt("Quantity ");
        cart[id] = {
            'id': id,
            'name': name,
            'quantity': quantity,
            'total': price * quantity
        }
        printCart();

    }


    function deleteFromCart(id) {
        delete cart[id];
        printCart();

    }

    function completeSale() {

        $("#completeSaleForm").submit();

    }
</script>


@endsection