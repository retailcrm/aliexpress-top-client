<?php
/**
 * PHP version 7.3
 *
 * @category CategoryInfo
 * @package  RetailCrm\Model\Entity
 */

namespace RetailCrm\Model\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CategoryInfo
 *
 * @category CategoryInfo
 * @package  RetailCrm\Model\Entity
 */
class CategoryInfo
{
    /**
     * @var int $childrenCategoryId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("children_category_id")
     */
    public $childrenCategoryId;

    /**
     * @var bool $isLeafCategory
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("is_leaf_category")
     */
    public $isLeafCategory;

    /**
     * @var int $level
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("level")
     */
    public $level;

    /**
     * @var array $multiLanguageNames
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("multi_language_names")
     * @JMS\Groups(groups={"InlineJsonBody"})
     */
    public $multiLanguageNames;
}
