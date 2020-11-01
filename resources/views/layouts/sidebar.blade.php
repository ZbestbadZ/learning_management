@if (Auth::check())
    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Menu</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <a href="#">
                    <div class="card" style="background-color:  rgb(230, 211, 205)"><br>
                        <h5><p class="ml-3">
                            <a href="#" class="btn btn-primary">
                                abc
                            </a>
                        </p></h5>
                    </div><br>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
