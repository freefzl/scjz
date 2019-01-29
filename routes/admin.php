<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 后台公共路由部分
|
*/
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    //登录、注销
    Route::get('login','LoginController@showLoginForm')->name('admin.loginForm');
    Route::post('login','LoginController@login')->name('admin.login');
    Route::get('logout','LoginController@logout')->name('admin.logout');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 后台需要授权的路由 admins
|
*/
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function (){
    //后台布局
    Route::get('/','IndexController@layout')->name('admin.layout');
    //后台首页
    Route::get('/index','IndexController@index')->name('admin.index');
    Route::get('/index1','IndexController@index1')->name('admin.index1');
    Route::get('/index2','IndexController@index2')->name('admin.index2');
    //图标
    Route::get('icons','IndexController@icons')->name('admin.icons');
    Route::get('password','UserController@showPasswordForm')->name('admin.getPassword');
    Route::post('password','UserController@password')->name('admin.postPassword');

});

//系统管理
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['auth','permission:system.manage']],function (){
    //数据表格接口
    Route::get('data','IndexController@data')->name('admin.data')->middleware('permission:system.role|system.user|system.permission');
    //用户管理
    Route::group(['middleware'=>['permission:system.user']],function (){
        Route::get('user','UserController@index')->name('admin.user');
        //添加
        Route::get('user/create','UserController@create')->name('admin.user.create')->middleware('permission:system.user.create');
        Route::post('user/store','UserController@store')->name('admin.user.store')->middleware('permission:system.user.create');
        //编辑
        Route::get('user/{id}/edit','UserController@edit')->name('admin.user.edit')->middleware('permission:system.user.edit');
        Route::put('user/{id}/update','UserController@update')->name('admin.user.update')->middleware('permission:system.user.edit');
        //删除
        Route::delete('user/destroy','UserController@destroy')->name('admin.user.destroy')->middleware('permission:system.user.destroy');
        //分配角色
        Route::get('user/{id}/role','UserController@role')->name('admin.user.role')->middleware('permission:system.user.role');
        Route::put('user/{id}/assignRole','UserController@assignRole')->name('admin.user.assignRole')->middleware('permission:system.user.role');
        //分配权限
        Route::get('user/{id}/permission','UserController@permission')->name('admin.user.permission')->middleware('permission:system.user.permission');
        Route::put('user/{id}/assignPermission','UserController@assignPermission')->name('admin.user.assignPermission')->middleware('permission:system.user.permission');
    });
    //角色管理
    Route::group(['middleware'=>'permission:system.role'],function (){
        Route::get('role','RoleController@index')->name('admin.role');
        //添加
        Route::get('role/create','RoleController@create')->name('admin.role.create')->middleware('permission:system.role.create');
        Route::post('role/store','RoleController@store')->name('admin.role.store')->middleware('permission:system.role.create');
        //编辑
        Route::get('role/{id}/edit','RoleController@edit')->name('admin.role.edit')->middleware('permission:system.role.edit');
        Route::put('role/{id}/update','RoleController@update')->name('admin.role.update')->middleware('permission:system.role.edit');
        //删除
        Route::delete('role/destroy','RoleController@destroy')->name('admin.role.destroy')->middleware('permission:system.role.destroy');
        //分配权限
        Route::get('role/{id}/permission','RoleController@permission')->name('admin.role.permission')->middleware('permission:system.role.permission');
        Route::put('role/{id}/assignPermission','RoleController@assignPermission')->name('admin.role.assignPermission')->middleware('permission:system.role.permission');
    });
    //权限管理
    Route::group(['middleware'=>'permission:system.permission'],function (){
        Route::get('permission','PermissionController@index')->name('admin.permission');
        //添加
        Route::get('permission/create','PermissionController@create')->name('admin.permission.create')->middleware('permission:system.permission.create');
        Route::post('permission/store','PermissionController@store')->name('admin.permission.store')->middleware('permission:system.permission.create');
        //编辑
        Route::get('permission/{id}/edit','PermissionController@edit')->name('admin.permission.edit')->middleware('permission:system.permission.edit');
        Route::put('permission/{id}/update','PermissionController@update')->name('admin.permission.update')->middleware('permission:system.permission.edit');
        //删除
        Route::delete('permission/destroy','PermissionController@destroy')->name('admin.permission.destroy')->middleware('permission:system.permission.destroy');
    });
    //菜单管理
    Route::group(['middleware'=>'permission:system.menu'],function (){
        Route::get('menu','MenuController@index')->name('admin.menu');
        Route::get('menu/data','MenuController@data')->name('admin.menu.data');
        //添加
        Route::get('menu/create','MenuController@create')->name('admin.menu.create')->middleware('permission:system.menu.create');
        Route::post('menu/store','MenuController@store')->name('admin.menu.store')->middleware('permission:system.menu.create');
        //编辑
        Route::get('menu/{id}/edit','MenuController@edit')->name('admin.menu.edit')->middleware('permission:system.menu.edit');
        Route::put('menu/{id}/update','MenuController@update')->name('admin.menu.update')->middleware('permission:system.menu.edit');
        //删除
        Route::delete('menu/destroy','MenuController@destroy')->name('admin.menu.destroy')->middleware('permission:system.menu.destroy');
    });
});


//资讯管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:zixun.manage']], function () {
    //分类管理
    Route::group(['middleware' => 'permission:zixun.category'], function () {
        Route::get('category/data', 'CategoryController@data')->name('admin.category.data');
        Route::get('category', 'CategoryController@index')->name('admin.category');
        //添加分类
        Route::get('category/create', 'CategoryController@create')->name('admin.category.create')->middleware('permission:zixun.category.create');
        Route::post('category/store', 'CategoryController@store')->name('admin.category.store')->middleware('permission:zixun.category.create');
        //编辑分类
        Route::get('category/{id}/edit', 'CategoryController@edit')->name('admin.category.edit')->middleware('permission:zixun.category.edit');
        Route::put('category/{id}/update', 'CategoryController@update')->name('admin.category.update')->middleware('permission:zixun.category.edit');
        //删除分类
        Route::delete('category/destroy', 'CategoryController@destroy')->name('admin.category.destroy')->middleware('permission:zixun.category.destroy');
    });
    //文章管理
    Route::group(['middleware' => 'permission:zixun.article'], function () {
        Route::get('article/data', 'ArticleController@data')->name('admin.article.data');
        Route::get('article', 'ArticleController@index')->name('admin.article');
        //添加
        Route::get('article/create', 'ArticleController@create')->name('admin.article.create')->middleware('permission:zixun.article.create');
        Route::post('article/store', 'ArticleController@store')->name('admin.article.store')->middleware('permission:zixun.article.create');
        //编辑
        Route::get('article/{id}/edit', 'ArticleController@edit')->name('admin.article.edit')->middleware('permission:zixun.article.edit');
        Route::put('article/{id}/update', 'ArticleController@update')->name('admin.article.update')->middleware('permission:zixun.article.edit');
        //删除
        Route::delete('article/destroy', 'ArticleController@destroy')->name('admin.article.destroy')->middleware('permission:zixun.article.destroy');
    });
    //标签管理
    Route::group(['middleware' => 'permission:zixun.tag'], function () {
        Route::get('tag/data', 'TagController@data')->name('admin.tag.data');
        Route::get('tag', 'TagController@index')->name('admin.tag');
        //添加
        Route::get('tag/create', 'TagController@create')->name('admin.tag.create')->middleware('permission:zixun.tag.create');
        Route::post('tag/store', 'TagController@store')->name('admin.tag.store')->middleware('permission:zixun.tag.create');
        //编辑
        Route::get('tag/{id}/edit', 'TagController@edit')->name('admin.tag.edit')->middleware('permission:zixun.tag.edit');
        Route::put('tag/{id}/update', 'TagController@update')->name('admin.tag.update')->middleware('permission:zixun.tag.edit');
        //删除
        Route::delete('tag/destroy', 'TagController@destroy')->name('admin.tag.destroy')->middleware('permission:zixun.tag.destroy');
    });
});
//配置管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:config.manage']], function () {

    //广告位
    Route::group(['middleware' => 'permission:config.position'], function () {
        Route::get('position/data', 'PositionController@data')->name('admin.position.data');
        Route::get('position', 'PositionController@index')->name('admin.position');
        //添加
        Route::get('position/create', 'PositionController@create')->name('admin.position.create')->middleware('permission:config.position.create');
        Route::post('position/store', 'PositionController@store')->name('admin.position.store')->middleware('permission:config.position.create');
        //编辑
        Route::get('position/{id}/edit', 'PositionController@edit')->name('admin.position.edit')->middleware('permission:config.position.edit');
        Route::put('position/{id}/update', 'PositionController@update')->name('admin.position.update')->middleware('permission:config.position.edit');
        //删除
        Route::delete('position/destroy', 'PositionController@destroy')->name('admin.position.destroy')->middleware('permission:config.position.destroy');
    });
    //广告信息
    Route::group(['middleware' => 'permission:config.advert'], function () {
        Route::get('advert/data', 'AdvertController@data')->name('admin.advert.data');
        Route::get('advert', 'AdvertController@index')->name('admin.advert');
        //添加
        Route::get('advert/create', 'AdvertController@create')->name('admin.advert.create')->middleware('permission:config.advert.create');
        Route::post('advert/store', 'AdvertController@store')->name('admin.advert.store')->middleware('permission:config.advert.create');
        //编辑
        Route::get('advert/{id}/edit', 'AdvertController@edit')->name('admin.advert.edit')->middleware('permission:config.advert.edit');
        Route::put('advert/{id}/update', 'AdvertController@update')->name('admin.advert.update')->middleware('permission:config.advert.edit');
        //删除
        Route::delete('advert/destroy', 'AdvertController@destroy')->name('admin.advert.destroy')->middleware('permission:config.advert.destroy');
    });
});
//会员管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:member.manage']], function () {
    //账号管理
    Route::group(['middleware' => 'permission:member.member'], function () {
        Route::get('member/data', 'MemberController@data')->name('admin.member.data');
        Route::get('member', 'MemberController@index')->name('admin.member');
        //添加
        Route::get('member/create', 'MemberController@create')->name('admin.member.create')->middleware('permission:member.member.create');
        Route::post('member/store', 'MemberController@store')->name('admin.member.store')->middleware('permission:member.member.create');
        //编辑
        Route::get('member/{id}/edit', 'MemberController@edit')->name('admin.member.edit')->middleware('permission:member.member.edit');
        Route::put('member/{id}/update', 'MemberController@update')->name('admin.member.update')->middleware('permission:member.member.edit');
        //删除
        Route::delete('member/destroy', 'MemberController@destroy')->name('admin.member.destroy')->middleware('permission:member.member.destroy');
    });
});

//首页管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:home.manage']], function () {
    //消息管理
    Route::group(['middleware' => 'permission:home.banner'], function () {
        Route::get('home/banner/data', 'BannerController@data')->name('home.banner.data');
        Route::get('home/banner', 'BannerController@index')->name('home.banner');
        //添加
        Route::get('home/banner/create', 'BannerController@create')->name('home.banner.create')->middleware('permission:home.banner.create');
        Route::post('home/banner/store', 'BannerController@store')->name('home.banner.store')->middleware('permission:home.banner.create');

        Route::get('home/banner/{id}/edit', 'BannerController@edit')->name('home.banner.edit')->middleware('permission:home.banner.edit');
        Route::put('home/banner/{id}/update', 'BannerController@update')->name('home.banner.update')->middleware('permission:home.banner.edit');
        //删除
        Route::delete('home/banner/destroy', 'BannerController@destroy')->name('home.banner.destroy')->middleware('permission:home.banner.destroy');

    });
    //资质类型
    Route::group(['middleware' => 'permission:home.aptitudeType'], function () {
        Route::get('home/aptitudeType/data', 'AptitudeTypeController@data')->name('home.aptitudeType.data');
        Route::get('home/aptitudeType', 'AptitudeTypeController@index')->name('home.aptitudeType');
        //添加
        Route::get('home/aptitudeType/create', 'AptitudeTypeController@create')->name('home.aptitudeType.create')->middleware('permission:home.aptitudeType.create');
        Route::post('home/aptitudeType/store', 'AptitudeTypeController@store')->name('home.aptitudeType.store')->middleware('permission:home.aptitudeType.create');

        Route::get('home/aptitudeType/{id}/edit', 'AptitudeTypeController@edit')->name('home.aptitudeType.edit')->middleware('permission:home.aptitudeType.edit');
        Route::put('home/aptitudeType/{id}/update', 'AptitudeTypeController@update')->name('home.aptitudeType.update')->middleware('permission:home.aptitudeType.edit');
        //删除
        Route::delete('home/aptitudeType/destroy', 'AptitudeTypeController@destroy')->name('home.aptitudeType.destroy')->middleware('permission:home.aptitudeType.destroy');

    });
    //资质服务
    Route::group(['middleware' => 'permission:home.aptitude'], function () {
        Route::get('home/aptitude/data', 'AptitudeController@data')->name('home.aptitude.data');
        Route::get('home/aptitude', 'AptitudeController@index')->name('home.aptitude');
        //添加
        Route::get('home/aptitude/create', 'AptitudeController@create')->name('home.aptitude.create')->middleware('permission:home.aptitude.create');
        Route::post('home/aptitude/store', 'AptitudeController@store')->name('home.aptitude.store')->middleware('permission:home.aptitude.create');

        Route::get('home/aptitude/{id}/edit', 'AptitudeController@edit')->name('home.aptitude.edit')->middleware('permission:home.aptitude.edit');
        Route::put('home/aptitude/{id}/update', 'AptitudeController@update')->name('home.aptitude.update')->middleware('permission:home.aptitude.edit');
        //删除
        Route::delete('home/aptitude/destroy', 'AptitudeController@destroy')->name('home.aptitude.destroy')->middleware('permission:home.aptitude.destroy');

    });
    //流程管理
    Route::group(['middleware' => 'permission:home.process'], function () {
        Route::get('home/process/data', 'ProcessController@data')->name('home.process.data');
        Route::get('home/process', 'ProcessController@index')->name('home.process');
        //添加
        Route::get('home/process/create', 'ProcessController@create')->name('home.process.create')->middleware('permission:home.process.create');
        Route::post('home/process/store', 'ProcessController@store')->name('home.process.store')->middleware('permission:home.process.create');

        Route::get('home/process/{id}/edit', 'ProcessController@edit')->name('home.process.edit')->middleware('permission:home.process.edit');
        Route::put('home/process/{id}/update', 'ProcessController@update')->name('home.process.update')->middleware('permission:home.process.edit');
        //删除
        Route::delete('home/process/destroy', 'ProcessController@destroy')->name('home.process.destroy')->middleware('permission:home.process.destroy');

    });
    //了解管理
    Route::group(['middleware' => 'permission:home.know'], function () {
        Route::get('home/know/data', 'KnowController@data')->name('home.know.data');
        Route::get('home/know', 'KnowController@index')->name('home.know');
        //添加
        Route::get('home/know/create', 'KnowController@create')->name('home.know.create')->middleware('permission:home.know.create');
        Route::post('home/know/store', 'KnowController@store')->name('home.know.store')->middleware('permission:home.know.create');

        Route::get('home/know/{id}/edit', 'KnowController@edit')->name('home.know.edit')->middleware('permission:home.know.edit');
        Route::put('home/know/{id}/update', 'KnowController@update')->name('home.know.update')->middleware('permission:home.know.edit');
        //删除
        Route::delete('home/know/destroy', 'KnowController@destroy')->name('home.know.destroy')->middleware('permission:home.know.destroy');

    });
    //滚动图管理
    Route::group(['middleware' => 'permission:home.rolling'], function () {
        Route::get('home/rolling/data', 'RollingController@data')->name('home.rolling.data');
        Route::get('home/rolling', 'RollingController@index')->name('home.rolling');
        //添加
        Route::get('home/rolling/create', 'RollingController@create')->name('home.rolling.create')->middleware('permission:home.rolling.create');
        Route::post('home/rolling/store', 'RollingController@store')->name('home.rolling.store')->middleware('permission:home.rolling.create');

        Route::get('home/rolling/{id}/edit', 'RollingController@edit')->name('home.rolling.edit')->middleware('permission:home.rolling.edit');
        Route::put('home/rolling/{id}/update', 'RollingController@update')->name('home.rolling.update')->middleware('permission:home.rolling.edit');
        //删除
        Route::delete('home/rolling/destroy', 'RollingController@destroy')->name('home.rolling.destroy')->middleware('permission:home.rolling.destroy');
    });
    //合作机构
    Route::group(['middleware' => 'permission:home.institution'], function () {
        Route::get('home/institution/data', 'InstitutionController@data')->name('home.institution.data');
        Route::get('home/institution', 'InstitutionController@index')->name('home.institution');
        //添加
        Route::get('home/institution/create', 'InstitutionController@create')->name('home.institution.create')->middleware('permission:home.institution.create');
        Route::post('home/institution/store', 'InstitutionController@store')->name('home.institution.store')->middleware('permission:home.institution.create');

        Route::get('home/institution/{id}/edit', 'InstitutionController@edit')->name('home.institution.edit')->middleware('permission:home.institution.edit');
        Route::put('home/institution/{id}/update', 'InstitutionController@update')->name('home.institution.update')->middleware('permission:home.institution.edit');
        //删除
        Route::delete('home/institution/destroy', 'InstitutionController@destroy')->name('home.institution.destroy')->middleware('permission:home.institution.destroy');
    });

    //站点配置
    Route::group(['middleware' => 'permission:home.site'], function () {
        Route::get('site', 'SiteController@index')->name('home.site');
        Route::put('site', 'SiteController@update')->name('home.site.update')->middleware('permission:home.site.edit');
    });

});
//产品管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:product.manage']], function () {
    //产品类型
    Route::group(['middleware' => 'permission:product.productType'], function () {
        Route::get('productType/data', 'ProductTypeController@data')->name('product.productType.data');
        Route::get('productType', 'ProductTypeController@index')->name('product.productType');
        //添加
        Route::get('productType/create', 'ProductTypeController@create')->name('product.productType.create')->middleware('permission:product.productType.create');
        Route::post('productType/store', 'ProductTypeController@store')->name('product.productType.store')->middleware('permission:product.productType.create');

        Route::get('productType/{id}/edit', 'ProductTypeController@edit')->name('product.productType.edit')->middleware('permission:product.productType.edit');
        Route::put('productType/{id}/update', 'ProductTypeController@update')->name('product.productType.update')->middleware('permission:product.productType.edit');
        //删除
        Route::delete('productType/destroy', 'ProductTypeController@destroy')->name('product.productType.destroy')->middleware('permission:product.productType.destroy');

    });
    //产品
    Route::group(['middleware' => 'permission:product.product'], function () {
        Route::get('product/data', 'ProductController@data')->name('product.product.data');
        Route::get('product', 'ProductController@index')->name('product.product');
        //添加
        Route::get('product/create', 'ProductController@create')->name('product.product.create')->middleware('permission:product.product.create');
        Route::post('product/store', 'ProductController@store')->name('product.product.store')->middleware('permission:product.product.create');

        Route::get('product/{id}/edit', 'ProductController@edit')->name('product.product.edit')->middleware('permission:product.product.edit');
        Route::put('product/{id}/update', 'ProductController@update')->name('product.product.update')->middleware('permission:product.product.edit');
        //删除
        Route::delete('product/destroy', 'ProductController@destroy')->name('product.product.destroy')->middleware('permission:product.product.destroy');

    });
    //热门问答
    Route::group(['middleware' => 'permission:product.answer'], function () {
        Route::get('answer/data', 'AnswerController@data')->name('product.answer.data');
        Route::get('answer', 'AnswerController@index')->name('product.answer');
        //添加
        Route::get('answer/create', 'AnswerController@create')->name('product.answer.create')->middleware('permission:product.answer.create');
        Route::post('answer/store', 'AnswerController@store')->name('product.answer.store')->middleware('permission:product.answer.create');

        Route::get('answer/{id}/edit', 'AnswerController@edit')->name('product.answer.edit')->middleware('permission:product.answer.edit');
        Route::put('answer/{id}/update', 'AnswerController@update')->name('product.answer.update')->middleware('permission:product.answer.edit');
        //删除
        Route::delete('answer/destroy', 'AnswerController@destroy')->name('product.answer.destroy')->middleware('permission:product.answer.destroy');

    });

});
//留言管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:message.manage']], function () {
    //消息管理
    Route::group(['middleware' => 'permission:message.message'], function () {
        Route::get('message/data', 'MessageController@data')->name('message.message.data');
        Route::get('message', 'MessageController@index')->name('message.message');

        Route::get('message/{id}/edit', 'MessageController@edit')->name('message.message.edit')->middleware('permission:message.message.edit');
        Route::put('message/{id}/update', 'MessageController@update')->name('message.message.update')->middleware('permission:message.message.edit');
        Route::post('message/{id}/status', 'MessageController@status')->name('message.message.status');
        //删除
        Route::delete('message/destroy', 'MessageController@destroy')->name('message.message.destroy')->middleware('permission:message.message.destroy');

    });

});
//导航管理
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:nav.manage']], function () {
    //消息管理
    Route::group(['middleware' => 'permission:admin.nav'], function () {
        Route::get('nav/data', 'NavigationController@data')->name('admin.nav.data');
        Route::get('nav', 'NavigationController@index')->name('admin.nav');
        //添加
        Route::get('nav/create', 'NavigationController@create')->name('admin.nav.create')->middleware('permission:admin.nav.create');
        Route::post('nav/store', 'NavigationController@store')->name('admin.nav.store')->middleware('permission:admin.nav.create');

        Route::get('nav/{id}/edit', 'NavigationController@edit')->name('admin.nav.edit')->middleware('permission:admin.nav.edit');
        Route::put('nav/{id}/update', 'NavigationController@update')->name('admin.nav.update')->middleware('permission:admin.nav.edit');
        //删除
        Route::delete('nav/destroy', 'NavigationController@destroy')->name('admin.nav.destroy')->middleware('permission:admin.nav.destroy');

    });

});

//关于我们
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permission:about.manage']], function () {
    //公司简介
    Route::group(['middleware' => 'permission:about.company'], function () {
        Route::get('company', 'CompanyController@index')->name('about.company');
        //添加
        Route::put('company', 'CompanyController@update')->name('about.company.update')->middleware('permission:about.company.edit');

    });
    //公司简介
    Route::group(['middleware' => 'permission:about.concept'], function () {
        Route::get('concept', 'ConceptController@index')->name('about.concept');
        //添加
        Route::put('concept', 'ConceptController@update')->name('about.concept.update')->middleware('permission:about.concept.edit');

    });
    //发展历程
    Route::group(['middleware' => 'permission:about.course'], function () {
        Route::get('course', 'CourseController@index')->name('about.course');
        //添加
        Route::put('course', 'CourseController@update')->name('about.course.update')->middleware('permission:about.course.edit');

    });
    //公司风采
    Route::group(['middleware' => 'permission:about.mien'], function () {
        Route::get('mien', 'MienController@index')->name('about.mien');
        //添加
        Route::put('mien', 'MienController@update')->name('about.mien.update')->middleware('permission:about.mien.edit');

    });
    //公司招聘
    Route::group(['middleware' => 'permission:about.job'], function () {
        Route::get('job', 'JobController@index')->name('about.job');
        //添加
        Route::put('job', 'JobController@update')->name('about.job.update')->middleware('permission:about.job.edit');

    });
    //联系我们
    Route::group(['middleware' => 'permission:about.about'], function () {
        Route::get('about', 'AboutController@index')->name('about.about');
        //添加
        Route::put('about', 'AboutController@update')->name('about.about.update')->middleware('permission:about.about.edit');

    });

});
