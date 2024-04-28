<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.partials.head')
</head>

<body>
<style>
    .verify-section{
        height: 100vh;
        padding: 110px 0
    }
</style>

    <section class="verify-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mb-5">
                    <div class="card bg-light p-3 text-center">
                        <h4 class="mb-0">Students' information is available from Summer-2012</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header p-3 bg-info text-center">
                            <h6 class="text-white">Verify Identity</h6>
                        </div>
                        <div class="card-body p-5">
                            <form>
                                <div class="row align-items-end">
                                    <div class="col-md-10">
                                        <input type="text" placeholder="ID No." class="form-control border-bottom">
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
