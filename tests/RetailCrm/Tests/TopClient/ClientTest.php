<?php

/**
 * PHP version 7.3
 *
 * @category ClientTest
 * @package  RetailCrm\Tests\TopClient
 */
namespace RetailCrm\Tests\TopClient;

use DateTime;
use Http\Message\RequestMatcher\CallbackRequestMatcher;
use Psr\Http\Message\RequestInterface;
use RetailCrm\Builder\TopClientBuilder;
use RetailCrm\Model\Entity\CategoryInfo;
use RetailCrm\Model\Enum\DropshippingAreas;
use RetailCrm\Model\Enum\FeedOperationTypes;
use RetailCrm\Model\Enum\FeedStatuses;
use RetailCrm\Model\Enum\OfflinePickupTypes;
use RetailCrm\Model\Enum\OrderStatuses;
use RetailCrm\Model\Request\AliExpress\Data\FeedStocksUpdateDto;
use RetailCrm\Model\Request\AliExpress\Data\OrderQuery;
use RetailCrm\Model\Request\AliExpress\Data\SingleItemRequestDto;
use RetailCrm\Model\Request\AliExpress\Data\SingleOrderQuery;
use RetailCrm\Model\Request\AliExpress\Data\SkuStocksUpdateItemDto;
use RetailCrm\Model\Request\AliExpress\LogisticsDsTrackingInfoQuery;
use RetailCrm\Model\Request\AliExpress\LogisticsRedefiningListLogisticsService;
use RetailCrm\Model\Request\AliExpress\PostproductRedefiningCategoryForecast;
use RetailCrm\Model\Request\AliExpress\PostproductRedefiningFindAEProductByIdForDropshipper;
use RetailCrm\Model\Request\AliExpress\SolutionFeedListGet;
use RetailCrm\Model\Request\AliExpress\SolutionFeedQuery;
use RetailCrm\Model\Request\AliExpress\SolutionFeedSubmit;
use RetailCrm\Model\Request\AliExpress\SolutionMerchantProfileGet;
use RetailCrm\Model\Request\AliExpress\SolutionOrderFulfill;
use RetailCrm\Model\Request\AliExpress\SolutionOrderGet;
use RetailCrm\Model\Request\AliExpress\SolutionOrderReceiptInfoGet;
use RetailCrm\Model\Request\AliExpress\SolutionProductSchemaGet;
use RetailCrm\Model\Request\AliExpress\SolutionSellerCategoryTreeQuery;
use RetailCrm\Model\Request\Taobao\HttpDnsGetRequest;
use RetailCrm\Model\Response\AliExpress\Data\SolutionFeedSubmitResponseData;
use RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseData;
use RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList;
use RetailCrm\Model\Response\AliExpress\PostproductRedefiningCategoryForecastResponse;
use RetailCrm\Model\Response\AliExpress\PostproductRedefiningFindAEProductByIdForDropshipperResponse;
use RetailCrm\Model\Response\AliExpress\SolutionFeedListGetResponse;
use RetailCrm\Model\Response\AliExpress\SolutionSellerCategoryTreeQueryResponse;
use RetailCrm\Model\Response\ErrorResponseBody;
use RetailCrm\Model\Response\Taobao\HttpDnsGetResponse;
use RetailCrm\Test\FakeDataRequestDto;
use RetailCrm\Test\RequestMatcher;
use RetailCrm\Test\TestCase;

/**
 * Class ClientTest
 *
 * @category ClientTest
 * @package  RetailCrm\Tests\TopClient
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

        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mockClient))
            ->setAppData($this->getEnvAppData())
            ->build();

        $this->expectExceptionMessage($errorBody->msg);

        $client->sendRequest(new HttpDnsGetRequest());
    }

    public function testClientRequestXmlUnsupported()
    {
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer(self::getMockClient()))
            ->setAppData($this->getEnvAppData())
            ->build();

        $request = new HttpDnsGetRequest();
        $request->format = 'xml';

        $this->expectExceptionMessage('TopClient only supports JSON mode, got `xml` mode');
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
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.seller.category.tree.query',
                    'category_id' => '5090300',
                    'filter_no_permission' => 1,
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
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

    public function testClientAliexpressPostproductRedefiningCategoryForecastEmpty()
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
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.postproduct.redefining.categoryforecast',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
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
        self::assertNull($response->responseData->result->categorySuitabilityList->json);
        self::assertEquals('20181101111211', $response->responseData->result->timeStamp);
        self::assertEquals('24000011', $response->responseData->result->errorCode);
        self::assertTrue($response->responseData->result->success);
    }

    public function testClientAliexpressPostproductRedefiningCategoryForecast()
    {
        $json = <<<'EOF'
{
  "aliexpress_postproduct_redefining_categoryforecast_response": {
    "result": {
      "category_suitability_list": {
        "json": [
          "{\"score\":0.696,\"suitabilityRank\":1,\"categoryId\":200000346}"
        ]
      },
      "success": true,
      "time_stamp": "2019-07-15 13:49:58"
    },
    "request_id": "10ixzzbmna198"
  }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.postproduct.redefining.categoryforecast',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();

        $request = new PostproductRedefiningCategoryForecast();
        $request->subject = 'man t-shirt';
        $request->locale = 'en';

        /** @var PostproductRedefiningCategoryForecastResponse $response */
        $response = $client->sendAuthenticatedRequest($request);
        $items = $response->responseData->result->categorySuitabilityList->json;

        self::assertCount(1, $items);

        $item = $response->responseData->result->categorySuitabilityList->json[0];

        self::assertEquals(0.696, $item->score);
        self::assertEquals(1, $item->suitabilityRank);
        self::assertEquals(200000346, $item->categoryId);
    }

    public function testClientAliexpressSolutionFeedSubmit()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_feed_submit_response":{
        "job_id":200000000060024475
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.feed.submit',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $dto = new FakeDataRequestDto();
        $item = new SingleItemRequestDto();
        $request = new SolutionFeedSubmit();

        $dto->code = 'code';
        $item->itemContent = $dto;
        $item->itemContentId = 'A00000000Y1';
        $request->operationType = FeedOperationTypes::PRODUCT_PRICES_UPDATE;
        $request->itemList = [$item];

        $response = $client->sendAuthenticatedRequest($request);

        self::assertInstanceOf(SolutionFeedSubmitResponseData::class, $response->responseData);
        self::assertEquals(200000000060024475, $response->responseData->jobId);
    }

    public function testClientAliexpressSolutionFeedQuery()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_feed_query_response":{
        "job_id":200000000060054475,
        "success_item_count":1,
        "result_list":{
            "single_item_response_dto":[
                {
                    "item_execution_result":"{\"productId\":33030372006,\"success\":true}",
                    "item_content_id":"A00000000Y1"
                }
            ]
        },
        "total_item_count":1
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.feed.query',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $request = new SolutionFeedQuery();
        $request->jobId = 200000000060054475;

        /** @var \RetailCrm\Model\Response\AliExpress\SolutionFeedQueryResponse $response */
        $response = $client->sendAuthenticatedRequest($request);

        self::assertEquals(200000000060054475, $response->responseData->jobId);
        self::assertEquals(1, $response->responseData->successItemCount);
        self::assertNotNull($response->responseData->resultList);
        self::assertNotNull($response->responseData->resultList->singleItemResponseDto);
        self::assertCount(1, $response->responseData->resultList->singleItemResponseDto);

        $item = $response->responseData->resultList->singleItemResponseDto[0];

        self::assertEquals("A00000000Y1", $item->itemContentId);
        self::assertNotNull($item->itemExecutionResult);
        self::assertTrue($item->itemExecutionResult->success);
        self::assertEquals(33030372006, $item->itemExecutionResult->productId);
    }

    public function testAliexpressSolutionFeedListGet()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_feed_list_get_response":{
        "current_page":3,
        "job_list":{
            "batch_operation_job_dto":[
                {
                    "status":"PROCESSING",
                    "operation_type":"PRODUCT_CREATE",
                    "job_id":2000000000123456
                }
            ]
        },
        "page_size":20,
        "total_count":300,
        "total_page":15
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.feed.list.get',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        /** @var SolutionFeedListGetResponse $response */
        $response = $client->sendAuthenticatedRequest(new SolutionFeedListGet());

        self::assertEquals(3, $response->responseData->currentPage);
        self::assertEquals(20, $response->responseData->pageSize);
        self::assertEquals(300, $response->responseData->totalCount);
        self::assertEquals(15, $response->responseData->totalPage);
        self::assertNotNull($response->responseData->jobList);
        self::assertCount(1, $response->responseData->jobList->batchOperationJobDto);

        $item = $response->responseData->jobList->batchOperationJobDto[0];

        self::assertEquals(FeedStatuses::PROCESSING, $item->status);
        self::assertEquals(FeedOperationTypes::PRODUCT_CREATE, $item->operationType);
        self::assertEquals(2000000000123456, $item->jobId);
    }

    public function testAliexpressSolutionProductSchemaGet()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_product_schema_get_response":{
        "result":{
            "success":true,
            "error_code":"F00-00-10007-007",
            "error_message":"duplicate sku_code, please check your input",
            "schema":"{}"
        }
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.product.schema.get',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $request = new SolutionProductSchemaGet();
        $request->aliexpressCategoryId = 1;

        $response = $client->sendAuthenticatedRequest($request);

        self::assertEquals('{}', $response->responseData->result->schema);
    }

    public function testAliexpressSolutionOrderGet()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_order_get_response":{
        "result":{
            "error_message":"1",
            "total_count":1,
            "target_list":{
                "order_dto":[
                    {
                        "timeout_left_time":120340569,
                        "seller_signer_fullname":"cn1234",
                        "seller_operator_login_id":"cn1234",
                        "seller_login_id":"cn1234",
                        "product_list":{
                            "order_product_dto":[
                                {
                                    "total_product_amount":{
                                        "currency_code":"USD",
                                        "amount":"1.01"
                                    },
                                    "son_order_status":"PLACE_ORDER_SUCCESS",
                                    "sku_code":"12",
                                    "show_status":"PLACE_ORDER_SUCCESS",
                                    "send_goods_time":"2017-10-12 12:12:12",
                                    "send_goods_operator":"WAREHOUSE_SEND_GOODS",
                                    "product_unit_price":{
                                        "currency_code":"USD",
                                        "amount":"1.01"
                                    },
                                    "product_unit":"piece",
                                    "product_standard":"",
                                    "product_snap_url":"http:\/\/www.aliexpress.com:1080\/snapshot\/null.html?orderId\\u003d1160045860056286",
                                    "product_name":"mobile",
                                    "product_img_url":"http:\/\/g03.a.alicdn.com\/kf\/images\/eng\/no_photo.gif",
                                    "product_id":2356980,
                                    "product_count":1,
                                    "order_id":222222,
                                    "money_back3x":false,
                                    "memo":"1",
                                    "logistics_type":"EMS",
                                    "logistics_service_name":"EMS",
                                    "logistics_amount":{
                                        "currency_code":"USD",
                                        "amount":"1.01"
                                    },
                                    "issue_status":"END_ISSUE",
                                    "issue_mode":"w",
                                    "goods_prepare_time":3,
                                    "fund_status":"WAIT_SELLER_CHECK",
                                    "freight_commit_day":"27",
                                    "escrow_fee_rate":"0.01",
                                    "delivery_time":"5-10",
                                    "child_id":23457890,
                                    "can_submit_issue":false,
                                    "buyer_signer_last_name":"1",
                                    "buyer_signer_first_name":"1",
                                    "afflicate_fee_rate":"0.03"
                                }
                            ]
                        },
                        "phone":false,
                        "payment_type":"ebanx101",
                        "pay_amount":{
                            "currency_code":"USD",
                            "amount":"1.01"
                        },
                        "order_status":"PLACE_ORDER_SUCCESS",
                        "order_id":1160045860056286,
                        "order_detail_url":"http",
                        "logistics_status":"NO_LOGISTICS",
                        "logisitcs_escrow_fee_rate":"1",
                        "loan_amount":{
                            "currency_code":"USD",
                            "amount":"1.01"
                        },
                        "left_send_good_min":"1",
                        "left_send_good_hour":"1",
                        "left_send_good_day":"1",
                        "issue_status":"END_ISSUE",
                        "has_request_loan":false,
                        "gmt_update":"2017-10-12 12:12:12",
                        "gmt_send_goods_time":"2017-10-12 12:12:12",
                        "gmt_pay_time":"2017-10-12 12:12:12",
                        "gmt_create":"2017-10-12 12:12:12",
                        "fund_status":"WAIT_SELLER_CHECK",
                        "frozen_status":"IN_FROZEN",
                        "escrow_fee_rate":1,
                        "escrow_fee":{
                            "currency_code":"USD",
                            "amount":"1.01"
                        },
                        "end_reason":"buyer_confirm_goods",
                        "buyer_signer_fullname":"test",
                        "buyer_login_id":"test",
                        "biz_type":"AE_RECHARGE",
                        "offline_pickup_type":"RU_OFFLINE_SELF_PICK_UP_EXPRESSION"
                    }
                ]
            },
            "page_size":1,
            "error_code":"1",
            "current_page":1,
            "total_page":1,
            "success":true,
            "time_stamp":"1"
        }
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.order.get',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $query = new OrderQuery();
        $query->pageSize = 20;
        $query->currentPage = 1;
        $query->createDateStart = new DateTime();
        $query->orderStatus = OrderStatuses::PLACE_ORDER_SUCCESS;
        $request = new SolutionOrderGet();
        $request->param0 = $query;

        /** @var \RetailCrm\Model\Response\AliExpress\SolutionOrderGetResponse $response */
        $response = $client->sendAuthenticatedRequest($request);
        $result = $response->responseData->result;

        self::assertTrue($result->success);
        self::assertEquals(1, $result->totalCount);
        self::assertCount(1, $result->targetList->orderDto);
        self::assertEquals(OrderStatuses::PLACE_ORDER_SUCCESS, $result->targetList->orderDto[0]->orderStatus);
        self::assertEquals(222222, $result->targetList->orderDto[0]->productList->orderProductDto[0]->orderId);
        self::assertEquals(
            OfflinePickupTypes::RU_OFFLINE_SELF_PICK_UP_EXPRESSION,
            $result->targetList->orderDto[0]->offlinePickupType
        );
    }

    public function testAliexpressSolutionOrderReceiptInfoGet()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_order_receiptinfo_get_response":{
        "result":{
            "country_name":"Russian Federation",
            "mobile_no":"4679974",
            "contact_person":"Mark",
            "phone_country":"04",
            "phone_area":"12345",
            "province":"Moscow",
            "address":"address 001",
            "phone_number":"88688435",
            "fax_number":"88688436",
            "detail_address":"center street No.99",
            "city":"Babenki",
            "country":"RU",
            "address2":"address 001",
            "fax_country":"400120",
            "zip":"400120",
            "fax_area":"203"
        }
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.order.receiptinfo.get',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $query = new SingleOrderQuery();
        $query->orderId = 1;
        $request = new SolutionOrderReceiptInfoGet();
        $request->param1 = $query;

        /** @var \RetailCrm\Model\Response\AliExpress\SolutionOrderReceiptInfoGetResponse $response */
        $response = $client->sendAuthenticatedRequest($request);

        self::assertNotNull($response->responseData);
        self::assertNotNull($response->responseData->result);

        foreach (array_keys(get_class_vars(get_class($response->responseData->result))) as $key) {
            self::assertNotEmpty($response->responseData->result->$key);
        }
    }

    public function testAliexpressLogisticsRedefiningListLogisticsService()
    {
        $json = <<<'EOF'
{
    "aliexpress_logistics_redefining_listlogisticsservice_response":{
        "result_list":{
            "aeop_logistics_service_result":[
                {
                    "recommend_order":11,
                    "tracking_no_regex":"^[a-zA-z]{2}[A-Za-z0-9]{9}[a-zA-z]{2}$",
                    "min_process_day":1,
                    "logistics_company":"CPAM",
                    "max_process_day":5,
                    "display_name":"China Post Registered Air Mail",
                    "service_name":"CPAM"
                }
            ]
        },
        "error_desc":"System error",
        "result_success":true
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.logistics.redefining.listlogisticsservice',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        /** @var \RetailCrm\Model\Response\AliExpress\LogisticsRedefiningListLogisticsServiceResponse $response */
        $response = $client->sendAuthenticatedRequest(new LogisticsRedefiningListLogisticsService());

        self::assertEquals(
            'China Post Registered Air Mail',
            $response->responseData->resultList->aeopLogisticsServiceResult[0]->displayName
        );
    }

    public function testAliexpressSolutionOrderFulfill()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_order_fulfill_response":{
        "result":{
            "result_success":true
        }
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.order.fulfill',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $request = new SolutionOrderFulfill();
        $request->serviceName = 'EMS';
        $request->trackingWebsite = 'www.17track.com';
        $request->outRef = '888877779999';
        $request->sendType = 'part';
        $request->description = 'memo';
        $request->logisticsNo = 'LA88887777CN';

        /** @var \RetailCrm\Model\Response\AliExpress\SolutionOrderFulfillResponse $response */
        $response = $client->sendAuthenticatedRequest($request);

        self::assertTrue($response->responseData->result->resultSuccess);
    }

    public function testAliexpressPostproductRedefiningFindAEProductByIdForDropshipper()
    {
        $json = <<<'EOF'
{
    "aliexpress_postproduct_redefining_findaeproductbyidfordropshipper_response":{
        "result":{
            "aeop_ae_product_s_k_us":{
                "aeop_ae_product_sku":[
                    {
                        "sku_stock":true,
                        "sku_price":"200.07",
                        "sku_code":"cfas00978",
                        "ipm_sku_stock":1234,
                        "id":"\"200000182:193;200007763:201336100\"",
                        "currency_code":"USD",
                        "aeop_s_k_u_propertys":{
                            "aeop_sku_property":[
                                {
                                    "sku_property_id":0,
                                    "sku_image":"0",
                                    "property_value_id_long":0,
                                    "property_value_definition_name":"0",
                                    "sku_property_value":"\"blue\"",
                                    "sku_property_name":"\"color\""
                                }
                            ]
                        },
                        "barcode":"320325455",
                        "offer_sale_price":"3.3",
                        "offer_bulk_sale_price":"3.2",
                        "sku_bulk_order":10,
                        "s_k_u_available_stock":10
                    }
                ]
            },
            "detail":"<div>This is a product<\/div>",
            "is_success":true,
            "product_unit":100000015,
            "ws_offline_date":"0",
            "ws_display":"expire_offline",
            "category_id":123456,
            "aeop_a_e_multimedia":{
                "aeop_a_e_videos":{
                    "aeop_ae_video":[
                        {
                            "poster_url":"http:\/\/img01.taobaocdn.com\/bao\/uploaded\/TB1rNdGIVXXXXbTXFXXXXXXXXXX.jpg",
                            "media_type":"video",
                            "media_status":"approved",
                            "media_id":12345678,
                            "ali_member_id":1006680305
                        }
                    ]
                }
            },
            "owner_member_id":"aliqatest01",
            "product_status_type":"onSelling",
            "aeop_ae_product_propertys":{
                "aeop_ae_product_property":[
                    {
                        "attr_value_unit":"piece",
                        "attr_value_start":"1",
                        "attr_value_id":100234,
                        "attr_value_end":"10",
                        "attr_value":"ABCD",
                        "attr_name_id":2981,
                        "attr_name":"型号"
                    }
                ]
            },
            "gross_weight":"40.12",
            "delivery_time":7,
            "ws_valid_num":30,
            "gmt_modified":"0",
            "error_message":"System exception",
            "package_type":true,
            "aeop_national_quote_configuration":{
                "configuration_type":"percentage",
                "configuration_data":"[{\"shiptoCountry\":\"US\",\"percentage\":\"5\"},{\"shiptoCountry\":\"RU\",\"percentage\":\"-2\"}]"
            },
            "subject":"knew odd",
            "base_unit":2,
            "package_length":10,
            "mobile_detail":"{}",
            "package_height":2,
            "package_width":12,
            "currency_code":"USD",
            "gmt_create":"0",
            "image_u_r_ls":"http:\/\/g01.a.alicdn.com\/kf\/HTB13GKLJXXXXXbYaXXXq6xXFXXXi.jpg;http:\/\/g02.a.alicdn.com\/kf\/HTB1DkaWJXXXXXb6XFXXq6xXFXXXp.jpg;http:\/\/g02.a.alicdn.com\/kf\/HTB1pMCQJXXXXXcvXVXXq6xXFXXXm.jpg;http:\/\/g03.a.alicdn.com\/kf\/HTB1QhORJXXXXXbiXVXXq6xXFXXXx.jpg;http:\/\/g02.a.alicdn.com\/kf\/HTB1q1aLJXXXXXcfaXXXq6xXFXXXv.jpg",
            "product_id":32839190109,
            "error_code":16009999,
            "product_price":"10.23",
            "item_offer_site_sale_price":"USD 5.5",
            "total_available_stock":12,
            "store_info":{
                "communication_rating":"4.8",
                "item_as_descriped_rating":"4.8",
                "shipping_speed_rating":"4.7",
                "store_id":12345,
                "store_name":"Clothes Store"
            },
            "evaluation_count":100,
            "avg_evaluation_rating":"4.7",
            "order_count":120
        }
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.postproduct.redefining.findaeproductbyidfordropshipper',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $request = new PostproductRedefiningFindAEProductByIdForDropshipper();
        $request->productId = 1;

        /** @var PostproductRedefiningFindAEProductByIdForDropshipperResponse $response */
        $response = $client->sendAuthenticatedRequest($request);

        self::assertEquals(
            'http://img01.taobaocdn.com/bao/uploaded/TB1rNdGIVXXXXbTXFXXXXXXXXXX.jpg',
            $response->responseData->result->aeopAeMultimedia->aeopAeVideos->aeopAeVideo[0]->posterUrl
        );
    }

    public function testAliexpressLogisticsDsTrackingInfoQuery()
    {
        $json = <<<'EOF'
{
    "aliexpress_logistics_ds_trackinginfo_query_response":{
        "details":{
            "details":[
                {
                    "event_desc":"BILLING INFORMATION RECEIVED",
                    "signed_name":"signedName",
                    "status":"status",
                    "address":"address",
                    "event_date":"2016-06-26"
                }
            ]
        },
        "official_website":"www.ems.com",
        "error_desc":"System error",
        "result_success":true
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.logistics.ds.trackinginfo.query',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        $request = new LogisticsDsTrackingInfoQuery();
        $request->logisticsNo = '20100810142400000-0700';
        $request->outRef = '1160045240183009';
        $request->serviceName = 'UPS';
        $request->toArea = DropshippingAreas::RUSSIAN_FEDERATION;

        /** @var \RetailCrm\Model\Response\AliExpress\LogisticsDsTrackingInfoQueryResponse $response */
        $response = $client->sendAuthenticatedRequest($request);

        self::assertEquals(
            'BILLING INFORMATION RECEIVED',
            $response->responseData->details->details[0]->eventDesc
        );
    }

    public function testAliexpressFeedSolutionStocksWorkflow()
    {
        $jsonFeedSubmitResponse = <<<'EOF'
{
    "aliexpress_solution_feed_submit_response":{
        "job_id":200000000060024475
    }
}
EOF;
        $jsonFeedQueryResponse = <<<'EOF'
{
    "aliexpress_solution_feed_query_response":{
        "job_id":200000000060024475,
        "success_item_count":1,
        "result_list":{
            "single_item_response_dto":[
                {
                    "item_execution_result":"{\"productId\":33030372006,\"success\":true}",
                    "item_content_id":"A00000000Y1"
                }
            ]
        },
        "total_item_count":1
    }
}
EOF;

        $requestSubmit                = new SolutionFeedSubmit();
        $requestSubmit->operationType = FeedOperationTypes::PRODUCT_STOCKS_UPDATE;
        $requestSubmit->itemList      = [];

        for ($i = 0; $i < 100; $i++) {
            $dto = new SingleItemRequestDto();
            $stocks = new FeedStocksUpdateDto();
            $stocks->aliexpressProductId = 1;
            $stocks->multipleSkuUpdateList = [];

            for ($j = 0; $j < 5; $j++) {
                $item = new SkuStocksUpdateItemDto();
                $item->skuCode = sha1(mt_rand());
                $item->inventory = mt_rand(1, 100);
                $stocks->multipleSkuUpdateList[] = $item;
            }

            $dto->itemContentId = sha1(mt_rand());
            $dto->itemContent = $stocks;

            $requestSubmit->itemList[] = $dto;
        }

        $requestQuery = new SolutionFeedQuery();
        $requestQuery->jobId = 200000000060024475;

        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.feed.submit',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $jsonFeedSubmitResponse)
        );
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.feed.query',
                    'session' => self::getEnvToken(),
                    'job_id' => 200000000060024475
                ]),
            $this->responseJson(200, $jsonFeedQueryResponse)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();

        /** @var \RetailCrm\Model\Response\AliExpress\SolutionFeedSubmitResponse $response */
        $responseSubmit = $client->sendAuthenticatedRequest($requestSubmit);

        self::assertEquals('200000000060024475', $responseSubmit->responseData->jobId);

        /** @var \RetailCrm\Model\Response\AliExpress\SolutionFeedQueryResponse $responseQuery */
        $responseQuery = $client->sendAuthenticatedRequest($requestQuery);

        self::assertEquals(200000000060024475, $responseQuery->responseData->jobId);
        self::assertEquals(1, $responseQuery->responseData->successItemCount);
        self::assertNotNull($responseQuery->responseData->resultList);
        self::assertNotNull($responseQuery->responseData->resultList->singleItemResponseDto);
        self::assertCount(1, $responseQuery->responseData->resultList->singleItemResponseDto);
    }

    public function testAliexpressSolutionMerchantProfileGet()
    {
        $json = <<<'EOF'
{
    "aliexpress_solution_merchant_profile_get_response":{
        "country_code":"ES",
        "product_posting_forbidden":false,
        "merchant_login_id":"es1329072766xyzq",
        "shop_id":1234321,
        "shop_name":"test store",
        "shop_type":"official",
        "shop_url":"\/\/www.aliexpress.com\/store\/1234321"
    }
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('api.taobao.com')
                ->setPath('/router/rest')
                ->setOptionalPostFields([
                    'app_key' => self::getEnvAppKey(),
                    'method' => 'aliexpress.solution.merchant.profile.get',
                    'session' => self::getEnvToken()
                ]),
            $this->responseJson(200, $json)
        );
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build();
        /** @var \RetailCrm\Model\Response\AliExpress\SolutionMerchantProfileGetResponse $response */
        $response = $client->sendAuthenticatedRequest(new SolutionMerchantProfileGet());

        self::assertEquals('ES', $response->responseData->countryCode);
        self::assertEquals(false, $response->responseData->productPostingForbidden);
        self::assertEquals('es1329072766xyzq', $response->responseData->merchantLoginId);
        self::assertEquals(1234321, $response->responseData->shopId);
        self::assertEquals('test store', $response->responseData->shopName);
        self::assertEquals('official', $response->responseData->shopType);
        self::assertEquals('//www.aliexpress.com/store/1234321', $response->responseData->shopUrl);
    }
}
