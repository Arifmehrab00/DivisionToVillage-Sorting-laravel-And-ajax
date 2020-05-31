@extends('layouts.Backend.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
			 	<a class="btn btn-primary my-3" href="{{ route('admin.divition.create') }}">
			 		<i class="fa fa-plus-circle"></i>Add Divition
			 	</a>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        	   <td>SL.</td>
                        	   <td>Divtion Name</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        	@foreach($divitions as $key => $divition)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $divition->name }}</td>
                        		<td>
                        			<a title="Edit" class="btn btn-success" href="{{ route('admin.divition.edit', $divition->id) }}">
                        				<i class="fa fa-edit"></i>
                        			</a>
                      	            <button onclick="Delete({{ $divition->id }})" title="Delete" type="button" class="btn btn-danger">
                      	            	<i class="fa fa-trash"></i>
                      	            </button>
                      	            <form style="display: none;" method="POST" action="{{ route('admin.divition.destroy', $divition->id) }}" id="delete_form_{{ $divition->id }}">
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