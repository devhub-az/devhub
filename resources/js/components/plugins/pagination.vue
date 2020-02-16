<template>
    <div class="pagination" role="navigation" aria-label="pagination">
        <a class="page" @click.prevent="changePage(pagination.current_page - 1)" :disabled="pagination.current_page <= 1">
            <i class="mdi mdi-chevron-left"></i>
        </a>
        <a v-if="pagination.current_page > 4" class="page" @click.prevent="changePage(1)">1</a>
        <span v-if="pagination.current_page > 4" class="page page-ellipsis">...</span>
        <a class="page" v-for="page in pages" :class="isCurrentPage(page) ? 'active' : ''" @click.prevent="changePage(page)">{{ page }}</a>
        <span v-if="pagination.last_page-pagination.current_page > 4" class="page page-ellipsis">...</span>
        <a class="page" v-if="pagination.last_page-pagination.current_page > 4" @click.prevent="changePage(pagination.last_page)" :disabled="pagination.current_page >= pagination.last_page">{{pagination.last_page}}</a>
        <a class="page" @click.prevent="changePage(pagination.current_page + 1)" :disabled="pagination.current_page >= pagination.last_page">
            <i class="mdi mdi-chevron-right"></i>
        </a>
        
    </div>
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
