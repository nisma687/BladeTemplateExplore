<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <h1>
        Hi welcome to the page ,
        
    </h1>
    <p>
    @if(isset($student) && $student->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Delete User</th>
                    <th>Update User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student as $stu)
                    <tr>
                        <td>{{ $stu->name }}</td>
                        <td>{{ $stu->course }}</td>
                        <td>{{ $stu->class }}</td>
                        <td>
                        <form 
                        action="{{ url('/students', ['id' => $stu->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No student data available.</p>
    @endif
    </p>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    

    
  </body>
</html>