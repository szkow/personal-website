window.onload = (loadEvent) => {
    var recentScrobbles = document.getElementById('recently-played');

    function printResponse() {
        console.log(this.responseText);
    }

    function processResponse() {
        var response = this.responseXML;
        var trackList = response.getElementsByTagName('track');
        console.log(trackList.item(0));
        var track0 = trackList.item(0);  // Use getChildren or something...
        var artist = track0.item(0).innerHTML;
        var title = track0.item(1).innerHTML;
        recentScrobbles.innerHTML = artist + ' - ' + title;
    }

    var request = new XMLHttpRequest();
    request.addEventListener('load', processResponse);
    request.open('GET',
        'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=szkow&api_key=4e4274667141deb75c3ce0d94ae90938');
    request.responseType = 'document';
    request.send();
};