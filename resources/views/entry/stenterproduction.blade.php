@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="card-title">Stenter Production Entry</h4>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4" style="text-align: right;">
                            <a href="#" key="t-flag">
                                <button type="button" class="btn btn-outline-primary waves-effect waves-light">Stenter
                                    Production Show</button>
                            </a>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="col-lg-12">
                        <div class="row">

                        </div>
                    </div>

                    <form class="my-sm-5" style="">
                        <div class="row d-flex justify-content-center my-sm-4">
                            <div class="col-lg-12 container">
                                <div class="row">
                                    <div class="col-md-2 container">
                                        <div class="mb-3">
                                            <label for="formrow-date-input" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                placeholder="" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Machine</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="machine" name="machine"
                                                    data-placeholder="Choose Machine Name">
                                                    <option value=""></option>
                                                    @foreach ($machine as $category)
                                                        <option value="{{ $category->machine }}">{{ $category->machine }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Master</label>
                                            <div class="dropdown hstack gap-3">
                                                <select class="form-control dropdown-search" id="master" name="master"
                                                    data-placeholder="Choose master">
                                                    <option value=""></option>
                                                    @foreach ($master as $category)
                                                        <option value="{{ $category->master_name }}">
                                                            {{ $category->master_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Enter Meter</label>
                                            <input type="text" class="form-control" id="meter" name="meter"
                                                placeholder="Enter Meter">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount"
                                                placeholder="Enter Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" id="Additems">Add items</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row12" style="padding: 5px;">
                            <table class="table table-bordered table-responsive data-table" id="additemsdata">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">Machine</th>
                                        <th scope="col">Master</th>
                                        <th scope="col">Meter</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>

                            </table>

                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-12 mb-3" style="float:left;margin-left:10px;">
                                <button type="button" class="btn btn-success savebtn" id="submit">Submit</button>
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

            $("#Additems").click(function(e) {
                e.preventDefault();
                var machine = $("#machine").val();
                var master = $("#master").val();
                var meter = $("#meter").val();
                var amount = $("#amount").val();

                if (machine == '' || master == '' || meter == '' || amount == '') {
                    // If any field is empty, hide the table and the submit button
                    $(".data-table").hide();
                    $("#submit").hide();
                    toastr.warning("Please fill in all required fields");
                } else {
                    $(".data-table").show();
                    $("#submit").show();
                    var count = $(".data-table tbody tr").length + 1;
                    var machine = $("#machine").val();
                    var master = $("#master").val();
                    var meter = $("input[name='meter']").val();
                    var amount = $("#amount").val();
                }
                $(".data-table tbody").append("<tr data-count='" + count +
                    "'  data-machine='" + machine +
                    "' data-master='" + master + "' data-meter='" + meter + "' data-amount='" +
                    amount +
                    "'></td><td class='count'>" + count + "<td class='machine'>" +
                    machine +
                    "</td><td class='master'>" + master + "</td><td class='meter'>" + meter +
                    "</td> <td class='amount'>" + amount + "</td><td><button class='btn btn-outline-danger btn-sm btn-delete' type='button'><i class='bx bxs-trash'></i></button></td></tr>"
                );
                $('#machine').val('');
                $('#master').val('');
                $('#meter').val('');
                $('#amount').val('');
            });


        $("button#submit").click(function() {
            var data1 = [];
            var data2 = [];
            var data = [];
            var date = $('#date').val();
           
            if (date == "") {
                toastr.warning("Plase Enter Date");
            } else {
                data1.push({
                    date:date,
                });
                $("#additemsdata tbody tr").each(function(index) {
                    var machine = $(this).find('.machine').text();
                    var master = $(this).find('.master').text();
                    var meter = $(this).find('.meter').text();
                    var amount = $(this).find('.amount').text();
                    data2.push({
                        machine: machine,
                        master: master,
                        meter: meter,
                        amount: amount,
                    });
                    });
               
                    data.push({
                        details: data1,
                        items: data2,
                    });
                submitFormData(data);
            }
        });

        function submitFormData(formData) {
            if(formData==""){
            toastr.error("Please Enter InWard Details");
            }else{
            $('#loader').show();
            $('#submit').prop('disabled', true);
            $.ajax({
                    type:'POST',
                    url:"{{ route('stentner.store') }}",
                    data:{_token:"{{ csrf_token() }}",
                    data:formData,
                    },
                    success:function(data) {
                        console.log("dataaaaaa",data);
                        if(data['message1']){
                            toastr.success(data['message1']);
                            location.reload();
                        }else{
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
