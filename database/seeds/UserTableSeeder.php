<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空表
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Illuminate\Support\Facades\DB::table('model_has_permissions')->truncate();
        \Illuminate\Support\Facades\DB::table('model_has_roles')->truncate();
        \Illuminate\Support\Facades\DB::table('role_has_permissions')->truncate();
        \Illuminate\Support\Facades\DB::table('users')->truncate();
        \Illuminate\Support\Facades\DB::table('roles')->truncate();
        \Illuminate\Support\Facades\DB::table('permissions')->truncate();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //用户
        $user = \App\Models\User::create([
            'username' => 'root',
            'phone' => '18908221080',
            'name' => '超级管理员',
            'email' => 'root@dgg.net',
            'password' => bcrypt('123456'),
            'uuid' => \Faker\Provider\Uuid::uuid()
        ]);

        //角色
        $role = \App\Models\Role::create([
            'name' => 'root',
            'display_name' => '超级管理员'
        ]);

        //权限
        $permissions = [
            [
                'name' => 'system.manage',
                'display_name' => '系统管理',
                'route' => '',
                'icon_id' => '100',
                'child' => [
                    [
                        'name' => 'system.user',
                        'display_name' => '用户管理',
                        'route' => 'admin.user',
                        'icon_id' => '123',
                        'child' => [
                            ['name' => 'system.user.create', 'display_name' => '添加用户','route'=>'admin.user.create'],
                            ['name' => 'system.user.edit', 'display_name' => '编辑用户','route'=>'admin.user.edit'],
                            ['name' => 'system.user.destroy', 'display_name' => '删除用户','route'=>'admin.user.destroy'],
                            ['name' => 'system.user.role', 'display_name' => '分配角色','route'=>'admin.user.role'],
                            ['name' => 'system.user.permission', 'display_name' => '分配权限','route'=>'admin.user.permission'],
                        ]
                    ],
                    [
                        'name' => 'system.role',
                        'display_name' => '角色管理',
                        'route' => 'admin.role',
                        'icon_id' => '121',
                        'child' => [
                            ['name' => 'system.role.create', 'display_name' => '添加角色','route'=>'admin.role.create'],
                            ['name' => 'system.role.edit', 'display_name' => '编辑角色','route'=>'admin.role.edit'],
                            ['name' => 'system.role.destroy', 'display_name' => '删除角色','route'=>'admin.role.destroy'],
                            ['name' => 'system.role.permission', 'display_name' => '分配权限','route'=>'admin.role.permission'],
                        ]
                    ],
                    [
                        'name' => 'system.permission',
                        'display_name' => '权限管理',
                        'route' => 'admin.permission',
                        'icon_id' => '12',
                        'child' => [
                            ['name' => 'system.permission.create', 'display_name' => '添加权限','route'=>'admin.permission.create'],
                            ['name' => 'system.permission.edit', 'display_name' => '编辑权限','route'=>'admin.permission.edit'],
                            ['name' => 'system.permission.destroy', 'display_name' => '删除权限','route'=>'admin.permission.destroy'],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'home.manage',
                'display_name' => '首页管理',
                'route' => '',
                'icon_id' => '13',
                'child' => [
                    [
                        'name' => 'home.banner',
                        'display_name' => 'banner大图',
                        'route' => 'home.banner',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.banner.create', 'display_name' => '添加banner','route'=>'home.banner.create'],
                            ['name' => 'home.banner.edit', 'display_name' => '编辑banner','route'=>'home.banner.edit'],
                            ['name' => 'home.banner.destroy', 'display_name' => '删除banner','route'=>'home.banner.destroy'],
                        ]
                    ],
                    [
                        'name' => 'home.site',
                        'display_name' => '站点配置',
                        'route' => 'home.site',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.site.edit', 'display_name' => '编辑站点','route'=>'home.site.update'],
                        ]
                    ],
                    /*[
                        'name' => 'home.aptitudeType',
                        'display_name' => '资质类型',
                        'route' => 'home.aptitudeType',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.aptitudeType.create', 'display_name' => '添加资质','route'=>'home.aptitudeType.create'],
                            ['name' => 'home.aptitudeType.edit', 'display_name' => '编辑资质','route'=>'home.aptitudeType.edit'],
                            ['name' => 'home.aptitudeType.destroy', 'display_name' => '删除资质','route'=>'home.aptitudeType.destroy'],
                        ]
                    ],
                    [
                        'name' => 'home.aptitude',
                        'display_name' => '资质服务',
                        'route' => 'home.aptitude',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.aptitude.create', 'display_name' => '添加资质','route'=>'home.aptitude.create'],
                            ['name' => 'home.aptitude.edit', 'display_name' => '编辑资质','route'=>'home.aptitude.edit'],
                            ['name' => 'home.aptitude.destroy', 'display_name' => '删除资质','route'=>'home.aptitude.destroy'],
                        ]
                    ],*/
                    [
                        'name' => 'home.process',
                        'display_name' => '流程管理',
                        'route' => 'home.process',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.process.create', 'display_name' => '添加流程','route'=>'home.process.create'],
                            ['name' => 'home.process.edit', 'display_name' => '编辑流程','route'=>'home.process.edit'],
                            ['name' => 'home.process.destroy', 'display_name' => '删除流程','route'=>'home.process.destroy'],
                        ]
                    ],
                    [
                        'name' => 'home.know',
                        'display_name' => '了解管理',
                        'route' => 'home.know',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.know.create', 'display_name' => '添加了解','route'=>'home.know.create'],
                            ['name' => 'home.know.edit', 'display_name' => '编辑了解','route'=>'home.know.edit'],
                            ['name' => 'home.know.destroy', 'display_name' => '删除了解','route'=>'home.know.destroy'],
                        ]
                    ],
                    [
                        'name' => 'home.rolling',
                        'display_name' => '滚动图管理',
                        'route' => 'home.rolling',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.rolling.create', 'display_name' => '添加滚动图','route'=>'home.rolling.create'],
                            ['name' => 'home.rolling.edit', 'display_name' => '编辑滚动图','route'=>'home.rolling.edit'],
                            ['name' => 'home.rolling.destroy', 'display_name' => '删除滚动图','route'=>'home.rolling.destroy'],
                        ]
                    ],
                    [
                        'name' => 'home.institution',
                        'display_name' => '合作机构',
                        'route' => 'home.institution',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'home.institution.create', 'display_name' => '添加合作机构','route'=>'home.institution.create'],
                            ['name' => 'home.institution.edit', 'display_name' => '编辑合作机构','route'=>'home.institution.edit'],
                            ['name' => 'home.institution.destroy', 'display_name' => '删除合作机构','route'=>'home.institution.destroy'],
                        ]
                    ],

                ]
            ]
            ,[
                'name' => 'product.manage',
                'display_name' => '产品管理',
                'route' => '',
                'icon_id' => '13',
                'child' => [
                    [
                        'name' => 'product.productType',
                        'display_name' => '产品类型',
                        'route' => 'product.productType',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'product.productType.create', 'display_name' => '添加产品类型','route'=>'product.productType.create'],
                            ['name' => 'product.productType.edit', 'display_name' => '编辑产品类型','route'=>'product.productType.edit'],
                            ['name' => 'product.productType.destroy', 'display_name' => '删除产品类型','route'=>'product.productType.destroy'],
                        ]
                    ],
                    [
                        'name' => 'product.product',
                        'display_name' => '产品管理',
                        'route' => 'product.product',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'product.product.create', 'display_name' => '添加产品','route'=>'product.product.create'],
                            ['name' => 'product.product.edit', 'display_name' => '编辑产品','route'=>'product.product.edit'],
                            ['name' => 'product.product.destroy', 'display_name' => '删除产品','route'=>'product.product.destroy'],
                        ]
                    ],
                    [
                        'name' => 'product.answer',
                        'display_name' => '热门问答',
                        'route' => 'product.answer',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'product.answer.create', 'display_name' => '添加问答','route'=>'product.answer.create'],
                            ['name' => 'product.answer.edit', 'display_name' => '编辑问答','route'=>'product.answer.edit'],
                            ['name' => 'product.answer.destroy', 'display_name' => '删除问答','route'=>'product.answer.destroy'],
                        ]
                    ],

                ]
            ]
            ,[
                'name' => 'message.manage',
                'display_name' => '留言管理',
                'route' => '',
                'icon_id' => '13',
                'child' => [
                    [
                        'name' => 'message.message',
                        'display_name' => '留言管理',
                        'route' => 'message.message',
                        'icon_id' => '124',
                        'child' => [
//                            ['name' => 'message.message.edit', 'display_name' => '编辑留言','route'=>'message.message.edit'],
                            ['name' => 'message.message.destroy', 'display_name' => '删除留言','route'=>'message.message.destro'],
                        ]
                    ],

                ]
            ]
            ,[
                'name' => 'nav.manage',
                'display_name' => '导航管理',
                'route' => '',
                'icon_id' => '13',
                'child' => [
                    [
                        'name' => 'admin.nav',
                        'display_name' => '导航管理',
                        'route' => 'admin.nav',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'admin.nav.create', 'display_name' => '添加导航','route'=>'nav.create'],
                            ['name' => 'admin.nav.edit', 'display_name' => '编辑导航','route'=>'nav.edit'],
                            ['name' => 'admin.nav.destroy', 'display_name' => '删除导航','route'=>'nav.destroy'],
                        ]
                    ],

                ]
            ]
            ,[
                'name' => 'article.manage',
                'display_name' => '文章管理',
                'route' => '',
                'icon_id' => '13',
                'child' => [
                    [
                        'name' => 'admin.article',
                        'display_name' => '文章列表',
                        'route' => 'admin.article',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'admin.article.create', 'display_name' => '添加文章','route'=>'article.create'],
                            ['name' => 'admin.article.edit', 'display_name' => '编辑文章','route'=>'article.edit'],
                            ['name' => 'admin.article.destroy', 'display_name' => '删除文章','route'=>'article.destroy'],
                        ]
                    ],

                ]
            ]

            ,[
                'name' => 'about.manage',
                'display_name' => '关于我们',
                'route' => '',
                'icon_id' => '13',
                'child' => [
                    [
                        'name' => 'about.company',
                        'display_name' => '公司介绍',
                        'route' => 'about.company',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'about.company.edit', 'display_name' => '编辑公司介绍','route'=>'about.company.update'],
                        ]
                    ],
                    [
                        'name' => 'about.concept',
                        'display_name' => '文化理念',
                        'route' => 'about.concept',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'about.concept.edit', 'display_name' => '编辑文化理念','route'=>'about.concept.update'],
                        ]
                    ],
                    [
                        'name' => 'about.course',
                        'display_name' => '发展历程',
                        'route' => 'about.course',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'about.course.edit', 'display_name' => '编辑发展历程','route'=>'about.course.update'],
                        ]
                    ],
                    [
                        'name' => 'about.mien',
                        'display_name' => '公司风采',
                        'route' => 'about.mien',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'about.mien.edit', 'display_name' => '编辑公司风采','route'=>'about.mien.update'],
                        ]
                    ],
                    [
                        'name' => 'about.job',
                        'display_name' => '公司招聘',
                        'route' => 'about.job',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'about.job.edit', 'display_name' => '编辑公司招聘','route'=>'about.job.update'],
                        ]
                    ],
                    [
                        'name' => 'about.about',
                        'display_name' => '联系我们',
                        'route' => 'about.about',
                        'icon_id' => '124',
                        'child' => [
                            ['name' => 'about.about.edit', 'display_name' => '编辑联系我们','route'=>'about.about.update'],
                        ]
                    ],

                ]
            ]
        ];

        foreach ($permissions as $pem1) {
            //生成一级权限
            $p1 = \App\Models\Permission::create([
                'name' => $pem1['name'],
                'display_name' => $pem1['display_name'],
                'route' => $pem1['route']??'',
                'icon_id' => $pem1['icon_id']??1,
            ]);
            //为角色添加权限
            $role->givePermissionTo($p1);
            //为用户添加权限
            $user->givePermissionTo($p1);
            if (isset($pem1['child'])) {
                foreach ($pem1['child'] as $pem2) {
                    //生成二级权限
                    $p2 = \App\Models\Permission::create([
                        'name' => $pem2['name'],
                        'display_name' => $pem2['display_name'],
                        'parent_id' => $p1->id,
                        'route' => $pem2['route']??1,
                        'icon_id' => $pem2['icon_id']??1,
                    ]);
                    //为角色添加权限
                    $role->givePermissionTo($p2);
                    //为用户添加权限
                    $user->givePermissionTo($p2);
                    if (isset($pem2['child'])) {
                        foreach ($pem2['child'] as $pem3) {
                            //生成三级权限
                            $p3 = \App\Models\Permission::create([
                                'name' => $pem3['name'],
                                'display_name' => $pem3['display_name'],
                                'parent_id' => $p2->id,
                                'route' => $pem3['route']??'',
                                'icon_id' => $pem3['icon_id']??1,
                            ]);
                            //为角色添加权限
                            $role->givePermissionTo($p3);
                            //为用户添加权限
                            $user->givePermissionTo($p3);
                        }
                    }

                }
            }
        }

        //为用户添加角色
        $user->assignRole($role);

        //初始化的角色
        $roles = [
            ['name' => 'business', 'display_name' => '商务'],
            ['name' => 'assessor', 'display_name' => '审核员'],
            ['name' => 'channel', 'display_name' => '渠道专员'],
            ['name' => 'editor', 'display_name' => '编辑人员'],
            ['name' => 'admin', 'display_name' => '管理员'],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
