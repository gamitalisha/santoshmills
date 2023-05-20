@extends('layouts.app')
@section('title', 'Shade Details')
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
                        <h4 class="card-title">Shade Details</h4>
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
                           <input class="form-control" name="shade" id="shade" type="text" placeholder="Enter Shade Name" aria-label="Enter Shade Name">
       
                           <select class="form-control dropdown-search col-3" id="master_id" name="master_id" 
                                data-placeholder="Choose Master Name">
                                <option value=""></option>
                                @foreach ($master as $row)
                                <option value="{{ $row->id }}">{{ $row->master_name }}</option>
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
                                                        <th>Shade</th>
                                                        <th>Master Name<th>
                                                        <th style="text:right; text-align:center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="dt-responsive">
                                                    @foreach($shade as $row)
                                                        <tr>
                                                            <td>{{ $row->shade }}</td>
                                                            <td>{{ $row->master }}</td>
                                                            <td style="text-align: center;">
                                                                <button type="submit" class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $row->id }}" title="Edit">
                                                                    <i class="fas fa-pencil-alt" title="Edit"></i>
                                                                </button>
                                                                <button type="submit" id="btn-del" class="btn btn-outline-danger btn-sm del-btn" data-id="{{ $row->id }}">
                                                                    <i class="bx bxs-trash"></i>
                                                                </button>
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
            
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
   

        <!-- Responsive examples -->
        <script src="{{asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        {{-- <script src="{{asset('public/assets/js/app.js')}}"></script> --}}
        <script>

            $(document).ready(function() {


                $('.dropdown-search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.dropdown-menu li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // Set the value of the dropdown in the input field when a category is selected
        $('.dropdown-menu a').on('click', function() {
            $('#mc_category').val($(this).text());
        });

        $('.dropdown-search').select2({
            // width: '200%',
            // height:'100%',
            placeholder: $(this).data('placeholder'),
        });


            
            $("#btn-submit").click(function(e) {
                e.preventDefault();
                var shade = $("#shade").val();
                var master_id = $("#master_id").val();
                var hidden_id = $("#hidden_id").val();
                if (shade == '') {
                    toastr.warning("Please Enter shade name");
                }else if(master_id== ""){
                    toastr.warning("Please Select categpry");

                }else {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('shade.store') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            shade: shade,
                            master_id:master_id,
                            hidden_id: hidden_id,
                        },
                        success: function(data) {
                            if (data['message']) {
                                toastr.success(data['message']);
                                $("#shade").val('');
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
                    url: "{{ route('shade.delete') }}",
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
                    url: "{{ route('shade.edit') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: dataId,
                    },
                    success: function(data) {
                         console.log("mydata",data);
                          $('#hidden_id').val(data['id']);
                          $('#shade').val(data['shade']);
                          $('#master_na me').val(data['shade']);
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

            const input = document.getElementById('master_name');
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
