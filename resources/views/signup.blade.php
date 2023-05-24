<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signIn.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    

</head>

<body>
    <div class="container" style="padding-top: 100px; height: auto; overflow: hidden;">
        <div class="form-box">
            <img src="img/logodinos1.png" alt="">
            <h1><b>SIGN UP</b></h1>
            <!-- @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger"> {{ $err }}</p>
            @endforeach
            @endif -->
            <form method="post" action="{{ route('signup') }}">
                @csrf
                <div class="form-group">
                    <div class="">
                        <label for="nama"></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama">
                        @if($errors->has('nama'))
                        
                        <p class="alert alert-danger"> {{ $errors->first('nama') }}</p>
                        @endif
                        {{-- @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="password"></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                        {{-- @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="username"></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                        {{-- @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="no_identitas"></label>
                        <input type="text" class="form-control @error('nomor_identitas') is-invalid @enderror" id="no_identitas" name="no_identitas" placeholder="Nomor Identitas Penduduk">
                        {{-- @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="email"></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                        {{-- @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="no_telepon"></label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Nomor Telpon">
                        {{-- @error('no_telepon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="tanggal_lahir"></label>
                        <input type="date" class="form-control" @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir">
                        {{-- <input type="text" class="form-control @error('jalan') is-invalid @enderror" id="jalan" name="jalan" placeholder="Jalan" > --}}
                        {{-- @error('no_telpon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                    </div>

                    <div class="">
                        <label for="jalan"></label>
                        <input type="text" class="form-control @error('jalan') is-invalid @enderror" id="jalan" name="jalan" placeholder="Jalan">
                        {{-- @error('jalan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}

                        <div class="form-group" style="display: flex; align-items: center; gap: 10px; padding-top: 2px;">
                            <label for="exampleFormControlSelect2">Provinsi</label>
                            <select class="form-control w-50" name="id_provinsi" id="id_provinsi" s>
                                <option disabled value>Pilih Provinsi</option>
                                @foreach($provinsi as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- @dd(count($provinsi)) --}}
                        <div class="form-group" style="display: flex; align-items: center; gap: 10px; padding-top: 14px;">
                            <label for="exampleFormControlSelect2">Kota</label>
                            <select class="form-control w-50 mb-3" name="id_kota" id="id_kota">
                                <option disabled value>Pilih Kota</option>
                                @foreach($provinsi[11]->kota as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="text" name="id_role" id="id_role" hidden value="1">

                        <div>
                            <button type="submit" class="btn1 mt-4"  data-toggle="modal" data-target="#exampleModal" >Sign Up</button>
                            <p class="p-signin">Sudah Memiliki Akun ? <a href="/signin">Sign In</a></p>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <script>
        $(function(){
            $(document).on('click','#daftar',function(e){
                e.preventDefault();
                var link = $(this).attr("href")
            })
        });
    </script> -->
    
</body>