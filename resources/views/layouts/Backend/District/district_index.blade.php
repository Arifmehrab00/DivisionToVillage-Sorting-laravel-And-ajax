@extends('layouts.Backend.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
			 	<a class="btn btn-primary my-3" href="{{ route('admin.district.create') }}">
			 		<i class="fa fa-plus-circle"></i>Add District
			 	</a>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        	   <td>SL.</td>
                        	   <td>Divtion Name</td>
                             <td>District Name</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        	@foreach($districts as $key => $district)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $district->divition->name }}</td>
                            <td>{{ $district->name }}</td>
                        		<td>
                        			<a title="Edit" class="btn btn-success" href="{{ route('admin.district.edit', $district->id) }}">
                        				<i class="fa fa-edit"></i>
                        			</a>
                      	            <button onclick="Delete({{ $district->id }})" title="Delete" type="button" class="btn btn-danger">
                      	            	<i class="fa fa-trash"></i>
                      	            </button>
                      	            <form style="display: none;" method="POST" action="{{ route('admin.district.destroy', $district->id) }}" id="delete_form_{{ $district->id }}">
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