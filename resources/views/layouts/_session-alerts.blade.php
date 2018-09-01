<?php

if (session()->has('alert-warning')) {
    $alertClass   = 'alert-warning';
    $alertMessage = session('alert-warning');
}

if (session()->has('alert-danger')) {
    $alertClass   = 'alert-danger';
    $alertMessage = session('alert-danger');
}

if (session()->has('alert-success')) {
    $alertClass   = 'alert-success';
    $alertMessage = session('alert-success');
}

if (session()->has('alert-info')) {
    $alertClass   = 'alert-info';
    $alertMessage = session('alert-info');
}

?>

@if(isset($alertMessage))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="alert {{ $alertClass }} alert-dismissible fade show" role="alert">
                    {{ $alertMessage }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif