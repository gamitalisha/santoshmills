
@extends('layouts.app')
@section('title', 'Party Summery Report')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{route('party.summery')}}" method="get">
                <div class="row">
                   <div class="col-md-5 form-group">
                       <label for="">Date From</label>
                       <input type="date" name="date_from" class="form-control" value="{{ Request()->date_from }}">
                    </div>
                    <div class="col-md-5 form-group">
                       <label for="">Date From</label>
                       <input type="date" name="date_to" class="form-control" value="{{ Request()->date_to }}">
                    </div>
                    <div class="col-md-2 form-group" style="margin-top:25px;">
                       <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
           </form>
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
                                                <td>{{ $row->gstin }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->rate }}</td>
                                                <td>{{ $row->disc }}</td>
                                                <td>{{ $row->gst }}</td>
                                                <td>{{ $row->taxamt }}</td>
                                                <td>{{ $row->cess }}</td>
                                                <td>{{ $row->tamt }}</td>
                                                <td>{{ $row->other_details }}</td>
                                                <td style="text-align:center;">

                                                    <a href="{{ route('purchase.edit', $row->id) }}">
                                                        <button class="btn btn-outline-primary btn-sm edit-btn"><i
                                                                class="fas fa-pencil-alt" title="Edit"></i></button>
                                                    </a>
                                                    <button type="submit" id="btn-del"
                                                        class="btn btn-outline-danger btn-sm del-btn"
                                                        data-id="{{ $row->id }}"><i
                                                            class="bx bxs-trash"></i></button>

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
