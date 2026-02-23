<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto</title>
    {{-- script preload --}}
    @if(request()->routeIs('homepage'))
        <script>
            if (sessionStorage.getItem("preloaderSeen")) {
                document.documentElement.classList.add("no-preloader");
            }
        </script>
    @endif
    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CDN AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- Google Fonts Zalando  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zalando+Sans+Expanded:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    {{-- Logo sito --}}
    <link rel="shortcut icon" href="/logo/logoFavicon.png" type="">
</head>
<body>
@if(request()->routeIs('homepage'))
    <div id="preloader">
        <div class="loader-container">
            <svg class="logo-svg" viewBox="0 0 197 196" xmlns="http://www.w3.org/2000/svg">
            <path 
                class="bolt-svg"
                d="M 52.216 1.746 L 42.931 2.076 41.482 5.288 C 40.685 7.055, 33.075 26.500, 24.569 48.500 C 16.064 70.500, 7.507 92.547, 5.553 97.493 C 3.599 102.439, 2 107.052, 2 107.743 C 2 108.707, 6.334 109, 20.608 109 L 39.217 109 38.530 111.750 C 38.152 113.263, 35.591 120.575, 32.840 128 C 30.089 135.425, 24.757 149.825, 20.990 160 C 17.224 170.175, 13.204 180.975, 12.057 184 C 8.721 192.800, 7.990 196.006, 9.331 195.958 C 10.510 195.916, 13.541 192.194, 28.031 173 C 32.391 167.225, 41.705 154.999, 48.729 145.832 C 71.793 115.730, 101.172 75.838, 100.656 75.323 C 100.534 75.201, 91.913 74.830, 81.497 74.497 C 71.082 74.165, 62.428 73.761, 62.267 73.600 C 61.838 73.171, 65.621 64.872, 75.988 43.500 C 93.795 6.792, 95 4.242, 95 3.276 C 95 2.740, 90.612 2.011, 85.250 1.656 C 75.812 1.031, 72.002 1.041, 52.216 1.746"
            />
            <path 
                class="p-svg"
                d="M 107.471 2.685 C 105.596 4.171, 90.626 34.959, 91.401 35.737 C 91.819 36.157, 101.463 36.725, 112.831 37 C 135.401 37.546, 135.904 37.665, 143.216 44.186 C 153.708 53.544, 153.670 72.604, 143.137 83.145 C 137.176 89.111, 133.304 90.181, 115.016 90.917 L 100.531 91.500 95.516 98.634 C 90.113 106.319, 75.594 125.300, 70.758 131 C 69.125 132.925, 64.687 138.887, 60.895 144.250 C 57.103 149.613, 50.850 158.367, 47 163.705 C 43.150 169.042, 40 173.767, 40 174.205 C 40 174.642, 49.380 175, 60.844 175 L 81.688 175 82.344 159.841 C 82.705 151.504, 83 140.479, 83 135.341 L 83 126 99.750 125.982 C 123.808 125.956, 135.396 125.116, 144.500 122.740 C 161.220 118.376, 172.949 110.890, 181.694 99 C 189.497 88.393, 191.739 81.918, 192.604 67.500 C 194.151 41.699, 182.472 20.677, 160.674 10.028 C 155.974 7.732, 149.737 5.189, 146.814 4.377 C 140.878 2.728, 109.140 1.363, 107.471 2.685"
            />
            </svg>
        </div>
    </div>
@endif



<x-navbar/>
{{$slot}}
<x-footer/>


    {{-- JS AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    {{-- JS FONTAWESOME --}}
    <script src="https://kit.fontawesome.com/195a318551.js" crossorigin="anonymous"></script>
</body>
</html>