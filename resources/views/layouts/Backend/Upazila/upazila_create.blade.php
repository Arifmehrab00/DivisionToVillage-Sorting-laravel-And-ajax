@extends('layouts.Backend.master')
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
       $(document).on('change', '#divition', function(){
          var divition_id = $(this).val();
          $.ajax({
             url : "{{ route('admin.districtshort') }}",
             type: "GET",
             data: {divition_id:divition_id},
             success:function(data){
                var html = '<option value="">Select District</option>';
                $.each(data, function(key,v){
                    html+= '<option value="'+v.id+'">'+v.name+'</option>'; 
                });
                $('#district').html(html);
                var district_id = "{{ @$upazilaEdit->district_id }}";
                if(district_id != '') {
                   $('#district').val(district_id);
                }
             }
          });
       });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var divition_id = "{{ @$upazilaEdit->divition_id }}";
        if(divition_id) {
           $('#divition').val(divition_id).trigger('change');
        }

    });
</script>
@endpush
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			 <div class="card-body">
			 	@if(isset($upazilasEdit))
                <h3>Upazila Edit</h3>
                @else
                <a class="btn btn-primary my-3" href="{{ route('admin.upazila.index') }}">
                    <i class="fa fa-plus-circle"></i>
                    Upazila List
                </a>
                @endif
                <form id="upazila" method="POST" action="{{ (isset($upazilaEdit)) ? route('admin.upazila.update', $upazilaEdit->id) : route('admin.upazila.store') }}">
                    @csrf
                    @if(isset($upazilaEdit))
                    @method('PUT')
                    @endif

                    <div class="form-group">
                        <span>Divitions Name</span>
                        <select class="form-control" name="divition" id="divition">
                            <option> *Select Divition* </option>
                            @foreach($divitions as $divition)
                            <option value="{{ $divition->id }}" {{ (@$upazilaEdit->divition_id == $divition->id ? 'selected':'') }}>
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
                        <select class="form-control" name="district" id="district">
                            <option value="">Select District</option>
                        </select>
                        @error('district')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                      <div class="form-group">
                        <span>Upazila Name</span>
                        <input type="text" id="name" name="name" placeholder="Enter Your Upazila Name" class="form-control" value="{{ (isset($upazilaEdit)) ? $upazilaEdit->name : '' }}">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">
                            {{ (isset($upazilaEdit)) ? 'update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
@endsection