<template>
    <div class="fixed flex border p-3 rounded-lg z-10 left-0 top-20 bg-white shadow w-80"
         style="-webkit-animation: slideDown 5s 1 ease-in-out forwards;">
        <span class="iconify border rounded border-green-500 text-green-500 p-2 text-3xl" :data-icon="icon"/>
        <div class="ml-3">
            <p class="font-medium mb-1">{{ title }}</p>
            <p class="text-gray-600 text-light text-sm">{{ message }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Notification',
    props: {
        title: {
            type: String,
            required: true,
        },
        message: {
            type: String,
            required: true,
        },
        icon: {
            type: String,
            required: true,
        }
    },
};
</script>

<style>
@keyframes slideDown {
    from {
        transform: translate(-22rem, 0);
    }
    30%, 70% {
        transform: translate(2rem, 0);
    }
    to {
        transform: translate(-22rem, 0);
    }
}

@-moz-keyframes slideDown {
    0%, 100% {
        -moz-transform: translateX(150px);
    }
    10%, 90% {
        -moz-transform: translateX(0px);
    }
}
</style>
