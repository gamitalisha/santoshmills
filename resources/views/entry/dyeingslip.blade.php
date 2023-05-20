@extends('layouts.app')
@section('content')

                            <form class="my-sm-4" style="">
                                <div class="d-flex justify-content-center font-weight-bold">
                                <h3>Dyeing Slip Issue</h3>
                            </div>



                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Master Name:</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="formrow-date-input" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="formrow-date-input" placeholder="" value="{{ date('Y-m-d') }}">
                                      </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Machine Number</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Lott No.</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Shade</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Party</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Quality</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Quality Weight</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Taka</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Meter</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Total Lott Weight</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Dyieng Status</label>
                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>


                          
                            </div>
                          
                            </form>



                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="card">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered td-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr.No.</th>
                                                                        <th>Item Name</th>
                                                                        <th>Size</th>
                                                                        <th>Quantity</th>
                                                                        <th>Units</th>
                                                                        <th>Machine</th>
                                                                        <th>Other Details</th>
                                                                        {{-- <th style="text:right; text-align:center;">Action</th> --}}
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="td-responsive">
                                                                    
                                                                    {{-- @foreach($subgroup as $row) 
                                                                     <tr>
                                                                            <td>{{$row->sub_group}}</td>
                                                                            <td style="text-align:center;">
                                                                                <button type="submit" class="btn btn-outline-primary btn-sm edit-btn" 
                                                                                data-id="{{$row->id}}" title="Edit">
                                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                                            </button>
                                                                                <button type="submit" id="btn-del" class="btn btn-outline-danger btn-sm del-btn"
                                                                                    data-id="{{$row->id}}"><i class="bx bxs-trash"></i></button>
                                        
                                                                            </td>
                                                                        </tr> 
                                                                @endforeach --}}
                                                                </tbody>
                                                               
                                                            </table>
                                                            <div class="row mb-1">
                                                                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                                                                    <label for="horizontal-firstname-input" class="col-4 col-md-3 col-form-label font-weight-bold text-md-end">Remarks:</label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <input type="text" class="form-control" id="horizontal-firstname-input" placeholder="">
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                              
                                                            
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
                            <script src="{{asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
                           <script src="{{asset('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                           <script src="{{asset('public/assets/js/pages/datatables.init.js')}}"></script>    
                
                                   <!-- Buttons examples -->
                            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
                            <script src="{{asset('public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
                            <script src="{{asset('public/assets/libs/jszip/jszip.min.js')}}"></script>
                            <script src="{{asset('public/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
                            <script src="{{asset('public/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
                            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
                            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
                            <script src="{{asset('public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
                            
                   
                
                        <!-- Responsive examples -->
                        <script src="{{asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
                        <script src="{{asset('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

                           
 
@stop