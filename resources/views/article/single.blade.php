@extends('layouts.guest2')

@section('content')
<div class="container-fluid py-5 singleArticle">
    <div class="row">
        <h4 class="mt-3">首頁 > {{$Data['article']->category->first()->postCategory->name}} > {{$Data['article']->title}}</h4>
    </div>
    <!-- search bar -->
    <div class="searchBar">
        <form>
            <svg x="0px" y="0px" viewBox="0 0 335.8 335.8">
                <g>
                    <circle fill="#FFFFFF" cx="224.7" cy="111.1" r="77.6"/>
                    <circle fill="none" stroke="#FFFFFF" stroke-width="12" stroke-miterlimit="10" cx="224.7" cy="111.1" r="105.1"/>
                    <rect x="121.4" y="178.9" transform="matrix(0.7071 0.7071 -0.7071 0.7071 181.9803 -35.5915)" fill="#FFFFFF" width="25.1" height="45.9"/>
                    <rect x="45.3" y="183.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 206.129 22.7085)" fill="#FFFFFF" width="60.7" height="153.2"/>
                </g>
            </svg>
            <div class="inputDiv">
                <input type="search">
            </div>
        </form>
    </div>
    <div class="row w-100">
        <h2>{{$Data['article']->title}}</h2>
    </div>
    <div class="row">
        <div class="col text-right h6">發布日期{{$Data['article']->created_at->format('Y/m/d')}}</div>
    </div>

    <div class="row text-center">
        <div class="text-center">
            <img src="{{asset('uploads/'.$Data['article']->image_path)}}" alt="" class="img-fluid w-50">
        </div>
    </div>
    <div class="row text-center h-50 mt-3" style="word-wrap:break-word; font-size: 2rem;">
        {!! $Data['article']->body !!}
    </div>
    <div class="row row-cols-2">
        <!-- categorys -->
        <div class="col postCategory">
            @if(!is_null($Data['article']->category))
                @foreach($Data['article']->category as $category)
                    <span class="btn btn-outline" style="border-color: #4C2A70; color: #4C2A70">#{{$category->postCategory->name}} </span>
                @endforeach
            @endif
        </div>
        <!-- social icons -->
        <div class="col socialIcons">
            <div style="text-align: right";>
                <i class="fa fa-heart" style="font-size:20px; color:red; margin:5px">
                    <span style="color:black">{{$Data['article']->likePost->count()}}</span>
                </i>
                <i class="fa fa-bookmark" style="font-size:20px; margin:5px">
                    <span style="color:black">{{$Data['article']->collectPost->count()}}</span>
                </i>
                <i>
                    <svg viewBox="0 0 512 512" >
                        <path d="M295.4,235.2c32.9,0,59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5s-59.5,26.7-59.5,59.5c0,2.5,0.1,5,0.4,7.4l-58.4,29.1
                            c-10.7-10.4-25.2-16.7-41.3-16.7c-32.9,0-59.5,26.7-59.5,59.5s26.7,59.5,59.5,59.5c16.1,0,30.6-6.3,41.3-16.7l58.4,29.1
                            c-0.3,2.4-0.4,4.8-0.4,7.4c0,32.9,26.7,59.5,59.5,59.5s59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5c-16.1,0-30.6,6.3-41.3,16.7
                            l-58.4-29.1c0.3-2.4,0.4-4.8,0.4-7.4c0-2.5-0.1-5-0.4-7.4l58.4-29.1C264.7,228.8,279.3,235.2,295.4,235.2z"/>
                        <circle class="st0" cx="224" cy="256" r="216.3"/>
                    </svg>
                </i>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="row w-100  py-5 authorDetail">
            <div class="w-100 pl-5 pt-3">
                <h2 class="text-black">文章作者</h2>
            </div>
            <div class="row">
                <!-- author card -->
                <div class="authorCard">
                    <div>
                        <div class="avatar">
                            <img src="{{asset('uploads/'.$Data['article']->author->avatar)}}" alt="...">
                            <div style="background-color: #BD9EBE" class="text-white" >
                                <h2 class="card-title text-center " >{{ $Data['article']->author->name }}</h2>
                                <h6 class="card-title text-center " style="background-color: #BD9EBE" >{{ $Data['article']->author->university }}</h6>
                            </div>
                        </div>
                        @if(!is_null($Data['article']->author->postCategory))
                            <div class="row row-cols-3 mt-3 tags" style="justify-content: center">
                                @foreach($Data['article']->author->postCategory as $postCategory)
                                    <span class="col-3 btn text-white m-1 tags" style="background-color: #4C2A70; font-size: 0.6rem;">{{$postCategory->postCategory->name}}</span>
                                @endforeach
                            </div>
                        @endif
                        @if(!is_null($Data['article']->author->skills))
                            <div class="row row-cols-3 mt-2" style="justify-content: center">
                                @foreach($Data['article']->author->skills as $skill)
                                        <span class="col-3 btn btn-outline-secondary m-1" style="font-size: 0.6rem;">{{ $skill->skill->name }}</span>
                                @endforeach
                            </div>
                        @endif

                        <a href="#" class="btn btn-outline text-center w-100">查看更多</a>
                    </div>
                </div>
                <!-- more posts of the author -->
                <div class="col-8">
                    <div class="row">
                        @if(!is_null($Data['article']->author->post))
                            @foreach($Data['article']->author->post as $post)
                                <div class="m-2 px-4">
                                    <div class="row py-2 moreArticles">
                                        <div class="col-2">
                                            <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;">
                                            <img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="w-100"></a>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><h3 class="text-break"> {{$post->title}} </h3></a>
                                            </p>
                                            <p>
                                                <a href="{{ route('article', $post->id) }}" style="color:black; text-decoration: none;" class="text-break w-75">
                                                    {!! \Illuminate\Support\Str::limit($post->body) !!}
                                                </a>
                                            </p>
                                            <p class="text-right" style="color:gray; margin-right: 10%;">
                                                發布日期：{{$post->created_at->format('Y/m/d')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="row" style="border: 2px solid black; height: 2px;"></div>

    <div class="mt-5">
        <h2>你可能感興趣的文章</h2>

        <div class="row row-cols-2">
            @if(!is_null($Data['interested']))
                @foreach($Data['interested'] as $post)
                    <div class="row">
                        <div class="m-2 px-4">
                            <div class="row py-2 moreArticles" style="border: 2px solid black; border-radius: 30px;">
                                <div class="col-2">
                                    <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;">
                                    <img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="w-100"></a>
                                </div>
                                <div class="col">
                                    <p>
                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><h3 class="text-break"> {{$post->title}} </h3></a>
                                    </p>
                                    <p >
                                        <a href="{{ route('article', $post->id) }}" style="color: black; text-decoration: none;" class="text-break w-75">
                                            {!! \Illuminate\Support\Str::limit($post->body) !!}
                                        </a>
                                    </p>
                                    <p class="text-right" style="color:gray; margin-right: 10%;">
                                        發布日期：{{$post->created_at->format('Y/m/d')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection
