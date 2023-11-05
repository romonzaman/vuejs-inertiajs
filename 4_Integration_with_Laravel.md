
### Integration With Laravel:

<p>
Creating a basic project using Laravel and Inertia.js is a straightforward process. I'll guide you through the steps to set up a simple web application that includes at least one page managed by Inertia.js. In this example, we'll create a basic task management application.
</p>

<p>
Please ensure you have Laravel and Composer installed on your system before proceeding.
</p>

1. **Create a New Laravel Project**:
   Open your terminal and run the following commands to create a new Laravel project:

   ```bash
   composer create-project laravel/laravel inertia-tasks
   cd inertia-tasks
   ```

2. **Install the Inertia.js Package**:
   Next, install the Inertia.js package and its dependencies:

   ```bash
   composer require inertiajs/inertia-laravel
   ```

3. **Set Up the Database**:
   Configure your database connection in the `.env` file and then run the database migrations to create a `tasks` table:

   ```bash
   php artisan migrate
   ```

4. **Create a Model and Migration**:
   Create a `Task` model and migration using the following Artisan commands:

   ```bash
   php artisan make:model Task -m
   ```

   Define the columns for your `tasks` table in the migration file.

5. **Create a Controller**:
   Generate a controller that will handle the Inertia.js views and data exchange:

   ```bash
   php artisan make:controller TaskController
   ```

   In the `TaskController`, define methods for rendering and handling data for the Inertia.js views.

6. **Set Up Inertia Middleware**:
   In your `app/Http/Kernel.php` file, add the Inertia middleware to the `$middlewareGroups` array:

   ```php
   'web' => [
       // ...
       \Inertia\Middleware::class,
   ],
   ```

7. **Create a Blade Layout**:
   In your `resources/views/layouts` directory, create a Blade layout file (e.g., `app.blade.php`) that will be used by Inertia.js to render your Vue components.

8. **Create Vue Components**:
   Develop your Vue components in the `resources/js/Pages` directory. You can structure your components similar to this:

   ```plaintext
   - Pages/
     - TaskIndex.vue
   ```

   In your Vue component, you can define the template and methods for interactivity.

9. **Create Routes**:
   Define your routes in the `routes/web.php` file, and use Inertia to render your Vue components:

   ```php
   use Inertia\Inertia;

   Route::get('/', function () {
       return Inertia::render('TaskIndex');
   });
   ```

10. **Compile Your Assets**:
    Compile your assets using Laravel Mix:

    ```bash
    npm install
    npm run dev
    ```

11. **Start the Development Server**:
    Run the Laravel development server:

    ```bash
    php artisan serve
    ```

12. **Access Your Application**:
    Open your web browser and go to `http://localhost:8000`. You should see your Inertia.js-powered task management page.

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


**Step 1: Set up Laravel Project**

- Install Laravel globally: 
   > composer global require laravel/installer.
- Create a new Laravel project: 
   > laravel new blog

**Step 2: Set up Inertia.js and Vue.js**

- Install Inertia.js and Vue.js packages: 

   >cd blog
   >npm install @inertiajs/inertia @inertiajs/inertia-vue


**Step 3: Create a Route and Controller**

1. Define a route in routes/web.php:
   > Route::get('/posts', 'PostController@index');
2. Create a controller: 
   >php artisan make:controller PostController.
3. In the PostController, define the index method:
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

<p>
That’s it! You’ve created a basic blog website using Laravel, Inertia.js, and Vue.js. You can continue to build upon this foundation by adding features such as creating, editing, and deleting blog posts, authentication, and more.
</p>


