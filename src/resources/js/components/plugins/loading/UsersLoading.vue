<template>
    <div class="users-list__list">
        <div class="users-list__image MuiSkeleton-root MuiSkeleton-rect"></div>
        <div class="users-list__obj-body">
            <div class="users-list__title-link MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                 style="width: 40%;  height: 1.2rem;"></div>
            <div class="users-list__desc MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                 style="width: 20%;  height: 1.2rem;"></div>
        </div>
        <div class="users-list__count"><i class="mdi mdi-spin mdi-loading"/></div>
        <div class="users-list__count"><i class="mdi mdi-spin mdi-loading"/></div>
        <div class="users-list__count"><i class="mdi mdi-spin mdi-loading"/></div>
        <div class="users-list__follow">
            <div class="btn btn-outline MuiSkeleton-root MuiSkeleton-pulse"
                 style="width: 45%; margin: 0 auto"/>
        </div>
    </div>
</template>
