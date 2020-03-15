<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('meta-title', config('app.name', 'Laravel') )</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('socialyte/lib/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('socialyte/lib/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('socialyte/lib/bootstrap-switch/css/bootstrap-switch.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('socialyte/style.css') }}" type="text/css">
</head>

<body id="wall">
    <!--Header with Nav -->
    <header class="text-right">
        <div class="menu-icon">
            <div class="dropdown">
                <span class="dropdown-toggle" role="button" id="dropdownSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="hidden-xs hidden-sm">{{ auth()->user()->name }}</span> <i class="fa fa-cogs" aria-hidden="true"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownSettings">
                    <li>
                        <a href="{{ route('admin.users.show', auth()->user()) }}" title="Settings">
                            <div class="col-xs-4">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>Perfil</span>
                            </div>
                        </a>
                    </li>
                    <li>
						<a href="{{ route('logout') }}" title="Logout" 
									onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <div class="col-xs-4">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>Cerrar Sesión</span>
							</div>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--<div class="second-icon dropdown menu-icon">
            <span class="dropdown-toggle" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<span class="hidden-xs hidden-sm">Notifications</span>
				<i class="fa fa-bell-o" aria-hidden="true"></i> 
				<span class="badge">2</span>
            </span>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownNotification">
                <li class="new-not">
                    <a href="#" title="User name comment"><img src="{{ asset('socialyte/img/user2.jpg') }}" alt="User name" class="img-circle img-user-mini"> User comments your post</a>
                </li>
                <li class="new-not">
                    <a href="#" title="User name comment"><img src="{{ asset('socialyte/img/user3.jpg') }}" alt="User name" class="img-circle img-user-mini"> User comments your post</a>
                </li>
                <li>
                    <a href="#" title="User name comment"><img src="{{ asset('socialyte/img/user4.jpg') }}" alt="User name" class="img-circle img-user-mini"> User comments your post</a>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#" title="All notifications">All Notifications</a></li>
            </ul>
        </div>-->
        <div class="second-icon menu-icon">
            <span><a href="{{ route('pages.home') }}" title="Muro"><span class="hidden-xs hidden-sm">Muro</span> <i class="fa fa-database" aria-hidden="true"></i></a>
            </span>
        </div>
    </header>

    <!--Left Sidebar with info Profile -->
    <div class="sidebar-nav">
        <a href="personal-profile.html" title="Profile">
            <img src="{{ asset('socialyte/img/user.jpg') }}" alt="User name" class="img-circle img-user">
        </a>
        <h2 class="text-center hidden-xs"><a href="personal-profile.html" title="Profile">{{ auth()->user()->name }}</a></h2>
        <p class="text-center user-description hidden-xs">
            <i>Direccion: {{ auth()->user()->adress }}</i>
        </p>
        <p class="text-center user-description hidden-xs">
            <i>Telefonos: {{ auth()->user()->phone }} </i>
            <i>{{ auth()->user()->movil }}</i>
        </p>
    </div>

    <!--Wall with Post -->
    <div class="content-posts active" id="posts">
        <div id="posts-container" class="container-fluid container-posts">
		@forelse($posts as $post)


            <div class="card-post">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="personal-profile.html" title="Profile">
                            <img src="{{ asset('socialyte/img/user.jpg') }}" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="personal-profile.html" title="Profile">{{ $post->title }}</a></h3>
						<p><i>{{ $post->published_at->diffForHumans() }} / {{ $post->owner->name }}</i></p><br>
						<h3><a href="personal-profile.html" title="Profile">{{ $post->excerpt }}</a></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 data-post">
						<p>{!! $post->body !!}</p>
						
						@include( $post->viewType() )
                        <div class="reaction">
                            &#x2764; 156 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">
							@foreach( $post->tags as $tag)	
								#{{ $tag->name }}
							@endforeach
							</div>
							<form method="POST" action="{{ route('pages.comment.store', $post) }}">
                                {{ csrf_field() }}
                                <textarea name="comment" 
                                        rows="3" 
                                        class="form-control" 
                                        placeholder="Enviar comentario al Autor">
                                </textarea>
                                <button class="btn btn-primary">Enviar</button>
                            </form>
                            <!--<ul>
                                <li><b>User1</b> Lorem Ipsum Dolor si amet</li>
                                <li><b>User2</b> Lorem Ipsum Dolor si amet &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>-->
                        </div>
                    </div>
                </div>
			</div>
		@empty

			<div class="card-post">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="personal-profile.html" title="Profile">
                            <img src="{{ asset('socialyte/img/user.jpg') }}" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="personal-profile.html" title="Profile">NO HAY POST</a></h3>
                        <p><i>2h</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 data-post">
						<p>Lorem Ipsum Dolor si amet</p>
						
						<!--<img src="{{ asset('socialyte/img/post.jpg') }}" alt="image post" class="img-post">

						<video controls>
                          <source src="{{ asset('socialyte/img/post-video.mp4') }}" type="video/mp4">
                          Your browser does not support the video tag.
                        </video>-->

                        <div class="reaction">
                            &#x2764; 156 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">View more comments</div>
                            <ul>
                                <li><b>User1</b> Lorem Ipsum Dolor si amet</li>
                                <li><b>User2</b> Lorem Ipsum Dolor si amet &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>
                        </div>
                    </div>
                </div>
			</div>


		@endforelse

            <!--<div class="card-post">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="user-profile.html" title="User Profile">
                            <img src="{{ asset('socialyte/img/user2.jpg') }}" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="user-profile.html" title="User Profile">User Name</a></h3>
                        <p><i>2h</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-sm-8 col-sm-offset-2 data-post">
                        <p>Lorem Ipsum Dolor si amet</p>
                        <img src="{{ asset('socialyte/img/post.jpg') }}" alt="image post" class="img-post">
                        <div class="reaction">
                            &#x2764; 1234 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">View more comments</div>
                            <ul>
                                <li><b>User1</b> Lorem Ipsum Dolor si amet</li>
                                <li><b>User2</b> Lorem Ipsum Dolor si amet &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>-->

            <!--<div class="card-post">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="personal-profile.html" title="User Profile">
                            <img src="{{ asset('socialyte/img/user.jpg') }}" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="personal-profile.html" title="User Profile">My User</a></h3>
                        <p><i>2h</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 data-post">
                        <p>Lorem Ipsum Dolor si amet</p>
                        Video here
                        <video controls>
                          <source src="{{ asset('socialyte/img/post-video.mp4') }}" type="video/mp4">
                          Your browser does not support the video tag.
                        </video>
                        <div class="reaction">
                            &#x2764; 1234 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">View more comments</div>
                            <ul>
                                <li><b>User1</b> Lorem Ipsum Dolor si amet</li>
                                <li><b>User2</b> Lorem Ipsum Dolor si amet &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>
                        </div>
                    </div>
                </div>
			</div>-->
			


        </div>
        <!--Close #posts-container
        <div id="loading">
            <img src="{{ asset('socialyte/img/load.gif') }}" alt="loader">
        </div>-->
    </div>
    <!-- Close #posts -->
    <!-- Modal container for settings
    <div id="settingsmodal" class="modal fade text-center">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>--->

    <script src="{{ asset('socialyte/lib/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('socialyte/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('socialyte/lib/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
	<!--<script src="../twemoji.maxcdn.com/twemoji.min.js"></script>-->
	<script src="http://twemoji.maxcdn.com/twemoji.min.js"></script>
    <script src="{{ asset('socialyte/js/lazy-load.min.js') }}"></script>
    <script src="{{ asset('socialyte/js/socialyte.min.js') }}"></script>
</body>

</html>
