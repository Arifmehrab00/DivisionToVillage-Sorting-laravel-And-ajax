@extends('layouts.Backend.master')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			 <div class="card-body">
			 	@if(isset($divitionEdit))
                <h3>Divition Edit</h3>
                @else
                <a class="btn btn-primary my-3" href="{{ route('admin.divition.index') }}">
                    <i class="fa fa-plus-circle"></i>
                    Divition List
                </a>
                @endif
                <form method="POST" action="{{ (isset($divitionEdit)) ? route('admin.divition.update', $divitionEdit->id) : route('admin.divition.store') }}">
                    @csrf
                    @if(isset($divitionEdit))
                    @method('PUT')
                    @endif
                      <div class="form-group">
                        <span>Divition Name</span>
                        <input type="text" name="name" placeholder="Enter Your Divitions Name" class="form-control" value="{{ (isset($divitionEdit)) ? $divitionEdit->name : '' }}">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">
                            {{ (isset($divitionEdit)) ? 'update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
@endsection