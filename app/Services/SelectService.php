<?php

namespace App\Services;

use App\Enums\Colors;
use App\Models\Select;
use App\Models\User;

class SelectService
{
    public static function createDefaults(User $user)
    {
        if (!$user->has_selects) {
            foreach (self::getList() as $model_type => $items) {
                foreach ($items as $type => $values) {
                    foreach ($values as $value) {
                        $select             = new Select();
                        $select->owner_id   = $user->id;
                        $select->creator_id = $user->id;
                        $select->color      = Colors::cases()[ random_int(0, 2) ]->value;
                        $select->model_type = strtolower($model_type);
                        $select->type       = strtolower($type);
                        $select->value      = $value;
                        $select->saveQuietly();
                    }
                }
            }
            $user->has_selects = true;
            $user->saveQuietly();
        }
    }
    /**
     * @return array<string,array>
     */
    protected static function getList(): array
    {
        $selects = [
            'PRODUCT'  => [
                'STAGE'    => [
                    [ 'en' => 'Idea', 'ar' => 'فكرة' ],
                    [ 'en' => 'Prototype', 'ar' => 'نموذج أولي' ],
                    [ 'en' => 'Under Development', 'ar' => 'مرحلة التنفيذ' ],
                    [ 'en' => 'MVP', 'ar' => 'نسخة أولوية' ],
                    [ 'en' => 'Live', 'ar' => 'منتج قائم' ],
                    [ 'en' => 'On Hold', 'ar' => 'موقوف' ],
                 ],
                'CATEGORY' => [
                    [ 'en' => 'Digital Platform', 'ar' => 'منصة رقمية' ],
                    [ 'en' => 'Mobile App', 'ar' => 'تطبيق' ],
                    [ 'en' => 'Website', 'ar' => 'موقع إلكتروني' ],
                    [ 'en' => 'E-Store', 'ar' => 'متجر إلكتروني' ],
                    [ 'en' => 'Other Misc', 'ar' => 'منتجات متنوعة' ],
                 ],
             ],
            'IDEA'     => [
                'PRIORITY' => [
                    [ 'en' => 'Low', 'ar' => 'منخفضة' ],
                    [ 'en' => 'Medium', 'ar' => 'متوسطة' ],
                    [ 'en' => 'High', 'ar' => 'عالية' ],
                 ],
             ],
            'TASK'     => [
                'STATUS'   => [
                    [ 'en' => 'New', 'ar' => 'جديد' ],
                    [ 'en' => 'On Progress', 'ar' => 'جاري العمل' ],
                    [ 'en' => 'On Hold', 'ar' => 'معلق' ],
                    [ 'en' => 'Done', 'ar' => 'منجز' ],
                    [ 'en' => 'Canceled', 'ar' => 'ملغي' ],
                 ],
                'CATEGORY' => [
                    [ 'en' => 'Analysis', 'ar' => 'تحليل' ],
                    [ 'en' => 'UI Design', 'ar' => 'تصميم واجهة' ],
                    [ 'en' => 'Development', 'ar' => 'برمجة' ],
                    [ 'en' => 'Integration', 'ar' => 'تكامل' ],
                    [ 'en' => 'Database', 'ar' => 'قواعد بيانات' ],
                    [ 'en' => 'Quality Testing', 'ar' => 'اختبار جودة' ],
                    [ 'en' => 'Marketing', 'ar' => 'تسويق' ],
                    [ 'en' => 'Training', 'ar' => 'تدريب' ],
                    [ 'en' => 'Workshops', 'ar' => 'ورش عمل' ],
                 ],
             ],
            'CHANGE'   => [
                'STATUS'         => [
                    [ 'en' => 'New', 'ar' => 'جديد' ],
                    [ 'en' => 'On Progress', 'ar' => 'جاري العمل' ],
                    [ 'en' => 'On Hold', 'ar' => 'معلق' ],
                    [ 'en' => 'Done', 'ar' => 'منجز' ],
                    [ 'en' => 'Canceled', 'ar' => 'ملغي' ],
                 ],
                'PRIORITY'       => [
                    [ 'en' => 'Low', 'ar' => 'منخفضة' ],
                    [ 'en' => 'Medium', 'ar' => 'متوسطة' ],
                    [ 'en' => 'High', 'ar' => 'عالية' ],
                 ],
                'CLASSIFICATION' => [
                    [ 'en' => 'UI Change', 'ar' => 'تصميم واجهة' ],
                    [ 'en' => 'Process', 'ar' => 'إجراء' ],
                    [ 'en' => 'Data', 'ar' => 'البيانات' ],
                    [ 'en' => 'Reports', 'ar' => 'التقارير' ],
                    [ 'en' => 'Integration', 'ar' => 'التكامل' ],
                    [ 'en' => 'General', 'ar' => 'عام' ],
                 ],
             ],
            'SUPPORT'  => [
                'STATUS'         => [
                    [ 'en' => 'New', 'ar' => 'جديد' ],
                    [ 'en' => 'On Progress', 'ar' => 'جاري العمل' ],
                    [ 'en' => 'On Hold', 'ar' => 'معلق' ],
                    [ 'en' => 'Done', 'ar' => 'منجز' ],
                    [ 'en' => 'Canceled', 'ar' => 'ملغي' ],
                 ],
                'PRIORITY'       => [
                    [ 'en' => 'Low', 'ar' => 'منخفضة' ],
                    [ 'en' => 'Medium', 'ar' => 'متوسطة' ],
                    [ 'en' => 'High', 'ar' => 'عالية' ],
                    [ 'en' => 'Critical', 'ar' => 'حرجة' ],
                 ],
                'CLASSIFICATION' => [
                    [ 'en' => 'Bug', 'ar' => 'خطأ برمجي' ],
                    [ 'en' => 'Vulnerability', 'ar' => 'ثغرة أمنية' ],
                    [ 'en' => 'Not working function', 'ar' => 'تعطل' ],
                    [ 'en' => 'Slow', 'ar' => 'بطء' ],
                    [ 'en' => 'Data Error', 'ar' => 'أخطاء في البيانات' ],
                    [ 'en' => 'Licenses', 'ar' => 'تراخيص' ],
                    [ 'en' => 'Hosting', 'ar' => 'استضافة' ],
                    [ 'en' => 'Space', 'ar' => 'مساحة' ],
                    [ 'en' => 'Domains', 'ar' => 'نطاق' ],
                    [ 'en' => 'Training', 'ar' => 'تدريب' ],
                    [ 'en' => 'Inquiry', 'ar' => 'استفسار' ],
                    [ 'en' => 'Other', 'ar' => 'أخرى' ],
                 ],
             ],
            'DOCUMENT' => [
                'TYPE' => [
                    [ 'en' => 'Analysis document', 'ar' => 'وثيقة تحليل' ],
                    [ 'en' => 'Design document', 'ar' => 'وثيقة تصميم' ],
                    [ 'en' => 'Database document', 'ar' => 'وثيقة قواعد بيانات' ],
                    [ 'en' => 'Test plan document', 'ar' => 'وثيقة خطة الاختبار' ],
                    [ 'en' => "User's Guide", 'ar' => 'دليل المستخدم' ],
                    [ 'en' => 'Code documentation', 'ar' => 'توثيق الكود' ],
                    [ 'en' => 'Training materials', 'ar' => 'مواد تدريبية' ],
                    [ 'en' => 'Installation guide', 'ar' => 'دليل التركيب' ],
                    [ 'en' => 'FAQ', 'ar' => 'أكثر الأسئلة تكراراً' ],
                    [ 'en' => 'Glossary', 'ar' => 'مصطلحات' ],
                 ],
             ],
            'REPORT'   => [
                'TYPE' => [
                    [ 'en' => 'Performance report', 'ar' => 'تقرير أداء المنتج' ],
                    [ 'en' => 'Project report', 'ar' => 'تقرير مشروع' ],
                    [ 'en' => 'Digital security inspection report', 'ar' => 'تقرير فحص أمن رقمي' ],
                    [ 'en' => 'Financial report', 'ar' => 'تقرير مالي' ],
                    [ 'en' => 'Customer satisfaction report', 'ar' => 'تقرير رضا العملاء' ],
                    [ 'en' => 'General report', 'ar' => 'تقرير عام' ],
                 ],
             ],
         ];

        return $selects;
    }
}
