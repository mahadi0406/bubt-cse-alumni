@extends('app.layouts.main')
@section('contents')
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title mb-0">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form>
                       <div class="row">
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label for="password" class="form-label">Title</label>
                                   <input name="password" id="password" type="password" class="form-control" placeholder="Enter Title">
                               </div>
                           </div>

                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label for="company_id" class="form-label">Company</label>
                                   <select class="form-select" name="company_id" id="company_id" required>
                                       <option value="">Select Company</option>
                                   </select>
                               </div>
                           </div>

                           <div class="col-lg-12">
                               <div class="form-group">
                                   <label for="password" class="form-label">Description</label>
                                   <input name="password" id="password" type="password" class="form-control" placeholder="Enter Title">
                               </div>
                           </div>

                           <div class="col-lg-12">
                               <div class="form-group">
                                   <label for="password" class="form-label">Requirements</label>
                                   <input name="password" id="password" type="password" class="form-control" placeholder="Enter Title">
                               </div>
                           </div>

                           <div class="col-lg-4">
                               <div class="form-group">
                                   <label for="location" class="form-label">Location</label>
                                   <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location">
                               </div>
                           </div>

                           <div class="col-lg-4">
                               <label></label>
                               <div class="form-check">
                                   <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                   <label class="form-check-label" for="exampleCheck1">Remote Allowed</label>
                               </div>
                           </div>

                           <div class="col-lg-4">
                               <div class="form-group">
                                   <label for="company_id" class="form-label">Type</label>
                                   <select class="form-select" name="company_id" id="company_id" required>
                                       <option value="">Select Type</option>
                                   </select>
                               </div>
                           </div>

                           <div class="col-lg-4">
                               <div class="form-group">
                                   <label for="location" class="form-label">Currency</label>
                                   <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location">
                               </div>
                           </div>

                           <div class="col-lg-4">
                               <div class="form-group">
                                   <label for="location" class="form-label">Minimum Salary</label>
                                   <div class="input-group mb-3">
                                       <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                       <div class="input-group-append">
                                           <span class="input-group-text" id="basic-addon2">BDT</span>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <div class="col-lg-4">
                               <div class="form-group">
                                   <label for="location" class="form-label">Miximun Salary</label>
                                   <div class="input-group mb-3">
                                       <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                       <div class="input-group-append">
                                           <span class="input-group-text" id="basic-addon2">BDT</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
