<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RichReach Assignment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(request()->segment(1) == 'posts') active @endif">
                    <a class="nav-link" href="{{ url('/posts') }}">Posts</a>
                </li>

                @guest
                <li class="nav-item @if(request()->segment(1) == 'register') active @endif">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                <li class="nav-item @if(request()->segment(1) == 'login') active @endif">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                @else
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Content Section -->
<div class="container-fluid bg-light-gray py-5">
    <div class="container mt-4">
       
       @yield('content')

    </div>
</div>



<!-- Delete modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<form action="" method="post" id="delete_form">
{{method_field('delete')}}
{{csrf_field()}}
<div class="modal-body">
<p class="text-center">
Are you sure you want to delete this?
</p>
<input type="hidden" name="delete_id" id="delete_id" value="">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
<button type="submit" class="btn btn-warning">Yes, Delete</button>
</div>
</form>
</div>
</div>
</div>
<!-- Delete modal -->


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    setTimeout(function(){
        $(".success_msg").fadeOut("slow");
    }, 5000);

    setTimeout(function(){
        $(".error_msg").fadeOut("slow");
    }, 5000);


    jQuery('body').on('click', '.delete', function() {
    var postId = jQuery(this).data('id');
    jQuery('#delete_id').val( postId );

    var formAction = '/deletePost/' + postId;
    jQuery('#delete_form').attr('action', formAction);

   });
});
</script>
</body>
</html>
