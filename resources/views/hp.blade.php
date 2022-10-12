@extends('layouts.app1')

@section('content')
<script src="/js/map.js"></script>
<script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<div id="map" class="lg:w-[80%] lg:h-[50vh] h-[84vh] w-[90%] mx-auto min-h-[450px]">
    <!-- Ici s'affichera la carte -->
</div>
<input type="hidden" id="lon">
<input type="hidden" id="lat">
@endsection