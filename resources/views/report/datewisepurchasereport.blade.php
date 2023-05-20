@extends('layouts.app')
@section('title', 'Date Wise Purchase Report')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <form action="{{ route('datewise.purchase.report') }}" method="get">

                        <div class="row">
                            <div class="col-sm">
                                <input type="date" name="fromDate" class="form-control"
                                    value="{{ Request()->fromDate }}">
                            </div>
                            <div class="col-sm">
                                <input type="date" name="toDate" class="form-control" value="{{ Request()->toDate }}">
                            </div>
                            <div class="col-sm-1">
                                <input type="submit" class="btn btn-primary" value="Search">
                            </div>
                     </form>

                    <div class="col-sm">
                        <form action="{{ route('export.csv') }}" method="get">
                            <input type="hidden" name="fromDate" class="form-control" value="{{ Request()->fromDate }}">
                            <input type="hidden" name="toDate" class="form-control" value="{{ Request()->toDate }}">
                            <input type="submit" class="btn btn-primary" value="Export File">
                        </form>
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
                                                <th>GSTAMOUNT</th>
                                                <th>CESS</th>
                                                <th>MACHINE</th>
                                                <th>OTHERDETAILS</th>
                                                <th style="text:right; text-align:center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($purchase as $row)
                                            <tr>
                                                <td>{{ $row->date }}</td>
                                                <td>{{ $row->invoice }}</td>
                                                <td>{{ $row->sname}}</td>
                                                <td>{{ $row->gname}}</td>
                                                <td>{{ $row->gstin}}</td>
                                                <td>{{ $row->iname}}</td>
                                                <td>{{ $row->sizename}}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->uname}}</td>
                                                <td>{{ $row->rate }}</td>
                                                <td>{{ $row->disc }}</td>
                                                <td>{{ $row->gst }}</td>
                                                <td>{{ $row->taxamt }}</td>
                                                <td>{{ $row->cess }}</td>
                                                <td>{{ $row->tamt }}</td>
                                                <td>{{ $row->machinename}}</td>
                                                <td>{{ $row->other_details }}</td>
                                                <td style="text-align:center;">

                                                    <a href="{{ route('purchase.edit', $row->id) }}">
                                                        <button class="btn btn-outline-primary btn-sm edit-btn"><i
                                                                class="fas fa-pencil-alt" title="Edit"></i></button>
                                                    </a>
                                                    <button type="submit" id="btn-del"
                                                        class="btn btn-outline-danger btn-sm del-btn"
                                                        data-id="{{ $row->id }}"><i class="bx bxs-trash"></i></button>

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
            <script src="{{ asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>

            <!-- Buttons examples -->
            <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
            </script>
            <script src="{{ asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
            </script>
            <script src="{{ asset('public/assets/libs/jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('public/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
            <script src="{{ asset('public/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
            <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
            <!-- Responsive examples -->
            <script src="{{ asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
            </script>
            <script
                src="{{ asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
            </script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

            <script>
            $(document).ready(function() {
                // Initialize the DataTable
                var dataTable = $('#exampleTable').DataTable();

                // Search button click event
                $('#searchBtn').click(function() {
                    var fromDate = $('#fromDate').val();
                    var toDate = $('#toDate').val();

                    // Perform search by setting search values and redrawing the DataTable
                    dataTable.search('').columns().search('').draw();
                    dataTable.columns(0).search(fromDate);
                    dataTable.columns(1).search(toDate);
                    dataTable.draw();
                });
            });
            </script>

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

            <script>
            document.getElementById("searchButton").addEventListener("click", function() {
                // Get the values from the date inputs
                var fromDate = document.getElementById("fromDate").value;
                var toDate = document.getElementById("toDate").value;

                // Perform the search or handle the data as needed
                searchWithData(fromDate, toDate);
            });

            function searchWithData(fromDate, toDate) {
                // Placeholder function for search functionality
                // Replace with your actual search implementation
                console.log("Performing search with From Date: " + fromDate + " and To Date: " + toDate);
            }
            </script>

            @stop
