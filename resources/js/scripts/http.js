import axios from 'axios'

/**
 * Create Axios
 */
export const http = axios.create()

function trans(key, replace = {}) {
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);

    for (const placeholder in replace) {
        translation = translation.replace(`:${placeholder}`, replace[placeholder]);
    }
    return translation;
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
http.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Handle all error messages.
 */
http.interceptors.response.use(function(response) {
    return response;
}, function(error) {
    const { response } = error

    if ([401].indexOf(response.status) >= 0) {
        if (response.status === 401 && response.data.error.message !== 'Unauthorized') {
            return Promise.reject(response);
        }
        window.location = '/login';
    }

    if ([403].indexOf(response.status) >= 0) {
        toastr.error(response.data.message)
    }

    return Promise.reject(error);
});

export default function install(Vue) {
    Object.defineProperty(Vue.prototype, '$http', {
        get() {
            return http
        },
    })
}
