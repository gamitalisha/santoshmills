@extends('layouts.app')
<?php
 if(@$purchase){?>
@section('title', 'Update Purchase Entary Details')
<?php }else{ ?>
@section('title', 'Purchase Entary Details');
<?php
    }

?>
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                         if(@$purchase){?>
                            <h4 class="card-title">Update Purchase Entary Details</h4>
                         <?php }else{ ?>
                            <h4 class="card-title"> Purchase Entary Details</h4>
                         <?php
                        }
                    ?>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('purchase.index')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">View Purchase
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
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{@$purchase->id}}">
                                        <div class="mb-3">
                                            <label for="formrow-date-input" class="form-label">Date</label>
                                       @if(@$purchase)
                                       <input type="date" class="form-control" id="date" name="date" placeholder="" value="{{@$purchase->date }}">

                                       @else
                                       <input type="date" class="form-control" id="date" name="date" placeholder="" value="{{@$ldate }}">

                                       @endif
                                         </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="formrow-invoice-input" class="form-label">Invoice Number</label>
                                            <input type="text" class="form-control" id="invoice" name="invoice" value="{{@$purchase->invoice }}"
                                                placeholder="Enter Invoice Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="seller" class="form-label">Seller</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="seller_id" name="seller_id"
                                                    data-placeholder="Choose Seller">
                                                    <option value=""></option>
                                                    @foreach ($seller as $row)
                                                    <option value="{{ $row->id }}"  data-value="{{ $row->gst }}" {{ @$purchase->seller_id ===  $row->id ? "selected" : "" }} >{{ $row->s_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="group" class="form-label">Group</label>
                                            <div class="dropdown from-control">
                                                <select class="form-control dropdown-search" id="group" name="group"
                                                    data-placeholder="Choose Group">
                                                    <option value=""></option>
                                                    @foreach ($group as $row)
                                                    <option value="{{ $row->id }}" {{ @$purchase->group_id ===  $row->id ? "selected" : "" }}>{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mb-5">
                                        <div class="form-check form-check-inline col-2">
                                            <input class="form-check-input" type="radio" name="gst_bill"
                                                value="gst"{{ @$purchase->gstin == 'gst' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineRadio1">GST Bill</label>
                                        </div>
                                        <div class="form-check form-check-inline col-2">
                                            <input class="form-check-input" type="radio" name="gst_bill"
                                                value="none" {{ @$purchase->gstin == 'none' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineRadio2">Non GST</label>
                                        </div>
                                        <div class="form-check form-check-inline col-2">
                                            <input class="form-check-input" type="radio" name="gst_bill"
                                                value="k"  {{ @$purchase->gstin == 'k' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineRadio3">None</label>
                                        </div>


                                        <div class="form-check form-check form-check-inline col-1">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="inward"
                                                    name="inward"  {{ @$purchase->inward == 'on' ? 'checked' : ''}}>
                                                Inward
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Item Name</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="itemname"
                                                    name="itemname" data-placeholder="Choose item Name">
                                                    <option value=""></option>
                                                    @foreach ($item as $row)
                                                    <option value="{{ $row->id }}"  data-value="{{ $row->name }}" {{ @$purchase->item_id ===  $row->id ? "selected" : "" }}> {{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Size</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="size" name="size"
                                                    data-placeholder="Choose Size">
                                                    <option value=""></option>
                                                    @foreach ($size as $row)
                                                    <option value="{{ $row->id }}" {{ @$purchase->size_id ===  $row->id ? "selected" : "" }}  data-value="{{ $row->size }}">{{ $row->size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Quantity</label>
                                            <input type="text" class="form-control" id="qty" name="qty" value="{{ @$purchase->size_id }}"
                                                placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Unit</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="unit" name="unit"
                                                    data-placeholder="Choose Unit">
                                                    <option value=""></option>
                                                    @foreach ($unit as $row)
                                                    <option value="{{ $row->id }}" {{ @$purchase->unit_id ===  $row->id ? "selected" : "" }} data-value="{{ $row->unit }}"  >{{ $row->unit }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Rate</label>
                                            <input type="text" class="form-control" id="rate" name="rate" value="{{ @$purchase->rate }}"
                                                placeholder="Enter Rate">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Disc%</label>
                                            <input type="text" class="form-control" id="disc" name="disc" value="{{ @$purchase->disc }}"
                                                placeholder="Enter Discount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Taxable Amount</label>
                                            <input type="text" class="form-control" id="taxamt" name="taxamt" value="{{ @$purchase->taxamt }}"
                                                placeholder="Taxable Amount" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">GST %</label>
                                            <input type="text" class="form-control" id="gst" name="gst" value="{{ @$purchase->gst }}"
                                                placeholder="Enter GST%">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">GST Amount</label>
                                            <input type="text" class="form-control" id="gstamt" name="gstamt"  value="{{ @$purchase->gstamt }}"
                                                placeholder="GST Amount" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Cess</label>
                                            <input type="text" class="form-control" id="cess" name="cess"  value="{{ @$purchase->cess }}"
                                                placeholder="Enter Cess">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Total Amount</label>
                                            <input type="text" class="form-control" id="tamt" name="tamt" value="{{ @$purchase->tamt }}"
                                                placeholder="Total Amount" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Machine</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="machine" name="machine"
                                                    data-placeholder="Choose Machine">
                                                    <option value=""></option>
                                                    @foreach ($machine as $row)
                                                    <option value="{{ $row->id }}" {{ @$purchase->machine_id ===  $row->id ? "selected" : "" }}  data-value="{{ $row->machine }}">{{ $row->machine }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Other Details</label>
                                            <input type="text" class="form-control" id="other" name="other" value="{{ @$purchase->other_details }}"
                                                placeholder="Enter Other Details">
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="mybtns1">
                                    <?php
                                        if(@$purchase){?>
                                        <button class="btn btn-success" id="update">Update</button>
                                        <?php }else{ ?>
                                            <button class="btn btn-primary" id="Additems">Add items</button>
                                        <?php
                                        }
                                    ?>
                                    </div>
                                    <div class="col-md-2" id="mybtns2">
                                    <button class="btn btn-success" id="updatebtn">Update</button>
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row12" style="padding: 5px;">
                                                    <table class="table table-bordered table-responsive data-table"
                                                        id="additemsdata">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Sr.No.</th>
                                                                <th scope="col">ItemName</th>
                                                                <th scope="col">Size</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Units</th>
                                                                <th scope="col">Rate</th>
                                                                <th scope="col">Disc%</th>
                                                                <th scope="col">TaxableAmount</th>
                                                                <th scope="col">GST</th>
                                                                <th scope="col">GST Amount</th>
                                                                <th scope="col">Cess</th>
                                                                <th scope="col">TotalAmt</th>
                                                                <th scope="col">Machine</th>
                                                                <th scope="col">Other</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                        </tbody>

                                                    </table>
                                                    <div class="form-group row data-table">
                                                        <div class="col-sm-1">
                                                            <label for="remark" class="col-form-label">Remark:</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="remark"
                                                                placeholder="Remark">
                                                        </div>
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-1">
                                                            <label for="remark" class="col-form-label">Grand
                                                                Total:</label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" name="gtotal"
                                                                id="gtotal" placeholder="Grand Total">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 mb-3" style="float:left;margin-left:10px;">
                                                    <button type="button" class="btn btn-success savebtn"
                                                        id="submit">Submit</button>
                                                </div>
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
        <script src="{{ asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
        </script>
        <script src="{{ asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
        </script>

        <script>
            $(document).ready(function(){
            $('#mybtns2').hide();
            $('#seller_id').on('change', function() {
              var id = $(this).val();
                $.ajax({
                            type: 'POST',
                            url: "{{ route('purchase.seller') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                            },
                            success: function(data) {
                                    var gstValue=data['gst_num'];
                                    if (gstValue === '') {
                                        $('input[name=gst_bill]:eq(1)').attr('checked', 'checked');
                                        } else {
                                        $('input[name=gst_bill]:eq(0)').attr('checked', 'checked');
                                }
                            }
                    });
                    });
            $(".data-table").hide();
            $("#submit").hide();
            var totalamountvalue = 0.0;
            $('#qty, #rate, #disc, #gst, #cess').on('keyup', function() {
                var qty = parseFloat($("#qty").val()) || 0;
                var rate = parseFloat($("#rate").val()) || 0;
                var disc = parseFloat($("#disc").val()) || 0;
                var gst = parseFloat($("#gst").val()) || 0;
                var cess = parseFloat($("#cess").val()) || 0;

                var multi = qty * rate;
                var mod = multi * disc / 100;
                var taxableAmt = multi - mod;
                // console.log(taxableAmt);
                var gstAmt = taxableAmt * gst / 100;
                var totalAmt = taxableAmt + gstAmt + cess;

                $("#taxamt").val(taxableAmt.toFixed(2));
                $("#gstamt").val(gstAmt.toFixed(2));
                $("#tamt").val(totalAmt.toFixed(2));
            });

            $(document).ready(function() {
                $("#Additems").click(function(e) {
                    e.preventDefault();
                    var itemname1 = $('option:selected', '#itemname').data("value");
                    var size1 = $('option:selected', '#size').data("value");
                    var unit1 = $('option:selected', '#unit').data("value");
                    var machine1 = $('option:selected', '#machine').data("value");
                    var itemname = $("#itemname").val();
                    var size = $("#size").val();
                    var qty = $("#qty").val();
                    var unit = $("#unit").val();
                    var rate = $("#rate").val();
                    var disc = $("#disc").val();
                    var taxamt = $("#taxamt").val();
                    var gst = $("#gst").val();
                    var cess = $("#cess").val();
                    var machine = $("#machine").val();
                    var other = $("#other").val();
                    var gstamt = $("input[name='gstamt']").val();
                    var hidden_id = $("#hidden_id").val();
                    var tamt = $("input[name='tamt']").val();
                    if (itemname == '' || size == '' || qty == '' || unit == '' || rate == '' ||
                        disc == '' || taxamt == '' || gst == '' || cess == '' || machine ==
                        '' ||
                        other == '') {
                        $(".data-table").hide();
                        $("#submit").hide();
                        toastr.warning("Please fill in all required fields");
                    } else {
                        $(".data-table").show();
                        $("#submit").show();
                        var count = $(".data-table tbody tr").length + 1;
                        $(".data-table tbody").append("<tr data-count='" + count +
                            "' data-itemname='" + itemname + "' data-itemname1='" + itemname1 +
                            "' data-size='" + size + "' data-size1='" + size1 +
                            "' data-quantity='" + qty +
                            "' data-unit='" + unit + "' data-unit1='" + unit1 +
                            "' data-rate='" + rate + "' data-disc='" + disc +
                            "' data-taxamt='" + taxamt + "' data-gst='" + gst +
                            "' data-gstamt='" + gstamt + "' data-cess='" + cess +
                            "' data-tamt='" + tamt + "'  data-machine='" + machine +
                            "' data-other='" + other + "' ></td><td class='count'>" +
                            count + "<td class='itemname' style='display:none'>" + itemname +
                            "</td><td class='itemname1'>" + itemname1 +
                            "<td class='size' style='display:none'>" + size +
                            "</td><td class='size1'>" + size1 + "</td><td class='qty'>" + qty +
                            "</td> <td class='unit' style='display:none'>" + unit +
                            "</td><td class='unit1'>" + unit1 + "</td><td class='rate'>" +
                            rate +
                            "</td><td class='disc'>" + disc + "</td><td class='taxamt'>" +
                            taxamt +
                            "</td><td class='gst'>" + gst + "</td> <td class='gstamt'>" +
                            gstamt +
                            "</td> <td class='cess'>" + cess +
                            "</td><td class='tamt'>" + tamt +
                            "</td><td class='machine' style='display:none'>" +
                            machine + "</td><td class='machine1'>" + machine1 +
                            "</td><td class='other'>" + other +
                            "</td><td> <button type='button' class='btn btn-outline-primary btn-sm editbtn' data-id='{{ $row->id }}' title='Edit'><i class='fas fa-pencil-alt' title='Edit'></i> </button><button class='btn btn-outline-danger btn-sm btn-delete' type='button'><i class='bx bxs-trash'></i></button></td></tr>"
                        );
                        $('#itemname').val('').trigger('change');
                        $('#size').val('').trigger('change');
                        $('#unit').val('').trigger('change');
                        $('#machine').val('').trigger('change');
                        $('#qty').val('');
                        $('#rate').val('');
                        $('#disc').val('');
                        $('#taxamt').val('');
                        $('#gst').val('');
                        $('#gstamt').val('');
                        $('#cess').val('');
                        $('#tamt').val('');
                        $('#other').val('');
                        totalamountvalue = (totalamountvalue + (parseFloat(tamt)));
                        $('#gtotal').val(totalamountvalue + "");
                    }
                });


                $("body").on("click", ".editbtn", function() {
                    $("#mybtns1").hide();
                    $('#mybtns2').show();
                    var row = $(this).closest('tr');
                    // Retrieve the data associated with the row
                    var count = row.attr('data-count');
                    var itemname = row.attr('data-itemname');
                    var itemname1 = row.attr('data-itemname1');
                    var size = row.attr('data-size');
                    var size1 = row.attr('data-size1');
                    var qty = row.attr('data-quantity');
                    var unit = row.attr('data-unit');
                    var unit1 = row.attr('data-unit1');
                    var rate = row.attr('data-rate');
                    var disc = row.attr('data-disc');
                    var taxamt = row.attr('data-taxamt');
                    var gst = row.attr('data-gst');
                    var gstamt = row.attr('data-gstamt');
                    var cess = row.attr('data-cess');
                    var tamt = row.attr('data-tamt');
                    var machine = row.attr('data-machine');
                    var machine1 = row.attr('data-machine1');
                    var other = row.attr('data-other');
                    console.log("count", count);
                    $('#flag').val(count);
                    $('#itemname').val(itemname).trigger('change');
                    $('#size').val(size).trigger('change');
                    $('#unit').val(unit).trigger('change');
                    $('#machine').val(machine).trigger('change');
                    $('#qty').val(qty);
                    $('#rate').val(rate);
                    $('#disc').val(disc);
                    $('#taxamt').val(taxamt);
                    $('#gst').val(gst);
                    $('#gstamt').val(gstamt);
                    $('#cess').val(cess);
                    $('#tamt').val(tamt);
                    $('#other').val(other);
                    // Show the edit form
                    $('#edit-form').show();
                });

                $("#updatebtn").click(function() {
                    var itemname1 = $('option:selected', '#itemname').data("value");
                    var size1 = $('option:selected', '#size').data("value");
                    var unit1 = $('option:selected', '#unit').data("value");
                    var machine1 = $('option:selected', '#machine').data("value");
                    var itemname = $("#itemname").val();
                    var size = $("#size").val();
                    var qty = $("#qty").val();
                    var unit = $("#unit").val();
                    var rate = $("#rate").val();
                    var disc = $("#disc").val();
                    var taxamt = $("#taxamt").val();
                    var gst = $("#gst").val();
                    var cess = $("#cess").val();
                    var machine = $("#machine").val();
                    var other = $("#other").val();
                    var gstamt = $("input[name='gstamt']").val();
                    // var hidden_id = $("#hidden_id").val();
                    var tamt = $("input[name='tamt']").val();
                    $(".data-table").show();
                    $("#submit").show();
                    // Update the count
                    var count = $(".data-table tbody tr").length;
                    var rowToUpdate = $(".data-table tbody tr[data-count='" + count + "']");
                    rowToUpdate.attr("data-itemname", itemname);
                    rowToUpdate.attr("data-size", size);
                    rowToUpdate.attr("data-quantity", qty);
                    rowToUpdate.attr("data-unit", unit);
                    rowToUpdate.attr("data-rate", rate);
                    rowToUpdate.attr("data-disc", disc);
                    rowToUpdate.attr("data-taxamt", taxamt);
                    rowToUpdate.attr("data-gst", gst);
                    rowToUpdate.attr("data-gstamt", gstamt);
                    rowToUpdate.attr("data-cess", cess);
                    rowToUpdate.attr("data-tamt", tamt);
                    rowToUpdate.attr("data-machine", machine);
                    rowToUpdate.attr("data-other", other);
                    rowToUpdate.find(".itemname1").text(itemname1);
                    rowToUpdate.find(".size1").text(size1);
                    rowToUpdate.find(".qty").text(qty);
                    rowToUpdate.find(".unit1").text(unit1);
                    rowToUpdate.find(".rate").text(rate);
                    rowToUpdate.find(".disc").text(disc);
                    rowToUpdate.find(".taxamt").text(taxamt);
                    rowToUpdate.find(".gst").text(gst);
                    rowToUpdate.find(".gstamt").text(gstamt);
                    rowToUpdate.find(".cess").text(cess);
                    rowToUpdate.find(".tamt").text(tamt);
                    rowToUpdate.find(".machine").text(machine);
                    rowToUpdate.find(".other").text(other);
                    $("#mybtns1").show();
                    $('#mybtns2').hide();

                });

                $("#update").click(function(e) {
                        var hidden_id = $('#hidden_id').val();
                        var itemname = $('#itemname').val();
                        var size = $('#size').val();
                        var qty = $('#qty').val();
                        var unit = $('#unit').val();
                        var rate = $('#rate').val();
                        var disc = $('#disc').val();
                        var taxamt = $('#taxamt').val();
                        var gst = $('#gst').val();
                        var gstamt = $('#gstamt').val();
                        var cess = $('#cess').val();
                        var tamt = $('#tamt').val();
                        var machine = $('#machine').val();
                        var other = $('#other').val();
                        var date = $('#date').val();
                        var invoice = $('#invoice').val();
                        var seller_id = $('#seller_id').val();
                        var group = $('#group').val();
                        var gtotal = $('#gtotal').val();
                        var gst_bill=$("input[name='gst_bill']:checked").val();
                        var inward=$('#inward').val();

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('purchase.store') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                hidden_id:hidden_id,
                                date: date,
                                invoice: invoice,
                                seller_id: seller_id,
                                group: group,
                                itemname: itemname,
                                gst_bill:gst_bill,
                                inward:inward,
                                size: size,
                                qty: qty,
                                unit: unit,
                                rate: rate,
                                disc: disc,
                                taxamt: taxamt,
                                gst: gst,
                                gstamt: gstamt,
                                cess: cess,
                                tamt: tamt,
                                machine: machine,
                                other: other,
                                gtotal: gtotal,
                            },
                            success: function(data) {


                                //  console.log("dataaaafinalaa",data['date']);
                                if (data['message']) {
                                    toastr.success(data['message']);
                                    window.location.href = "{{ route('purchase.index') }}";
                                } else {
                                    toastr.success(data['error']);
                                    $('#submit').prop(false);
                                }
                                $('#loader').hide();
                            }
                        });

                });


                $("button#submit").click(function() {


                    var data1 = [];

                    $("#additemsdata tbody tr").each(function(index) {
                        var itemname = $(this).find('.itemname').text();
                        var size = $(this).find('.size').text();
                        var qty = $(this).find('.qty').text();
                        var unit = $(this).find('.unit').text();
                        var rate = $(this).find('.rate').text();
                        var disc = $(this).find('.disc').text();
                        var taxamt = $(this).find('.taxamt').text();
                        var gst = $(this).find('.gst').text();
                        var gstamt = $(this).find('.gstamt').text();
                        var cess = $(this).find('.cess').text();
                        var tamt = $(this).find('.tamt').text();
                        var machine = $(this).find('.machine').text();
                        var other = $(this).find('.other').text();
                        var date = $('#date').val();
                        var invoice = $('#invoice').val();
                        var seller_id = $('#seller_id').val();
                        var group = $('#group').val();
                        var gtotal = $('#gtotal').val();
                        var gst_bill=$("input[name='gst_bill']:checked").val();
                        var inward=$('#inward').val();
                        var seller_gst = $('option:selected','#seller_id').data("value");

                        if (date == "") {
                            toastr.warning("Plase Enter Date");
                        } else if (invoice == "") {
                            toastr.warning("Plase Enter Invoice Number.");
                        } else if (seller_id == "") {
                            toastr.warning("Plase Enter Seller Name");
                        } else if (group == "") {
                            toastr.warning("Plase Enter Group");
                        } else {
                            data1.push({
                                date: date,
                                invoice: invoice,
                                seller_id: seller_id,
                                group: group,
                                itemname: itemname,
                                gst_bill:gst_bill,
                                inward:inward,
                                size: size,
                                qty: qty,
                                unit: unit,
                                rate: rate,
                                disc: disc,
                                taxamt: taxamt,
                                gst: gst,
                                gstamt: gstamt,
                                cess: cess,
                                tamt: tamt,
                                machine: machine,
                                other: other,
                                gtotal: gtotal,
                                seller_gst:seller_gst
                            });
                            submitFormData(data1);
                        }
                    });

                });



                function submitFormData(formData) {

                    if (formData == "") {
                        toastr.error("Please Enter InWard Details");
                    } else {
                        $('#loader').show();
                        $('#submit').prop(true);
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('purchase.store') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                data: formData,
                            },
                            success: function(data) {

                                //  console.log("dataaaafinalaa",data['date']);
                                if (data['message']) {
                                    toastr.success(data['message']);
                                    window.location.href = "{{ route('purchase.index') }}";
                                } else {
                                    toastr.success(data['error']);
                                    $('#submit').prop(false);
                                }
                                $('#loader').hide();
                            }
                        });
                    }
                }
            });

            $("body").on("click", ".btn-delete", function() {
                $(this).parents("tr").remove();
            });
        });

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
        </script>
        @stop
