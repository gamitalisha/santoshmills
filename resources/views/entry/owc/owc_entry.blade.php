@extends('layouts.app')
@section('title', 'Owc Entry Details')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="card-title">Owc Entry Details</h4>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('owc.add')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Add Owc Entry</button>
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
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered  nowrap">
                                    <thead>
                                        <tr>
                                            <th>DATE</th>
                                            <th>OWC NUMBER</th>
                                            <th>SELLER</th>
                                            <th>OWC ISSUE REASON</th>
                                            <th>ITEM</th>
                                            <th>SIZE</th>
                                            <th>QUANTITY</th>
                                            <th>UNIT</th>
                                            <th>MACHINE</th>
                                            <th>OTHER DETAILS</th>
                                        <th style="text:right; text-align:center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($owc as $row)
                                        <tr>
                                            <td>{{$row->date}}</td>
                                            <td>{{$row->owc_number}}</td>
                                            <td>{{$row->sname}}</td>
                                            <td>{{$row->reason}}</td>
                                            <td>{{$row->iname}}</td>
                                            <td>{{$row->sizename}}</td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->uname}}</td>
                                            <td>{{$row->machinename}}</td>
                                            <td>{{$row->other}}</td>
                                            <td style="text-align:center;">

                                                <a href="{{route('owc.edit',$row->id)}}">
                                                    <button class="btn btn-outline-primary btn-sm edit-btn"><i
                                                            class="fas fa-pencil-alt" title="Edit"></i></button>
                                                </a>
                                                <button type="submit" id="btn-del"
                                                    class="btn btn-outline-danger btn-sm btn-del"
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
        $(".btn-del").click(function(e) {
            var dataId = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: "{{ route('owc.delete') }}",
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
