@extends('layouts.Backend.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
			 	<a class="btn btn-primary my-3" href="{{ route('admin.union.create') }}">
			 		<i class="fa fa-plus-circle"></i>Add Union
			 	</a>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        	   <td>SL.</td>
                        	   <td>Divtion Name</td>
                             <td>District Name</td>
                             <td>Upazila Name</td>
                             <td>Union Name</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        	@foreach($unions as $key => $union)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $union->divition->name }}</td>
                            <td>{{ $union->district->name }}</td>
                            <td>{{ $union->upazila->name }}</td>
                            <td>{{ $union->name }}</td>
                        		<td>
                        			<a title="Edit" class="btn btn-success" href="{{ route('admin.union.edit', $union->id) }}">
                        				<i class="fa fa-edit"></i>
                        			</a>
                      	            <button onclick="Delete({{ $union->id }})" title="Delete" type="button" class="btn btn-danger">
                      	            	<i class="fa fa-trash"></i>
                      	            </button>
                      	            <form style="display: none;" method="POST" action="{{ route('admin.union.destroy', $union->id) }}" id="delete_form_{{ $union->id }}">
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