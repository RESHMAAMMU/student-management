@extends('layouts.master')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>STUDENTS</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-3">
                    <div class="page-header">
                        <div class="page-title">
                            <div class="col-md-12 text-right">
                                <a href="javascript:void(0);" id = "add_new_user" class="btn btn-info create_btn">
                                    <font style="vertical-align: inherit;"><i class="ti-plus"></i> Add New Student
                                    </font>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="msgDiv"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Reporting Teacher</th>
                                <th width="25%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($user) > 0)
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($user as $row_data)
                            <tr>
                            
                                <th>{{ $i++ }}</th>
                                <td>{{ $row_data->name }}</td>
                                <td>{{ $row_data->age }}</td>
                                <td>{{ $row_data->gender }}</td>
                                <td>{{ $row_data->staff->name}}</td>
                                <td class="text-left">
                                    <a class="btn btn-sm btn-success text-white edit_btn edit_user" title="Edit" data-id="{{ $row_data->id }}"><i class="fa fa-edit"></i></a>

                                        <a class="btn btn-sm btn-danger text-white" title="Delete user" onclick="deleteUser({{ $row_data->id }})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-center">No records found!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
{{-- Pop Up --}}
<div class="modal fade" id="user_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="name_change"><strong>
                        ADD STUDENT
                    </strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="user_form" action="javascript:;" method="POST">
                <div class="modal-body">
                    <div class="msg_div"></div>
                    <div class="row">
                        <input type="hidden" name="user_unique" id='user_unique'>
                        <div class="col-md-6">
                            <label class="control-label">Name <span class="text-danger">*</span></label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="user_name" id="user_name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Age <span class="text-danger">*</span></label>
                            <input class="form-control form-white" placeholder="Enter age" type="test" id="age" name="age" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Gender <span class="text-danger">*</span></label>
                            <select class="form-control gender" name="gender" id="gender">
                                <option value="">Select Genender</option>
                                <option value="M">Male(M)</option>
                                <option value="F">Female(F)</option>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Staff <span class="text-danger">*</span></label>
                            <select class="form-control gender" name="staff" id="staff">
                                <option value="">Select Reporting staff</option>
                                   @foreach ($teachers as $item)
                                   <option value="{{$item->id}}">{{$item->name}}</option>
                                   @endforeach                           
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <input type="hidden" id="_customer_id" name="_customer_id" value="@if(isset($row_data['id'])) {{ $row_data['id'] }}@endif"> --}}
                    <button type="submit" class="btn btn-info waves-effect waves-light save-categorys" id="save_data">
                        ADD
                    </button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end popup --}}
@endsection
@push('css')
<style>
    .reset_style {
        margin-left: 15px;
    }
</style>
@endpush
@push('scripts')

<script>
    

    $('#add_new_user').on('click', function() {
     
        $('#name_change').html('Add Student');
        $('#save_data').text('Add').button("refresh");
        $("#user_form")[0].reset();
        $('#user_popup').modal({
            show: true
        });
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.save-categorys').on('click', function(e) {
        $("#user_form").validate({
            rules: {
                user_name: {
                    required: true,
                },
                age: {
                    required: true,
                    

                },
                gender: {
                    required: true,

                },
                staff: {
                    required: true,
                    // email:true

                },
            },
            messages: {
                user_name: {
                    required: "Student name required",
                },
                age: {
                    required: "Age required",
                    
                },
                gender: {
                    required: "Gender required",
                    
                },
                staff: {
                    required: 'Staff required'

                },
            },
            submitHandler: function(form) {
                user_unique = $("#user_unique").val();
                if (user_unique) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('student.update')}}",
                        data: $('#user_form').serialize(),

                        success: function(data) {
                            if (data.status == 1) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });
                                window.setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                                $("#user_form")[0].reset();
                            } else {
                                // console.log(data.message);
                                Toast.fire({
                                    icon: 'error',
                                    title: data.message
                                });
                            }
                        }
                    });


                } else {
                    $.ajax({
                        type: "POST",
                        
                        url: "{{route('student.store')}}",
                        data: $('#user_form').serialize(),

                        success: function(data) {
                            if (data.status == 1) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });
                                window.setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                                $("#user_form")[0].reset();
                            } else {
                                // console.log(data.message);
                                Toast.fire({
                                    icon: 'error',
                                    title: data.message
                                });
                            }
                        }
                    });

                }



            }
        })
    });

    $('.edit_user').on('click', function(e) {
        userId = $(this).data('id')
         $('#name_change').html('Edit student');
        $('#save_data').text('Save').button("refresh");


        var url = "student/edit/";

        $.get(url + userId, function(data) {
            
            $('#user_name').val(data.user.name),
                $('#age').val(data.user.age),
                $('#gender').val(data.user.gender),
                $('#staff').val(data.user.reporting_teacher),
                 $('#user_unique').val(data.user.id)
                $('#user_popup').modal({
                        show: true

                });
        });
    });

   
   
    
    function deleteUser(id) {
        $.confirm({
            title: false,
            content: 'Are you sure to delete this user? <br><br>You wont be able to revert this',
            buttons: {
                Yes: function() {
                    $.ajax({
                        type: "POST",
                        url: "{{route('student.delete')}}",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status == 1) {
                                window.setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.message
                                });
                            }
                        }
                    });
                },
                No: function() {
                    console.log('cancelled');
                }
            }
        });
    }
</script>
@endpush