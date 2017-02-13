@if(Session::has('message'))
    <div class="form-group ">
        <div role="alert" class="alert alert-primary alert-icon alert-dismissible">
            <div class="icon"><span class="mdi mdi-info-outline"></span></div>
            <div class="message">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true"
                                                                                                  class="mdi mdi-close"></span>
                </button>{{ session('message') }}
            </div>
        </div>
    </div>
    <br><br>
@endif
