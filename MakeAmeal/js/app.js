// app.js
import { db } from "../firebase.js";

let map;
let markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 0, lng: 0 },
        zoom: 12,
    });

    map.addListener('click', function (event) {
        addMarker(event.latLng);
    });

    loadMarkers();
}

function loadMarkers() {
    db.collection('markers')
        .get()
        .then(querySnapshot => {
            querySnapshot.forEach(doc => {
                const position = doc.data().position;
                addMarker(new google.maps.LatLng(position.latitude, position.longitude));
            });
        });
}

function addMarker(location) {
    const marker = new google.maps.Marker({
        position: location,
        map: map,
    });

    markers.push(marker);

    db.collection('markers').add({
        position: new firebase.firestore.GeoPoint(location.lat(), location.lng()),
    });
}

function sendMessage() {
    const messageInput = document.getElementById('message-input');
    const message = messageInput.value.trim();

    if (message !== '') {
        db.collection('messages').add({
            content: message,
            timestamp: firebase.firestore.FieldValue.serverTimestamp(),
        });

        messageInput.value = '';
    }
}

function displayMessage(message) {
    const chatDisplay = document.getElementById('chat-display');
    const div = document.createElement('div');
    div.textContent = message.content;
    chatDisplay.appendChild(div);

    chatDisplay.scrollTop = chatDisplay.scrollHeight;
}

db.collection('messages')
    .orderBy('timestamp')
    .onSnapshot(snapshot => {
        const chatDisplay = document.getElementById('chat-display');
        chatDisplay.innerHTML = '';
        snapshot.forEach(doc => {
            displayMessage(doc.data());
        });
    });
