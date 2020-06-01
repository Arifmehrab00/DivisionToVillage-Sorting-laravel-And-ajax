@extends('layouts.Backend.master')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			 <div class="card-body">
			 	@if(isset($districtEdit))
                <h3>Districe Edit</h3>
                @else
                <a class="btn btn-primary my-3" href="{{ route('admin.district.index') }}">
                    <i class="fa fa-plus-circle"></i>
                    District List
                </a>
                @endif
                <form method="POST" action="{{ (isset($districtEdit)) ? route('admin.district.update', $districtEdit->id) : route('admin.district.store') }}">
                    @csrf
                    @if(isset($districtEdit))
                    @method('PUT')
                    @endif

                    <div class="form-group">
                        <span>Divitions Name</span>
                        <select class="form-control" name="divition">
                            @foreach($divitions as $divition)
                            <option value="{{ $divition->id }}" {{ (@$districtEdit->divition_id == $divition->id ? 'selected':'') }}>
                                {{ $divition->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('divition')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                      <div class="form-group">
                        <span>District Name</span>
                        <input type="text" name="name" placeholder="Enter Your Divitions Name" class="form-control" value="{{ (isset($districtEdit)) ? $districtEdit->name : '' }}">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">
                            {{ (isset($districtEdit)) ? 'update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
@endsection