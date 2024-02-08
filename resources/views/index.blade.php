<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <style>
      
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: rgb(206, 217, 235);
    }
    * {box-sizing: border-box;}

    .custom-select{
      width: 20%;
    }

    #desc-text{
      height: 100px;
      resize: none;
    }
    .card-footer{
      text-align: right;
    }
    </style>
    <!-- <link rel="stylesheet" href="TODO_Project\resources\css\index.css"> -->
    <title>TODO-List</title>
</head>
    <body>

    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#demoModal">Add List</button>
    
    {{-- <form id="edit-form" method="POST" action="{{ route('home.update', $post->id) }}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="demoModalLabel">What you want TO UPDATE</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <label for="title" class="col-form-label"><b>Title</b></label>
              <input type="text" class="form-control" value="{{ old('title', $post->title) }}" placeholder="Write the title here" name="title" required>
      
              <label for="desc-text" class="col-form-label"><b>Description</b></label>
              <textarea class="form-control" rows="3" id="desc-text" placeholder="Write the description here" name="description" required></textarea>
              <br><br>
      
              <label for="tags"><b>Tags</b></label>
              <select id="tags" class="custom-select mr-sm-1" name="tags" required>
                  <option value="Home">Home</option>
                  <option value="Work">Work</option>
                  <option value="Other">Other</option>
              </select>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Add">
              <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeForm()">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form> --}}
    
    

    <div class="container mt-5">
      @forelse ($posts as $post)
      @if ($post->tags  == "Work")
      <div class="row">
        <div class="col-md-12">
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
              <p class="card-text">{!! $post->description !!}</p>
            </div>
            <div class="card-footer">
              <form onsubmit="return confirm('Are you sure want to delete this ?');" action="{{ route('home.destroy', $post->id) }}" method="POST">
                <a href="{{ route('home.edit', $post->id) }}" class="btn btn-dark">
                  <i class="ri-edit-box-line"></i>
                </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-dark" type="submit" data-toggle="modal">
                  <i class="ri-delete-bin-6-line"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @elseif ($post->tags == "Home")
      <div class="row">
        <div class="col-md-12">
          <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
              <p class="card-text">{!! $post->description !!}</p>
            </div>
            <div class="card-footer">
              <form onsubmit="return confirm('Are you sure want to delete this ?');" action="{{ route('home.destroy', $post->id) }}" method="POST">
                <a href="{{ route('home.edit', $post->id) }}" class="btn btn-primary">
                  <i class="ri-edit-box-line"></i>
                </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit" data-toggle="modal">
                  <i class="ri-delete-bin-6-line"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-md-12">
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
              <p class="card-text">{!! $post->description !!}</p>
            </div>
            <div class="card-footer">
              <form onsubmit="return confirm('Are you sure want to delete this ?');" action="{{ route('home.destroy', $post->id) }}" method="POST">
                <a href="{{ route('home.edit', $post->id) }}" class="btn btn-info">
                  <i class="ri-edit-box-line"></i>
                </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-info" type="submit" data-toggle="modal">
                  <i class="ri-delete-bin-6-line"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif
        
      @empty
      <div class="alert alert-danger">
        Data Post belum Tersedia.
      </div>
      @endforelse
    </div>

    {{ $posts->links('vendor.pagination.bootstrap-4') }}

    <form method="POST" action="{{ route('home.store') }}">
      {{ csrf_field() }}
      <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="demoModalLabel">What you want TO DO</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <label for="title" class="col-form-label"><b>Title</b></label>
              <input type="text" class="form-control" placeholder="Write the title here" name="title" required>
      
              <label for="desc-text" class="col-form-label"><b>Description</b></label>
              <textarea class="form-control" rows="3" id="desc-text" placeholder="Write the description here" name="description" required></textarea>
              <br><br>
      
              <label for="tags"><b>Tags</b></label>
              <select id="tags" class="custom-select mr-sm-1" name="tags" required>
                  <option value="Home">Home</option>
                  <option value="Work">Work</option>
                  <option value="Other">Other</option>
              </select>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Add">
              <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeForm()">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        @if(Session::has('success'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>
</html>