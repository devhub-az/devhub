<template>
    <div class="relative flex slider dark:slider overflow-hidden">
        <ul class="flex mb-2 left-0 w-full py-6 animation xs:hidden md:hidden sm:hidden">
            <li v-for="hub in hubs"
                class="flex flex-shrink-0 mx-4 p-2 w-max bg-white rounded dark:bg-dpaper dark:text-gray-300">
                <img v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1" :src="hub.attributes.logo"
                     alt="Hub logo">
            </li>
        </ul>
        <ul class="flex mb-2 left-0 w-full py-6 animation xs:hidden md:hidden sm:hidden">
            <li v-for="hub in hubs"
                class="flex flex-shrink-0 mx-4 p-2 w-max bg-white rounded dark:bg-dpaper dark:text-gray-300">
                <img v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1" :src="hub.attributes.logo"
                     alt="Hub logo">
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            hubs: [
                {
                    "type": "hubs",
                    "id": 123,
                    "attributes": {
                        "logo": "/images/hubs/php.png",
                        "rating": 1,
                        "description": "PHP, server tərəfində veb inkişafı üçün xüsusilə yaxşı işləyən məşhur ümumi məqsədli bir yazı dilidir.",
                        "name": "PHP",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 1
                    },
                    "links": {
                        "self": "http://127.0.0.1:8090/api/hubs/123"
                    }
                },
                {
                    "type": "hubs",
                    "id": 5,
                    "attributes": {
                        "logo": "/images/hubs/android.png",
                        "rating": 0,
                        "description": "Android, mobil qurğular üçün hazırlanmış Google tərəfindən qurulmuş bir əməliyyat sistemidir.",
                        "name": "Android",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 2
                    },
                },
                {
                    "type": "hubs",
                    "id": 8,
                    "attributes": {
                        "logo": "/images/hubs/api.png",
                        "rating": 0,
                        "description": "Bir API (Tətbiq Proqramlaşdırma İnterfeysi), proqram təminatının qurulması üçün protokolların və alt proqramların toplusudur.",
                        "name": "API",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 0
                    },
                },
                {
                    "type": "hubs",
                    "id": 10,
                    "attributes": {
                        "logo": "/images/hubs/aspnet.png",
                        "rating": 0,
                        "description": "ASP.NET müasir veb tətbiqetmələri və xidmətləri yaratmaq üçün bir veb çərçivədir.",
                        "name": "ASP.NET",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 0
                    },
                },
                {
                    "type": "hubs",
                    "id": 77,
                    "attributes": {
                        "logo": "/images/hubs/java.png",
                        "rating": 0,
                        "description": "Java, əsasən veb, masaüstü, quraşdırılmış qurğular və mobil tətbiqlər üçün istifadə olunan obyekt yönümlü bir proqramlaşdırma dilidir.",
                        "name": "Java",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 3
                    },
                    "links": {
                        "self": "http://127.0.0.1:8090/api/hubs/77"
                    }
                },
                {
                    "type": "hubs",
                    "id": 12,
                    "attributes": {
                        "logo": "/images/hubs/awesome.png",
                        "rating": 2,
                        "description": "Zəhmli bir siyahı cəmiyyət tərəfindən idarə olunan zəhmli şeylərin siyahısıdır.",
                        "name": "Awesome Lists",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 0
                    },
                    "links": {
                        "self": "http://127.0.0.1:8090/api/hubs/12"
                    }
                },
                {
                    "type": "hubs",
                    "id": 13,
                    "attributes": {
                        "logo": "/images/hubs/aws.png",
                        "rating": 0,
                        "description": "Amazon Veb Xidmətləri abunə əsasında tələb bulud hesablama platformalarını təqdim edir.",
                        "name": "Amazon Web Services",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 1
                    },
                    "links": {
                        "self": "http://127.0.0.1:8090/api/hubs/13"
                    }
                },
                {

                    "type": "hubs",
                    "id": 64,
                    "attributes": {
                        "logo": "/images/hubs/go.png",
                        "rating": 0,
                        "description": "Go, C proqramlaşdırma dilinin sadələşdirilmiş bir versiyasına bənzəmək üçün qurulmuş bir proqramlaşdırma dilidir.",
                        "name": "Go",
                        "hub_followers_count": "0",
                        "follower_check": false,
                        "articles_count": 2
                    },
                },
            ],
        }
    },
}
</script>

<style>
.animation {
    animation: animation 60s linear infinite;
}

.slider:hover .animation {
    -webkit-animation-play-state: paused;
    -moz-animation-play-state: paused;
    -o-animation-play-state: paused;
    animation-play-state: paused;
}

.dark .dark\:slider:after {
    content: "";
    background: linear-gradient(to right, #171c20 0, rgb(255 255 255 / 0%) 50%, rgb(23 28 32 / 0%) 50%, #171c20 100%);
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
}

.slider:after {
    content: "";
    background: linear-gradient(to right, #f4f4f4 0, rgb(255 255 255 / 0%) 50%, rgb(23 28 32 / 0%) 50%, #f4f4f4 100%);
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
}

@keyframes animation {
    0% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        -webkit-transform: translateX(-100%);
        -ms-transform: translateX(-100%);
        transform: translateX(-100%);
    }
}
</style>
