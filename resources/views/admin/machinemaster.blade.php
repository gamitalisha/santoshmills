@extends('layouts.app')
@section('title', 'Machine Master')
@section('content')
<style>
 
#mc_cate {
  display: none;
}

</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="card-title">Machine Master</h4>
                    </div>                  
                </div>
            </div>
      </div>



      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <center>
                    <div class="col-lg-6">
                        <div class="hstack gap-3">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                           <input class="form-control" name="machine" id="machine" type="text" placeholder="Enter Machine Name" aria-label="Enter Group Name">
       
                                <select name="mc_category" id="mc_category"  class="form-control">
                                    <option value=" ">Select Categoey </option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->mc_category }}</option>
                                    @endforeach
                                </select> 

                            <button type="submit" class="btn btn-primary" id='btn-submit'>Submit</button>
                            <div class="vr"></div>
                            <button type="button" id="reset" class="btn btn-outline-danger">Reset</button>
                        </div>
                    </div>
                </center>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>


      <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body centered">
                                        <table id="datatable" class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Machine</th>
                                                        <th>M/C Category</th>
                                                        <th style="text:right; text-align:center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="dt-responsive">
                                                    @foreach($machine as $row)
                                                        <tr>
                                                            <td>{{$row->machine}}</td>
                                                            <td>{{$row->mc_category}}</td>
                                                            <td style="text-align:center;">
                                                                <button type="submit" class="btn btn-outline-primary btn-sm edit-btn" 
                                                                data-id="{{$row->id}}" title="Edit">
                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                            </button>
                                                                <button type="submit" id="btn-del" class="btn btn-outline-danger btn-sm del-btn"
                                                                    data-id="{{$row->id}}"><i class="bx bxs-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            @stop
            @section('script')
            <script src="{{asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
           <script src="{{asset('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
           <script src="{{asset('public/assets/js/pages/datatables.init.js')}}"></script>    

                   <!-- Buttons examples -->
            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{asset('public/assets/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{asset('public/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
            <script src="{{asset('public/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
            
   

        <!-- Responsive examples -->
        <script src="{{asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        {{-- <script src="{{asset('public/assets/js/app.js')}}"></script> --}}
        <script>

            $(document).ready(function() {
            
            $("#btn-submit").click(function(e) {
                e.preventDefault();
                var machine = $("#machine").val();
                var mc_category = $("#mc_category").val();
                var hidden_id = $("#hidden_id").val();
                if (machine == '') {
                    toastr.warning("Please Enter Machine name");
                }else if(mc_category== ""){
                    toastr.warning("Please Select categpry");

                }else {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('machine.store') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            machine: machine,
                            mc_category:mc_category,
                            hidden_id: hidden_id,
                        },
                        success: function(data) {
                            if (data['message']) {
                                toastr.success(data['message']);
                                $("#machine").val('');
                                location.reload();
            
                            } else {
                                toastr.error(data['error']);
                            }
                        }
                    });
                }
            });
            
                $("#reset").click(function(e) {
                    toastr.info("Reset Form SuccessFully");
                    location.reload();
            
                });
            
            $(".del-btn").click(function(e) {
                var dataId = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('machine.delete') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: dataId,
                    },
                    success: function(data) {
                        toastr.success(data['message']);
                        location.reload();
                    },
                    error: function(data) {
                        toastr.error(data['error']);
                    }
                });
            
            });
            
            $(".edit-btn").click(function(e) {
                var dataId = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('machine.edit') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: dataId,
                    },
                    success: function(data) {
                         console.log("mydata",data);
                          $('#hidden_id').val(data['id']);
                          $('#machine').val(data['machine']);
                          $('#mc_category').val(data['machine']);
                          $('html, body').animate({scrollTop: 0},'fast');
            
                    //     toastr.success(data['message']);
                    //     location.reload();
                     },
                    error: function(data) {
                        toastr.error(data['error']);
                    }
                });
            
            });            
            });

            const input = document.getElementById('mc_category');
const options = document.getElementById('mc_cate');

input.addEventListener('input', (event) => {
  const value = event.target.value;
  
  // Show or hide options based on search string
  Array.from(options.options).forEach((option) => {
    if (option.value.toLowerCase().indexOf(value.toLowerCase()) !== -1) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
  
  // Show dropdown if input field is focused and has a value
  if (value && input === document.activeElement) {
    options.style.display = 'block';
  } else {
    options.style.display = 'none';
  }
});

input.addEventListener('blur', () => {
  // Hide dropdown when input field loses focus
  options.style.display = 'none';
});

            </script>

           @stop
