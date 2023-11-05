

composer create-project laravel/laravel example-app
cd exmaple-app
php artisan serve

composer require inertiajs/inertia-laravel


resources/views/app.blade.php

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>


php artisan inertia:middleware

app/http/kernel.php

web=>
\App\Http\Middleware\HandleInertiaRequests::class,



npm install @inertiajs/vue3
```
resources/js/app.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

npm i @vitejs/plugin-vue

// vite.config.js
```
import vue from '@vitejs/plugin-vue'

export default {
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
}
```


create a Directory
> resources/js/Pages/

Welcome.vue
```
<script setup>
import {ref, reactive} from 'vue'

</script>


<template>

<div>Welcome</div>

</template>

<style scoped>

</style>
```

> php artisan make:controller WelcomeController


