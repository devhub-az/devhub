window.Vue = require('vue');

/**
 * Posts
 */
Vue.component('posts', () => import('./components/articles/PostsComponent'));
Vue.component('post-show', () => import('./components/articles/PostShowComponent'));

/**
 * Loading
 */
Vue.component('posts-loading', () => import('./components/plugins/loading/PostsLoading'));
Vue.component('hubs-loading', () => import('./components/plugins/loading/HubsLoading'));
Vue.component('users-loading', () => import('./components/plugins/loading/UsersLoading'));

/**
 * Plugins
 */
Vue.component('pagination', () => import('./components/plugins/pagination.vue'));
Vue.component('vue-chosen', () => import('./components/plugins/vue-chosen.vue'));
Vue.component('search', () => import('./components/plugins/search.vue'));
Vue.component('dropdown', () => import('./components/plugins/dropdown.vue'));
Vue.component('dropdown-notification', () => import('./components/plugins/dropdown-notification.vue'));
Vue.component('editor', () => import('./components/plugins/editor'));
Vue.component('switcher-theme', () => import('./components/plugins/themeSwitcher'));

/**
 * Parts
 */
Vue.component('tags', () => import('./components/parts/tags.vue'));
Vue.component('vote', () => import('./components/parts/vote.vue'));
Vue.component('favorite', () => import('./components/parts/PostFavorite'));
Vue.component('comment-favorite', () => import('./components/parts/CommentFavorite'));

/**
 * Hubs
 */
Vue.component('hubs-list', () => import('./components/hubs/HubsComponent.vue'));
Vue.component('hubs-tags', () => import('./components/hubs/HubsTagComponent.vue'));
Vue.component('hub-follow-button', () => import('./components/hubs/HubsFollowButtonComponent.vue'));

/**
 * Users
 */
Vue.component('user-follow-button', () => import('./components/users/UsersFollowButtonComponent.vue'));
Vue.component('users-list', () => import('./components/users/UserComponent.vue'));

/**
 * Auth
 */
// Vue.component('profile-image-update', () => import('./components/plugins/profileUpdate'));
Vue.component('profile-settings', () => import('./components/auth/settings/ProfileComponent.vue'));

/**
 * Comments
 */
Vue.component('comments-favorite', () => import('./components/comments/FavoriteCommentsComponent.vue'));
Vue.component('comments', () => import('./components/comments/PostCommentsComponent.vue'));
