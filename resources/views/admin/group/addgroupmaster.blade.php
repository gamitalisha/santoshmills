@extends('layouts.app')
<?php
    if(@$group){?>
@section('title', 'Update Group Master')
<?php }else{ ?>
@section('title', 'Group Master');
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
                            Update Group Master
                            <?php }else{ ?>
                            Add Group Master
                            <?php
                            }

                        ?>
                        </h4>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" style="text-align: right;">
                        <a href="{{ route('group.master')}}" key="t-flag">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">View
                                Group</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="box">
                                <div class="row clearfix">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="hidden" name="hidden_id" id="hidden_id"
                                                value="{{@$group->id}}" />
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter Group Name" value="{{@$group->name}}">
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
                                <div class="col-sm-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary" id='btn-submit'>Submit</button>

                                        <a href="{{ route('group.master')}}" class="btn btn-outline-secondary">
                                            Cancel</a>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @stop
        @section('script')
        <script>
        $("#btn-submit").click(function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var hidden_id = $("#hidden_id").val();
            if (name == '') {
                toastr.warning("Please Enter Group name");
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('group.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        hidden_id: hidden_id
                    },
                    success: function(data) {
                        if (data['message']) {
                            toastr.success(data['message']);
                            $("#name").val('');
                        } else {
                            toastr.error(data['error']);
                        }
                    }
                });
            }
        });
        </script>
        @endsection