<div class="flex items-center justify-between w-full bg-green-700 card p-1 rounded-0 d-flex border-bottom border-primary bg-primary text-white px-4">
    <div>
        <a class="flex items-center"
           href="http://git.php.net/?p=php-src.git;a=shortlog;h=refs/heads/PHP-{{ phpversion() }}" target="_blank" rel="noreferrer">
            <span class="iconify" data-icon="bx:bx-code-alt" data-inline="false"></span>
            <p>PHP v{{ phpversion() }}</p>
        </a>
    </div>
    <div class="flex items-center space-x-4">
        <p class="flex items-center space-x-0.5">
            <span class="iconify" data-icon="ant-design:field-time-outlined" data-inline="false"></span>
            {{ Numeric::bcmul_alternative((microtime(true) - LARAVEL_START), '1000', 2) }}ms
        </p>
        <p class="flex items-center space-x-0.5">
            <span class="iconify" data-icon="bx:bx-cog" data-inline="false"></span>
            <span>{{ Numeric::convert(memory_get_usage(true)) }}</span>
        </p>
    </div>
</div>
