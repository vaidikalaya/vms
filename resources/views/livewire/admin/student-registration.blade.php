<div>
    <style>
        #student_registration .progressbar {
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #student_registration .progressbar li {
            list-style-type: none;
            color: #000000;
            text-transform: uppercase;
            font-size: 9px;
            width: 20%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #student_registration .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }

        /*progressbar connectors*/
        #student_registration .progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }

        #student_registration .progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #student_registration .progressbar li.active:before, #student_registration .progressbar li.active:after {
            background: #ee0979;
            color: white;
        }

        #student_registration table tr td{
            width: 50px;
        }
    </style>

    <div class="container" id="student_registration">
        <form class="mt-3">
            <ul class="progressbar text-center">
                <li class="active">Personal Details</li>
                <li class="@if($level>=2) active @endif">Parent Details</li>
                <li class="@if($level>=3) active @endif">Address</li>
                <li class="@if($level>=4) active @endif">Previous Qualification</li>
                <li class="@if($level>=5) active @endif">Documents Upload</li>
            </ul>
            
            @switch($level)
                @case('1')
                    <div class="card bg-white w-75 mx-auto mb-5">
                        <div class="card-header bg-white pb-0">
                            <h4 class="fw-bold">Personal Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-4">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" wire:model.defer="studentData.firstname" class="form-control" id="firstname">
                                </div>
                                <div class="col-4">
                                    <label for="middlename" class="form-label">Middle Name</label>
                                    <input type="text" wire:model.defer="studentData.middlename" class="form-control" id="middlename">
                                </div>
                                <div class="col-4">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" wire:model.defer="studentData.lastname" class="form-control" id="lastname">
                                </div>
                                <div class="col-6">
                                    <label for="dob" class="form-label">Date of birth</label>
                                    <input type="date" wire:model.defer="studentData.dob" class="form-control" id="dob">
                                </div>
                                <div class="col-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select wire:model.defer="studentData.gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" wire:model.defer="studentData.email" class="form-control" id="email">
                                </div>
                                <div class="col-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" wire:model.defer="studentData.phone" class="form-control" id="phone">
                                </div>
                                <div class="col-12">
                                    <label for="aadhaar" class="form-label">Aadhaar Number</label>
                                    <input type="text" wire:model.defer="studentData.aadhaar" class="form-control" id="aadhaar">
                                </div>
                                <div>
                                    <button wire:click="saveAndNext()" class="btn btn-primary float-end" type="button">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @break
                @case('2')
                    <div class="card bg-white w-75 mx-auto mb-5">
                        <div class="card-header bg-white pb-0">
                            <h4 class="fw-bold">Parents Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label for="fathername" class="form-label">Father Name</label>
                                    <input type="text" wire:model.defer="studentData.fathername" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="mothername" class="form-label">Mother Name</label>
                                    <input type="text" wire:model.defer="studentData.mothername" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="fatherphone" class="form-label">Father Phone No</label>
                                    <input type="text" wire:model.defer="studentData.fatherphone" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="motherphone" class="form-label">Mother Phone No</label>
                                    <input type="text" wire:model.defer="studentData.motherphone" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="fatheroccupation" class="form-label">Father Occupation</label>
                                    <input type="text" wire:model.defer="studentData.fatheroccupation" class="form-control">
                                </div>
                                <div>
                                    <button wire:click="saveAndNext()" class="btn btn-primary float-end" type="button">Next</button>
                                    <button wire:click="saveAndPrevious()" class="btn btn-primary float-end me-2" type="button">Previous</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @break
                @case('3')
                    <div class="card bg-white w-75 mx-auto mb-5">
                        <div class="card-header bg-white pb-0">
                            <h4 class="fw-bold">Address</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs border-0 " id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border-start-0 border-top-0 border-end-0 bg-white text-dark active" id="current-tab" data-bs-toggle="tab" data-bs-target="#current-tab-pane" type="button">
                                        Current Address
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border-start-0 border-top-0 border-end-0 bg-white text-dark" id="permanent-tab" data-bs-toggle="tab" data-bs-target="#permanent-tab-pane" type="button">
                                        Permanent Address
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="current-tab-pane">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">State</label>
                                            <select wire:model.defer="studentData.address.current.state" id="" class="form-control">
                                                <option value="">Select State</option>
                                                <option value="">Uttar Pradesh</option>
                                                <option value="">Uttarakhand</option>
                                            </select>
                                        </div>
        
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">District</label>
                                            <select wire:model.defer="studentData.address.current.district" id="" class="form-control">
                                                <option value="">Select District</option>
                                                <option value="">Uttar Pradesh</option>
                                                <option value="">Uttarakhand</option>
                                            </select>
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">City</label>
                                            <input type="text" wire:model.defer="studentData.address.currentlastname.city" class="form-control">
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">Village/Mohalla/Sector</label>
                                            <input type="text" wire:model.defer="studentData.address.currentlastname.msv" class="form-control">
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">House Number</label>
                                            <input type="text" wire:model.defer="studentData.address.currentlastname.house_number" class="form-control">
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">Pin Code</label>
                                            <input type="text" wire:model.defer="studentData.address.currentlastname.pin_code" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="permanent-tab-pane">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">State</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select State</option>
                                                <option value="">Uttar Pradesh</option>
                                                <option value="">Uttarakhand</option>
                                            </select>
                                        </div>
        
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">District</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select District</option>
                                                <option value="">Uttar Pradesh</option>
                                                <option value="">Uttarakhand</option>
                                            </select>
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">City</label>
                                            <input type="text" name="lastname" class="form-control">
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">Village/Mohalla/Sector</label>
                                            <input type="text" name="lastname" class="form-control">
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">House Number</label>
                                            <input type="text" name="lastname" class="form-control">
                                        </div>
        
                                        <div class="col-4">
                                            <label class="form-label">Pin Code</label>
                                            <input type="text" name="lastname" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button wire:click="saveAndNext()" class="btn btn-primary float-end" type="button">Next</button>
                                <button wire:click="saveAndPrevious()" class="btn btn-primary float-end me-2" type="button">Previous</button>
                            </div>
                        </div>
                    </div>
                    @break
                @case('4')
                    <div class="card bg-white w-75 mx-auto mb-5">
                        <div class="card-header bg-white pb-0">
                            <h4 class="fw-bold">Previous Qualification</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="class" class="form-label">Class</label>
                                    <select name="class" id="class"  class="form-select">
                                        <option value="nc">N.C</option>
                                        <option value="kg">K.G</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                        <option value="6th">6th</option>
                                        <option value="7th">7th</option>
                                        <option value="8th">8th</option>
                                        <option value="9th">9th</option>
                                        <option value="10th">10th</option>
                                        <option value="11th">11th</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="schoolname" class="form-label">School Name</label>
                                    <input type="text" name="schoolname" class="form-control">
                                </div>
                                <div class="col-3">
                                    <label for="year" class="form-label">Year</label>
                                    <select name="year" class="form-select">
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="pass">Pass</option>
                                        <option value="fail">Fail</option>
                                    </select>
                                </div>
                                <div>
                                    <button wire:click="saveAndNext()" class="btn btn-primary float-end" type="button">Next</button>
                                    <button wire:click="saveAndPrevious()" class="btn btn-primary float-end me-2" type="button">Previous</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @break;
                @case('5')
                    <div class="card bg-white w-75 mx-auto mb-5">
                        <div class="card-header bg-white pb-0">
                            <h4 class="fw-bold">Documents Upload</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="pt-3">Student Photo</th>
                                        <td class="pt-3">
                                            <label for="uploadPhoto">
                                                <img src="{{asset('assets/icons/paperclip.svg')}}" class="cursor-pointer" height="20" width="20">
                                                <input type="file" class="d-none" id="uploadPhoto">
                                            </label>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary">Upload</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pt-3">Student Aadhaar</th>
                                        <td class="pt-3">
                                            <label for="uploadAadhaar">
                                                <img src="{{asset('assets/icons/paperclip.svg')}}" class="cursor-pointer" height="20" width="20">
                                                <input type="file" class="d-none" id="uploadAadhaar">
                                            </label>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary">Upload</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pt-3">Previous Marksheet</th>
                                        <td class="pt-3">
                                            <label for="uploadTC">
                                                <img src="{{asset('assets/icons/paperclip.svg')}}" class="cursor-pointer" height="20" width="20">
                                                <input type="file" class="d-none" id="uploadTC">
                                            </label>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary">Upload</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pt-3">T.C (Transfer Certificate)</th>
                                        <td class="pt-3">
                                            <label for="uploadTC">
                                                <img src="{{asset('assets/icons/paperclip.svg')}}" class="cursor-pointer" height="20" width="20">
                                                <input type="file" class="d-none" id="uploadTC">
                                            </label>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary">Upload</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <button wire:click="finalSubmit()" class="btn btn-primary float-end" type="button">Final Submit</button>
                                <button wire:click="saveAndPrevious()" class="btn btn-primary float-end me-2" type="button">Previous</button>
                            </div>
                        </div>
                    </div>
                    @break;       
            @endswitch
        </form>
    </div>
</div>