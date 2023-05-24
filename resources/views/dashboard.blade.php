@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
            <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
                <h1 class="text-3xl font-medium mb-4">Dashboard</h1>
                <div class="h-35/40 flex flex-col gap-2">
                    <div class="h-1/2 border flex items-center justify-center">
                        <h1 class="text-3xl font-medium mb-4">Foto</h1>
                    </div>
                    <div class="h-1/2 flex flex-col lg:flex-row lg:gap-2">
                        <div class="lg:w-1/2 border"></div>
                        <div class="lg:w-1/2 border">
                            <div class="flex gap-6 h-1/3 px-4 py-2 bg-slate-400">
                                <div class="bg-black w-1/4 h-full"></div>
                                <h2 class="text-md font-medium">Judul artikel</h2>
                            </div>
                            <div class="flex gap-6 h-1/3 px-4 py-2 bg-white">
                                <div class="bg-black w-1/4 h-full"></div>
                                <h2 class="text-md font-medium">Judul artikel</h2>
                            </div>
                            <div class="flex gap-6 h-1/3 px-4 py-2 bg-slate-400">
                                <div class="bg-black w-1/4 h-full"></div>
                                <h2 class="text-md font-medium">Judul artikel</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection