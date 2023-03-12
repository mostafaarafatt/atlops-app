<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBqT1-GkH853dHjTUFobaK87mwFH48hAa4",
        authDomain: "atlopsnotification.firebaseapp.com",
        projectId: "atlopsnotification",
        storageBucket: "atlopsnotification.appspot.com",
        messagingSenderId: "826378549870",
        appId: "1:826378549870:web:5a560e2e7dcfa80808847f",
        measurementId: "G-0D6PR39XLN"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('store.token') }}',
                    type: 'POST',
                    data: {
                        token: response,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        // alert('Token stored.');
                    },
                    error: function(error) {
                        console.log(alert);
                    },
                });
            }).catch(function(error) {
                console.log(alert);
            });
    }

    messaging.onMessage(function(payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };

        new Notification(title, options);
        // $("#refresh_div").load(window.location.href + "#refresh_div");
    });
</script>
{{-- FCM key : AAAAwGf_-m4:APA91bEY2ISTK0yqCd_C8jkFS5n-BRVnzKBaOZ3KYHWr4M2cuFbEDgc9tPrelBo3eeuAR3C1wapC-DzTaB_WkLMuSFSWouyv-9uQKJ_nEZz4BDkl3Wk5xVovnw9GQCv2Ig-BXxu_SmOW --}}

{{-- sender_id : 826378549870 --}}

<script>
    $(document).ready(function(e) {

        startFCM();

    });
</script>
