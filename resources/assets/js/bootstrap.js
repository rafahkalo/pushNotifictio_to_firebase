// resources/assets/js/bootstrap.js

import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'adfe63c8f6cb242ab31a',
    cluster: 'eu',
    encrypted: true
});
