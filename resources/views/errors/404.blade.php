<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    @stack('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>404 Not Found</title>
</head>

<body>
    <div class="">
        <div class="flex min-h-[100dvh] flex-col items-center justify-center bg-background px-4 text-center">
            <div class="space-y-4">
                <h1 class="font-bold tracking-tighter text-8xl text-green-new">404</h1>
                <p class="text-2xl font-bold text-muted-foreground">Oops, halaman yang kamu cari tidak dapat ditemukan.
                </p>
                <a class="inline-flex items-center justify-center h-10 px-8 text-sm font-medium text-white transition-colors rounded-md shadow bg-green-new text-primary-foreground hover:bg-green-new focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
                    href="javascript:history.back()" rel="ugc">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</body>

</html>
