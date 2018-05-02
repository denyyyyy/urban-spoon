<!DOCTYPE html>
<html>
  <head>
    <style>
	   html, body { height: 100%; margin: 0px; padding: 0px }
	   #map { width: 100%; height: 100% }
    </style>
  </head>
  <body>
  <h1 align="center">Rezeknes ielu apgaismosanas karte</h1>
  <p>Ievadiet koordinātes:</p>
  <p>Latitude:<input id="latitude" type="number"/>Piemēram: 56.0125468</p>
  <p>Longitude:<input id="longitude" type="number"/>Piemēram: 27.3654789</p>
  <p>apgaismojums(luksos):<input id="lx" type="number"/></p>
  <p>Datums un laiks:<input id="time" type="datetime"/>Piemēram: 2015-12-14 00:36:51</p>
  <p><button onclick="addPoint()">Submit</button></p>
    <div id="map"></div>
	<script>
	function addPoint() {
		$.post('http://localhost/insert.php', {'latitude': $('#latitude').val(), 'longitude': $('#longitude').val(), 'lx': $('#lx').val(), 'time': $('#time').val()},
		 function(data) {
			alert(data);
			location.reload()
		 }); 
	}
	 </script>
	 
    <script>
	window.onload = function() {
		$.post('http://localhost/select.php', null,
		 function(data) {
			Heatmap(data);
		 }, 'json');
	}
	
	function Heatmap(coords) {
		  var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 16,
			  center: new google.maps.LatLng(56.512152, 27.337068)
			});
		  
			  heatmap = new HeatmapOverlay(map,
			  {
				   "radius": 0.0003,
				   "maxOpacity": 3,
				   "scaleRadius": true,
				   "useLocalExtrema": true,
				   gradient: {
						".10": "black",
						".80": "white"
				   },
				   latfield: 'lat',
				   lngField: 'lng',
				   valueField: 'lx'
			   });
			
		/*var coords = [
					{lat: 56.51762228405007, lng: 27.33661028656294, lx: 0},
					{lat: 56.51646377598907, lng: 27.335395289954853, lx: 1},
					{lat: 56.5163440654285, lng: 27.336065651693026, lx: 1},
					{lat: 56.51634406542825, lng: 27.336065651693026, lx: 0},
					{lat: 56.51630590838754, lng: 27.336344680050438, lx: 0},
					{lat: 56.51608083226555,  lng: 27.336965353133984, lx: 25},
					{lat: 56.51606765695366, lng: 27.337237601482656, lx: 0},
					{lat: 56.51598531738744, lng: 27.33769305303671, lx: 0},
					{lat: 56.51597322292827, lng: 27.337874221819046, lx: 0},
					{lat: 56.51595455279489, lng: 27.33807325419688, lx: 0},
					{lat: 56.515935837471105, lng: 27.338270662705316, lx: 0},
					{lat: 56.515886082937186, lng: 27.33844433088756, lx: 0},
					{lat: 56.51583781234805, lng: 27.338692449880025, lx: 0},
					{lat: 56.51578985676951, lng: 27.338856120381244, lx: 0},
					{lat: 56.515724721427986, lng: 27.339250535909155, lx: 0},
					{lat: 56.515653648593045, lng: 27.33946137293874, lx: 0},
					{lat: 56.51560910909425, lng: 27.339662590834777, lx: 0},
					{lat: 56.51550409053341, lng: 27.339786731655682, lx: 0},
					{lat: 56.51541864133411, lng: 27.339723542674268, lx: 2},
					{lat: 56.5153096519489, lng: 27.3396628333131, lx: 0},
					{lat: 56.51507651170014, lng: 27.339564578339484, lx: 0},
					{lat: 56.51498520052439, lng: 27.339542360990635, lx: 0},
					{lat: 56.51472548200489, lng: 27.339394784777436, lx: 0},
					{lat: 56.514618795421114, lng: 27.33925706353032, lx: 0},
					{lat: 56.514439839146974, lng: 27.339134796218254, lx: 0},
					{lat: 56.51434766870011, lng: 27.339081781999237, lx: 0},
					{lat: 56.51421181227952, lng: 27.339011407646616, lx: 0},
					{lat: 56.5141365845866, lng: 27.338997354724885, lx: 0},
					{lat: 56.51401742198726, lng: 27.338935717392065, lx: 2},
					{lat: 56.51383180890366, lng: 27.338678114648037, lx: 0},
					{lat: 56.513762727664684, lng: 27.338497411270602, lx: 2},
					{lat: 56.51375382788893, lng: 27.338488448307807, lx: 5},
					{lat: 56.5135651214664, lng: 27.338386704006425, lx: 2},
					{lat: 56.51339138986705, lng: 27.338226341034463, lx: 0},
					{lat: 56.51307812085721, lng: 27.337849306608476, lx: 0},
					{lat: 56.51292237535213, lng: 27.33763013248754, lx: 0},
					{lat: 56.512755026664436, lng: 27.3374018839375, lx: 0},
					{lat: 56.51268786284652, lng: 27.337251581982464, lx: 0},
					{lat: 56.5124211622038, lng: 27.337050997903894, lx: 0},
					{lat: 56.511819171772565, lng: 27.336534830453427, lx: 0},
					{lat: 56.5115921737496, lng: 27.336391104754366, lx: 2},
					{lat: 56.51122928194432, lng: 27.336169633202747, lx: 0},
					{lat: 56.511023092831806, lng: 27.336098368662427, lx: 0},
					{lat: 56.51072159434527, lng: 27.335939935115807, lx: 0},
					{lat: 56.51046526789117, lng: 27.335826720061533, lx: 0},
					{lat: 56.510307252560764, lng: 27.33569111728508, lx: 0},
					{lat: 56.51013094400324, lng: 27.335564956243868, lx: 0},
					{lat: 56.50995379542853, lng: 27.335471433064054, lx: 2},
					{lat: 56.50974026564602, lng: 27.33495954559984, lx: 0},
					{lat: 56.50978150840386, lng: 27.33477410477911, lx: 2},
					{lat: 56.50979390126453, lng: 27.334610120065282, lx: 4},
					{lat: 56.509973679745926, lng: 27.333313251585224, lx: 2},
					{lat: 56.5651010408254829, lng: 27.33278237581187, lx: 7},
					{lat: 56.510547956619966, lng: 27.333141818140547, lx: 0},
					{lat: 56.51096861462885, lng: 27.33335932119956, lx: 0},
					{lat: 56.51120150232555, lng: 27.333525302955184, lx: 16},
					{lat: 56.51143306186745, lng: 27.33693818793325, lx: 4},
					{lat: 56.512089503569605, lng: 27.334082579629264, lx: 18},
					{lat: 56.51259348940329, lng: 27.33437547639505, lx: 0},
					{lat: 56.51317451459744, lng: 27.33478105790016, lx: 4},
					{lat: 56.51351662248982, lng: 27.334963517633273, lx: 4},
					{lat: 56.5140325596932, lng: 27.335397744770884, lx: 2},
					{lat: 56.51423932287381, lng: 27.33537135604114, lx: 11},
					{lat: 56.514368251246545, lng: 27.334451435016952, lx: 0},
					{lat: 56.51458975695222, lng: 27.33373139744318, lx: 0},
					{lat: 56.5147857450353, lng: 27.33382755889801, lx: 9},
					{lat: 56.5150705639656, lng: 27.334028688846082, lx: 11},
					{lat: 56.51529222659679, lng: 27.33405886902066, lx: 2},
					{lat: 56.5157313224992, lng: 27.334473887107315, lx: 0},
					{lat: 56.51590008465757, lng: 27.334515864399837, lx: 2},
					{lat: 56.51593187804112, lng: 27.334523132199465, lx: 14},
					{lat: 56.51615353148215, lng: 27.33448438114223, lx: 4},
					{lat: 56.51618675306695, lng: 27.334582852570225, lx: 21},
					{lat: 56.51622274506234, lng: 27.334647400654593, lx: 0}
					];*/
			var testData = {
			  max: 100,
			  data: coords
			};

			heatmap.setData(testData);
	}
		
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8qcnZmicGbRnx8HvwkVKaxsHkMFhsQ74"></script>
	<script src="heatmap.min.js"></script>
	<script src="gmaps-heatmap.js"></script>
  </body>
</html>