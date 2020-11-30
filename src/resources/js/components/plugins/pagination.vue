<template>
    <nav class="relative z-0 inline-flex shadow-sm -space-x-px xs:mx-auto xs:flex xs:justify-center" role="navigation"
         aria-label="pagination">
        <a class="relative inline-flex items-center cursor-pointer px-2 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-50"
           @click.prevent="changePage(pagination.current_page - 1)" :disabled="pagination.current_page <= 1">
            <i class="mdi mdi-chevron-left"/>
        </a>
        <a v-if="pagination.current_page > 4"
           class="relative inline-flex items-center cursor-pointer px-4 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-50"
           @click.prevent="changePage(1)">1</a>
        <span v-if="pagination.current_page > 4"
              class="relative inline-flex items-center cursor-pointer px-4 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-50">...</span>
        <a :class="isCurrentPage(page) ? 'bg-blue text-white hover:bg-blue-light' : 'bg-gray-100 text-gray-700 hover:bg-gray-50'"
           @click.prevent="changePage(page)"
           class="relative inline-flex items-center cursor-pointer px-4 py-2 border border-gray-300 text-sm font-medium"
           v-for="page in pages">{{ page }}</a>
        <span v-if="pagination.last_page-pagination.current_page > 4"
              class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-50">...</span>
        <a class="relative inline-flex items-center cursor-pointer px-4 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-50"
           v-if="pagination.last_page-pagination.current_page > 4" @click.prevent="changePage(pagination.last_page)"
           :disabled="pagination.current_page >= pagination.last_page">{{pagination.last_page}}</a>
        <a class="relative inline-flex items-center cursor-pointer px-2 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-700 hover:bg-gray-50"
           @click.prevent="changePage(pagination.current_page + 1)"
           :disabled="pagination.current_page >= pagination.last_page">
            <i class="mdi mdi-chevron-right"/>
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
