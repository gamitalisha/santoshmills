@extends('layouts.app')
@section('title', 'Seller Details')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="card-title">Seller Details</h4>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('add.seller')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Add
                            Seller</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered  nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Contact </th>
                                                    <th>Phone NO</th>
                                                    <th>GST IN</th>
                                                    <th>PAN</th>
                                                    <th>GST</th>
                                                    <th style="text:right; text-align:center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($seller as $row)
                                                        <tr>
                                                            <td>{{$row->s_name}}</td>
                                                            <td>{{$row->address}}</td>
                                                            <td>{{$row->contact}}</td>
                                                            <td>{{$row->phone}}</td>
                                                            <td>{{$row->gst_num}}</td>
                                                            <td>{{$row->pan	}}</td>
                                                            <td>@if($row->gst=="1")
                                                               CGST/SGST
                                                               @else
                                                               IGST
                                                               @endif
                                                            
                                                        
                                                        </td>
                                                            <td style="text-align:center;">

                                                           <a href="{{route('seller.edit',$row->id)}}">    
                                                                    <button class="btn btn-outline-primary btn-sm edit-btn"><i class="fas fa-pencil-alt" title="Edit"></i></button>
                                                                </a>
                                                                <button type="submit" id="btn-del" class="btn btn-outline-danger btn-sm del-btn" data-id="{{$row->id}}"><i class="bx bxs-trash"></i></button>

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
        <script src="{{asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
        </script>
        <script src="{{asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
        </script>
        <!-- Datatable init js -->
        {{-- <script src="{{asset('public/assets/js/app.js')}}"></script> --}}
        <script>
        $("#btn-del").click(function(e) {
            var dataId = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: "{{ route('seller.delete') }}",
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
        
        </script>

        @stop