@extends('layouts.app')

@section('content')
    <div id="user-profile" class="col-md-12 container">
        <div class="user-cover">
            <form class="change-cover">
                <input class="change-cover-btn" id="change-cover-btn" type="submit" value="Change Cover"/>
            </form>
            <div class="cover-img">
                <img class="user-cover-img" src="/image/{{ Auth::user()->cover ?? 'cover_img.jpg' }}">
                <img class="user-img" src="/image/{{ Auth::user()->image ?? 'avatar.png' }}">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="username"><?php echo '@'?>{{ Auth::user()->username }}</span>
            </div>
            <div class="tabs">

            </div>
        </div>

        <div class="main-content">
            <div class="left">

            </div>
            <div class="user-home" id="user-home">
                <form action="{{ route('home.store') }}" enctype="multipart/form-data" method="POST" class="qestion-box col-md-12">
                    <input placeholder="Wodering? Ask a qestion..." type="text" name="title" class="title" id="title" autocomplete="off"/>
                    <i class="far fa-image"></i>
                    <i class="fas fa-smile"></i>
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="file" class="image" name="image" accept="image/*, image/heic, image/heif" multiple="1" aria-label="Picture">
                    <input type="submit" value="Press Enter to Post" class="submit-q" id="submit-q"/>
                </form>
                <div class="posts" id="posts">
                    @foreach($questions as $question)
                        @if(Auth::user()->id == $question->user_id)
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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection