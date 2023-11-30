// firebase.js

// Load Firebase SDKs via CDN
const firebaseScript = document.createElement('script');
firebaseScript.src = 'https://www.gstatic.com/firebasejs/9.2.0/firebase-app-compat.js';
firebaseScript.defer = true;
document.head.appendChild(firebaseScript);

const analyticsScript = document.createElement('script');
analyticsScript.src = 'https://www.gstatic.com/firebasejs/9.2.0/firebase-analytics-compat.js';
analyticsScript.defer = true;
document.head.appendChild(analyticsScript);

const firestoreScript = document.createElement('script');
firestoreScript.src = 'https://www.gstatic.com/firebasejs/9.2.0/firebase-firestore-compat.js';
firestoreScript.defer = true;
document.head.appendChild(firestoreScript);

// Initialize Firebase
const firebaseConfig = {
  apiKey: "AIzaSyCEvDMYsRiC7mMXqfb4HEq8owouhbmmGl0",
  authDomain: "eatameal-c3162.firebaseapp.com",
  projectId: "eatameal-c3162",
  storageBucket: "eatameal-c3162.appspot.com",
  messagingSenderId: "811895464033",
  appId: "1:811895464033:web:cbc936d45141ba879e8a20",
  measurementId: "G-YF2VBFMTXC"
};

firebase.initializeApp(firebaseConfig);
const analytics = firebase.analytics();
const db = firebase.firestore();

export { db };
