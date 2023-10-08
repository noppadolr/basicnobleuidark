@extends('admin.body.main')
@section('title','All Suppliers')
@section('main')
    @push('css')
        <link rel="stylesheet" href="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">

    @endpush
    @include('backend.supplier.add_supplier_modal')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Suppliers</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn btn-inverse-warning" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Supplier</button>
                        <br>

                        <h6 class="card-title">Suppliers All Data</h6>


                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($supp as $key =>$item)
                                    <tr>

                                        <td>{{$key+1}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            <a href="" class="btn btn-inverse-warning btn-icon btn-sm" title="Edit"><i class="link-icon" data-feather="edit"></i> </a>
                                            <a href="" class="btn btn-inverse-danger btn-icon btn-sm" title="Delete" id="delete"><i class="link-icon" data-feather="trash-2"></i> </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('script')
        <!-- Plugin js for this page -->
        <script src="{{asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
        <!-- End plugin js for this page -->
        <script src="{{asset('admin/assets/js/data-table.js')}}"></script>
        <script>
            $('#exampleModal').on('hidden.bs.modal', function (e) {

                     $('#myForm').find("input[type=text], input[type=email]").val("");


            })

        </script>
        <script src="{{asset('validate.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        name: {
                            required : true,
                        },
                        phone: {
                            required : true,
                        },
                        address: {
                            required : true,
                        },
                        email: {
                            required : true,
                        },

                    },
                    messages :{
                        name: {
                            required : 'Please Enter Supplier Name',
                        },
                        phone: {
                            required : 'Please Enter Supplier Phone Number',
                        },
                        address: {
                            required : 'Please Enter Supplier Address',
                        },
                        email: {
                            required : 'Please Enter Supplier EmailAddress',
                        },


                    },
                    errorElement : 'span',
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>
        <script type="text/javascript">
            @if(Session::has('supplierAdded'))
            $(document).ready( function () {
                showSwal('supplierAdded');
            });

            @endif
        </script>

    @endpush
@endsection
