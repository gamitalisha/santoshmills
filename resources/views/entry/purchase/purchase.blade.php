@extends('layouts.app')
@section('title', 'Purchase Entary Details')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="card-title">Purchase Entary Details</h4>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('purchase.add')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Add Purchase
                                Entary</button>
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
                                            <th style="width:7%;">DATE</th>
                                            <th>INVOICENO</th>
                                            <th>SELLER</th>
                                            <th>GROUP</th>
                                            <th>GSTIN</th>
                                            <th>ITEM</th>
                                            <th>SIZE</th>
                                            <th>QUANTITY</th>
                                            <th>UNIT</th>
                                            <th>RATE</th>
                                            <th>Disc%</th>
                                            <th>GST%</th>
                                            <th>TAXAMOUNT</th>
                                            <th>IGST</th>
                                            <th>CGST</th>
                                            <th>SGST</th>
                                            <th>GSTAMOUNT</th>
                                            <th>CESS</th>
                                            <th>MACHINE</th>
                                            <th>OTHERDETAILS</th>
                                        <th style="width:7%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchase as $row)
                                        <tr>
                                            <td>{{$row->date}}</td>
                                            <td>{{$row->invoice}}</td>
                                            <td>{{$row->sname}}</td>
                                            <td>{{$row->gname}}</td>
                                            <td>{{$row->gstin}}</td>
                                            <td>{{$row->iname}}</td>
                                            <td>{{$row->sizename}}</td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->uname}}</td>
                                            <td>{{$row->rate}}</td>
                                            <td>{{$row->disc}}</td>
                                            <td>{{$row->gst}}</td>
                                            <td>{{$row->taxamt}}</td>
                                            <td>{{$row->igst}}</td>
                                            <td>{{$row->cgst}}</td>
                                            <td>{{$row->sgst}}</td>
                                            <td>{{$row->cess}}</td>
                                            <td>{{$row->tamt}}</td>
                                            <td>{{$row->machinename}}</td>
                                            <td>{{$row->other_details}}</td>
                                            <td style="text-align:center;">

                                                <a href="{{route('purchase.edit',$row->id)}}">
                                                    <button class="btn btn-outline-primary btn-sm edit-btn"><i
                                                            class="fas fa-pencil-alt" title="Edit"></i></button>
                                                </a>
                                                <button type="submit" id="btn-del"
                                                    class="btn btn-outline-danger btn-sm del-btn"
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
            $(".del-btn").click(function(e) {
                var dataId = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('purchase.delete') }}",
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
