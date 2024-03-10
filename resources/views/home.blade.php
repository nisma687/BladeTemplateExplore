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
      
    <div class="d-flex flex-row justify-content-around">
    <h1 class="mt-3 mb-2 ">
        
       Welcome to User Details Page 
    </h1>
    <div class="mt-4">
    <a 
    class="btn btn-primary btn-sm"
    href="/students/create" > Add new Student </a>
    </div>
    </div>
    <div class=" p-4">
    <p class="">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
    <hr>
    <h5 class="text-center"> {{ session('success') }}</h5>
    <hr>
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
    <h3 class="text-center"> {{ session('error') }}</h3>
        
    </div>
@endif
    @if(isset($student) && $student->count() > 0)
        <table class="table table-hover table-info text-dark">
            <thead>
                <tr class="text-center">
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
                        <td class="text-center font-italic">{{ $stu->name }}</td>
                        <td class="text-center font-italic" >{{ $stu->course }}</td>
                        <td class="text-center font-italic">{{ $stu->class }}</td>
                        <td class="text-center font-italic">
                        <form action="{{ url('students/destroyAndRestore', ['id' => $stu->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if($stu->deleted_at === null)
                        <button
                        data-toggle="tooltip" title="Click to delete!!!!!"
                         type="submit" class="btn btn-danger btn-sm">Delete</button>
                        @endif
                        </form>

                        @if($stu->deleted_at !== null)
                        <form action="{{ url('students/destroyAndRestore', ['id' => $stu->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button 
                        data-toggle="tooltip" title="Click to restore!!!!!"
                        type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>
                        @endif


                        </td>
                        <td class="text-center">
                            
                         <a 
                         data-toggle="tooltip" title="Click to Update"
                        class="btn btn-primary btn-sm"
                        href="{{ url('/students/'.$stu->id.'/edit') }}" > Update</a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No student data available.</p>
    @endif
    </p>
    </div>
    
   
    

    
  </body>
</html>