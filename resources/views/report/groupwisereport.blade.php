@extends('layouts.app')
@section('title', 'Purchase Entry Details')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <form action="{{ route('group.index') }}" method="get">
                <div class="row">
                    <div class="col-sm">
                        <div class="dropdown">
                            <label for="formrow-inputCity" class="form-label" style="float:left;">Group Name</label>
                            <select class="form-control dropdown-search" id="group_id" name="group_id"
                                data-placeholder="Choose Group">
                                <option value=""></option>
                                @foreach ($groupdata as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-sm-1 mt-4">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
            </form>

            <div class="col-sm mt-4">
                <form action="{{ route('groupexport.csv') }}" method="get">
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
                            <table id="datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>GroupName</th>
                                        <th>TAXAMOUNT</th>
                                        <th>IGST</th>
                                        <th>CGST</th>
                                        <th>SGST</th>
                                        <th>CESS</th>
                                    </tr>
                                </thead>
                                <tbody id="group">
                                    @foreach ($group as $row)
                                    <tr>
                                        <td><a class="name-link" href="groupdetails/{{$row->gid}}">{{ $row->name }}</td>
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
                                        <td>{{ $group->sum('total_taxable_amount') }}</td>
                                        <td>{{ $group->sum('total_IGST') }}</td>
                                        <td>{{ $group->sum('total_CGST') }}</td>
                                        <td>{{ $group->sum('total_SGST') }}</td>
                                        <td>{{ $group->sum('total_cess') }}</td>
                                    </tr>
                                </tfoot>
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
// $('#group_id').change(function() {
//   var value = selectObject.value;  
//    $('#group_id1').(value);
// });



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

//     $(document).ready(function() {
//     $('#generateExcel').click(function() {
//       $.ajax({
//         url: "{{ route('groupexport.csv') }}",
//         type: "POST",
//         success: function(response) {
//             console.log(response);
//           if (response.success) {
//             $('#result').text('Excel file generated successfully.');
//           }
//         },
//         error: function(xhr, status, error) {
//           console.log(xhr.responseText);
//         }
//       });
//     });
//   });
</script>
@stop