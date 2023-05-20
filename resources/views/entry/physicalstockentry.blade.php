@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="card-title">Physical Stock Entry</h4>
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

                    <form class="my-sm-5">
                        <div class="row d-flex justify-content-center my-sm-4">
                            <div class="col-lg-12 container">
                                <div class="row">
                                    <div class="col-md-4 container">
                                        <div class="mb-3">
                                            <label for="formrow-date-input" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                placeholder="" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Item</label>
                                            <input type="text" class="form-control" id="item" name="item"
                                                placeholder="Enter Item">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Weight</label>
                                            <input type="text" class="form-control" id="weight" name="weight"
                                                placeholder="Enter Weight">
                                        </div>
                                    </div>
                                    <div class="container">
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
                                        <th scope="col">Item</th>
                                        <th scope="col">Weight</th>
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
                var item = $("#item").val();
                var weight = $("#weight").val();

                if (item == '' || weight == '') {
                    // If any field is empty, hide the table and the submit button
                    $(".data-table").hide();
                    $("#submit").hide();
                    toastr.warning("Please fill in all required fields");
                } else {
                    $(".data-table").show();
                    $("#submit").show();
                    var count = $(".data-table tbody tr").length + 1;
                    var item = $("#item").val();
                    var weight = $("#weight").val();
                }
                $(".data-table tbody").append("<tr data-count='" + count +
                    "'  data-item='" + item +
                    "' data-weight='" + weight + "'</td><td class='count'>" + count + "<td class='item'>" +
                    item +
                    "</td><td class='weight'>" + weight + "</td><td><button class='btn btn-outline-danger btn-sm btn-delete' type='button'><i class='bx bxs-trash'></i></button></td></tr>"
                );
                $('#item').val('');
                $('#weight').val('');
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
                    var item = $(this).find('.item').text();
                    var weight = $(this).find('.weight').text();
                    var meter = $(this).find('.meter').text();
                    var amount = $(this).find('.amount').text();
                    data2.push({
                        item: item,
                        weight: weight,
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
            $('#submit').prop(true);
            $.ajax({
                    type:'POST',
                    url:"{{ route('physical.store') }}",
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
