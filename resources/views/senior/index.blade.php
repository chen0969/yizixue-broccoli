@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
<div class="row text-gray-600 seniorListPage">
    <!-- taggle menu section -->
    <div class="row text-gray-600">
        <h4 class="mt-3 col-6"><a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> > 學長姊</h4>
        <div class="col-6 d-flex justify-content-end">
            <svg id="burger" width="50px" height="50px" viewbox="0 0 50 50" onclick="toggle()">
                <g>
                    <rect width="30" height="5" x="10" y="10" fill="gray" />
                    <rect width="30" height="5" x="10" y="20" fill="gray" />
                    <rect width="30" height="5" x="10" y="30" fill="gray" />
                </g>
            </svg>
        </div>
    </div>
    <div id="toggleBar">
        <div class="col d-flex flex-column">
            <h6>英語系國家</h6>
            <a href="{{route('senior', ['area' => 'northeast'])}}" class="text-decoration-none">美國東北部</a>
            <a href="{{route('senior', ['area' => 'west'])}}" class="text-decoration-none">美國西北部</a>
            <a href="{{route('senior', ['area' => 'midwest'])}}" class="text-decoration-none">美國中西部</a>
            <a href="{{route('senior', ['area' => 'south'])}}" class="text-decoration-none">美國南部</a>
            <a href="{{route('senior', ['country' => 'canada'])}}" class="text-decoration-none">加拿大</a>
            <a href="{{route('senior', ['country' => 'uk'])}}" class="text-decoration-none">英國</a>
            <a href="{{route('senior', ['country' => 'australia'])}}" class="text-decoration-none">澳洲</a>
            <a href="{{route('senior', ['country' => 'new zealand'])}}" class="text-decoration-none">其他</a>
        </div>
        <div class="col d-flex flex-column">
            <h6>歐語系國家</h6>
            <a href="{{route('senior', ['country' => 'france'])}}" class="text-decoration-none">法國</a>
            <a href="{{route('senior', ['country' => 'germany'])}}" class="text-decoration-none">德國</a>
            <a>義大利</a>
            <a>其他</a>
        </div>
        <div class="col d-flex flex-column">
            <h6>亞洲國家</h6>
            <a href="{{route('senior', ['country' => 'taiwan'])}}" class="text-decoration-none">台灣</a>
            <a href="{{route('senior', ['country' => 'japan'])}}" class="text-decoration-none">日本</a>
            <a href="{{route('senior', ['country' => 'korea'])}}" class="text-decoration-none">韓國</a>
            <a>其他</a>
        </div>
        <div class="col d-flex flex-column">
            <h6>中國相關</h6>
            <a>中國</a>
            <a href="{{route('senior', ['country' => 'singapore'])}}" class="text-decoration-none">新加坡</a>
            <a href="{{route('senior', ['country' => 'hong kong'])}}" class="text-decoration-none">香港</a>
            <a href="{{route('senior', ['country' => 'macau'])}}" class="text-decoration-none">澳門</a>
            <a>其他</a>
        </div>
    </div>
    <!-- end of toggle menu section -->
</div>

<!-- senior cards broccoli ver -->
<div class="seniorPage w-100">
    <div class="sideNav col-3">
        <p>senior page test</p>
    </div>
    <div class="cards col-9">
        @forelse($users as $user)
        <div class="studentC" onclick="cardClickable({{ $user->id }})">
            <!-- img div -->
            <div class="studentImg">
                @if(is_null($user->avatar))
                <span style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp</span>
                @else
                <span style="background-image: url('/uploads/{{ $user->avatar }}');">&nbsp</span>
                @endif
            </div>
            <!-- background -->
            <svg viewBox="0 0 330 480">
                <path
                    d="M301.9,2c14.5,0,26.4,11.8,26.4,26.4v306.7c0,14.5-11.8,26.4-26.4,26.4H28.1c-14.5,0-26.4-11.8-26.4-26.4V28.4C1.8,13.8,13.6,2,28.1,2h273.7M301.9,0H28.1C12.5,0-.2,12.7-.2,28.4v306.7c0,15.7,12.7,28.4,28.4,28.4h273.7c15.7,0,28.4-12.7,28.4-28.4V28.4c0-15.7-12.7-28.4-28.4-28.4h0Z" />
                <polygon points="330 480 0 480 0 305 330 337.1 330 480" />
            </svg>
            <!-- school img -->
            <div class="schoolImg">
                <span style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp</span>
            </div>
            <!-- name card -->
            <h4>{{ $user->name }}</h4>
            <!-- school english -->
            <h5>{{ !is_null($user->universityItem) ? $user->universityItem->english_name : '' }}</h5>
            <!-- school chinese -->
            <h6>{{ !is_null($user->universityItem) ? $user->universityItem->chinese_name : '' }}</h6>
            <!-- react icons -->
            <div class="react d-flex flex-row justify-content-evenly align-items-center"
                onclick="event.stopPropagation(); return false; ">
                @if(auth()->check())
                <i class="fa fa-heart" style="
                                    color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    " data-id="{{$user->id}}">
                    <span class="text-black">{{$user->likedUser->count()}}</span>
                </i>
                <i class="fa fa-bookmark" data-id="{{$user->id}}" style="
                                    color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    ">
                    <span class="text-black">{{$user->collectedUser->count()}}</span>
                </i>
                @else
                <i class="fa fa-heart" style="color: black;" data-id="{{$user->id}}">
                    <span class="text-black">{{$user->likedUser->count()}}</span>
                </i>
                <i class="fa fa-bookmark" data-id="{{$user->id}}">
                    <span class="text-black">{{$user->collectedUser->count()}}</span>
                </i>
                @endif
            </div>
            <!-- post tag -->
            <div class="postTags">
                @forelse ($user->postCategory as $count => $cate)
                @if ($count < 3) <a href="{{route('senior', ['category' => $cate->postCategory->id])}}" class="text-white">
                    {{ $cate->postCategory->name }}
                    </a>
                    @endif
                    @empty
                    @endforelse
            </div>
        </div>
        @empty
        <div class="row">
            <p class="vh-100">
                目前尚無學長姐資料
            </p>
        </div>
        @endforelse
    </div>
</div>
<div class="pageNav">
    {!! $users->links('vendor.pagination.bootstrap-4') !!}
</div>
<script>
    $('.fa-heart').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('like-user')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.css('color', 'black');
                    that.children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $('.fa-bookmark').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('collect-user')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.css('color', 'black');
                    that.children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
@endsection