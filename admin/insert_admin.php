<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../process_insert_admin.php" method="POST">
        <input type="email" name="email" id="">
        <input type="text" name="name" id="">
        <input type="password" name="password" id="">
        <input type="number" name="level">
        <button type="submit">submit</button>
    </form>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design <small>different form elements</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="../process_insert_admin.php" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" name="email" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="name" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" name="password" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Level<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="level" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3" style="text-align: center;"> 
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>