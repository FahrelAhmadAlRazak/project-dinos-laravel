<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

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
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#signin', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            })
        })
    </script>

</head>
<div class="container">
    <div class="form-box">
        <img src="img/logodinos1.png" alt="">
        <h1><b>SIGN IN</b></h1>
        @if(session('successsignup'))
        <p class="alert alert-success"> {{ session('successsignup') }}</p>
        @endif
        <!-- @if(session('success'))
        <p class="alert alert-success"> {{ session('success') }}</p>
        @endif  -->
        @if(session('error'))
        
        <p class="alert alert-danger"> {{ session('error')}}</p>
      
        @endif  
        <form method="post" action="{{ route('signin') }}" id="signin">
            @csrf
            <div class="form-group">
                <div class="">
                    <label for="email"></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                    <!-- @if($errors->has('email'))

                    <p class="alert alert-danger"> {{ $errors->first('email') }}</p>
                    @endif -->
                    {{-- @error('email')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror --}}

                </div>
                <div class="" id="">
                    <label for="password"></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                    <!-- @if($errors->has('password'))

                    <p class="alert alert-danger"> {{ $errors->first('password') }}</p>
                    @endif -->
                    {{-- @error('password')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div>
                    <button type="submit" class="btn1 mt-4" id="signin">Sign In</button>
                    <p class="p-signin">Belum Memiliki Akun ? <a href="/signup">Sign Up</a></p>
                </div>



            </div>
        </form>

        <div class="mt-8 flex flex-col xs:items-center sm:flex-row sm:justify-between sm:items-start">
            <div class="relative w-1/2">
                <p id="error-msg" class="@unless($errors->any())hidden @endunless absolute top-0 bg-red-700 text-white px-8 py-2 rounded-lg">“Semua data harus terisi dengan benar”</p>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
    // const _passwordModal = new Modal();
    // _passwordModal.show();
    // $("#passwordModalConf").click(() => {
    //     if ($("#passwordModalValue").val() == "test") {
    //         _passwordModal.hide();
    //     } else {
    //         $("#passwordModalErr").removeClass("hidden");
    //     }
    // });

    const _notificationModal = new Modal($('#error-msg')[0]);
    $("#signin").submit(function(e) {
        e.preventDefault()
        // update data di server
        //----------------------
        // jika gagal
        //----------------------
        // $("#error-msg").removeClass("hidden");
        //----------------------
        // jika sukses
        _notificationModal.show();

        const form = this;
        setTimeout(function() {
            form.submit();
        }, 1000)



    })
</script>