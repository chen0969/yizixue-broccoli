@extends('layouts.guest2')

@section('content')
    <style>
        .card-relate{
            position: relative;
            width: 100%;
            padding-top: 100%;
        }
        .card-relate img{
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

    </style>
<div class="uniListPage">
    <!-- taggle menu section -->
    <div class="row text-gray-600">
        <h4 class="mt-3 col-6">首頁 > 學校</h4>
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
            <a>美國北部</a>
            <a>美國南部</a>
            <a>美國中部</a>
            <a>美國東部</a>
            <a>美國西部</a>
            <a>加拿大</a>
            <a>英國</a>
            <a>澳洲</a>
            <a>其他</a>
        </div>
        <div class="col d-flex flex-column">
            <h6>歐語系國家</h6>
            <a>法國</a>
            <a>德國</a>
            <a>義大利</a>
            <a>其他</a>
        </div>
        <div class="col d-flex flex-column">
            <h6>亞洲國家</h6>
            <a>台灣</a>
            <a>日本</a>
            <a>韓國</a>
            <a>其他</a>
        </div>
        <div class="col d-flex flex-column">
            <h6>中國相關</h6>
            <a>中國</a>
            <a>新加坡</a>
            <a>香港</a>
            <a>澳門</a>
            <a>其他</a>
        </div>
    </div>
    <!-- end of toggle menu section -->
    <section class=" border-bottom">
        <div class="uCardSection">
            <div class="row gx-5">
                @forelse($universities as $university)
                <div class="col-3 mb-5">
                    <div class="cards">
                        <div class="item">
                            <div>
                                <div class="card">
                                    <div class="card-relate">
                                        <img src="{{asset($university->image_path)}}" alt="Card image cap">
                                    </div>
                                </div>
                                <div>
                                    <div class="name-card">
                                        <h5><a class="text-decoration-none text-white" href="{{route('senior', ['university' => $university->slug])}}">{{ $university->name }}</a></h5>
                                    </div>
                                    <div class="text-center">
                                        <h5>目前有<a href="#" class="text-decoration-none text-black">{{$university->vip->count()}}</a>位在校學長姐</h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="row text-center">
                        <p class="vh-100">
                            目前尚無資料
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <div class="pagNav">
        <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
            {{$universities->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>

@endsection