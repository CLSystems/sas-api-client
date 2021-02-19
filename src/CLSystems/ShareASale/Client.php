<?php

namespace CLSystems\ShareASale;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
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

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function activity($options = []) : array
	{
		$serviceMethod = 'activity';
		$xmlRecordTag = 'activitydetailsrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function activitySummary($options = []) : array
	{
		$serviceMethod = 'activitySummary';
		$xmlRecordTag = 'activitysummaryreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantTimespan($options = []) : array
	{
		$serviceMethod = 'merchantTimespan';
		$xmlRecordTag = 'merchanttimespanrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function dailyActivity($options = []) : array
	{
		$serviceMethod = 'dailyActivity';
		$xmlRecordTag = 'dailyActivity';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function monthlySummary($options = []) : array
	{
		$serviceMethod = 'monthlySummary';
		$xmlRecordTag = 'monthlysummaryrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function voidtrail($options = []) : array
	{
		$serviceMethod = 'voidtrail';
		$xmlRecordTag = 'voidtrailrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function traffic($options = []) : array
	{
		$serviceMethod = 'traffic';
		$xmlRecordTag = 'trafficreport';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function apitokencount($options = []) : array
	{
		$serviceMethod = 'apitokencount';
		$xmlRecordTag = 'apitokencount';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function getProducts($options = []) : array
	{
		$serviceMethod = 'getProducts';
		$xmlRecordTag = 'getProductsrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function invalidLinks($options = []) : array
	{
		$serviceMethod = 'invalidLinks';
		$xmlRecordTag = 'invalidlinksrecords';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function orderInquiry($options = []) : array
	{
		$serviceMethod = 'orderInquiry';
		$xmlRecordTag = 'orderInquiry';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantDataFeeds($options = []) : array
	{
		$serviceMethod = 'merchantDataFeeds';
		$xmlRecordTag = 'datafeedlistreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function couponDeals($options = []) : array
	{
		$serviceMethod = 'couponDeals';
		$xmlRecordTag = 'dealcouponlistreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantStatus($options = []) : array
	{
		$serviceMethod = 'merchantStatus';
		$xmlRecordTag = 'merchantstatusreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantCreative($options = []) : array
	{
		$serviceMethod = 'merchantCreative';
		$xmlRecordTag = 'getlinksreportrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantGiftCard($options = []) : array
	{
		$serviceMethod = 'merchantGiftCard';
		$xmlRecordTag = 'merchantGiftCard';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function edittrail($options = []) : array
	{
		$serviceMethod = 'edittrail';
		$xmlRecordTag = 'merchantGiftCard';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function paymentSummary($options = []) : array
	{
		$serviceMethod = 'paymentSummary';
		$xmlRecordTag = 'paymentSummary';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantInfo($options = []) : array
	{
		$serviceMethod = 'merchantInfo';
		$xmlRecordTag = 'merchantInforecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantSearch($options = []) : array
	{
		$serviceMethod = 'merchantSearch';
		$xmlRecordTag = 'merchantSearchrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function merchantSearchProduct($options = []) : array
	{
		$serviceMethod = 'merchantSearchProduct';
		$xmlRecordTag = 'merchantSearchByProductrecord';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param int $merchantId
	 * @return string
	 * @throws Exception
	 */
	public function getMerchantDescription(int $merchantId) : string
	{
		$ch = curl_init('https://account.shareasale.com/shareASale_b.cfm?merchantId=' . $merchantId . '&storeId=0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if (200 !== $info['http_code'])
		{
			throw new Exception('Error fetching merchant description: ' . var_export([$result, $info], true));
		}

		$return = '';
		$dom = new \DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML(str_replace("\n", '', $result));
		foreach ($dom->getElementsByTagName('body') as $node)
		{
			$return .= $dom->saveHtml($node);
		}

		return $return;
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function ledger($options = []) : array
	{
		$serviceMethod = 'ledger';
		$xmlRecordTag = 'ledger';
		return $this->callServiceMethod($serviceMethod, $xmlRecordTag, $options);
	}

	/**
	 * @param array $options
	 * @return array|array[]|\array[][]
	 * @throws GuzzleException
	 */
	public function balance($options = []) : array
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
	public function callServiceMethod($serviceMethod, $xmlRecordTag, $options = []) : array
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
	protected function getDefaultArguments() : array
	{
		if (
			!$this->getVersion()
			|| !$this->getAffiliateId()
			|| !$this->getToken()
		)
		{
			throw new Exception('Required Parameter is not set');
		}

		return [
			'version'     => $this->getVersion(),
			'affiliateId' => $this->getAffiliateId(),
			'token'       => $this->getToken(),
			'XMLFormat'   => 1,
			'format'      => 'xml',
		];

	}

	/**
	 * @param Response $httpResponse
	 * @param $xmlRecordTag
	 * @return array|array[]|\array[][]
	 */
	protected function responseToRecords(Response $httpResponse, $xmlRecordTag) : array
	{
		// parse response body
		$xml = simplexml_load_string($httpResponse->getBody()->getContents());
		if (false === $xml)
		{
			foreach (libxml_get_errors() as $error)
			{
				echo "\t", $error->message . PHP_EOL;
			}
		}
		$records = [];
		if ($xml instanceof SimpleXMLElement)
		{
			// convert xml to an array
			$arr = @json_decode(@json_encode($xml), true);
			if (isset($arr[$xmlRecordTag]))
			{
				$records = $arr[$xmlRecordTag];
			}
			// normalize the result array if we have a single result
			if (is_array($arr) && !array_key_exists(0, $records))
			{
				$records = [$arr];
			}

			if (!is_array($records))
			{
				$records = [$records];
			}

			if (1 === count($records))
			{
				$records = reset($records);
			}
		}
		else
		{
			echo "FALSE ELSE" . PHP_EOL;
			foreach (libxml_get_errors() as $error)
			{
				echo "\t", $error->message . PHP_EOL;
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
		)
		{
			throw new Exception('Required Parameter is not set');
		}

		try
		{
			$client = new GuzzleClient([
				'base_uri' => $this->getServiceUrl(),
			]);

			$myTimeStamp = gmdate(DATE_RFC1123);
			$sig = $this->getToken() . ':' . $myTimeStamp . ':' . $actionVerb . ':' . $this->getSecretKey();
			$sigHash = hash("sha256", $sig);

			$httpResponse = $client->request('GET', '/x.cfm', [
					'query'   => $query,
					'headers' => [
						'x-ShareASale-Date'           => $myTimeStamp,
						'x-ShareASale-Authentication' => $sigHash,
					],
				]
			);

			if (!$httpResponse instanceof Response)
			{
				throw new Exception('Expected instance of GuzzleHttp\Psr7\Response not received');
			}

			if (!$httpResponse->getBody() instanceof Stream)
			{
				throw new Exception('Expected instance of GuzzleHttp\Psr7\Stream not received');
			}

			if ($httpResponse->getReasonPhrase() != 'OK')
			{
				throw new Exception('Expected response not received. Response details: ' . $httpResponse->getBody()->getContents());
			}

//			if (false !== stristr($httpResponse->getBody()->getContents(), 'invalid permission'))
//			{
//				echo $httpResponse->getBody()->getContents();
//			}

			return $httpResponse;

		}
		catch (RequestException $zhce)
		{
			$message = 'Error in request to Web service: ' . $zhce->getMessage();
			throw new Exception($message, $zhce->getCode());
		}

	}

	/**
	 * @return string
	 */
	public function getServiceUrl() : string
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
	public function getVersion() : string
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
	public function getAffiliateId() : int
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
	public function getToken() : string
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
	public function getSecretKey() : string
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