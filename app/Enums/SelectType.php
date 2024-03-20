<?php
namespace App\Enums;

enum SelectType: string
{
    case CATEGORY = 'category';
    case STAGE = 'stage';
    case STATUS = 'status';
    case CLASSIFICATION = 'classification';
    case PRIORITY = 'priority';
    case ROLE = 'role';
    case TYPE = 'type';
    // case SUBMISSION = 'submission';
    case TICKET = 'ticket';
    case TASK = 'task';

    public static function map(string $feature)
    {
        $map = [
            Feature::IDEA->value => [
                SelectType::PRIORITY,
            ],
            Feature::TASK->value => [
                SelectType::STATUS,
                SelectType::CATEGORY,
            ],
            Feature::CHANGE->value => [
                SelectType::STATUS,
                SelectType::PRIORITY,
            ],
            Feature::SUPPORT->value => [
                SelectType::STATUS,
                SelectType::PRIORITY,
            ],
            Feature::DOCUMENT->value => [
                SelectType::TYPE,
            ],
            Feature::REPORT->value => [
                SelectType::TYPE,
            ],
            Feature::PRODUCT->value => [
                SelectType::STAGE,
                SelectType::CATEGORY,
            ],
            Feature::PRODUCT->value => [
                SelectType::STAGE,
                SelectType::CATEGORY,
            ],
        ];

        return $map[$feature];
    }

}
