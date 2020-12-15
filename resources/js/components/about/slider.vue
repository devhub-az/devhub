<template>
    <ul id="animation" class="flex mb-2 left-0 w-screen py-6 animation xs:hidden md:hidden sm:hidden">
        <li v-for="hub in hubs" class="flex flex-shrink-0 shadow gap-4 border mx-2 p-2 w-3/12 bg-white rounded">
            <img v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1" :src="hub.attributes.logo"
                 alt="Hub logo">
            <a :href="'/hubs/' + hub.id" class="">
                <h2 class="font-semibold mb-1">{{ hub.attributes.name }}</h2>
                <p class="text-xs w-full font-light xs:text-xs">
                    {{ hub.attributes.description }}
                </p>
            </a>
        </li>
        <li v-for="hub in hubs.slice(0,4)" class="flex flex-shrink-0 shadow gap-4 border mx-2 p-2 w-3/12 bg-white rounded">
            <img v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1" :src="hub.attributes.logo"
                 alt="Hub logo">
            <a :href="'/hubs/' + hub.id" class="">
                <h2 class="font-semibold">{{ hub.attributes.name }}</h2>
                <p class="text-xs w-full pb-2 xs:text-xs">
                    {{ hub.attributes.description }}
                </p>
            </a>
        </li>
    </ul>
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
    animation: animation 40s linear infinite;
}

@keyframes animation {
    100% {
        transform: translateX(calc(-198vw - 10.5rem));
    }
}
</style>
