@extends('layoutsDashboard.masterDashboard')
@section('content')

<!-- <div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Dashboard</h1>
        <div class="h-35/40 flex flex-col gap-2">

            <div class="h-main-dash border">
                
            </div>
            <div class="w-full"><p class="text-2xl font-bold float-right mr-c-dash">Populer</p></div>
            <div class="grid-container gap-7 h-1/2">
                @foreach ($artikel as $item)
                <div class="w-full h-full flex ">
                    <div class="w-full image-container mr-art-dash">
                        <img src="{{ asset('img/'.$item->gambar) }}">
                    </div>
                    <div class="w-full">

                        <div class=" w-full h-judul-1">
                            <p class="text-2xl font-bold">{{ $item->judul }}</p>
                        </div>
                        <div class="border mb-4">{{ $item->created_at }}</div>
                        <div class="border w-full mb-4">
                            <p class="shorten1">{{ $item->isi }}/p>
                        </div>
                        <div class="border float-right text-dec-ul text-italic"><a href="#">selengkapnya</a></div>
                    </div>
                </div>
                <div class="border w-7/0 h-full">
                    
                    <div>
                        <div class="border image-container h-custom-dash">
                        <img src="{{ asset('img/Artikel1.jpg') }}">
                        </div>
                        <div class="border">
                            <p class="text-2xl font-bold mt-2">Tips Membuat Promo untuk Menari Pelanggan</p>
                        </div>
                        <div class="border">
                            2023-05-30 18:12:11
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> -->

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4 border-art">Dashboard</h1>
        @can('admin')
        <div class="image-slider">
            <div class="slider">
              
                    <!-- <img src="img/Artikel1.jpg"> -->
                    <img src="img/Artikel2.png">
                    <img src="img/Artikel3.png">
                    <img src="img/Artikel4.png">
               
            </div>

        </div>
        {{-- <div class="image-slider">
            <div class="slider">
              <div class="slider-item">
                <img src="img/Artikel1.png" alt="Slide 1">
                <div class="slider-title">Judul Slide 1</div>
              </div>
              <div class="slider-item">
                <img src="img/Artikel2.png" alt="Slide 2">
                <div class="slider-title">Judul Slide 2</div>
              </div>
              <div class="slider-item">
                <img src="img/Artikel3.png" alt="Slide 3">
                <div class="slider-title">Judul Slide 3</div>
              </div>
              <div class="slider-item">
                <img src="img/Artikel4.png" alt="Slide 4">
                <div class="slider-title">Judul Slide 4</div>
              </div>
            </div>
          </div> --}}
          
          
        <div class="artikel">
            <div>
            <p class="text-2xl font-bold mb-4  border-art">Artikel</p>
            </div>
            @foreach ($artikel as $item)
            <div class="mb-7 border-art">
                <div class="artikel-image image-container mb-4">
                    <img src="{{ asset('img/'.$item->gambar) }}">
                </div>
                <div class="">
    
                    <div class="">
                    <p class="text-2xl font-bold">{{ $item->judul }}</p>
                    </div>
                    <div class="">{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i').' WIB' }}</div>
                    <div class="">
                        <p class="shorten1">{{ $item->isi }}</p>
                    </div>
                    <div class="float-right text-dec-ul text-italic mb-7"><a href="/detailArtikel/{{ $item->id }}">selengkapnya</a></div>
                </div>
            </div>
            @endforeach
        </div>
        @endcan
        @can('mitra')
        <div class="image-slider">
            <div class="slider">
              
                    <!-- <img src="img/Artikel1.jpg"> -->
                    <img src="img/Artikel2.png">
                    <img src="img/Artikel3.png">
                    <img src="img/Artikel4.png">
               
            </div>

        </div>
        <div class="artikel">
            <div>
            <p class="text-2xl font-bold mb-4  border-art">Artikel</p>
            </div>
            @foreach ($artikel as $item)
            <div class="mb-7">
                <div class="artikel-image image-container mb-4">
                    <img src="{{ asset('img/'.$item->gambar) }}">
                </div>
                <div class="">
    
                    <div class="">
                    <p class="text-2xl font-bold">{{ $item->judul }}</p>
                    </div>
                    <div class="">{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i').' WIB' }}</div>
                    <div class="">
                        <p class="shorten1">{{ $item->isi }}</p>
                    </div>
                    <div class="float-right text-dec-ul text-italic mb-7"><a href="/detailArtikel/{{ $item->id }}">selengkapnya</a></div>
                </div>
            </div>
            @endforeach
        </div>
        @endcan
        
        @can('kurir')
        <div>
            <div><img class="kurir-dash" src="img/kurirDinosWhite.png" alt=""></div>
            {{-- <div><img src="img/KURIR.png" alt=""></div> --}}
        </div>
        @endcan
    </div>
</div>

<script>
    // Mengaktifkan animasi slider setelah halaman dimuat
    window.addEventListener("load", function() {
      var slider = document.querySelector(".slider");
      var sliderItems = document.querySelectorAll(".slider-item");
      var slideCount = sliderItems.length;
      var currentIndex = 0;
      var slideWidth = sliderItems[0].offsetWidth;
      var interval;
  
      function startSlide() {
        interval = setInterval(nextSlide, 3000);
      }
  
      function nextSlide() {
        currentIndex = (currentIndex + 1) % slideCount;
        slider.style.transform = "translateX(" + (-slideWidth * currentIndex) + "px)";
      }
  
      startSlide();
    });
  </script>
  


@endsection