@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">

                        <h4 class="card-title">Group Wise All Details</h4>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('group.index')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Back</button>
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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-responsive data-table"
                                                id="additemsdata">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Invoice</th>
                                                        <th scope="col">Seller</th>
                                                        <th scope="col">Group</th>
                                                        <th scope="col">GST</th>
                                                        <th scope="col">Inward</th>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Rate</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Discount</th>
                                                        <th scope="col">GST%</th>
                                                        <th scope="col">TaxAmount</th>
                                                        <th scope="col">IGST</th>
                                                        <th scope="col">CGST</th>
                                                        <th scope="col">SGST</th>
                                                        <th scope="col">GSTAmount</th>
                                                        <th scope="col">Cess</th>
                                                        <th scope="col">TotalAmount</th>
                                                        <th scope="col">MachineID</th>
                                                        <th scope="col">OtherDetails</th>
                                                        <th scope="col">Created_At</th>
                                                        <th scope="col">Updated_At</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="group">
                                                    @foreach ($purchase as $row)
                                                    <tr>
                                                        <td>{{ $row->id }}</td>
                                                        <td>{{ $row->date }}</td>
                                                        <td>{{ $row->invoice }}</td>
                                                        <td>{{ $row->seller_id }}</td>
                                                        <td>{{ $row->group_id }}</td>
                                                        <td>{{ $row->gstin }}</td>
                                                        <td>{{ $row->inward }}</td>
                                                        <td>{{ $row->item_id }}</td>
                                                        <td>{{ $row->size_id }}</td>
                                                        <td>{{ $row->unit_id }}</td>
                                                        <td>{{ $row->rate }}</td>
                                                        <td>{{ $row->qty }}</td>
                                                        <td>{{ $row->disc }}</td>
                                                        <td>{{ $row->gst }}</td>
                                                        <td>{{ $row->taxamt }}</td>
                                                        <td>{{ $row->igst }}</td>
                                                        <td>{{ $row->cgst }}</td>
                                                        <td>{{ $row->sgst }}</td>
                                                        <td>{{ $row->gstamt }}</td>
                                                        <td>{{ $row->cess }}</td>
                                                        <td>{{ $row->tamt }}</td>
                                                        <td>{{ $row->machine_id }}</td>
                                                        <td>{{ $row->other_details }}</td>
                                                        <td>{{ $row->created_at }}</td>
                                                        <td>{{ $row->updated_at }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>

                                                    <tr>
                                                        <td><strong>Total</strong></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>{{ $purchase->sum('taxamt') }}</td>
                                                        <td>{{ $purchase->sum('igst') }}</td>
                                                        <td>{{ $purchase->sum('cgst') }}</td>
                                                        <td>{{ $purchase->sum('sgst') }}</td>
                                                        <td></td>
                                                        <td>{{ $purchase->sum('cess') }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('public/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <!-- Responsive examples -->
    <script src="{{ asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    @stop
