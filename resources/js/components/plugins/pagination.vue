<template>
    <nav class="relative z-0 inline-flex xs:mx-auto xs:flex xs:justify-center" role="navigation"
         aria-label="pagination">
        <a v-if="pagination.current_page >= 4"
           class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white dark:bg-transparent dark:border-gray-700 dark:text-gray-400
        text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none
        focus:border-blue_def-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out
        duration-150 rounded-l-md cursor-pointer"
           @click.prevent="changePage(1)">
            <i class="iconify" data-icon="mdi-chevron-double-left"></i>
        </a>
        <a :class="isCurrentPage(page) ? 'text-cerulean-600 dark:text-cerulean-100 hover:text-cerulean-600' : 'text-gray-500 dark:text-gray-400 dark:hover:text-gray-400 hover:text-gray-700'"
           @click.prevent="changePage(page)"
           class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white dark:bg-transparent dark:border-gray-700 text-sm leading-5
           font-medium focus:z-10 focus:outline-none focus:border-blue_def-300
           focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 cursor-pointer"
           v-for="page in pages">{{ page }}</a>
        <a v-if="pagination.last_page - pagination.current_page >= 3"
            class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white dark:bg-transparent dark:border-gray-700 dark:text-gray-400
        text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none
        focus:border-blue_def-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out
        duration-150 rounded-r-md cursor-pointer"
           @click.prevent="changePage(pagination.last_page)">
            <i class="iconify" data-icon="mdi-chevron-double-right"></i>
        </a>
    </nav>
</template>

<script>
export default {
    props: ['pagination', 'offset'],
    methods: {
        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.$emit('paginate');
            window.scrollTo(0, 0);
        }
    },
    computed: {
        pages() {
            let pages = [];
            let from = this.pagination.current_page - Math.floor(this.offset / 2);
            if (from < 1) {
                from = 1;
            }
            let to = from + this.offset - 1;
            if (to > this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            while (from <= to) {
                pages.push(from);
                from++;
            }
            return pages;
        }
    }
}
</script>
