@extends('layouts.app')
@section('title', 'Item Details')
@section('content')
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: black !important;
            line-height: 28px;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="card-title">Item Details</h4>
                        </div>
                        <div class="col-lg-4"></div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- <h4 class="card-title mb-4">Item Details</h4> --}}

                                            <form>
                                                <div class="row">
                                                    <input type="hidden" name="editid" id="editid">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-firstname-input" class="form-label"
                                                                style="float:left;">Item Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" placeholder="Enter item Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-inputCity" class="form-label"
                                                                style="float:left;">HSN Code</label>
                                                            <input type="text" class="form-control" name="hsn_code"
                                                                id="hsn_code" placeholder="Enter HSN Code">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <div class="dropdown">
                                                                <label for="formrow-inputCity" class="form-label"
                                                                    style="float:left;">Group</label>
                                                                <select class="form-control dropdown-search" id="group_id"
                                                                    name="group_id" data-placeholder="Choose Group">
                                                                    <option value=""></option>
                                                                    @foreach ($group_name as $row)
                                                                        <option value="{{ $row->id }}">
                                                                            {{ $row->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-inputCity" class="form-label"
                                                                style="float:left;">Sub Group</label>
                                                            {{--  <input type="text" class="form-control" name="sub_group"
                                                                id="sub_group" placeholder="Enter Sub Group">  --}}

                                                                <select class="form-control dropdown-search" id="sub_group"
                                                                name="sub_group" data-placeholder="Choose Group">
                                                                <option value=""></option>
                                                                @foreach ($subgroup_name as $row)
                                                                    <option value="{{ $row->id }}">
                                                                        {{ $row->sub_group }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="form-group">
                                                        <input type="hidden" name="hidden_id" id="hidden_id"
                                                            value="1">
                                                        <form name="add_name" id="add_name">
                                                            <div class="table-responsive">
                                                                <table class="table" id="logo">
                                                                    <tr>
                                                                        <td><input type="text" name="alias1"
                                                                                id="alias1"
                                                                                placeholder="Enter Alias Name"
                                                                                class="form-control name_list"
                                                                                required="" /></td>
                                                                        <td><input type="text" name="code1"
                                                                                id="code1" placeholder="Enter HSN Code"
                                                                                class="form-control name_list"
                                                                                required="" /></td>
                                                                        <td><button type="button" name="add"
                                                                                id="add" class="btn btn-success">Add
                                                                                More</button></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <div class="hstack gap-3 d-flex justify-content-center">
                               <button class="btn btn-primary" id="update">Update</button>
                                <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>

                                <div class="vr"></div>
                                <button type="button" id="reset" class="btn btn-outline-danger">Reset</button>
                            </div>
                        </center>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body centered">
                                            <table id="datatable" class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>HSN Code</th>
                                                        <th>Group Id</th>
                                                        <th>Sub Group</th>
                                                        <th>Alias</th>
                                                        <th>Alias HSN</th>
                                                        <th style="text-align:right;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="dt-responsive">
                                                    @foreach ($item as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->hsn_code }}</td>
                                                            <td>{{ $item->gname }}</td>
                                                            <td>{{ $item->sub_group }}</td>
                                                            <td>{{ $item->alias_name }}</td>
                                                            <td>{{ $item->alias_hsn }}</td>
                                                            <td style="text-align:center;">
                                                                <button type="submit"
                                                                    class="btn btn-outline-primary btn-sm edit-btn"
                                                                    data-id="{{ $item->id }}" title="Edit">
                                                                    <i class="fas fa-pencil-alt" title="Edit"></i>
                                                                </button>
                                                                <button type="submit" id="btn-del"
                                                                    class="btn btn-outline-danger btn-sm del-btn"
                                                                    data-id="{{ $item->id }}"><i
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

            <!-- Datatable init js -->
            {{-- <script src="{{asset('public/assets/js/app.js')}}"></script> --}}
            <script>
                $(document).ready(function() {
                    $("#update").hide();
                    $("#btn-submit").click(function(e) {
                        e.preventDefault(); // Prevent the default form submission

                        var data = [];
                        var data1 = [];
                        var data2 = [];

                        var value = $('#hidden_id').val();
                        var editid = $('#editid').val();
                        var item = $('#name').val();
                        var hsn_code = $('#hsn_code').val();
                        var group = $('#group_id').val();
                        var sub_group = $('#sub_group').val();

                        data1.push({
                            item: item,
                            hsn_code: hsn_code,
                            group: group,
                            sub_group: sub_group,
                            editid: editid
                        });

                        for (var i = 1; i <= value; i++) {
                            var code = $('#code' + i).val();
                            var alias = $('#alias' + i).val();
                            data2.push({
                                code: code,
                                alias: alias
                            });
                        }

                        data.push({
                            item: data2,
                            details: data1,
                        });

                        submitFormData(data);
                    });

                    function submitFormData(formData) {
                        if (formData.length === 0) {
                            toastr.error("Please Enter InWard Details");
                        } else {
                            $('#loader').show();
                            $('#submit').prop('disabled', true);

                            $.ajax({
                                type: 'POST',
                                url: "{{ route('item.store') }}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    data: formData

                                },
                                success: function(data) {
                                    console.log("dataaaafinalaa", data);
                                    if (data['message']) {
                                        toastr.success(data['message']);
                                        location.reload();
                                    } else {
                                        toastr.success(data['error']);
                                        $('#submit').prop('disabled', false);
                                    }
                                    $('#loader').hide();
                                },

                            });
                        }
                    }

                    $("#reset").click(function(e) {
                        e.preventDefault();
                        toastr.info("Reset Form Successfully");
                        location.reload();
                    });

                    $(".del-btn").click(function(e) {
                        var dataId = $(this).attr('data-id');
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('item.delete') }}",
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

                    $(".edit-btn").click(function(e) {
                        e.preventDefault();
                        var dataId = $(this).attr('data-id');

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('item.edit') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: dataId
                            },
                            success: function(data) {
                                $("#update").show();
                                $("#btn-submit").hide();

                                console.log("mydata", data);
                                var editid = data['id'];
                                $('#editid').val(editid);
                                $('#name').val(data['name']);
                                $('#hsn_code').val(data['hsn_code']);
                                var selectedGroupId = data['group_id'];
                                $('#group_id').val(selectedGroupId);
                                $('#sub_group').val(data['sub_group']);
                                var aliasValue = data['alias_name'];
                                $('#alias1').val(aliasValue);
                                var aliasHsn = data['alias_hsn'];
                                $('#code1').val(aliasHsn);
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'fast');

                                $('#group_id').change();
                            },

                        });
                    });

                    $('.dropdown-search').on('keyup', function() {
                        var value = $(this).val().toLowerCase();
                        $('.dropdown-menu li').filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                        });
                    });

                    // Set the value of the dropdown in the input field when a row is selected
                    $('.dropdown-menu a').on('click', function() {
                        $('#group_id').val($(this).text());
                    });

                    $('.dropdown-search').select2({
                        placeholder: $(this).data('placeholder')
                        // allowClear: true
                    });



                    $("#update").click(function(e) {
                        var editid = $('#editid').val();
                        var name = $('#name').val();
                        var hsn_code = $('#hsn_code').val();
                        var group_id = $('#group_id').val();
                        var sub_group = $('#sub_group').val();
                        var alias_name = $('#alias1').val();
                        var alias_hsn = $('#code1').val();

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('item.store') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                editid: editid,
                                name: name,
                                hsn_code: hsn_code,
                                group_id: group_id,
                                sub_group: sub_group,
                                alias_hsn: alias_hsn,
                                alias_name: alias_name,
                            },
                            success: function(data) {
                                // console.log("dataaaafinalaa", data);
                                 console.log("dataaaafinalaa",data['alias_hsn']);
                                if (data['message']) {
                                    toastr.success(data['message']);
                                    location.reload();
                                } else {
                                    toastr.success(data['error']);
                                    $('#submit').prop(false);
                                }
                                $('#loader').hide();
                            }
                        });

                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    var postURL = "/addmore.php";
                    var i = 1;

                    $('#add').click(function() {
                        i++;
                        var newRow = '<tr id="row' + i + '" class="dynamic-added">' +
                            '<td><input type="text" name="name' + i + '" placeholder="Enter your Name"  id="alias' +
                            i + '" class="form-control name_list" required /></td>' +
                            '<td><input type="text" name="name' + i + '" placeholder="Enter your Name"  id="code' +
                            i + '" class="form-control name_list" required /></td>' +
                            '<td><button type="button" name="remove" id="' + i +
                            '" class="btn btn-danger btn_remove">Remove</button></td>' +
                            '</tr>';

                        $('#logo').append(newRow);
                        $('#hidden_id').val(i);
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id).remove();
                        var id = $('#hidden_id').val();
                        // var res = id - 1;

                        // $('#hidden_id').val(res);
                    });

                    $('#submit').click(function() {
                        $.ajax({
                            url: postURL,
                            method: "POST",
                            data: $('#add_name').serialize(),
                            type: 'json',
                            success: function(data) {
                                i = 1;
                                $('#add_name')[0].reset();
                                alert('Record Inserted Successfully.');
                            }
                        });
                    });

                });
            </script>

        @stop
