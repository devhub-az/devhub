window.Vue = require('vue');

/**
 * Posts
 */
Vue.component('posts', require('./components/posts/PostsComponent').default);
Vue.component('post-show', require('./components/posts/PostShowComponent').default);

/**
 * Loading
 */
Vue.component('posts-loading', require('./components/plugins/loading/PostsLoading').default);
Vue.component('hubs-loading', require('./components/plugins/loading/HubsLoading').default);
Vue.component('users-loading', require('./components/plugins/loading/UsersLoading').default);

/**
 * Plugins
 */
Vue.component('pagination', require('./components/plugins/pagination.vue').default);
Vue.component('vue-chosen', require('./components/plugins/vue-chosen.vue').default);
Vue.component('search', require('./components/plugins/search.vue').default);
Vue.component('dropdown', require('./components/plugins/dropdown.vue').default);
Vue.component('dropdown-notification', require('./components/plugins/dropdown-notification.vue').default);
Vue.component('editor', require('./components/plugins/editor').default);

/**
 * Parts
 */
Vue.component('tags', require('./components/parts/tags.vue').default);
Vue.component('vote', require('./components/parts/vote.vue').default);
Vue.component('favorite', require('./components/parts/PostFavorite').default);
Vue.component('comment-favorite', require('./components/parts/CommentFavorite').default);

/**
 * Hubs
 */
Vue.component('hubs-list', require('./components/hubs/HubsComponent.vue').default);
Vue.component('hubs-tags', require('./components/hubs/HubsTagComponent.vue').default);
Vue.component('hub-follow-button', require('./components/hubs/HubsFollowButtonComponent.vue').default);

/**
 * Users
 */
Vue.component('user-follow-button', require('./components/users/UsersFollowButtonComponent.vue').default);
Vue.component('users-list', require('./components/users/UserComponent.vue').default);

/**
 * Auth
 */
Vue.component('profile-image-update', require('./components/plugins/profileUpdate').default);
Vue.component('profile-settings', require('./components/auth/settings/ProfileComponent.vue').default);

/**
 * Comments
 */
Vue.component('comments-favorite', require('./components/comments/FavoriteCommentsComponent.vue').default);
Vue.component('comments', require('./components/comments/PostCommentsComponent.vue').default);
