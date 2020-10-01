<?php

/**
 * PHP version 7.3
 *
 * @category ClientTest
 * @package  RetailCrm\Tests\TopClient
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\TopClient;

use Http\Message\RequestMatcher\CallbackRequestMatcher;
use Psr\Http\Message\RequestInterface;
use RetailCrm\Builder\ClientBuilder;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Constants;
use RetailCrm\Model\Entity\CategoryInfo;
use RetailCrm\Model\Request\AliExpress\PostproductRedefiningCategoryForecast;
use RetailCrm\Model\Request\AliExpress\SolutionSellerCategoryTreeQuery;
use RetailCrm\Model\Request\Taobao\HttpDnsGetRequest;
use RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseData;
use RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList;
use RetailCrm\Model\Response\AliExpress\PostproductRedefiningCategoryForecastResponse;
use RetailCrm\Model\Response\AliExpress\SolutionSellerCategoryTreeQueryResponse;
use RetailCrm\Model\Response\ErrorResponseBody;
use RetailCrm\Model\Response\Taobao\HttpDnsGetResponse;
use RetailCrm\Test\TestCase;
use RetailCrm\Test\RequestMatcher;

/**
 * Class ClientTest
 *
 * @category ClientTest
 * @package  RetailCrm\Tests\TopClient
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientTest extends TestCase
{
    public function testClientRequestException()
    {
        $errorBody = new ErrorResponseBody();
        $errorBody->code = 999;
        $errorBody->msg = 'Mocked error';
        $errorBody->subCode = 'subcode';
        $errorBody->requestId = '1';
        $errorResponse = new HttpDnsGetResponse();
        $errorResponse->errorResponse = $errorBody;

        $mockClient = self::getMockClient();
        $mockClient->on(new CallbackRequestMatcher(function (RequestInterface $request) {
            return true;
        }), $this->responseJson(400, $errorResponse));

        $client = ClientBuilder::create()
            ->setContainer($this->getContainer($mockClient))
            ->setAppData($this->getEnvAppData())
            ->build();

        $this->expectExceptionMessage($errorBody->msg);

        $client->sendRequest(new HttpDnsGetRequest());
    }

    public function testClientRequestXmlUnsupported()
    {
        $client = ClientBuilder::create()
            ->setContainer($this->getContainer(self::getMockClient()))
            ->setAppData($this->getEnvAppData())
            ->build();

        $request = new HttpDnsGetRequest();
        $request->format = 'xml';

        $this->expectExceptionMessage('Client only supports JSON mode, got `xml` mode');
        $client->sendRequest($request);
    }

    public function testClientAliexpressSolutionSellerCategoryTreeQueryResponse()
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

        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalQueryParams([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.seller.category.tree.query',
                    'category_id' => '5090300',
                    'filter_no_permission' => 1
                ]),
            $this->responseJson(200, $json)
        );
        $client = ClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $request = new SolutionSellerCategoryTreeQuery();

        $request->categoryId = 5090300;
        $request->filterNoPermission = true;

        /** @var SolutionSellerCategoryTreeQueryResponse $response */
        $result = $client->sendAuthenticatedRequest($request);

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

    public function testClientAliexpressPostproductRedefiningCategoryForecast()
    {
        $json = <<<'EOF'
{
    "aliexpress_postproduct_redefining_categoryforecast_response":{
        "result":{
            "error_message":"The result of dii is empty. It should have a correct JSON format data return.",
            "category_suitability_list":{
                "json":[
                    "N\/A"
                ]
            },
            "time_stamp":"20181101111211",
            "error_code":24000011,
            "success":true
        }
    }
}
EOF;

        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalQueryParams([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.postproduct.redefining.categoryforecast'
                ]),
            $this->responseJson(200, $json)
        );
        $client = ClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();

        $request = new PostproductRedefiningCategoryForecast();
        $request->subject = 'man t-shirt';
        $request->locale = 'en';

        /** @var PostproductRedefiningCategoryForecastResponse $response */
        $response = $client->sendAuthenticatedRequest($request);

        self::assertInstanceOf(PostproductRedefiningCategoryForecastResponse::class, $response);
        self::assertEquals(
            "The result of dii is empty. It should have a correct JSON format data return.",
            $response->responseData->result->errorMessage
        );
        self::assertEquals(
            ['N/A'],
            $response->responseData->result->categorySuitabilityList->json
        );
        self::assertEquals('20181101111211', $response->responseData->result->timeStamp);
        self::assertEquals('24000011', $response->responseData->result->errorCode);
        self::assertTrue($response->responseData->result->success);
    }
}
