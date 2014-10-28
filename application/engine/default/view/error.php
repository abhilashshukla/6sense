<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>6sense | <?php echo $data['code']; ?> Page</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo APP_CSS; ?>bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo APP_CSS; ?>font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo APP_CSS; ?>admin.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo APP_JS; ?>html5shiv.js"></script>
          <script src="<?php echo APP_JS; ?>respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-info"><?php echo $data['code']; ?></h2>
                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        <?php echo $data['message']; ?>
                        Meanwhile, you may <a href='<?php echo APP_URL; ?>'>return to home</a> or try using the search form.
                    </p>
                    <form class='search-form'>
                        <div class='input-group'>
                            <input type="text" name="search" class='form-control' placeholder="Search"/>
                            <div class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div><!-- /.input-group -->
                    </form>
                </div><!-- /.error-content -->
            </div><!-- /.error-page -->

        </section><!-- /.content -->
    </body>
</html>