window.onload = (loadEvent) => {
    const kNumTracks = 50;
    var recentScrobbles = document.getElementById('recently-played');

    var request = new XMLHttpRequest();
    request.addEventListener('load', processResponse);
    request.open('GET',
        'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=szkow&api_key=4e4274667141deb75c3ce0d94ae90938');
    request.responseType = 'document';
    request.send();

    function printResponse() {
        console.log(this.responseText);
    }

    function processResponse() {
        recentScrobbles.innerText = '';  // Remove loading text
        var response = this.responseXML;
        var trackList = response.getElementsByTagName('track');
        for (var i = 0; i < Math.min(trackList.length, kNumTracks); i++) {
            var track = trackList.item(i);  // Gets reference to a track tag
            
            // Parse data from XML
            // See https://www.last.fm/api/show/user.getRecentTracks
            var nowPlaying = (track.getAttribute('nowplaying') === 'true');
            var albumArt = track.getElementsByTagName('image').item(1).innerHTML;
            var artist = track.getElementsByTagName('artist').item(0).innerHTML;  // There should only be one of each of these
            var title = track.getElementsByTagName('name').item(0).innerHTML;     //   tags per track
            var album = track.getElementsByTagName('album').item(0).innerHTML;
            var songLink = track.getElementsByTagName('url').item(0).innerHTML;
            var date = (nowPlaying) ? 'Now playing' : convertDate(track.getElementsByTagName('date').item(0).innerHTML);

            // Make a new div
            var newTrack = makeTrackElement(artist, title, album, date, albumArt, songLink);

            // Give currently playing track a nice border
            if (nowPlaying) {
                newTrack.style.setProperty('border', 'solid limegreen')
            }

            // Add the div to the DOM
            recentScrobbles.appendChild(newTrack);
        }
    }

    function makeTrackElement(artist, title, album, date, albumArt, songLink) {
        // Make the container for everything
        var container = document.createElement('div');
        container.className = 'recent-entry';

        // Make the album art
        var albumArtElement = document.createElement('img');
        albumArtElement.setAttribute('src', albumArt);

        // Make a container for the text
        var textContainer = document.createElement('div');
        textContainer.className = 'recent-text-container';

        // Make the individual fields
        var artistElement = document.createElement('div');
        artistElement.innerHTML = artist;
        artistElement.className = 'recent-artist';
        var titleElement = document.createElement('div');
        titleElement.innerHTML = title;
        titleElement.className = 'recent-title';
        var albumElement = document.createElement('div');
        albumElement.innerHTML = album;
        albumElement.className = 'recent-album';
        var dateElement = document.createElement('div');
        dateElement.innerHTML = date;
        dateElement.className = 'recent-date';

        // Add hyperlinks to the album art and song title
        var albumArtLinkElement = document.createElement('a');
        albumArtLinkElement.setAttribute('href', songLink);
        albumArtLinkElement.append(albumArtElement);
        var titleLinkElement = document.createElement('a');
        titleLinkElement.setAttribute('href', songLink);
        titleLinkElement.append(titleElement);

        textContainer.append(titleLinkElement, artistElement, albumElement, dateElement);
        container.append(albumArtLinkElement, textContainer);
        return container;
    }

    function convertDate(dateString) {
        const rawTime = moment.utc(dateString, 'DD MMM YYYY, HH:mm').fromNow();
        const capitalized = rawTime.charAt(0).toUpperCase() + rawTime.slice(1);
        return capitalized;
    }
};