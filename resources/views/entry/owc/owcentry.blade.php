@extends('layouts.app')
<?php
 if(@$owc){?>
@section('title', 'Update Owc Entry Details')
<?php }else{ ?>
@section('title', 'Owc Entry Details')
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
                         if(@$owc){?>
                            <h4 class="card-title">Update Owc Entry Details</h4>

                            <?php }else{ ?>
                            <h4 class="card-title"> Owc Entry Details</h4>
                            <?php
                           }
                         ?>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4" style="text-align: right;">
                            <a href="{{ route('owc.entry') }}" key="t-flag">
                                <button type="button" class="btn btn-outline-primary waves-effect waves-light">Show OWC
                                    Entry</button>
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
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-2">
                                            <input type="hidden" name="hidden_id" id="hidden_id"
                                                value="{{ @$owc->id }}">
                                            <div class="mb-3">
                                                <label for="formrow-date-input" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date"
                                                    value="{{ @$owc->date }}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-invoice-input" class="form-label">OWC Number</label>
                                                <input type="text" class="form-control" id="owc_number" name="owc_number"
                                                    value="{{ @$owc->owc_number }}" placeholder="Enter Owc Number">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="mc_row" class="form-label">Seller</label>
                                                <div class="dropdown hstack gap-3">
                                                    <select class="form-control dropdown-search" id="seller"
                                                        name="seller" data-placeholder="Choose Seller">
                                                        <option value=""></option>
                                                        @foreach ($seller as $row)
                                                            <option value="{{ $row->id }}"
                                                                value="{{ @$owc->seller_id }}"
                                                                {{ @$owc->seller_id === $row->id ? 'selected' : '' }}>
                                                                {{ $row->s_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="mc_row" class="form-label">Owc Issue Reason</label>
                                                <div class="dropdown from-control">
                                                    <select class="form-control dropdown-search" id="reasone"
                                                        name="reasone" data-placeholder="Choose OWC Issue Reason">
                                                        <option value=""></option>
                                                        @foreach ($owcissue as $row)
                                                            <option value="{{ $row->id }}"
                                                                {{ @$owc->owcissuereason_id === $row->id ? 'selected' : '' }}>
                                                                {{ $row->issue_reason }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <div
                                                    class="form-check form-check form-check-inline d-flex justify-content-center my-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="returnable"
                                                            id="returnable" value="checkedValue" checked>
                                                        Returnable
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row my-5 d-flex justify-content-center">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Item Name</label>
                                                <div class="dropdown hstack gap-3">
                                                    <select class="form-control dropdown-search" id="itemname"
                                                        name="itemname" data-placeholder="Choose item Name">
                                                        <option value=""></option>
                                                        @foreach ($item as $row)
                                                            <option
                                                                value="{{ $row->id }}"{{ @$purchase->id === $row->id ? 'selected' : '' }}
                                                                data-value="{{ $row->name }}"
                                                                {{ @$owc->item_id === $row->id ? 'selected' : '' }}>
                                                                {{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Size</label>
                                                <div class="dropdown hstack gap-3">
                                                    <select class="form-control dropdown-search" id="size"
                                                        name="size" data-placeholder="Choose Size">
                                                        <option value=""></option>
                                                        @foreach ($size as $row)
                                                            <option value="{{ $row->id }}"
                                                                data-value="{{ $row->size }}"
                                                                {{ @$owc->size_id === $row->id ? 'selected' : '' }}>
                                                                {{ $row->size }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Quantity</label>
                                                <input type="text" class="form-control" id="qty" name="qty"
                                                    value="{{ @$owc->qty }}" placeholder="Enter Quantity">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Unit</label>
                                                <div class="dropdown hstack gap-3">
                                                    <select class="form-control dropdown-search" id="unit"
                                                        name="unit" data-placeholder="Choose Unit">
                                                        <option value=""></option>
                                                        @foreach ($unit as $row)
                                                            <option value="{{ $row->id }}"
                                                                {{ @$owc->unit_id === $row->id ? 'selected' : '' }}
                                                                data-value="{{ $row->unit }}">
                                                                {{ $row->unit }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Machine</label>
                                                <div class="dropdown hstack gap-3">
                                                    <select class="form-control dropdown-search" id="machine"
                                                        name="machine" data-placeholder="Choose Machine">
                                                        <option value=""></option>
                                                        @foreach ($machine as $row)
                                                            <option value="{{ $row->id }}"
                                                                data-value="{{ $row->machine }}"
                                                                {{ @$owc->machine_id === $row->id ? 'selected' : '' }}>
                                                                {{ $row->machine }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Other Details</label>
                                                <input type="text" class="form-control" id="other" name="other"
                                                    value="{{ @$owc->other }}" placeholder="Enter Other Detaile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <?php
                                        if(@$owc){?>
                                        <button class="btn btn-success" id="update">Update</button>

                                        <?php }else{ ?>
                                        <button class="btn btn-primary" id="Additems">Add items</button>

                                        <?php
                                        }
                                    ?>
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
                                                                <th scope="col">Machine</th>
                                                                <th scope="col">Other Details</th>
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
                                                            <input type="text" class="form-control" name="remark"
                                                                id="remark" placeholder="Remark">
                                                        </div>
                                                        <div class="col-sm-4"></div>
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

        <!-- Buttons examples -->
        <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>


        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


        <!-- Responsive examples -->
        <script src="{{ asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script>
            $(function() {
                $(".data-table").hide();
                $("#submit").hide();
                $(document).ready(function() {
                    $("#update").click(function(e) {
                        var hidden_id = $('#hidden_id').val();
                        var item_id = $('#itemname').val();
                        var size_id = $('#size').val();
                        // var reason = $('#reason').val();
                        var qty = $('#qty').val();
                        var unit_id = $('#unit').val();
                        var owcissuereason_id = $('#reasone').val();
                        var machine_id = $('#machine').val();
                        var other = $('#other').val();
                        var date = $('#date').val();
                        var owc_number = $('#owc_number').val();
                        var seller_id = $('#seller').val();
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('owc.store') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                hidden_id: hidden_id,
                                date: date,
                                owc_number: owc_number,
                                owcissuereason_id: owcissuereason_id,
                                seller_id: seller_id,
                                item_id: item_id,
                                size_id: size_id,
                                qty: qty,
                                unit_id: unit_id,
                                machine_id: machine_id,
                                other: other,
                            },
                            success: function(data) {
                                console.log("dataaaafinalaa", data);
                                //  console.log("dataaaafinalaa",data['date']);
                                if (data['message']) {
                                    toastr.success(data['message']);
                                    window.location.href = "{{ route('owc.entry') }}";

                                } else {
                                    toastr.success(data['error']);
                                    $('#submit').prop(false);
                                }
                                $('#loader').hide();
                            }
                        });

                    });

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
                        var machine = $("#machine").val();
                        var other = $("#other").val();
                        var hidden_id = $("#hidden_id").val();

                        if (itemname == '' || size == '' || qty == '' || unit == '' || machine == '' ||
                            other == '') {
                            // If any field is empty, hide the table and the submit button
                            $(".data-table").hide();
                            $("#submit").hide();
                            toastr.warning("Please fill in all required fields");
                        } else {
                            $(".data-table").show();
                            $("#submit").show();
                            var count = $(".data-table tbody tr").length + 1;
                            // var itemname = $("#itemname").val();
                            // var size = $("#size").val();
                            // var qty = $("input[name='qty']").val();
                            // var unit = $("#unit").val();
                            // var machine = $('#machine').val();
                            // var other = $("input[name='other']").val();
                        }
                        $(".data-table tbody").append("<tr data-count='" + count +
                            "'  data-itemname='" + itemname +
                            "' data-itemname1='" + itemname1 +
                            "' data-size='" + size + "' data-size1='" + size1 +
                            "' data-quantity='" + qty + "' data-unit='" +
                            unit +
                            "' data-unit1='" + unit1 +
                            "' data-machine='" + machine + "'  data-other='" + other +
                            "'></td><td class='count'>" + count +
                            "<td class='itemname' style='display:none'>" + itemname +
                            "</td><td class='itemname1'>" + itemname1 +
                            "</td><td class='size' style='display:none'>" + size +
                            "</td><td class='size1'>" + size1 + "</td><td class='qty'>" + qty +
                            "</td><td class='unit' style='display:none'>" + unit +
                            "</td><td class='unit1'>" + unit1 +
                            "</td><td class='machine' style='display:none'>" +
                            machine +
                            "</td><td class='machine1'>" + machine1 + "</td><td class='other'>" +
                            other +
                            "</td><td><button class='btn btn-outline-danger btn-sm btn-delete' type='button'><i class='bx bxs-trash'></i></button></td></tr>"
                        );
                        $('#itemname').val('').trigger('change');
                        $('#size').val('').trigger('change');
                        $('#unit').val('').trigger('change');
                        $('#machine').val('').trigger('change');
                        $('#qty').val('');
                        $('#other').val('');
                    });

                    $("button#submit").click(function() {

                        var data = [];

                        $("#additemsdata tbody tr").each(function(index) {
                            var itemname = $(this).find('.itemname').text();
                            var size = $(this).find('.size').text();
                            var qty = $(this).find('.qty').text();
                            var unit = $(this).find('.unit').text();
                            var machine = $(this).find('.machine').text();
                            var other = $(this).find('.other').text();
                            var date = $('#date').val();
                            var owc_number = $('#owc_number').val();
                            var seller = $('#seller').val();
                            var reasone = $('#reasone').val();
                            var remark = $('#remark').val();
                            if (date == "") {
                                toastr.warning("Plase Enter Date");
                            } else if (owc_number == "") {
                                toastr.warning("Plase Enter Invoice Number.");
                            } else if (seller == "") {
                                toastr.warning("Plase Enter Seller Name");
                            } else if (reasone == "") {
                                toastr.warning("Plase Enter reasone");
                            } else {
                                data.push({
                                    date: date,
                                    owc_number: owc_number,
                                    seller: seller,
                                    reasone: reasone,
                                    remark: remark,
                                    itemname: itemname,
                                    size: size,
                                    qty: qty,
                                    unit: unit,
                                    machine: machine,
                                    other: other,

                                });
                                submitFormData(data);
                            }
                        });
                    });

                    function submitFormData(formData) {
                        // console.log("formData",formData);
                        if (formData == "") {
                            toastr.error("Please Enter InWard Details");
                        } else {
                            $('#loader').show();
                            $('#submit').prop('disabled', true);
                            $(".data-table").hide();
                            $("#submit").hide();
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('owc.store') }}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    data: formData,
                                },
                                success: function(data) {
                                    // console.log("dataaaaaa", data);
                                    if (data['message1']) {
                                        toastr.success(data['message1']);
                                        location.reload();
                                    } else {
                                        toastr.success(data['error']);
                                        $('#submit').prop('disabled', false);
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
            // Set the value of the dropdown in the input field when a row is selected
            $('.dropdown-menu a').on('click', function() {
                $('#mc_row').val($(this).text());
            });
            $('.dropdown-search').select2({
                // width: '200%',
                // height:'100%',
                placeholder: $(this).data('placeholder'),
            });
        </script>
    @stop
