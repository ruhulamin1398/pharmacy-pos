@extends('includes.app')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-6">

            <form action="{{route('medicines.update',$medicine->id)}}" method="post" >
@csrf
@method("put")
                <!-- Material input -->
             

                <!-- Material input -->
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="name" value="{{$medicine->name}}" 
                        class="form-control">
                    <label for="inputfirstname">Medicine Name</label>
                </div>

                <!-- Material input -->
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="company" value="{{$medicine->company}}" 
                        class="form-control">
                    <label for="inputlastname">Company Name</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" name="price" value="{{$medicine->price}}" 
                        class="form-control">
                    <label for="inputlastname">Price</label>
                </div>
                <!-- Material input -->
                <div class="md-form">

                    <input type="submit" name="submit" value="Update" id="inputsubmit" class="form-control">

                </div>



            </form>
        </div>
    </div>
</div>
<!-- Horizontal material form -->

























@endsection