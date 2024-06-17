<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
             'الفواتير',
             'قائمة الفواتير',
             'الفواتير المدفوعة',
            'الفواتير المدفوعة جزئيا',
             'الفواتير الغير مدفوعة',
           
             'التقارير',
             'تقرير الفواتير',
             'تقرير العملاء',
             'المستخدمين',
             'قائمة المستخدمين',
             'صلاحيات المستخدمين',
             'الاعدادات',
             'المنتجات',
             'الاقسام',
    
    
             'اضافة فاتورة',
             'حذف الفاتورة',
             'تصدير EXCEL',
             'تغير حالة الدفع',
             'تعديل الفاتورة',
             'ارشفة الفاتورة',
             'طباعةالفاتورة',
         'اضافة مرفق',
             'حذف المرفق',
    
         'اضافة مستخدم',
             'تعديل مستخدم',
             'حذف مستخدم',
    
             'عرض صلاحية',
             'اضافة صلاحية',
             'تعديل صلاحية',
             'حذف صلاحية',
    
             'اضافة منتج',
         'تعديل منتج',
             'حذف منتج',
    
             'اضافة قسم',
             'تعديل قسم',
             'حذف قسم',
           

/*
            ['name' => 'الاشعارات', 'guard_name' => 'notifications'],
            ['name' => 'الفواتير', 'guard_name' => 'invoices'],
            ['name' => 'قائمة الفواتير', 'guard_name' => 'invoices_list'],
            ['name' => 'الفواتير المدفوعة', 'guard_name' => 'invoices_paid'],
            ['name' => 'الفواتير الغير مدفوعة', 'guard_name' => 'invoices_unpaid'],
            ['name' => 'الفواتير المدفوعة جزئيا', 'guard_name' => 'invoices_partial'],
            ['name' => 'ارشيف الفواتير', 'guard_name' => 'archive_invoices'],
            ['name' => 'التقارير', 'guard_name' => 'reports'],
            ['name' => 'التقارير', 'guard_name' => 'reports'],
            ['name' => 'تقرير الفواتير', 'guard_name' => 'invoices_report'],
            ['name' => 'تقرير العملاء', 'guard_name' => 'custormes_report'],
            ['name' => 'المنتجات', 'guard_name' => 'products'],
            ['name' => 'الاقسام', 'guard_name' => 'section'],
            ['name' => 'اضافة فاتورة', 'guard_name' => 'create_invoices'],
            ['name' => 'حذف الفاتورة', 'guard_name' => 'delete_invoices'],
            ['name' => 'تعديل الفاتورة', 'guard_name' => 'update_invices'],
            ['name' => 'اضافة منتج', 'guard_name' => 'create_product'],
            ['name' => 'تعديل منتج', 'guard_name' => 'update_product'],
            ['name' => 'حذف منتج', 'guard_name' => 'delete_product'],
            ['name' => 'اضافة قسم', 'guard_name' => 'create_section'],
            ['name' => 'تعديل قسم', 'guard_name' => 'update_product'],
            ['name' => ' حذف قسم', 'guard_name' => 'delete_section'],
         */
        ];
            foreach($permissions as $permission)
             Permission::create(['name' =>$permission]);
      //  DB::table("permissions")->insert($permissions);
 
    }




     
}
