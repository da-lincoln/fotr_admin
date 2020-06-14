<? //Contains screen layout for sidebar  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Friends of the River</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/foundation.css')}}">

</head>
<body>
<div class="wrapper grid-y grid-frame ">
    <div class="grid-x">
        <aside class="sidebar">
            <ul class="sidebar-list">
                <li><a href="/"><span>DASHBOARD</span></a></li>
                <li class="header"><span>Monitoring Stations</span></li>
                <li><a href="/station/dumbarton"><span>Dumbarton</span></a></li>
                <li><a href="/station/millards_pool"><span>Millards Pool</span></a></li>
                <li><a href="/station/lloyds_reserve"><span>Lloyds Reserve</span></a></li>
                <li><a href="/station/goomalling_bridge"><span>Goomalling Bridge</span></a></li>
                <li><a href="/station/boyagerring_brook"><span>Boyagerring Brook</span></a></li>
                <li><a href="/station/newcastle_bridge"><span>Newcastle Bridge</span></a></li>
                <li><a href="/station/slaughterhouse_bridge"><span>Slaughterhouse Bridge</span></a></li>
                <li><a href="/station/weatherall_reserve"><span>Weatherall Reserve</span></a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </aside>
    </div>
    <div class="grid-x content" style="height: 100%;">
    @yield ('content')
    </div>
</div>
<script src="{{asset('assets/js/vendor.js')}}"></script>
<script src="{{asset('assets/js/foundation.js')}}"></script>
</body>
</html>
