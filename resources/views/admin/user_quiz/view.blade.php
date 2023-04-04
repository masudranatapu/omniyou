@extends('admin.layouts.app')

@section('title', 'Quiz - Quiz View')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <form action="">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>User & Quiz View</h3>
                            </div>
                            <div class="col-6">
                                <div class="float-right">
                                    <a href="{{ route('quiz.index') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            {{-- <img src="http://localhost/quiz/public/backend/img/profile/1650247914.jpg" class="wd-60 mb-3 rounded" alt=""> --}}
                            <tr>
                                <td>Name:</td>
                                <td>{{ $interview_user->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $interview_user->email ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-header">
                        <h6>Quiz View</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col-md-4">
                                <label for="">Father Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Father Name">
                            </div>
                            <div class="col-md-4">
                                <label for="">Mother Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Mother Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="">Phone Number <span class="text-danger">*</span></label>
                                <input type="number" name="name" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col-md-4">
                                <label for="">Gander <span class="text-danger">*</span></label><br>
                                Male <input type="radio" name="Gender" value="Male" class="mr-3 ml-1" />
                                Female <input type="radio" name="Gender" value="Female" class="mr-3 ml-1" />
                                Other <input type="radio" name="Gender" value="Other" class="ml-1" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Nationality <span class="text-danger">*</span></label>
                                <br>
                                Bangladeshi <input type="radio" name="nationality" value="Bangladeshi"
                                    class="mr-3 ml-1" />
                                Forganer <input type="radio" name="nationality" value="Forganer" class="mr-3 ml-1" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="">Date of brith</label>
                                <input type="date" class="form-control" placeholder="Date of brith">
                            </div>
                            <div class="col-md-4">
                                <label for="">Email Address (optional)</label>
                                <input type="email" name="name" class="form-control"
                                    placeholder="Email Address (optional)">
                            </div>
                            <div class="col-md-4">
                                <label for="">NID No</label>
                                <input type="text" name="name" class="form-control" placeholder="NID No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="">Maritial Status</label>
                                <select name="" class="form-control">
                                    <option value="" disabled selected>Select One</option>
                                    <option value="Mairred">Mairred</option>
                                    <option value="Unmairred">Unmairred</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Work Status</label><br>
                                Student <input type="radio" name="jobstatus" value="Student" class="mr-3 ml-1" />
                                Daily Worker <input type="radio" name="jobstatus" value="Daily Worker"
                                    class="mr-3 ml-1" />
                                Govt. Job <input type="radio" name="jobstatus" value="Govt. Job" class="mr-3 ml-1" />
                                Non Govt. Job <input type="radio" name="jobstatus" value="Non Govt. Job"
                                    class="mr-3 ml-1" />
                                Business <input type="radio" name="jobstatus" value="Business" class="mr-3 ml-1" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="">Present Address</label>
                                        <textarea name="" class="form-control" cols="30" rows="3" placeholder="Present Address"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">City</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="City Name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Post Code</label>
                                        <input type="number" name="name" class="form-control"
                                            placeholder="Post Code">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">State</label>
                                        <input type="text" name="name" class="form-control" placeholder="State">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Country</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Country Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        Same as present address <input class="mx-3" type="checkbox" name="sameaddress"
                                            value="sameaddress" class="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <textarea name="" class="form-control" cols="30" rows="3" placeholder="Permanent Address"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">City</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="City Name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Post Code</label>
                                        <input type="number" name="name" class="form-control"
                                            placeholder="Post Code">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">State</label>
                                        <input type="text" name="name" class="form-control" placeholder="State">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Country</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Country Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        Answering Questions
                    </div>
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <label for="questions1">Do like to engage in dialogues like (identity, community,
                                    nationality)?</label>
                            </div>
                            <div class="col-md-7">
                                <textarea name="ans" class="form-control" id="questions1" cols="30" rows="3" placeholder="Answer"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <label for="questions2">what is, who is messing in this space? </label>
                            </div>
                            <div class="col-md-7">
                                <textarea name="ans" class="form-control" id="questions2" cols="30" rows="3" placeholder="Answer"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <label for="questions3">Why did you apply to our school ?</label>
                            </div>
                            <div class="col-md-7">
                                <textarea name="ans" class="form-control" id="questions3" cols="30" rows="3" placeholder="Answer"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <label for="questions4">Did you draw figures before coming? </label>
                            </div>
                            <div class="col-md-7">
                                <textarea name="ans" class="form-control" id="questions4" cols="30" rows="3" placeholder="Answer"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <label for="questions5">why did you decide to become an artist now? </label>
                            </div>
                            <div class="col-md-7">
                                <textarea name="ans" class="form-control" id="questions5" cols="30" rows="3" placeholder="Answer"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-success" type="submit">Submit from</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush
