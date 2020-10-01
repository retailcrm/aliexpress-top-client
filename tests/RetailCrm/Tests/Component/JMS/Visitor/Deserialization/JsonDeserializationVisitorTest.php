<?php
/**
 * PHP version 7.4
 *
 * @category JsonDeserializationVisitorTest
 * @package  RetailCrm\Tests\Component\JMS\Visitor\Deserialization
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Tests\Component\JMS\Visitor\Deserialization;

use RetailCrm\Component\Constants;
use RetailCrm\Model\Entity\CategoryInfo;
use RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseData;
use RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList;
use RetailCrm\Model\Response\AliExpress\SolutionSellerCategoryTreeQueryResponse;
use RetailCrm\Test\TestCase;

/**
 * Class JsonDeserializationVisitorTest
 *
 * @category JsonDeserializationVisitorTest
 * @package  RetailCrm\Tests\Component\JMS\Visitor\Deserialization
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class JsonDeserializationVisitorTest extends TestCase
{
    public function testDeserializeInlineJson()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_seller_category_tree_query_response":{
        "children_category_list":{
            "category_info":[
                {
                    "children_category_id":5090301,
                    "is_leaf_category":true,
                    "level":2,
                    "multi_language_names":"{   \"de\": \"Mobiltelefon\",   \"ru\": \"Мобильные телефоны\",   \"pt\": \"Telefonia\",   \"in\": \"Ponsel\",   \"en\": \"Mobile Phones\",   \"it\": \"Telefoni cellulari\",   \"fr\": \"Smartphones\",   \"es\": \"Smartphones\",   \"tr\": \"Cep Telefonu\",   \"nl\": \"Mobiele telefoons\" }"
                }
            ]
        },
        "is_success":true
    }
}
EOF;
        $expectedLangs = [
            'de' => 'Mobiltelefon',
            'ru' => 'Мобильные телефоны',
            'pt' => 'Telefonia',
            'in' => 'Ponsel',
            'en' => 'Mobile Phones',
            'it' => 'Telefoni cellulari',
            'fr' => 'Smartphones',
            'es' => 'Smartphones',
            'tr' => 'Cep Telefonu',
            'nl' => 'Mobiele telefoons'
        ];

        /** @var \JMS\Serializer\SerializerInterface $serializer */
        $serializer = $this->getContainer()->get(Constants::SERIALIZER);
        /** @var SolutionSellerCategoryTreeQueryResponse $result */
        $result = $serializer->deserialize($json, SolutionSellerCategoryTreeQueryResponse::class, 'json');

        self::assertInstanceOf(SolutionSellerCategoryTreeQueryResponseData::class, $result->responseData);
        self::assertInstanceOf(
            SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList::class,
            $result->responseData->childrenCategoryList
        );
        self::assertIsArray($result->responseData->childrenCategoryList->categoryInfo);
        self::assertCount(1, $result->responseData->childrenCategoryList->categoryInfo);

        $info = $result->responseData->childrenCategoryList->categoryInfo[0];

        self::assertInstanceOf(CategoryInfo::class, $info);
        self::assertEquals(5090301, $info->childrenCategoryId);
        self::assertTrue($info->isLeafCategory);
        self::assertEquals(2, $info->level);
        self::assertIsArray($info->multiLanguageNames);

        foreach ($expectedLangs as $lang => $value) {
            self::assertArrayHasKey($lang, $info->multiLanguageNames);
            self::assertEquals($value, $info->multiLanguageNames[$lang]);
        }
    }
}
