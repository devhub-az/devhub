<template>
    <div @click="toggle" class="drop-grid">
        <div class="switch-button-control">
            <i class="mdi" :class="isEnabled ? 'mdi-weather-sunny' : 'mdi-moon-waning-crescent'"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "themeSwitcher",
    data() {
        return {
            switch: true,
            body: document.getElementsByTagName('body')[0],
            atr: document.getElementsByTagName('body')[0].getAttribute('data-theme'),
            cookatr: window.$cookies.get('atr'),
            isEnabled: null,
            isVisible: false,
            isActive: true,
        }
    },
    created: function () {
        if (!this.cookatr) {
            this.cookatr = this.atr
        }
        if (this.cookatr === 'dark')
            this.isEnabled = true
        else if (this.cookatr === 'default')
            this.isEnabled = false
    },
    methods: {
        toggle: function () {
            if (this.cookatr === 'dark') {
                this.body.setAttribute("data-theme", 'default')
                this.atr = 'default'
                this.cookatr = 'default'
                Vue.$cookies.set('atr', 'default')
            } else if (this.cookatr === 'default') {
                this.body.setAttribute("data-theme", 'dark')
                this.atr = 'dark'
                this.cookatr = 'dark'
                Vue.$cookies.set('atr', 'dark')
            }
            this.isEnabled = !this.isEnabled;
        },
    }
}
</script>

<style scoped lang="scss">
.drop-grid {
    display: block;
    padding: 7px 15px;
    width: 100%;
    color: inherit;
}

.mdi-weather-sunny, .mdi-moon-waning-crescent {
    cursor: pointer;
    opacity: 0.7;
    color: var(--text-white-secondary);

    &:hover {
        opacity: 1;
    }
}

.mdi-moon-waning-crescent {
    transform: rotate(-20deg);
}

.switch-button-control {
    display: flex;
    flex-direction: row;
    align-items: center;

    .switch-button {
        $switch-button-height: 1.6em;
        $switch-button-color: var(--color-primary-main);
        $switch-button-border-thickness: 2px;
        $switch-transition: all 0.3s ease-in-out;
        $switch-is-rounded: true;

        height: $switch-button-height;
        width: calc(#{$switch-button-height} * 2);
        border: $switch-button-border-thickness solid $switch-button-color;
        box-shadow: inset 0 0 $switch-button-border-thickness 0 rgba(0, 0, 0, 0.33);
        border-radius: if($switch-is-rounded, $switch-button-height, 0);
        margin-left: auto;
        margin-right: 10px;

        transition: $switch-transition;

        $button-side-length: calc(
            #{$switch-button-height} - (2 * #{$switch-button-border-thickness})
        );

        cursor: pointer;

        .button {
            height: $button-side-length;
            width: $button-side-length;
            border: $switch-button-border-thickness solid $switch-button-color;
            border-radius: if($switch-is-rounded, $button-side-length, 0);
            background: var(--text-black-secondary);

            transition: $switch-transition;
        }

        &.enabled {
            background-color: $switch-button-color;
            box-shadow: none;

            .button {
                background: white;
                transform: translateX(
                        calc(#{$button-side-length} + (2 * #{$switch-button-border-thickness}))
                );
            }
        }
    }

    .switch-button-label {
        margin-left: 3px;
    }
}
</style>
