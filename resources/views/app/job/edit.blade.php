@extends('app.layouts.main')
@section('contents')
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title mb-0">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input name="title" id="title" type="text" value="{{ $job->title }}" class="form-control" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="company_id" class="form-label">Company</label>
                                    <select class="form-select" name="company_id" id="company_id" required>
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" @if($job->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="skills" class="form-label">Skills</label>
                                    <select class="form-select tags" id="skills" name="skills[]" multiple="multiple" required>
                                        @foreach($job->tags as $tag)
                                            <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control summernote" placeholder="Enter Description" required>
                                        @php echo $job->description @endphp
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="requirement" class="form-label">Requirement</label>
                                    <textarea name="requirement" id="requirement" class="form-control summernote" placeholder="Enter Requirement" required>
                                        @php echo $job->requirement @endphp
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="currency" class="form-label">Currency</label>
                                    <input type="text" name="currency" value="{{ $job->currency }}" id="currency" class="form-control" placeholder="Enter currency">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="minimum_salary" class="form-label">Minimum Salary</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ $job->minimum_salary }}" name="minimum_salary" placeholder="Enter Minimum Salary" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text salary-currency-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="maximum_salary" class="form-label">Maximum Salary</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="maximum_salary" value="{{ $job->maximum_salary }}" class="form-control" placeholder="Enter Maximum Salary" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text salary-currency-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" value="{{ $job->location }}"  id="location" class="form-control" placeholder="Enter Location" required>
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
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" name="type" id="type" required>
                                        <option value="">Select Type</option>
                                        @foreach(\App\Enums\Job\Type::array() as $key =>  $status)
                                            <option value="{{ $key }}" @if($key == $job->type) selected @endif>{{ replaceInputTitle($status) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="vacancies" class="form-label">Vacancies</label>
                                    <input type="text" name="vacancies" value="{{ $job->vacancies }}"  id="vacancies" class="form-control" placeholder="Enter Vacancies" required>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="deadline" class="form-label">Deadline</label>
                                    <input type="date" name="deadline" value="{{ $job->deadline }}"  id="deadline" class="form-control" placeholder="Enter deadline" required>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="office_time" class="form-label">Office Time</label>
                                    <input type="text" name="office_time" value="{{ $job->office_time }}"  id="office_time" class="form-control" placeholder="Enter Office Time" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="benefits" class="form-label">Benefits</label>
                                    <textarea name="benefits" id="benefits" class="form-control summernote" placeholder="Enter benefits" required>
                                        @php echo $job->benefits @endphp
                                    </textarea>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300,
                dialogsInBody: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['fullscreen'],
                    ['insert', ['picture', 'link', 'video']],
                ],
                callbacks: {
                    onInit: function() {
                    }
                }
            });
            $(".note-image-input").removeAttr('name');
        });

        document.addEventListener("DOMContentLoaded", function() {
            const currencyInput = document.getElementById("currency");
            const currencySpan = document.querySelectorAll(".salary-currency-text");

            currencyInput.addEventListener("input", function() {
                const newCurrency = currencyInput.value.trim();
                if (newCurrency !== "") {
                    currencySpan.forEach(span => {
                        span.textContent = newCurrency;
                    });
                }else{
                    currencySpan.forEach(span => {
                        span.textContent = 'BDT';
                    });
                }
            });
        });

        $('.tags').select2({
            tags: true,
            tokenSeparators: [',']
        });
    </script>

@endpush


