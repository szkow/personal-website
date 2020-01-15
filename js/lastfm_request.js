window.onload = (loadEvent) => {
    const kNumTracks = 5;
    var recentScrobbles = document.getElementById('recently-played');

    var request = new XMLHttpRequest();
    request.addEventListener('load', processResponse);
    request.open('GET',
        'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=szkow&api_key=4e4274667141deb75c3ce0d94ae90938');
    request.responseType = 'document';
    request.send();

    function processResponse() {
        var response = this.responseXML;
        var trackList = response.getElementsByTagName('track');
        for (var i = 0; i < Math.min(trackList.length, kNumTracks); i++) {
            var track = trackList.item(i);  // Gets reference to a track tag
            
            // Parse data from XML
            // See https://www.last.fm/api/show/user.getRecentTracks
            var nowPlaying = (track.getAttribute('nowplaying') === 'true');
            var artist = track.getElementsByTagName('artist').item(0).innerHTML;  // There should only be one of each of these
            var title = track.getElementsByTagName('name').item(0).innerHTML;     //   tags per track
            var album = track.getElementsByTagName('album').item(0).innerHTML;
            var date = (nowPlaying) ? 'Now playing' : track.getElementsByTagName('date').item(0).innerHTML;

            // Make a new div
            var newTrack = makeTrackElement(artist, title, album, date);

            // Add the div to the DOM
            recentScrobbles.appendChild(newTrack);
        }
    }

    function makeTrackElement(artist, title, album, date, nowPlaying) {
        var container = document.createElement('div');
        var artistElement = document.createElement('span');
        artistElement.innerHTML = artist;
        var titleElement = document.createElement('span');
        titleElement.innerHTML = title;
        var albumElement = document.createElement('div');
        albumElement.innerHTML = album;
        var dateElement = document.createElement('h4');
        dateElement.innerHTML = date;

        container.append(artistElement, titleElement, albumElement, dateElement);
        return container;
    }
};