@include('parts.header')


<div id="map" style="margin-top:200px;"></div>





<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

<script>
    @if ($lat && $long)
        var map = L.map('map').setView([{{$lat}},{{$long}}], 14);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    @endif
</script>


@include('parts.footer')
