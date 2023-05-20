@extends('layouts.app')
<?php
    if(@$seller){?>
@section('title', 'Update Seller Details')
<?php }else{ ?>
@section('title', 'Seller Details');
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
                        <h4 class="card-title">

                            <?php
                            if(@$group){?>
                            Update Seller Details
                            <?php }else{ ?>
                            Add Seller Details
                            <?php
                            }

                        ?>
                        </h4>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('seller.details')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">View
                            Seller</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box">
                        <div class="row clearfix">
                            <div class="col-sm-8">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <h4 class="card-title mb-4">Seller Details</h4> -->
                                            <form>
                                                <input type="hidden" id="hidden_id" name="hidden_id" value="{{@$seller->id}}">
                                                <div class="row mb-4">
                                                    <label for="s_name-input" class="col-sm-3 col-form-label">Name Of
                                                        The Seller:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="s_name" value="{{@$seller->s_name}}"
                                                            name="s_name" placeholder="Enter Saller Name ">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="address-input"
                                                        class="col-sm-3 col-form-label">Address:</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" class="form-control" id="address" value="{{@$seller->address}}"
                                                            name="address" placeholder="Enter Address">{{@$seller->address}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="contact-input" class="col-sm-3 col-form-label">Contact
                                                        Person:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="contact" value="{{@$seller->contact}}"
                                                            name="contact" placeholder="Enter Contact  Person">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="phone-input" class="col-sm-3 col-form-label">Phone
                                                        NO.:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{@$seller->phone}}"
                                                            placeholder="Enter Phone NO">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="gst_num-input" class="col-sm-3 col-form-label">GST
                                                        IN</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="gst_num" value="{{@$seller->gst_num}}"
                                                            name="gst_num" placeholder="Enter GST IN">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="pan-input" class="col-sm-3 col-form-label">PAN</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="pan" name="pan" value="{{@$seller->pan}}"
                                                            placeholder="Enter Your pan">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="pan-input" class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-2">
                                                     <input class="form-check-input" type="radio" name="gst" id="gst1" value="1" {{ '1' == @$seller->gst ? 'checked' : '' }}>
                                                     <label class="form-check-label" for="gst">CGST/SGST</label>
                                                   </div>
                                                   <div class="col-sm-2">
                                                     <input class="form-check-input" type="radio" name="gst" id="gst2" value="2" {{ '2' == @$seller->gst ? 'checked' : '' }}>
                                                     <label class="form-check-label" for="gst">IGST</label>
                                                   </div>

                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9">
                                                        <div>
                                                            <button type="submit" id="btn-submit" class="btn btn-primary w-md">Submit</button>
                                                            <a href="{{ route('seller.details')}}"
                                                                class="btn btn-outline-secondary">
                                                                Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div id="dynamic_field"> </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row clearfix">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
$('#gst_num').keyup(function(ev) {
    var gstin = $("#gst_num").val();
    var outputString = gstin.substr(2, 9);
    var gst=gstin.substr(0, 2);
    if(gst=="24"){
        $('input:radio[name=gst]')[0].checked = true;
    }else{
        $('input:radio[name=gst]')[1].checked = true;

    }
    $("#pan").val(outputString);
});

$("#btn-submit").click(function(e) {
    e.preventDefault();
    var s_name = $("#s_name").val();
    var address = $("#address").val();
    var contact = $("#contact").val();
    var phone = $("#phone").val();
    var gstin = $("#gst_num").val();
    var pan = $("#pan").val();
    var gst = $("input[name='gst']:checked").val();
    var hidden_id = $("#hidden_id").val();
    if (s_name == '') {
        toastr.warning("Please Enter name");
    } else {
        $.ajax({
            type: 'POST',
            url: "{{ route('seller.store') }}",
            data: {
                _token: "{{ csrf_token() }}",
                s_name: s_name,
                address: address,
                contact: contact,
                phone: phone,
                gstin:gstin,
                pan: pan,
                hidden_id: hidden_id,
                gst:gst,
            },
            success: function(data) {
                if (data['message']) {
                    toastr.success(data['message']);
                    window.location.href = "{{ route('seller.details') }}";

                } else {
                    toastr.error(data['error']);
                }
            }
        });
    }
});
</script>
@endsection
