@extends('includes.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">

            <form action="{{route('medicines.store')}}" method="post" >
@csrf
                <!-- Material input -->
             

                <!-- Material input -->
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="name" value="" id="inputfirstname"
                        class="form-control">
                    <label for="inputfirstname">Medicine Name</label>
                </div>

                <!-- Material input -->
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="company" value="" id="inputlastname"
                        class="form-control">
                    <label for="inputlastname">Company Name</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="price" value="" id="inputlastname"
                        class="form-control">
                    <label for="inputlastname">Price</label>
                </div>
                <!-- Material input -->
                <div class="md-form">

                    <input type="submit" name="submit" value="Add" id="inputsubmit" class="form-control special-color-dark text-light">

                </div>



            </form>
        </div>
    </div>
</div>
<!-- Horizontal material form -->























@endsection