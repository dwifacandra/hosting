import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher', // Pastikan ini adalah 'pusher', bukan 'reverb'
    key: import.meta.env.VITE_PUSHER_KEY,
    cluster: import.meta.env.VITE_PUSHER_CLUSTER,
    wsHost: window.location.hostname,
    wsPort: 6001, // Port yang Anda gunakan untuk WebSocket
    wssPort: 443,
    forceTLS: true,
    enabledTransports: ['ws', 'wss'],
});
