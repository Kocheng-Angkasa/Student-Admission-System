<!DOCTYPE html>
<html>
    <head>
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <style>
      .gradient {
        background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
      }
    </style>
  </head>
        <body class="lg:flex">
            <div class="lg:w-1/2 xl:max-w-screen-sm">
                <div class="py-12 bg-white lg:bg-white flex justify-center lg:justify-start lg:px-12">
                    <div class="cursor-pointer flex items-center">
                        <div class="text-2xl text-indigo-800 tracking-wide ml-2 font-semibold">PPDB SD TADIKA MESRA</div>
                    </div>
                </div></br></br></br></br></br>
                <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                    <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Log in</h2>
                    <div class="mt-12">
                        <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="email" placeholder="Masukkan email anda" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
           <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
               <strong>{{ $errors->first('email') }}</strong>
           </span>
       @endif
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Masukkan password anda" name="password">
                                @if ($errors->has('password'))
           <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
               <strong>{{ $errors->first('password') }}</strong>
           </span>
       @endif
                            </div>
                            <div class="mt-10">
                                <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold gradient font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg" type="submit">
                                    Log In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex items-center justify-center gradient flex-1 h-screen">
                <div>
                  <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_TBKozE.json"  background="transparent" style="width: 100%; height: 750px;" speed="1" loop autoplay></lottie-player>
                </div>
            </div>
    </body>
</html>