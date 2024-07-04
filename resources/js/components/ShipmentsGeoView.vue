<template>
    <div>
        <h1>Pusher Test</h1>
        <p>
            Publish an event to channel <code>my-channel</code>
            with event name <code>my-event</code>; it will appear below:
        </p>
        <div>
            <ul>
                <li v-for="message in messages">
                    {{ message }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
// export default {
//     data() {
//         return {
//             messages: null,
//         }
//     },
//     mounted() {
//         // Pusher.logToConsole = true;

//         // var pusher = new Pusher('17cb81af42f2bb5a6500', {
//         //     cluster: 'mt1'
//         // });

//         // var channel = pusher.subscribe('my-channel');
//         // channel.bind('my-event', function (data) {
//         //     this.messages.push(JSON.stringify(data));
//         //     console.log(data);
//         // });

//         console.log('ima');

//     }
// }
</script>

<style lang="scss" scoped></style>
