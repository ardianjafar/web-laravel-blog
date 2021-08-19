<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/*
    Dashboard
*/
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

/*
    Home
*/
Breadcrumbs::for('dashboard_home', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});

/*
    Dashboard -> Categories
*/
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});

/*
    Dashboard -> Categories -> Add
*/
Breadcrumbs::for('add_category', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Add', route('categories.create'));
});

/*
    Dashboard -> Categories -> Edit
*/
Breadcrumbs::for('edit_category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push('Edit', route('categories.edit', ['category' => $category]));
});

/*
    Dashboard -> Categories -> Title
*/
// Breadcrumbs::for('edit_category_title', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('edit_category');
//     $trail->push('Edit', route('categories.edit', ['category' => $category]));
// });

/*
    Dashboard -> Categories -> Detail
*/
Breadcrumbs::for('detail_category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push('Detail', route('categories.show', ['category' => $category]));
});

/*
    Dashboard -> Categories -> Detail -> title
*/
Breadcrumbs::for('detail_category_title', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('detail_category', $category);
    $trail->push($category->title, route('categories.show', ['category' => $category]));
});

/*
            -> === === === === === === Tags === === === === === === <-
*/

/*
    Dashboard -> Tags
*/
Breadcrumbs::for('tags', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});
/*
    Dashboard -> Tags -> title
*/
Breadcrumbs::for('add_tag', function (BreadcrumbTrail $trail) {
    $trail->parent('tags');
    $trail->push('Add', route('tags.create'));
});
/*
    Dashboard -> Tags -> title -> Edit
*/
Breadcrumbs::for('edit_tag', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tags');
    $trail->push('Edit', route('tags.edit', ['tag' => $tag]));
    $trail->push($tag->title, route('tags.edit', ['tag' => $tag]));
});

/*
            -> === === === === === === Post === === === === === === <-
*/
/*
    Dashboard -> Post
*/
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('posts.index'));
});
/*
    Dashboard -> Tags -> title
*/
Breadcrumbs::for('add_post', function (BreadcrumbTrail $trail) {
    $trail->parent('posts');
    $trail->push('Add', route('posts.create'));
});
/*
    Dashboard -> Posts -> title -> Detail
*/
Breadcrumbs::for('detail_post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('posts');
    $trail->push('Detail', route('posts.show', ['post' => $post]));
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});
/*
    Dashboard -> Posts -> Edit
*/
Breadcrumbs::for('edit_post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('posts');
    $trail->push('Edit', route('posts.edit', ['post' => $post]));
    $trail->push($post->title, route('posts.edit', ['post' => $post]));
});


/*
            -> === === === === === === FileManager === === === === === === <-
*/
/*
    Dashboard -> FileManager
*/
Breadcrumbs::for('file_manager', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('File Manager', route('filemanager.index'));
});
/*
            -> === === === === === === Roles === === === === === === <-
*/
/*
    Dashboard -> RolePermission
*/
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

/*
    Dashboard -> RolePermission -> Create
*/
Breadcrumbs::for('add_role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Add', route('roles.create'));
});

/*
    Dashboard -> Role -> Detail
*/
Breadcrumbs::for('detail_role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('Detail', route('roles.show', ['role' => $role]));
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});
/*
    Dashboard -> Role -> Detail
*/
Breadcrumbs::for('edit_role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('Edit', route('roles.edit', ['role' => $role]));
    $trail->push($role->name, route('roles.edit', ['role' => $role]));
});
/*
            -> === === === === === === users === === === === === === <-
*/
/*
    Dashboard -> RolePermission
*/
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('users.index'));
});
/*
    Dashboard -> RolePermission -> Create
*/
Breadcrumbs::for('add_user', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Add', route('users.create'));
});
/*
    Dashboard -> Role -> Detail
*/
Breadcrumbs::for('edit_user', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', ['user' => $user]));
    $trail->push($user->name, route('users.edit', ['user' => $user]));
});

// Halaman Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->push('Blog', route('blog.home'));
});
// Blog -> Home
Breadcrumbs::for('blog_home', function($trail){
    $trail->parent('blog');
    $trail->push('Home', route('blog.home'));
});
// Blog -> Posts -> ['title']
Breadcrumbs::for('blog_post', function($trail, $title){
    $trail->parent('blog');
    $trail->push($title, '#');
});
// Blog -> Categories
Breadcrumbs::for('blog_categories', function($trail){
    $trail->parent('blog');
    $trail->push('Categories', route('blog.categories'));
});
// Blog -> Categories -> title
Breadcrumbs::for('blog_posts_category', function($trail, $title){
    $trail->parent('blog');
    $trail->push('Categories', route('blog.categories'));
    $trail->push($title, '#');
});

// Blog -> Search
Breadcrumbs::for('blog_tags', function($trail){
    $trail->parent('blog');
    $trail->push('Tags', route('blog.tags'));
});
// Blog -> Tags
Breadcrumbs::for('blog_search', function($trail, $keyword){
    $trail->parent('blog');
    $trail->push('Search', route('blog.search', ['keyword' => $keyword]));
    $trail->push($keyword, route('blog.search', ['keyword' => $keyword]));
});

// Blog -> Tags -> title
Breadcrumbs::for('blog_posts_tag', function($trail, $title){
    $trail->parent('blog');
    $trail->push('Tagss', route('blog.tags'));
    $trail->push($title, '#');
});
?>
