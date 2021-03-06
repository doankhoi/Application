<?php

//For frontend
Breadcrumbs::register('website.index', function($breadcrumbs)
{
    $breadcrumbs->push('Trang chủ', route('website.index'));
});

//For backend
Breadcrumbs::register('admin.index', function($breadcrumbs)
{
    $breadcrumbs->push('ChikenElectric', route('admin.index'));
});

Breadcrumbs::register('admin.users.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('CreateUser', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('EditUser', route('admin.users.edit'));
});

Breadcrumbs::register('admin.contacts.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Contacts', route('admin.contacts.index'));
});

Breadcrumbs::register('admin.comments.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Comments', route('admin.comments.index'));
});

Breadcrumbs::register('redac.posts.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Posts', route('redac.posts.index'));
});

Breadcrumbs::register('redac.posts.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('PostsCreate', route('redac.posts.create'));
});

Breadcrumbs::register('redac.posts.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('PostsEdit', route('redac.posts.edit'));
});

Breadcrumbs::register('redac.media', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Media', route('redac.media'));
});

Breadcrumbs::register('admin.site.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Infomation', route('admin.site.index'));
});

Breadcrumbs::register('admin.site.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Edit Site', route('admin.site.edit'));
});

Breadcrumbs::register('redac.category.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Categories', route('redac.category.index'));
});

Breadcrumbs::register('redac.category.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Category Create', route('redac.category.create'));
});

Breadcrumbs::register('redac.category.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.index');
    $breadcrumbs->push('Category Edit', route('redac.category.edit'));
});