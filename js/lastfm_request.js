window.onload = (loadEvent) => {
    const kNumTracks = 5;
    var recentScrobbles = document.getElementById('recently-played');

    function printResponse() {
        console.log(this.responseText);
    }

    function processResponse() {
        var response = this.responseXML;
        var trackList = response.getElementsByTagName('track');
        for (var i = 0; i < Math.min(trackList.length, kNumTracks); i++) {
            var trackInfo = trackList.item(i).children;  // Gets children of a given track
            
            // Parse data from XML
            var artist = trackInfo[0].innerHTML;
            var title = trackInfo[1].innerHTML;

            // Make a new div
            var newTrack = document.createElement('div');
            newTrack.innerText = artist + ' - ' + title;

            // Add the div to the DOM
            recentScrobbles.appendChild(newTrack);
        }
    }

    var request = new XMLHttpRequest();
    request.addEventListener('load', processResponse);
    request.open('GET',
        'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=szkow&api_key=4e4274667141deb75c3ce0d94ae90938');
    request.responseType = 'document';
    request.send();
};