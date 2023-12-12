<?php

namespace Katznicho\UgandaDataLib;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UgandaData
{
    private static $baseurl = "https://uganda.rapharm.shop/api/uganda/data/v1";
    private static $apiKey;
    private static $headers;

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
        self::$headers = [
            'X-API-KEY' => self::$apiKey,
            'Authorization' => 'Bearer ' . self::$apiKey,
            'X-Requested-With' => 'XMLHttpRequest',
        ];
    }

    private static function fetchData($url)
    {
        try {
            $client = new Client();
            $response = $client->get($url, ['headers' => self::$headers]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $error) {
            throw new \Exception("Error fetching data: " . $error->getMessage());
        }
    }

    public static function fetchDistricts($limit = 100, $page = 1, $sortOrder = "asc")
    {
        $url = self::$baseurl . "/districts?limit={$limit}&page={$page}&sort_order={$sortOrder}";
        return self::fetchData($url);
    }

    public static function fetchDistrict($uuid)
    {
        $url = self::$baseurl . "/district/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchDistrictCounty($uuid)
    {
        $url = self::$baseurl . "/county/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchDistrictSubcounty($uuid)
    {
        $url = self::$baseurl . "/subcounty/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchDistrictParish($uuid)
    {
        $url = self::$baseurl . "/parish/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchDistrictVillage($uuid)
    {
        $url = self::$baseurl . "/village/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchCounties($limit = 100, $page = 1, $sortOrder = "asc")
    {
        $url = self::$baseurl . "/counties?limit={$limit}&page={$page}&sort_order={$sortOrder}";
        return self::fetchData($url);
    }

    public static function fetchCountySubcounty($uuid)
    {
        $url = self::$baseurl . "/subcounties/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchCountyParish($uuid)
    {
        $url = self::$baseurl . "/parishes/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchCountyVillage($uuid)
    {
        $url = self::$baseurl . "/villages/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchSubcounties($limit = 100, $page = 1, $sortOrder = "asc")
    {
        $url = self::$baseurl . "/subcounties?limit={$limit}&page={$page}&sort_order={$sortOrder}";
        return self::fetchData($url);
    }

    public static function fetchSubcountyParish($uuid)
    {
        $url = self::$baseurl . "/parishes/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchSubcountyVillage($uuid)
    {
        $url = self::$baseurl . "/villages/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchParishes($limit = 100, $page = 1, $sortOrder = "asc")
    {
        $url = self::$baseurl . "/parishes?limit={$limit}&page={$page}&sort_order={$sortOrder}";
        return self::fetchData($url);
    }

    public static function fetchParish($uuid)
    {
        $url = self::$baseurl . "/parish/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchParishVillage($uuid)
    {
        $url = self::$baseurl . "/villages/{$uuid}";
        return self::fetchData($url);
    }

    public static function fetchVillages($limit = 100, $page = 1, $sortOrder = "asc")
    {
        $url = self::$baseurl . "/villages?limit={$limit}&page={$page}&sort_order={$sortOrder}";
        return self::fetchData($url);
    }

    public static function fetchVillage($uuid)
    {
        $url = self::$baseurl . "/village/{$uuid}";
        return self::fetchData($url);
    }
}

?>
