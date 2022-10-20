@extends('layouts.app1')

@section('content')
<script src="/js/map.js"></script>
<script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<div id="map" class="lg:w-[80%] lg:h-[50vh] h-[84vh] w-[90%] mx-auto min-h-[450px]">
    <!-- Ici s'affichera la carte -->
</div>
<div  id="action-div" class="fixed z-[9999] bottom-[30px] right-[20px]">
    <button class="bg-[#67b790e8] rounded-full  text-3xl w-[50px] h-[50px] text-white" id="action-button">!</button>
</div>
<div id="action-panel" class="duration-300 rounded-t-2xl w-full h-[50vh] min-h-[150px] z-[99999] bg-[#e9e9e9] fixed bottom-[-50vh] ">
<div class="rounded-t-2xl border-t-2  bg-[#222020f0] w-full h-[10px] " onclick="$('#action-panel').css({'bottom':'-50vh'})"></div>
</div>
@endsection