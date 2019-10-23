<!DOCTYPE html>
<html lang="en">
<head>
  <title>Creat company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--creat company body part-->
<div class="container">

        <div class="page-header">
            <h1>Create Company </h1>
        </div>

        <div class="col-md-9 col-md-offset-1 panel panel-default">

            
            <div class="panel-body">
                <form action="" method="POST">

                    <input type="hidden" name="_token" value="">

                    <div class="form-group ">
                        <label for="name-field">Name</label>
                        <input type="text" id="name-field" name="name" class="form-control" value="">
                                            </div>

                    <div class="form-group ">
                        <label for="address-field">Address</label>
                        <input type="text" id="address-field" name="address" class="form-control" value="Chicago, IL" placeholder="Enter a location" autocomplete="off">
                                            </div>

                    <div style="width: 100%; height: 200px; position: relative; overflow: hidden;" class="form-group map_canvas" id="map"> </div>

                    <div class="form-group ">
                        <label for="phone-field">Phone</label>
                        <input type="text" id="phone-field" name="phone" class="form-control" value="">
                                            </div>

                    <div class="form-group ">
                        <label for="fax-field">Fax</label>
                        <input type="text" id="fax-field" name="fax" class="form-control" value="">
                                            </div>

                    <a class="btn btn-default" href="#">Back</a>

                    <button class="btn btn-primary" type="submit">Create</button>

                </form>
            </div>

        </div>

    </div>
<!--creat company body part-->





</body>
</html>
