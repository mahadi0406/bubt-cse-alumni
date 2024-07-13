<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.partials.head')
</head>

<body>

@push('styles')
    <style>
        .verify-section{
            height: 100vh;
            padding: 110px 0
        }
    </style>
@endpush

    <section class="verify-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card bg-light p-3 mb-5 text-center">
                        <h4 class="mb-0">BUBT Alumni Identity Verification and Membership Management System</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(request()->query('identity'))
                        <div class="alert alert-{{ $identity ? 'success' : 'danger' }} text-center" role="alert">
                            @if ($identity)
                                Thank you for being a member of BUBT Alumni
                            @else
                                Sorry, you are not a member of BUBT Alumni
                            @endif
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header p-3 bg-info text-center">
                            <h6 class="text-white">Verify Identity</h6>
                        </div>

                        <div class="card-body p-5">
                            <form method="GET" action="{{ route('index') }}">
                                <div class="row align-items-end">
                                    <div class="col-md-10">
                                        <input type="text" name="identity" placeholder="Enter Name, Email or Mobile" class="form-control border-bottom">
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <button type="submit" class="btn btn-primary btn-md text-uppercase">verify</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
