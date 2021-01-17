<?php

namespace CLSystems\ShareASale;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\ResponseInterface;
use SimpleXMLElement;

/**
 * Class Client
 *
 * @package CLSystems\ShareASale
 */
class Client
{
	/**
	 * @var string
	 */
	protected $serviceUrl;

	/**
	 * @var string
	 */
	protected $version;

	/**
	 * @var string
	 */
	protected $affiliateId;

	/**
	 * @var string
	 */
	protected $token;

	/**
	 * @var string
	 */
	protected $secretKey;

	public function activity($options = array())
	{
		$serviceMethod = 'activity';
		$xmlRecordTag = 'activitydetailsrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function activitySummary($options = array())
	{
		$serviceMethod = 'activitySummary';
		$xmlRecordTag = 'activitysummaryreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantTimespan($options = array())
	{
		$serviceMethod = 'merchantTimespan';
		$xmlRecordTag = 'merchanttimespanrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function dailyActivity($options = array())
	{
		$serviceMethod = 'dailyActivity';
		$xmlRecordTag = 'dailyActivity';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function monthlySummary($options = array())
	{
		$serviceMethod = 'monthlySummary';
		$xmlRecordTag = 'monthlysummaryrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}


	public function voidtrail($options = array())
	{
		$serviceMethod = 'voidtrail';
		$xmlRecordTag = 'voidtrailrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function traffic($options = array())
	{
		$serviceMethod = 'traffic';
		$xmlRecordTag = 'trafficreport';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function apitokencount($options = array())
	{
		$serviceMethod = 'apitokencount';
		$xmlRecordTag = 'apitokencountrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function getProducts($options = array())
	{
		$serviceMethod = 'getProducts';
		$xmlRecordTag = 'getProductsrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function invalidLinks($options = array())
	{
		$serviceMethod = 'invalidLinks';
		$xmlRecordTag = 'invalidlinksrecords';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function orderInquiry($options = array())
	{
		$serviceMethod = 'orderInquiry';
		$xmlRecordTag = 'orderInquiry';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantDataFeeds($options = array())
	{
		$serviceMethod = 'merchantDataFeeds';
		$xmlRecordTag = 'datafeedlistreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function couponDeals($options = array())
	{
		$serviceMethod = 'couponDeals';
		$xmlRecordTag = 'dealcouponlistreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantStatus($options = array())
	{
		$serviceMethod = 'merchantStatus';
		$xmlRecordTag = 'merchantstatusreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantCreative($options = array())
	{
		$serviceMethod = 'merchantCreative';
		$xmlRecordTag = 'getlinksreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantGiftCard($options = array())
	{
		$serviceMethod = 'merchantGiftCard';
		$xmlRecordTag = 'merchantGiftCard';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function edittrail($options = array())
	{
		$serviceMethod = 'edittrail';
		$xmlRecordTag = 'merchantGiftCard';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function paymentSummary($options = array())
	{
		$serviceMethod = 'paymentSummary';
		$xmlRecordTag = 'paymentSummary';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantSearch($options = array())
	{
		$serviceMethod = 'merchantSearch';
		$xmlRecordTag = 'merchantSearchrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function merchantSearchProduct($options = array())
	{
		$serviceMethod = 'merchantSearchProduct';
		$xmlRecordTag = 'merchantSearchByProductrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function ledger($options = array())
	{
		$serviceMethod = 'ledger';
		$xmlRecordTag = 'ledger';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	public function balance($options = array())
	{
		$serviceMethod = 'balance';
		$xmlRecordTag = 'balance';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param $serviceMethod
	 * @param $xmlRecordTag
	 * @param array $options
	 * @return array
	 * @throws GuzzleException
	 */
	public function callServiceMethod($serviceMethod, $xmlRecordTag, $options = []): array
	{
		$parameters = array_merge($this->getDefaultArguments(), ['action' => $serviceMethod]);
		$parameters = array_merge($parameters, $options);

		$httpResponse = $this->apiCall($serviceMethod, $parameters);

		return $this->responseToRecords($httpResponse, $xmlRecordTag);
	}

	/**
	 * @return array
	 * @throws Exception
	 */
	protected function getDefaultArguments(): array
	{
		if (
			!$this->getVersion()
			|| !$this->getAffiliateId()
			|| !$this->getToken()
		) {
			throw new Exception('Required Parameter is not set');
		}

		return array(
			'version' => $this->getVersion(),
			'affiliateId' => $this->getAffiliateId(),
			'token' => $this->getToken(),
			'XMLFormat' => 1,
			'format' => 'xml'
		);

	}

	protected function responseToRecords(Response $httpResponse, $xmlRecordTag)
	{
		// parse response body
		$xml = simplexml_load_string($httpResponse->getBody()->getContents());

		$records = array();
		if ($xml instanceof SimpleXMLElement) {

			// convert xml to an array
			$arr = @json_decode(@json_encode($xml), true);

			if (isset($arr[$xmlRecordTag])) {
				$records = $arr[$xmlRecordTag];
			}

			// normalize the result array if we have a single result
			if (is_array($records) && !array_key_exists(0, $records)) {
				$records = array(
					$records
				);
			}
		}

		return $records;
	}

	/**
	 * @param string $actionVerb
	 * @param array $query
	 * @return Response|ResponseInterface
	 * @throws GuzzleException
	 * @throws Exception
	 */
	public function apiCall(string $actionVerb, array $query = [])
	{
		if (
			!$this->getToken()
			|| !$this->getSecretKey()
			|| !$this->getServiceUrl()
		) {
			throw new Exception('Required Parameter is not set');
		}

		try {

			$client = new GuzzleClient([
				'base_uri' => $this->getServiceUrl(),
			]);

			$myTimeStamp = gmdate(DATE_RFC1123);
			$sig = $this->getToken() . ':' . $myTimeStamp . ':' . $actionVerb . ':' . $this->getSecretKey();
			$sigHash = hash("sha256", $sig);


			$httpResponse = $client->request('GET', '/x.cfm', array(
					'query' => $query,
					'headers' => array(
						'x-ShareASale-Date' => $myTimeStamp,
						'x-ShareASale-Authentication' => $sigHash
					)
				)
			);

			if (!$httpResponse instanceof Response) {
				throw new Exception('Expected instance of GuzzleHttp\Psr7\Response not received');
			}

			if (!$httpResponse->getBody() instanceof Stream) {
				throw new Exception('Expected instance of GuzzleHttp\Psr7\Stream not received');
			}

			if ($httpResponse->getReasonPhrase() != 'OK') {
				throw new Exception('Expected response not received. Response details: ' . $httpResponse->getBody()->getContents());
			}

			return $httpResponse;

		} catch (RequestException $zhce) {
			$message = 'Error in request to Web service: ' . $zhce->getMessage();
			throw new Exception($message, $zhce->getCode());
		}

	}

	/**
	 * @return string
	 */
	public function getServiceUrl(): string
	{
		return $this->serviceUrl;
	}

	/**
	 * @param string $serviceUrl
	 * @return void
	 */
	public function setServiceUrl(string $serviceUrl)
	{
		$this->serviceUrl = $serviceUrl;
	}

	/**
	 * @return string
	 */
	public function getVersion(): string
	{
		return $this->version;
	}

	/**
	 * @param string $version
	 * @return void
	 */
	public function setVersion(string $version)
	{
		$this->version = $version;
	}

	/**
	 * @return int
	 */
	public function getAffiliateId(): int
	{
		return $this->affiliateId;
	}

	/**
	 * @param int $affiliateId
	 * @return void
	 */
	public function setAffiliateId(int $affiliateId)
	{
		$this->affiliateId = $affiliateId;
	}

	/**
	 * @return string
	 */
	public function getToken(): string
	{
		return $this->token;
	}

	/**
	 * @param string $token
	 * @return void
	 */
	public function setToken(string $token)
	{
		$this->token = $token;
	}

	/**
	 * @return string
	 */
	public function getSecretKey(): string
	{
		return $this->secretKey;
	}

	/**
	 * @param string $secretKey
	 * @return void
	 */
	public function setSecretKey(string $secretKey)
	{
		$this->secretKey = $secretKey;
	}

}