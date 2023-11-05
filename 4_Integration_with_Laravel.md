
### Integration With Laravel:

<p>
Creating a basic project using Laravel and Inertia.js is a straightforward process. I'll guide you through the steps to set up a simple web application that includes at least one page managed by Inertia.js. In this example, we'll create a basic task management application.
</p>

**Step 1: Set up Laravel Project**

- Create a new Laravel project: 
```bash
   composer create-project laravel/laravel example-app
```

**Step 2: Set up Inertia.js and Vue.js**
```bash
   composer require inertiajs/inertia-laravel
```

**Step 3: Setup Laravel for vue.js**

   - update middleware
```bash
php artisan inertia:middleware
```
   - modify /app/http/kernel.php

```
   'web' => [
      // ...
      \App\Http\Middleware\HandleInertiaRequests::class,
   ],
```

**Step 3: Root template**

- update /resources/js/app.js

```js
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

**Step 4: Setup vue with vite**

```bash
   npm install @inertiajs/vue3
   npm i @vitejs/plugin-vue
```

- update /resources/js/app.js
```js
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

- update /vite.config.js
```js
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


**Step 5: Create Vue Applicatio**

- create a Directory `resources/js/Pages/`

- create test component
   `resources/js/Pages/Welcome.vue`

```js
<script setup>
import {ref, reactive} from 'vue'

</script>


<template>

<div>Welcome</div>

</template>

<style scoped>

</style>
```

**Step 6: Update Home route with new sample vue component**

- update routes/web.php:
```php

use Inertia\Inertia;

Route::get('/', function(){
    return Inertia::render(component:'Welcome');
});

```

**Step 7: Run the Application**

- Compile the assets: 
```
   npm run dev
```

- Start the development server: 
```
   php artisan serve.
```

- Visit http://localhost:8000/  inyour browser to see the blog posts.

<span>
You've now set up a basic Laravel project with Inertia.js and created a simple web application with at least one page managed by Inertia.js. This example illustrates how Inertia.js seamlessly integrates with Laravel, allowing you to build dynamic, client-side interactive web applications while utilizing the power of Laravel on the backend.
</span>

<br/>
<br/>
<br/>


### BONUS:
-------------

### Add New Controller

1. Define a route in routes/web.php:
   > Route::get('/posts', 'PostController@index');
2. Create a controller: 
   >php artisan make:controller PostController

3. Create a Model:
   >php artisan make:model Post -m

4. Update Model:
```php
      Schema::create('posts', function (Blueprint $table) {
         $table->id();

         $table->bigInteger('user_id')
         ->foreign('user_id')
         ->references('id')
         ->on('users');

         $table->string('slug', 255)
         ->unique(); // Index

         $table->string('title', 255);

         $table->text('content');

         $table->timestamps();
      });
```

5. Run migration:
   >php artisan migrate

6. In the PostController, define the index method:
   > use App\Models\Post;
```
   public function index() {
      $posts = Post::all();
      return inertia('Posts/Index', ['posts' => $posts]);
   }
```

7. Create a new Vue component at `resources/js/Pages/Posts/Index.vue`:
```html
<template>
  <div>
    <h1>Blog Posts</h1>
    <ul>
      <li v-for="post in posts" :key="post.id">
        <h2>{{ post.title }}</h2>
        <p>{{ post.content }}</p>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ['posts'],
};
</script>
```

____
<a href="./3_InertiaJs_Features.md"><< 3. Inertia.js Features</a>
<br/>
<a href="./5_Client_Side_Components.md">>> 5. Client-Side Components</a>
<br/>
<a href="./readme.md">Main Page</a>
<br/>
<br/>

