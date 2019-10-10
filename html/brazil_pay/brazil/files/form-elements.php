<?php require 'includes/header_start.php'; ?>
    <!-- Extra css -->
<?php require 'includes/header_end.php'; ?>


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Form elements</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Uplon</a>
                                </li>
                                <li>
                                    <a href="#">Forms</a>
                                </li>
                                <li class="active">
                                    Form elements
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Input Types</h4>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                    <form>
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                   placeholder="Enter email">
                                            <small class="text-muted">We'll never share your email with anyone
                                                else.
                                            </small>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control"
                                                   id="exampleInputPassword1" placeholder="Password">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleSelect1">Example select</label>
                                            <select class="form-control" id="exampleSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleSelect2">Example multiple select</label>
                                            <select multiple class="form-control" id="exampleSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleTextarea">Example textarea</label>
                                                    <textarea class="form-control" id="exampleTextarea"
                                                              rows="3"></textarea>
                                        </fieldset>

                                        <fieldset class="form-group">
                                            <label>Example Readonly</label>
                                            <input class="form-control" type="text" placeholder="Readonly input here…"
                                                   readonly>
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div><!-- end col -->

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6 m-t-sm-40">
                                    <form>
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label for="disabledTextInput">Disabled input</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                       placeholder="Disabled input">
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Disabled select menu</label>
                                                <select id="disabledSelect" class="form-control">
                                                    <option>Disabled select</option>
                                                </select>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <label>Example Control sizing</label>
                                            <input class="form-control form-control-lg m-b-20" type="text"
                                                   placeholder=".form-control-lg">
                                            <input class="form-control m-b-20" type="text" placeholder="Default input">
                                            <input class="form-control form-control-sm m-b-20" type="text"
                                                   placeholder=".form-control-sm">

                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <input type="text" class="form-control"
                                                           placeholder=".col-xs-2">
                                                </div>
                                                <div class="col-xs-3">
                                                    <input type="text" class="form-control"
                                                           placeholder=".col-xs-3">
                                                </div>
                                                <div class="col-xs-4">
                                                    <input type="text" class="form-control"
                                                           placeholder=".col-xs-4">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group has-success">
                                                <label class="form-control-label" for="inputSuccess1">Input with
                                                    success</label>
                                                <input type="text" class="form-control form-control-success"
                                                       id="inputSuccess1">
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="form-control-label" for="inputWarning1">Input with
                                                    warning</label>
                                                <input type="text" class="form-control form-control-warning"
                                                       id="inputWarning1">
                                            </div>
                                            <div class="form-group has-danger">
                                                <label class="form-control-label" for="inputDanger1">Input with
                                                    danger</label>
                                                <input type="text" class="form-control form-control-danger"
                                                       id="inputDanger1">
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- end col -->

                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                    <h4 class="header-title m-t-0 m-b-30">Inline forms</h4>

                                    <h6 class="m-b-20 text-muted">Visible labels</h6>

                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Name</label>
                                            <input type="text" class="form-control" id="exampleInputName2"
                                                   placeholder="Jane Doe">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2"
                                                   placeholder="jane.doe@example.com">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send invitation</button>
                                    </form>

                                    <h6 class="m-b-20 m-t-30 text-muted">Hidden labels</h6>

                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail3">Email
                                                address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail3"
                                                   placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                                            <input type="password" class="form-control"
                                                   id="exampleInputPassword3" placeholder="Password">
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox0" type="checkbox">
                                            <label for="checkbox0">
                                                Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>

                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6 m-t-sm-40">

                                    <h4 class="header-title m-t-0 m-b-30">Using the Grid</h4>

                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                   class="col-sm-2 form-control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3"
                                                   class="col-sm-2 form-control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3"
                                                       placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Radios</label>
                                            <div class="col-sm-10">
                                                <div class="radio">
                                                    <input type="radio" name="radio" id="radio1" value="option1"
                                                           checked>
                                                    <label for="radio1">
                                                        Option one is this and that&mdash;be sure to include why
                                                        it's great
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="radio" id="radio2" value="option2">
                                                    <label for="radio2">
                                                        Option two can be something else and selecting it will
                                                        deselect option one
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="radio" id="radio3" value="option3"
                                                           disabled>
                                                    <label for="radio3">
                                                        Option three is disabled
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Checkbox</label>
                                            <div class="col-sm-10">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox21" type="checkbox">
                                                    <label for="checkbox21">
                                                        Check me out
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div><!-- end row -->


                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Custom forms</h4>

                            <div class="">
                                <h6 class="m-b-20 text-muted">Checkboxes</h6>
                                <label class="c-input c-checkbox">
                                    <input type="checkbox">
                                    <span class="c-indicator"></span>
                                    Check this custom checkbox
                                </label>

                                <label class="c-input c-checkbox">
                                    <input type="checkbox">
                                    <span class="c-indicator"></span>
                                    Check this custom checkbox
                                </label>
                            </div>

                            <div class="m-t-30">
                                <h6 class="m-b-20 text-muted">Radios</h6>
                                <label class="c-input c-radio">
                                    <input id="radio11" name="radio" type="radio">
                                    <span class="c-indicator"></span>
                                    Toggle this custom radio
                                </label>
                                <label class="c-input c-radio">
                                    <input id="radio21" name="radio" type="radio">
                                    <span class="c-indicator"></span>
                                    Or toggle this other custom radio
                                </label>
                            </div>

                            <div class="m-t-30">
                                <h6 class="m-b-20 text-muted">Select menu</h6>
                                <select class="c-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="m-t-30">
                                <h6 class="m-b-20 text-muted">File browser</h6>
                                <label class="file">
                                    <input type="file" id="file">
                                    <span class="file-custom"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- content -->

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>
    <!-- extra js -->
<?php require 'includes/footer_end.php' ?>