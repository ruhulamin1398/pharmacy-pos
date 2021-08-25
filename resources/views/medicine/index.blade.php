@extends('includes.app')
@section('content')

<div class="container mt-4">


<table class="table table-striped table-hover table-bordered " id="example">
	<thead class="thead-dark">
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
			
			<a href="{{route('medicines.edit',$medicine->id)}}" 
			  class="btn btn-success btn-sm btn-raised" >
				<i class="fas fa-edit" aria-hidden="true">
				
				</i>
			</a>



<!-- Delete Area -->


	<form method="post"  action ="{{route('medicines.destroy',$medicine->id)}}"  id="delete{{$medicine->id}}"   style="display:none; " >
    @csrf
    @method("DELETE")
			<input value="{{$medicine->id}}" name = 'uid' />

			</form>




			<button   onclick="
				document.getElementById('delete{{$medicine->id}}').submit();
				
				
	

			" class="btn btn-danger btn-sm btn-raised" >
				<i class="fas fa-trash" aria-hidden="true">
				
				</i>
			</button>

		</td>
	</tr>
		
        
        @endforeach

</tbody>
</table>

</div>

</div>






@endsection