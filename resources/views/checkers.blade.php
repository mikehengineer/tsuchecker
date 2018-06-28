<!doctype html>
<html lang="en">
<head>

    <link href="css/checkers.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <nav>

        mikehengineer@gmail.com

    </nav>

    <div id="splashouter">

        <div class="splash">
            <h1> TSU Checkers</h1>
        </div>

    </div>

    <div class="content">

        <div class="card">
            <img src = "https://images.unsplash.com/photo-1517646287270-a5a9ca602e5c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8130ea340b0db93fe272b68d4e68442f&auto=format&fit=crop&w=1650&q=80">

        </div>

        <div class="card">

            <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4d2529242e0b4fadad755467e572682a&auto=format&fit=crop&w=1655&q=80">

        </div>

        <div class="card">

            <div class="card-body">
                <h4>Add Datapoints</h4>
                <form METHOD="POST" action="/addpoints">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Device #</label>
                        <input type="text" name="device" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label># of Datapoints</label>
                        <input type="text" name="datapoints" placeholder="Type" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    @if ($flash = session('deviceMsg'))
                        <div class="alert alert-success" role="alert" id="deviceMsg">
                            {{ $flash }}
                        </div>
                    @endif
                    @if($errors->has('device') || $errors->has('datapoints') || count($errors->notfound->all()))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @foreach ($errors->notfound->all() as $notfound)
                                        <li>{{ $notfound }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="card">
            <p>

                Fusce accumsan sodales neque ac ultricies. Sed at lorem blandit, commodo neque eget, mattis arcu. In posuere egestas malesuada. Praesent in finibus ipsum. Integer consectetur, arcu vitae rhoncus sollicitudin, ante neque consectetur sem, nec rhoncus urna
                tellus non quam. Quisque et tincidunt metus. Aliquam commodo eros id felis placerat, sit amet gravida nunc venenatis. In pharetra lacus dolor, ac congue ligula ultrices quis. Vestibulum feugiat eros vel quam semper, non eleifend arcu mattis. Nunc
                semper, velit sed rhoncus scelerisque, ex sapien varius nunc, et porta ipsum felis nec nibh. Nulla rhoncus est vestibulum bibendum euismod. Aenean ornare dolor felis, quis pulvinar tellus consequat efficitur.
            </p>
        </div>

    </div>

</body>
</html>