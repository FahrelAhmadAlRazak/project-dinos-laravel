@extends('layoutsDashboard.masterDashboard')
@section('content')

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Dashboard</h1>
        <div class="h-35/40 flex flex-col gap-2">

            <div class="image-container h-1/2 border flex">
                <img class="h-full w-full" src="">
                <!-- <h1 class="text-3xl font-medium mb-4"></h1> -->
            </div>
            <div class="grid-container h-1/2">
                @foreach ($artikel as $item)
                <div class="lg:w-1/2">
                    <div class="gap-6 flex h-full py-2">
                        <div class="image-container w-full h-full border">
                            <img src="{{ asset('img/'.$item->gambar) }}">
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold"><a href="#">{{ $item->judul }}</a></h2>

                        </div>

                    </div>
                </div>
                @endforeach

                @foreach ($artikel as $item)
                <div class="lg:w-1/2">
                    <h1 class="px-4 py-2 border-art text-2xl font-bold">Populer</h1>
                    <div class="gap-6 h-1/3 px-4 py-2">
                        <div class="image-container w-full h-full border">
                            <img src="{{ asset('img/'.$item->gambar) }}">
                        </div>
                        <h2 class="text-2xl font-bold"><a href="#">{{ $item->judul }}</a></h2>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection