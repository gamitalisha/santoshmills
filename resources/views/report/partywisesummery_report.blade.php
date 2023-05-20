@extends('layouts.app')
@section('title', 'Purchase Entry Details')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <form action="{{route('party.index')}}" method="get">
                <div class="row">


                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="seller_id" class="form-label" style="float:left;">Party Name</label>
                            <div class="input-group">
                                <select class="form-control dropdown-search" id="seller_id" name="seller_id"
                                data-placeholder="Choose Seller">
                                <option value=""></option>
                                @foreach ($seller as $category)
                                <option value="{{ $category->id }}">{{ $category->s_name }}</option>
                                @endforeach
                            </select>

                            </div>
                        </div>
                    </div>


                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="fromDate" class="form-label">From Date</label>
                            <div class="input-group">
                                <input type="date" name="fromDate" id="fromDate" class="form-control"
                                    value="{{ Request()->fromDate }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="toDate" class="form-label">To Date</label>
                            <div class="input-group">
                                <input type="date" name="toDate" id="toDate" class="form-control"
                                    value="{{ Request()->toDate }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mt-4">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
            </form>
            <div class="col-sm-3 mt-4">
                <div class="form-group">
                    <form action="{{ route('partyexport.csv') }}" method="get">
                        <input type="hidden" name="seller_id" value="{{ Request::get('seller_id') }}">
                        <input type="hidden" name="fromDate" value="{{ Request::get('fromDate') }}">
                        <input type="hidden" name="toDate" value="{{ Request::get('toDate') }}">
                        <input type="submit" class="btn btn-primary" value="Export File">
                    </form>
                </div>
            </div>
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
                        <table id="datatable" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>PartyName</th>
                                    <th>TAXAMOUNT</th>
                                    <th>IGST</th>
                                    <th>CGST</th>
                                    <th>SGST</th>
                                    <th>CESS</th>
                                </tr>
                            </thead>
                            <?php if(@$sellerdata){ ?>

                            <tbody id="group">
                                @foreach($sellerdata as $row)
                                <tr>
                                    <td>{{ $row->s_name }}</td>
                                    <td>{{ $row->total_taxable_amount }}</td>
                                    <td>{{ $row->total_IGST }}</td>
                                    <td>{{ $row->total_CGST }}</td>
                                    <td>{{ $row->total_SGST }}</td>
                                    <td>{{ $row->total_cess }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td>{{ $sellerdata->sum('total_taxable_amount') }}</td>
                                    <td>{{ $sellerdata->sum('total_IGST') }}</td>
                                    <td>{{ $sellerdata->sum('total_CGST') }}</td>
                                    <td>{{ $sellerdata->sum('total_SGST') }}</td>
                                    <td>{{ $sellerdata->sum('total_cess') }}</td>
                                </tr>
                            </tfoot>
                            <?php }else{ ?>


                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
<script src="{{ asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>

<!-- Buttons examples -->
<script src="{{ asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
< script >
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


$('.dropdown-search').on('keyup', function() {
    var value = $(this).val().toLowerCase();
    $('.dropdown-menu li').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});
$('.dropdown-menu a').on('click', function() {
    $('#group_id').val($(this).text());
});
$('.dropdown-search').select2({
    placeholder: $(this).data('placeholder')
    // allowClear: true
});

$("#reset").click(function(e) {
    toastr.info("Reset Form SuccessFully");
    location.reload();

});
</script>
@stop
