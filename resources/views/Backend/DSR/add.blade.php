@extends('layouts.app')

@section('page_header')
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">DSR Add</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DSR Add</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
@endsection

@section('content')




<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- DSR Add -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">DSR Add</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="dsrAddForm" action="{{ route('dsr.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
          <div class="card-body">
                <!-- Employee Details-->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <i class="fa-solid fa-user-check"></i><span class="ml-1">Employee Details</span>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="firstName">First Name <span class="text-red">*</span></label>
                        <input value="{{old('firstName')}}" type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" data-error=".errorFname" required="">
                        <small class="errorFname"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="lastName">Last Name <span class="text-red">*</span></label>
                        <input value="{{old('lastName')}}" type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" data-error=".errorLname" required="">
                        <small class="errorLname"></small>
                    </div>


                    <div class="form-group col-lg-3">
                        <label>Gender<span class="text-red">*</span></label>
                        <select class="form-control select2" name="gender" id="gender" data-error=".errorGender" required="" >
            
                        <option disabled selected>Select Gender</option>
                        <option {{ old('gender') == 'male' ? "selected" : "" }}  value="male">Male</option>
                        <option {{ old('gender') == 'female' ? "selected" : "" }} value="female">Female</option>
                        <option {{ old('gender') == 'other' ? "selected" : "" }} value="other">Other</option>
                        </select>
                    
                        <small class="errorGender"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Religion<span class="text-red">*</span></label>
                        <select class="form-control select2" name="religion" id="religion" required="" data-error=".errorReligion">
                        <option disabled  selected>Select Religion</option>
                        <option {{ old('religion') == 'hinduism' ? "selected" : "" }} value="hinduism">Hinduism</option>
                        <option {{ old('religion') == 'islam' ? "selected" : "" }} value="islam">Islam</option>
                        <option {{ old('religion') == 'buddhists' ? "selected" : "" }} value="buddhists">Buddhists</option>
                        <option {{ old('religion') == 'christianity' ? "selected" : "" }} value="christianity">Christianity</option>
                        </select>
                  
                        <small class="errorReligion"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Role<span class="text-red">*</span></label>
                        <select class="select2 form-control" name="role_id" id="role_id" data-error=".errorrole_id" required="">
                        <option disabled selected>Select Role</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Accountant</option>
                            <option value="4">Computer Operator</option>
                            <option value="5">Store Incharge</option>
                            <option value="6">DSR</option>
                            <option value="7">Delivery Man</option>
                            <option value="8">Retailer</option>
                       
                        </select>
                    
                        <small class="errorrole_id"></small>
                    </div>

           
                    
                    <div class="form-group col-lg-3">
                        <label for="joining_date">Joining Date <span class="text-red">*</span></label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          
                          <input value="{{old('joining_date')}}" name="joining_date"  type="text" class="form-control float-right joining_date reservation" id="reservation" data-error=".errorjoining_date" required="" placeholder="dd/mm/yy">
                        </div>

                        <small class="errorjoining_date"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="designation">Designation<span class="text-red">*</span></label>
                        <input value="{{old('designation')}}" name="designation" id="designation" type="text" class="form-control" required="" data-error=".errordesignation" placeholder="Designation" >
                        <small class="errordesignation"></small>
                    
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="qualification">Qualification: <span class="text-red">*</span></label>
                        <textarea id="qualification" name="qualification" class="materialize-textarea form-control">{{old('qualification')}}</textarea>
                        <small class="errorqualification"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="experience_details">Experience Details: <span class="red-text"></span></label>
                        <textarea id="experience_details" name="experience_details" class="materialize-textarea form-control">{{old('experience_details')}}</textarea>
                        <small class="errorexperience_details"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="total_experience">Total Experience: <span class="red-text"></span></label>
                        <input id="total_experience" name="total_experience" type="text" class="total_experience form-control" data-error=".errortotal_experience" value="{{old('total_experience')}}" placeholder="Total Experience">
                        <small class="errortotal_experience"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Blood Group<span class="text-red"></span></label>
                        <select class="form-control select2" name="blood_group" id="blood_group" data-error=".errorblood_group" >
            
                        <option disabled selected>Select Blood Group</option>
                        <option {{ old('blood_group') == 'A+' ? "selected" : "" }}  value="A+">A+</option>
                        <option {{ old('blood_group') == 'A-' ? "selected" : "" }} value="A-">A-</option>
                        <option {{ old('blood_group') == 'B+' ? "selected" : "" }} value="B+">B+</option>
                        <option {{ old('blood_group') == 'B-' ? "selected" : "" }} value="B-">B-</option>
                        <option {{ old('blood_group') == 'O+' ? "selected" : "" }} value="O+">O+</option>
                        <option {{ old('blood_group') == 'O-' ? "selected" : "" }} value="O-">O-</option>
                        <option {{ old('blood_group') == 'AB+' ? "selected" : "" }} value="AB+">AB+</option>
                        <option {{ old('blood_group') == 'AB-' ? "selected" : "" }} value="AB-">AB-</option>
                        </select>
                     
                        <small class="errorblood_group"></small>
                    </div>

                   

                    <div class="form-group col-lg-3">
                        <label>Date Of Birth <span class="text-red">*</span></label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          
                          <input value="{{old('dob')}}" name="dob"  type="text" class="form-control float-right dob reservation" id="reservation" data-error=".errorDatepicker" required="" placeholder="dd/mm/yy">
                        </div>

                        <small class="errorDatepicker"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="phone">Mobile: <span class="text-red">*</span></label>
                        <input value="{{old('phone')}}" name="phone" id="phone" type="number" class="form-control" required="" data-error=".errorMobile" placeholder="Mobile" >
                        <small class="errorMobile"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="email">Email:</label>
                        <input value="{{old('email')}}" type="email" class="form-control" name="email" id="email" data-error=".errorEmail"  placeholder="Exm:abc@gmail.com" >
                        <small class="errorEmail"></small>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="address1">Present Address: <span class="text-red">*</span></label>
                        <input value="{{old('address1')}}" id="address1" name="address1" type="text" class="form-control" required="" data-error=".errorAddress1" placeholder="Present Address">
                    <small class="errorAddress1"></small>
                    </div>
                
                    <div class="form-group col-lg-6">
                        <label for="address2">Permanent Address: <span class="text-red">*</span></label>
                        <input value="{{old('address2')}}" id="address2" name="address2" type="text" class="form-control" required="" data-error=".errorAddress2" placeholder="Permanent Address">
                        <small class="errorAddress2"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Country: <span class="text-red">*</span></label>
                        <select  class="form-control select2" name="city" id="city" required="" data-error=".errorCity">
                          <option value="bangladesh">Bangladesh</option>
                        </select>
                        
                        <small class="errorCity"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="nid_number">NID Number: <span class="text-red">*</span></label>
                        <input value="{{old('nid_number')}}" name="nid_number" id="nid_number" type="number" class="form-control" required="" data-error=".errornid_number" placeholder="NID Number">
                        <small class="errornid_number"></small>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="customFile">Image<span class="text-red">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image" required=""> 
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

    
                </div>

                <!-- Guardian Details-->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <i class="fa-sharp fa-solid fa-users"></i><span class="ml-1">Guardian  Details</span>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="father_name">Father Name<span class="text-red">*</span></label>
                        <input value="{{old('father_name')}}" id="father_name" name="father_name" type="text" class="form-control" required="" data-error=".errorfather_name" placeholder="Father Name">
                         <small class="errorfather_name"></small>
                    </div>
                
                    <div class="form-group col-lg-3">
                        <label for="mother_name">Mother Name<span class="text-red">*</span></label>
                        <input value="{{old('mother_name')}}" id="mother_name" name="mother_name" type="text"  class="form-control" required="" data-error=".errormother_name" placeholder="Mother Name">
                        <small class="errormother_name"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="gurdian_mobile">Mobile: <span class="text-red">*</span></label>
                        <input value="{{old('gurdian_mobile')}}" name="gurdian_mobile" id="gurdian_mobile" type="number" class="form-control" required="" data-error=".errorMgurdianmobile" placeholder="Gurdian Mobile" >
                        <small class="errorMgurdianmobile"></small>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="gurdian_nid_number">Gurdian NID Number: <span class="text-red">*</span></label>
                        <input value="{{old('gurdian_nid_number')}}" name="gurdian_nid_number" id="gurdian_nid_number" type="number" class="form-control" required="" data-error=".errorgurdian_nid_number" placeholder="Gurdian NID Number">
                        <small class="errorgurdian_nid_number"></small>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="relationship">Relationship<span class="text-red">*</span></label>
                        <input value="{{old('relationship')}}" id="relationship" name="relationship" type="text"  class="form-control" required="" data-error=".errorrelationship" placeholder="Relationship">
                        <small class="errorrelationship"></small>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="customFile">Gurdian Image<span class="text-red">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="gurdian_image" required=""> 
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="customFile">Gurdian Documents<span class="text-red">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="gurdian_documents" required=""> 
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                </div>

                <!-- Login Details-->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <i class="fa-solid fa-user-lock"></i><span class="ml-1">Login Details</span>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="username">Username: <span class="text-red">*</span></label>
                        <input value="{{old('username')}}" id="username" name="username" type="text" class="form-control" data-error=".errorusername" required="" placeholder="Username">
                        <small class="errorusername"></small>
                    </div>
                

                    <div class="form-group col-lg-3">
                        <label for="password">Password <span class="text-red">*</span></label>
                        <input id="password" type="password" name="password" data-error=".errorTxt3" required="" class="form-control" placeholder="Password">
                        <small class="errorTxt3"></small>
                    </div>

                    
                
         

                  
                
                    <div class="form-group col-lg-3">
                        <label for="cpassword">Confirm Password <span class="text-red">*</span></label>
                        <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt4" required="" class="form-control" placeholder="Confirm Password">
                        <small class="errorTxt4"></small>
                    </div>

                    <div class="form-group col-lg-3 last">
                        <label>Status: <span class="text-red">*</span></label>

                        <select class="form-control select2" name="status" id="status" data-error=".errorTxt35" required="">
                          <option  value="" disabled selected>Select Status</option>
                          <option {{ old('status') == 'active' ? "selected" : "" }} value="active">Active</option>
                          <option {{ old('status') == 'inactive' ? "selected" : "" }} value="inactive">Inactive</option>
                        </select>
                        
                        <small class="errorTxt35"></small>
                    </div>

                </div>

                <!-- Social Links Details-->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <i class="fa-solid fa-globe"></i><span class="ml-1">Social Links</span>
                    </div>

                    <div class="addRow col-lg-12" id="addRow">
                        <div id="delete_add_more_item" class="delete_add_more_item row">
                            <div class="form-group col-lg-3">
                                <label for="socialicon">Select Social<span class="text-red"></span></label>

                                <select class="select2 form-control" name="socialicon[]" id="socialicon" data-error=".socialicon30" >
                                        <option  selected value=""> <i class="fab fa-twitter"></i> Select Social Link</option>
                                        <option {{ old('socialicon.0') == 'facebook' ? "selected" : "" }}  value="facebook">Facebook</option>
                                        <option {{ old('socialicon.0') == 'twitter' ? "selected" : "" }}  value="twitter">Twitter</option>
                                        <option {{ old('socialicon.0') == 'linkedIn' ? "selected" : "" }}  value="linkedIn">LinkedIn</option>
                                        <option {{ old('socialicon.0') == 'instagram' ? "selected" : "" }}  value="instagram">Instagram</option>
                                        <option {{ old('socialicon.0') == 'youtube' ? "selected" : "" }}  value="youtube">Youtube</option>          
                                </select>
    
                                <small class="socialicon30"></small>
                            </div>

                            <div class="form-group col-lg-7">
                                <label for="socialUrl">Url</label>
                                <input value="{{old('socialUrl.0')}}"  name="socialUrl[]" class="form-control" type="url" placeholder="https://example.com">
                            </div>

                            <div style="margin-top: 3% !important;" class="form-group col-lg-2 mt-4">
                         

                                <div id="add" class="btn bg-gradient-success btn add">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
 
                                <div class="btn bg-gradient-warning btn removeeventmore">
                                    <i class="fas fa-minus-circle"></i>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                </div>

                
                <!-- Bank Details-->
                <div class="row">
                    <div class="col-lg-12 mb-3 headers-line">
                        <i class="fa-solid fa-building-columns"></i><span class="ml-1">Bank Details</span>
                    </div>



                    <div class="form-group col-lg-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="chkskippedDSR" >
                            <label for="chkskippedDSR" class="custom-control-label">Skipped Bank Details</label>
                        </div>
                    </div>

                    <div id="bank_details_form" class="col-lg-12">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="bank_name">Bank Name: <span class="text-red">*</span></label>
                                <input value="{{old('bank_name')}}" name="bank_name" id="bank_name" type="text" class="form-control" required="" data-error=".errorbank_name" placeholder="Bank Name">
                                <small class="errorbank_name"></small>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="AC_holder">Account Holder: <span class="text-red">*</span></label>
                                <input value="{{old('AC_holder')}}" name="AC_holder" id="AC_holder" type="text" class="form-control" required="" data-error=".errorAC_holder" placeholder="Account Holder">
                                <small class="errorAC_holder"></small>
                            </div>
                        
                            <div class="form-group col-lg-3">
                                <label for="branch_name">Branch Name: <span class="text-red">*</span></label>
                                <input value="{{old('branch_name')}}" name="branch_name" id="branch_name" type="text" class="form-control" required="" data-error=".errorbranch_name" placeholder="Branch Name">
                                <small class="errorbranch_name"></small>
                            </div> 
                        
                            <div class="form-group col-lg-3">
                                <label for="bank_AC">Account Number: <span class="text-red">*</span></label>
                                <input value="{{old('bank_AC')}}" name="bank_AC" id="bank_AC" type="number" class="form-control" required="" data-error=".errorbank_AC" placeholder="Account Number">
                                <small class="errorbank_AC"></small>
                            </div>
                        </div>
                    
                        
                    </div>

                </div>

                
                <!-- Other Details-->
                <div class="row">
                    <div class="col-lg-12 mb-3 headers-line mt-2">
                        <i class="fa-solid fa-briefcase"></i><span class="ml-1">Other Details</span>
                    </div>

                    <div class="input-field col-lg-12 mb-3">
                        <label for="about">Other Info </label>
                     
                        <textarea id="about" name="about" class="materialize-textarea form-control">{{old('about')}}</textarea>

                        <small class="errorabout"></small>
                    </div>
                
                
                    <div class="form-group input-field file-field col-lg-12 mb-3">
                        <label for="cv">CV<span class="text-red">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input cv" id="cv" name="cv" required=""> 
                            <label class="custom-file-label" for="cv">Choose file</label>
                        </div>
                    </div>



                    

                    

              
                </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
      </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
</div>


<!-- x-handlebars-template social Information-->
<script id="document-template" type="text/x-handlebars-template">
    <div id="delete_add_more_item" class="delete_add_more_item row">
    
        <div class="form-group col-lg-3">
            <label for="socialicon">Select Social<span class="text-red"></span></label>
        
            <select class="select2 browser-default validate form-control" name="socialicon[]" id="socialicon2" data-error=".socialicon0" >
                <option selected value="">Select Social Link</option>
                <option value="facebook">Facebook</option>
                <option value="twitter">Twitter</option>
                <option value="linkedIn">LinkedIn</option>
                <option value="instagram">Instagram</option>
                <option value="youtube">Youtube</option>
                
            </select>
                <small class="socialicon0"></small>
        </div>

        <div class="form-group col-lg-7">
            
            <label for="socialUrl">Url</label>
            <input id="url" class="form-control" type="url" name="socialUrl[]" data-error=".urlerror" placeholder="https://example.com">
                <small class="urlerror"></small>
        </div>

        <div style="margin-top: 3% !important;" class="form-group col-lg-2 mt-4">
            <div id="add" class="btn bg-gradient-success btn add"><i class="fas fa-plus-circle"></i></div>

            <div class="btn bg-gradient-warning btn removeeventmore"><i class="fas fa-minus-circle"></i></div>
        </div>

       

    </div>
</script>
 <!-- x-handlebars-template social Information End-->

@endsection