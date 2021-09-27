/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('form').on('submit', function () {
    $(this).find('input[type=submit]').attr('disabled', true);
})

Echo.channel('message-channel')
    .listen('MessageWasReceibed', (data) => {
        console.log('lol');
        console.log(data);
    } );