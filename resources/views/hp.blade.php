@extends('layouts.app1')

@section('content')
<script src="/js/map.js"></script>
<script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<h1> I WANT My COFFEE </h1>
<div id="map" class="w-[400px] h-[400px]">
    <!-- Ici s'affichera la carte -->
</div>
<input type="hidden" id="lon">
<input type="hidden" id="lat">
@endsection