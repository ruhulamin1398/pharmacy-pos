@extends('includes.app')
@section('content')



<div class="container">




<nav class="navbar navbar-dark special-color-dark mt-4">
                <a class="navbar-brand text-light"> Sale Stats </a>
                <div>
                    <form method="get">
                        @csrf
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <input type="date" name="startDate" value={{$_GET["startDate"]}} class="form-control mb-2" id="inlineFormInput" required>
                            </div>
                            <div class="col-auto">
                                <input type="date" name="endDate" value={{$_GET["endDate"]}} class="form-control mb-2" id="inlineFormInput" required>
                            </div>


                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mt-3">Show</button>
                            </div>

                        </div>

                    </form>
                    </di>
            </nav>
            



<br>


            
<table class="table table-striped table-hover table-bordered " id="example">
	<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Date</th>
			<th scope="col">Amount</th>
		</tr>
	</thead>
	<tbody>
	
    @php 
    $i=1;
    @endphp
	@foreach ( $reports as $date =>$amount )

		<tr>
			<th scope="row">{{$i++}} </th>
			<td>{{$date}} </td>
			<td>{{$amount}} </td>
			



	</tr>
		
        
        @endforeach

</tbody>
</table>






</div>



@endsection