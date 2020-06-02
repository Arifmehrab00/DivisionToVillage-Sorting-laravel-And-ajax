@extends('layouts.Backend.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
			 	<a class="btn btn-primary my-3" href="{{ route('admin.upazila.create') }}">
			 		<i class="fa fa-plus-circle"></i>Add Upazila
			 	</a>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        	   <td>SL.</td>
                        	   <td>Divtion Name</td>
                             <td>District Name</td>
                             <td>Upazila Name</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        	@foreach($upazilas as $key => $upazila)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $upazila->divition->name }}</td>
                            <td>{{ $upazila->district->name }}</td>
                            <td>{{ $upazila->name }}</td>
                        		<td>
                        			<a title="Edit" class="btn btn-success" href="{{ route('admin.upazila.edit', $upazila->id) }}">
                        				<i class="fa fa-edit"></i>
                        			</a>
                      	            <button onclick="Delete({{ $upazila->id }})" title="Delete" type="button" class="btn btn-danger">
                      	            	<i class="fa fa-trash"></i>
                      	            </button>
                      	            <form style="display: none;" method="POST" action="{{ route('admin.upazila.destroy', $upazila->id) }}" id="delete_form_{{ $upazila->id }}">
                      	            	@csrf
                      	            	@method('DELETE')
                      	            </form>
                      	            
                        		</td>
                        	</tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection