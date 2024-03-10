<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="my-5 p-5 bg-light-blue">
    
  <form method="POST" action="{{ url('/students') }}">
            @csrf
            <div class="container mt-4 p-5 border border-info rounded border-3  ">
            
            <div class="form-group ">
        <h3 class="text-center text-info  font-italic">Register a Student</h3>
        <label for="name" class="text-info  font-italic">Name:</label>
        <input type="text " class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
    </div>
    <div class="form-group">
        <label for="course" class="text-info  font-italic">Course:</label>
        <input type="text" class="form-control" id="course" name="course" placeholder="Your Course" required>
    </div>
    <div class="form-group">
        <label for="class" class="text-info  font-italic">Class:</label>
        <input type="text" class="form-control" id="class" name="class" placeholder="Your Class" required>
    </div>
    <br>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
        <label class="form-check-label" for="agree">Click to Agree</label>
    </div>
    <br>
    <br>
    <div class="text-center">
        <button 
        data-toggle="tooltip" title="please submit !!!!!"
        type="submit" class="btn btn-outline-info btn-sm btn-block">Submit</button>
    </div>
   
</form>

  </div>
            </div>
   
  </body>
</html>
