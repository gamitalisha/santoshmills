@extends('layouts.app')
@section('title', 'Unit Master')
@section('content')
<style>
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="card-title">Unit Master</h4>
                    </div>
                    <div class="col-lg-4"></div>
                   
                </div>
            </div>
      </div>


      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <center>
                    <div class="col-lg-6">
                        <div class="hstack gap-3">
                            <div class="row clearfix">
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <input type="text" name="unit" id="unit"
                                          class="form-control" placeholder="Enter Unit Name">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="formal_name" id="formal_name"
                                            class="form-control" placeholder="Enter Formal Name">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id='btn-submit'>Submit</button>
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
                                                        <th>Unit</th>
                                                        <th>Formal Name</th>
                                                        <th style="text:right; text-align:center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="dt-responsive">
                                                    @foreach($unit as $row)
                                                        <tr>
                                                            <td>{{$row->unit}}</td>
                                                            <td>{{$row->formal_name}}</td>
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
                var name = $("#unit").val();
                var formal = $("#formal_name").val();
                // alert(category);
                var hidden_id = $("#hidden_id").val();
                if (name == '') {
                    toastr.warning("Please Enter unit Name");
                    
                }else if(formal == ''){
                    toastr.warning("Please Enter Formal Name");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('unit.store') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            unit:name,
                            formal_name:formal,
                            hidden_id: hidden_id,
                        },
                        success: function(data) {
                            if (data['message']) {
                                toastr.success(data['message']);
                                $("#unit").val('');
                                $("#formal_name").val('');
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
                    url: "{{ route('unit.delete') }}",
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
                    url: "{{ route('unit.edit') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: dataId,
                    },
                    success: function(data) {
                         console.log("mydata",data);
                          $('#hidden_id').val(data['id']);
                          $('#unit').val(data['unit']);
                          $('#formal_name').val(data['unit']);
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

</script>

           @stop
