<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Webmasters (v3).
 *
 * <p>
 * Lets you view Google Webmaster Tools data for your verified sites.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/webmaster-tools/v3/welcome" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Webmasters extends Google_Service
{
  /** View and modify Webmaster Tools data for your verified sites. */
  const WEBMASTERS =
      "https://www.googleapis.com/auth/webmasters";
  /** View Webmaster Tools data for your verified sites. */
  const WEBMASTERS_READONLY =
      "https://www.googleapis.com/auth/webmasters.readonly";

  public $sitemaps;
  public $sites;
  public $urlcrawlerrorscounts;
  public $urlcrawlerrorssamples;
  

  /**
   * Constructs the internal representation of the Webmasters service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'webmasters/v3/';
    $this->version = 'v3';
    $this->serviceName = 'webmasters';

    $this->sitemaps = new Google_Service_Webmasters_Sitemaps_Resource(
        $this,
        $this->serviceName,
        'sitemaps',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedpath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedpath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'sites/{siteUrl}/sitemaps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sitemapIndex' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'submit' => array(
              'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedpath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->sites = new Google_Service_Webmasters_Sites_Resource(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'add' => array(
              'path' => 'sites/{siteUrl}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'sites/{siteUrl}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'sites/{siteUrl}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'sites',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->urlcrawlerrorscounts = new Google_Service_Webmasters_Urlcrawlerrorscounts_Resource(
        $this,
        $this->serviceName,
        'urlcrawlerrorscounts',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'sites/{siteUrl}/urlCrawlErrorsCounts/query',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'category' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'latestCountsOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->urlcrawlerrorssamples = new Google_Service_Webmasters_Urlcrawlerrorssamples_Resource(
        $this,
        $this->serviceName,
        'urlcrawlerrorssamples',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'sites/{siteUrl}/urlCrawlErrorsSamples/{url}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'url' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'category' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'sites/{siteUrl}/urlCrawlErrorsSamples',
              'httpMethod' => 'GET',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'category' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'markAsFixed' => array(
              'path' => 'sites/{siteUrl}/urlCrawlErrorsSamples/{url}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'siteUrl' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'url' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'category' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "sitemaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $sitemaps = $webmastersService->sitemaps;
 *  </code>
 */
class Google_Service_Webmasters_Sitemaps_Resource extends Google_Service_Resource
{

  /**
   * Deletes a sitemap from this site. (sitemaps.delete)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param string $feedpath The URL of the actual sitemap (for example
   * http://www.example.com/sitemap.xml).
   * @param array $optParams optionnel parameters.
   */
  public function delete($siteUrl, $feedpath, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'feedpath' => $feedpath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Retrieves information about a specific sitemap. (sitemaps.get)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param string $feedpath The URL of the actual sitemap (for example
   * http://www.example.com/sitemap.xml).
   * @param array $optParams optionnel parameters.
   * @return Google_Service_Webmasters_WmxSitemap
   */
  public function get($siteUrl, $feedpath, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'feedpath' => $feedpath);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Webmasters_WmxSitemap");
  }

  /**
   * Lists sitemaps uploaded to the site. (sitemaps.listSitemaps)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param array $optParams optionnel parameters.
   *
   * @opt_param string sitemapIndex A URL of a site's sitemap index.
   * @return Google_Service_Webmasters_SitemapsListResponse
   */
  public function listSitemaps($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Webmasters_SitemapsListResponse");
  }

  /**
   * Submits a sitemap for a site. (sitemaps.submit)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param string $feedpath The URL of the sitemap to add.
   * @param array $optParams optionnel parameters.
   */
  public function submit($siteUrl, $feedpath, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'feedpath' => $feedpath);
    $params = array_merge($params, $optParams);
    return $this->call('submit', array($params));
  }
}

/**
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $sites = $webmastersService->sites;
 *  </code>
 */
class Google_Service_Webmasters_Sites_Resource extends Google_Service_Resource
{

  /**
   * Adds a site to the set of the user's sites in Webmaster Tools. (sites.add)
   *
   * @param string $siteUrl The URL of the site to add.
   * @param array $optParams optionnel parameters.
   */
  public function add($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('add', array($params));
  }

  /**
   * Removes a site from the set of the user's Webmaster Tools sites.
   * (sites.delete)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param array $optParams optionnel parameters.
   */
  public function delete($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }

  /**
   * Retrieves information about specific site. (sites.get)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param array $optParams optionnel parameters.
   * @return Google_Service_Webmasters_WmxSite
   */
  public function get($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Webmasters_WmxSite");
  }

  /**
   * Lists your Webmaster Tools sites. (sites.listSites)
   *
   * @param array $optParams optionnel parameters.
   * @return Google_Service_Webmasters_SitesListResponse
   */
  public function listSites($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Webmasters_SitesListResponse");
  }
}

/**
 * The "urlcrawlerrorscounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $urlcrawlerrorscounts = $webmastersService->urlcrawlerrorscounts;
 *  </code>
 */
class Google_Service_Webmasters_Urlcrawlerrorscounts_Resource extends Google_Service_Resource
{

  /**
   * Retrieves a time series of the number of URL crawl errors per error category
   * and platform. (urlcrawlerrorscounts.query)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param array $optParams optionnel parameters.
   *
   * @opt_param string category The crawl error category, for example
   * 'serverError'. If not specified, we return results for all categories.
   * @opt_param string platform The user agent type (platform) that made the
   * request, for example 'web'. If not specified, we return results for all
   * platforms.
   * @opt_param bool latestCountsOnly If true, returns only the latest crawl error
   * counts.
   * @return Google_Service_Webmasters_UrlCrawlErrorsCountsQueryResponse
   */
  public function query($siteUrl, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl);
    $params = array_merge($params, $optParams);
    return $this->call('query', array($params), "Google_Service_Webmasters_UrlCrawlErrorsCountsQueryResponse");
  }
}

/**
 * The "urlcrawlerrorssamples" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $urlcrawlerrorssamples = $webmastersService->urlcrawlerrorssamples;
 *  </code>
 */
class Google_Service_Webmasters_Urlcrawlerrorssamples_Resource extends Google_Service_Resource
{

  /**
   * Retrieves details about crawl errors for a site's sample URL.
   * (urlcrawlerrorssamples.get)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param string $url The relative path (without the site) of the sample URL;
   * must be one of the URLs returned by list
   * @param string $category The crawl error category, for example
   * 'authPermissions'
   * @param string $platform The user agent type (platform) that made the request,
   * for example 'web'
   * @param array $optParams optionnel parameters.
   * @return Google_Service_Webmasters_UrlCrawlErrorsSample
   */
  public function get($siteUrl, $url, $category, $platform, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'url' => $url, 'category' => $category, 'platform' => $platform);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Webmasters_UrlCrawlErrorsSample");
  }

  /**
   * Lists a site's sample URLs for the specified crawl error category and
   * platform. (urlcrawlerrorssamples.listUrlcrawlerrorssamples)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param string $category The crawl error category, for example
   * 'authPermissions'
   * @param string $platform The user agent type (platform) that made the request,
   * for example 'web'
   * @param array $optParams optionnel parameters.
   * @return Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse
   */
  public function listUrlcrawlerrorssamples($siteUrl, $category, $platform, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'category' => $category, 'platform' => $platform);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse");
  }

  /**
   * Marks the provided site's sample URL as fixed, and removes it from the
   * samples list. (urlcrawlerrorssamples.markAsFixed)
   *
   * @param string $siteUrl The site's URL, including protocol, for example
   * 'http://www.example.com/'
   * @param string $url The relative path (without the site) of the sample URL;
   * must be one of the URLs returned by list
   * @param string $category The crawl error category, for example
   * 'authPermissions'
   * @param string $platform The user agent type (platform) that made the request,
   * for example 'web'
   * @param array $optParams optionnel parameters.
   */
  public function markAsFixed($siteUrl, $url, $category, $platform, $optParams = array())
  {
    $params = array('siteUrl' => $siteUrl, 'url' => $url, 'category' => $category, 'platform' => $platform);
    $params = array_merge($params, $optParams);
    return $this->call('markAsFixed', array($params));
  }
}




class Google_Service_Webmasters_SitemapsListResponse extends Google_Collection
{
  protected $collection_key = 'sitemap';
  protected $internal_gapi_mappings = array(
  );
  protected $sitemapType = 'Google_Service_Webmasters_WmxSitemap';
  protected $sitemapDataType = 'array';


  public function setSitemap($sitemap)
  {
    $this->sitemap = $sitemap;
  }
  public function getSitemap()
  {
    return $this->sitemap;
  }
}

class Google_Service_Webmasters_SitesListResponse extends Google_Collection
{
  protected $collection_key = 'siteEntry';
  protected $internal_gapi_mappings = array(
  );
  protected $siteEntryType = 'Google_Service_Webmasters_WmxSite';
  protected $siteEntryDataType = 'array';


  public function setSiteEntry($siteEntry)
  {
    $this->siteEntry = $siteEntry;
  }
  public function getSiteEntry()
  {
    return $this->siteEntry;
  }
}

class Google_Service_Webmasters_UrlCrawlErrorCount extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $count;
  public $timestamp;


  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

class Google_Service_Webmasters_UrlCrawlErrorCountsPerType extends Google_Collection
{
  protected $collection_key = 'entries';
  protected $internal_gapi_mappings = array(
  );
  public $category;
  protected $entriesType = 'Google_Service_Webmasters_UrlCrawlErrorCount';
  protected $entriesDataType = 'array';
  public $platform;


  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  public function getEntries()
  {
    return $this->entries;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
}

class Google_Service_Webmasters_UrlCrawlErrorsCountsQueryResponse extends Google_Collection
{
  protected $collection_key = 'countPerTypes';
  protected $internal_gapi_mappings = array(
  );
  protected $countPerTypesType = 'Google_Service_Webmasters_UrlCrawlErrorCountsPerType';
  protected $countPerTypesDataType = 'array';


  public function setCountPerTypes($countPerTypes)
  {
    $this->countPerTypes = $countPerTypes;
  }
  public function getCountPerTypes()
  {
    return $this->countPerTypes;
  }
}

class Google_Service_Webmasters_UrlCrawlErrorsSample extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "firstDetected" => "first_detected",
        "lastCrawled" => "last_crawled",
  );
  public $firstDetected;
  public $lastCrawled;
  public $pageUrl;
  public $responseCode;
  protected $urlDetailsType = 'Google_Service_Webmasters_UrlSampleDetails';
  protected $urlDetailsDataType = '';


  public function setFirstDetected($firstDetected)
  {
    $this->firstDetected = $firstDetected;
  }
  public function getFirstDetected()
  {
    return $this->firstDetected;
  }
  public function setLastCrawled($lastCrawled)
  {
    $this->lastCrawled = $lastCrawled;
  }
  public function getLastCrawled()
  {
    return $this->lastCrawled;
  }
  public function setPageUrl($pageUrl)
  {
    $this->pageUrl = $pageUrl;
  }
  public function getPageUrl()
  {
    return $this->pageUrl;
  }
  public function setResponseCode($responseCode)
  {
    $this->responseCode = $responseCode;
  }
  public function getResponseCode()
  {
    return $this->responseCode;
  }
  public function setUrlDetails(Google_Service_Webmasters_UrlSampleDetails $urlDetails)
  {
    $this->urlDetails = $urlDetails;
  }
  public function getUrlDetails()
  {
    return $this->urlDetails;
  }
}

class Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse extends Google_Collection
{
  protected $collection_key = 'urlCrawlErrorSample';
  protected $internal_gapi_mappings = array(
  );
  protected $urlCrawlErrorSampleType = 'Google_Service_Webmasters_UrlCrawlErrorsSample';
  protected $urlCrawlErrorSampleDataType = 'array';


  public function setUrlCrawlErrorSample($urlCrawlErrorSample)
  {
    $this->urlCrawlErrorSample = $urlCrawlErrorSample;
  }
  public function getUrlCrawlErrorSample()
  {
    return $this->urlCrawlErrorSample;
  }
}

class Google_Service_Webmasters_UrlSampleDetails extends Google_Collection
{
  protected $collection_key = 'linkedFromUrls';
  protected $internal_gapi_mappings = array(
  );
  public $containingSitemaps;
  public $linkedFromUrls;


  public function setContainingSitemaps($containingSitemaps)
  {
    $this->containingSitemaps = $containingSitemaps;
  }
  public function getContainingSitemaps()
  {
    return $this->containingSitemaps;
  }
  public function setLinkedFromUrls($linkedFromUrls)
  {
    $this->linkedFromUrls = $linkedFromUrls;
  }
  public function getLinkedFromUrls()
  {
    return $this->linkedFromUrls;
  }
}

class Google_Service_Webmasters_WmxSite extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $permissionLevel;
  public $siteUrl;


  public function setPermissionLevel($permissionLevel)
  {
    $this->permissionLevel = $permissionLevel;
  }
  public function getPermissionLevel()
  {
    return $this->permissionLevel;
  }
  public function setSiteUrl($siteUrl)
  {
    $this->siteUrl = $siteUrl;
  }
  public function getSiteUrl()
  {
    return $this->siteUrl;
  }
}

class Google_Service_Webmasters_WmxSitemap extends Google_Collection
{
  protected $collection_key = 'contents';
  protected $internal_gapi_mappings = array(
  );
  protected $contentsType = 'Google_Service_Webmasters_WmxSitemapContent';
  protected $contentsDataType = 'array';
  public $errors;
  public $isPending;
  public $isSitemapsIndex;
  public $lastDownloaded;
  public $lastSubmitted;
  public $path;
  public $type;
  public $warnings;


  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  public function getContents()
  {
    return $this->contents;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  public function setIsPending($isPending)
  {
    $this->isPending = $isPending;
  }
  public function getIsPending()
  {
    return $this->isPending;
  }
  public function setIsSitemapsIndex($isSitemapsIndex)
  {
    $this->isSitemapsIndex = $isSitemapsIndex;
  }
  public function getIsSitemapsIndex()
  {
    return $this->isSitemapsIndex;
  }
  public function setLastDownloaded($lastDownloaded)
  {
    $this->lastDownloaded = $lastDownloaded;
  }
  public function getLastDownloaded()
  {
    return $this->lastDownloaded;
  }
  public function setLastSubmitted($lastSubmitted)
  {
    $this->lastSubmitted = $lastSubmitted;
  }
  public function getLastSubmitted()
  {
    return $this->lastSubmitted;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}

class Google_Service_Webmasters_WmxSitemapContent extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $indexed;
  public $submitted;
  public $type;


  public function setIndexed($indexed)
  {
    $this->indexed = $indexed;
  }
  public function getIndexed()
  {
    return $this->indexed;
  }
  public function setSubmitted($submitted)
  {
    $this->submitted = $submitted;
  }
  public function getSubmitted()
  {
    return $this->submitted;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
