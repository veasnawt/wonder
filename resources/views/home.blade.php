@extends('layouts.app')

@section('content')
<!--- Start Left Area -->
<div class="left col-md-3 float-left" id="left">
    <div class="left-opts">
        <div class="left-opt">
            <a href="profile" class="user-left">
            <img src="/image/{{ Auth::user()->image ?? 'avatar.png' }} ">
            <span class="user-name-left left-opt-text">{{ Auth::user()->name }}</span>
            </a>
        </div>
        <div class="left-opt">
            <a href="#">
                <i class="far fa-bell"></i>
                <span class="left-opt-text">Notifications</span>
            </a>
        </div>
        <div class="left-opt"></div>
    </div>
</div>
<!--- End Left Area -->

<!--- Start Right Area -->
<div class="right col-md-3 float-right" id="right">
    <form class="form-inline">
        <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search" id="search">
    </form>
</div>
<!-- End Right Area -->

<!--- Start Posts -->
<div class="container col-md-6" id="home">
    <form action="{{ route('home.store') }}" enctype="multipart/form-data" method="POST" class="qestion-box col-md-12">
        <input placeholder="Wodering? Ask a qestion..." type="text" name="title" class="title" id="title" autocomplete="off"/>
        <i class="far fa-image"></i>
        <i class="fas fa-smile"></i>
        <i class="fas fa-map-marker-alt"></i>
        <input type="file" class="image" name="image" accept="image/*, image/heic, image/heif" multiple="1" aria-label="Picture">
        <input type="submit" value="Press Enter to Post" class="submit-q" id="submit-q"/>
    </form>
    <div id="posts">
        @foreach($questions as $question)
        <div class="post">
            <div class="q-icon">?</div>
            <div class="asked-by">
                Asked by {{ $question->user->username }}
                <div class="user-icon">
                    <img src="/image/{{ $question->user->image ?? 'avatar.png' }}" width="100%">
                    <div class="time-ago">{{ $question->created_at->diffForHumans() }}</div>
                </div>
            </div>
            <p>{{ $question->title }}</p>
            @if($question->image != null) 
            <div class="post-pic-area"><img class="post-pic" src="/image/{{ $question->image }}"></div>
            @endif
                <div class="answer">
                    <form action="" class="post-event">
                        <input type="submit" name="ans-btn" value="Answer" class="ans-btn post-event-btn"/>
                    </form>
                    <form action="" class="post-event">
                        <input type="submit" name="cmnt-btn" value="Comment" class="cmnt-btn post-event-btn"/> 
                    </form>
                    <form action="" class="post-event">
                        <input type="submit" name="react-btn" value="React" class="react-btn post-event-btn"/>
                    </form>
                </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End Posts -->
@endsection
