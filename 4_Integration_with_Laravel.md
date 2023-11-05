
### Integration With Laravel:

<p>
Creating a basic project using Laravel and Inertia.js is a straightforward process. I'll guide you through the steps to set up a simple web application that includes at least one page managed by Inertia.js. In this example, we'll create a basic task management application.
</p>

**Step 1: Set up Laravel Project**

- Install Laravel globally: 
   > composer global require laravel/installer
- Create a new Laravel project: 
   > laravel new blog

   -OSX
   >~/.composer/vendor/laravel/installer/bin/laravel new blog

**Step 2: Set up Inertia.js and Vue.js**

- Install Inertia.js and Vue.js packages: 
```
   cd blog
   npm install @inertiajs/inertia @inertiajs/inertia-vue
   composer require inertiajs/inertia-laravel
```

**Step 3: Create a Route and Controller**

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

4. Run migration:
   >php artisan migrate

5. In the PostController, define the index method:
   > use App\Models\Post;
```
   public function index() {
      $posts = Post::all();
      return inertia('Posts/Index', ['posts' => $posts]);
   }
```

**Step 4: Create a Vue Component**

1. Create a new Vue component at `resources/js/Pages/Posts/Index.vue`:
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

**Step 5: Update Webpack Configuration**

1. Open `webpack.mix.js` and add the following code to the existing configuration:
```
const mix = require('laravel-mix');
const path = require('path');
mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
    },
  },
})
```

**Step 6: Update Layout File**

1. Open `resources/views/app.blade.php` and update the <body> tag as follows:
```
<body>
  @inertia
  <script src="{{ mix('/js/app.js') }}" defer></script>
</body>
```

**Step 7: Update Default Route**

Open `routes/web.php` and update the default route to render Inertia's root component:
```
Route::get('/', function () {
    return inertia('Welcome');
});
```

**Step 8: Run the Application**

- Compile the assets: 
   >npm run dev

- Start the development server: 
   > php artisan serve.

- Visit http://localhost:8000/posts  inyour browser to see the blog posts.

<span>
You've now set up a basic Laravel project with Inertia.js and created a simple web application with at least one page managed by Inertia.js. This example illustrates how Inertia.js seamlessly integrates with Laravel, allowing you to build dynamic, client-side interactive web applications while utilizing the power of Laravel on the backend.
</span>
<br/>
<br/>
<br/>
<br/>
<a href="./3_InertiaJs_Features.md"><< 3. Inertia.js Features</a>
<br/>
<br/>
<a href="./5_Client_Side_Components.md">>> 5. Client-Side Components</a>

<br/>
<br/>
<br/>
<a href="./readme.md">Main Page</a>
<br/>
<br/>

