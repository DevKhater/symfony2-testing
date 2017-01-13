<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/ng')) {
            // ng_login
            if (rtrim($pathinfo, '/') === '/ng') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ng_login');
                }

                return array (  '_controller' => 'AngularBundle\\Controller\\DefaultController::indexAction',  '_route' => 'ng_login',);
            }

            // ng_get_user
            if ($pathinfo === '/ng/getUser') {
                return array (  '_controller' => 'AngularBundle\\Controller\\DefaultController::getUserAction',  '_route' => 'ng_get_user',);
            }

        }

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/band')) {
                if (0 === strpos($pathinfo, '/api/bands')) {
                    // api_bands_list
                    if ($pathinfo === '/api/bands') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_bands_list;
                        }

                        return array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::getBandsAction',  '_route' => 'api_bands_list',);
                    }
                    not_api_bands_list:

                    // api_band_show
                    if (preg_match('#^/api/bands/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_band_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_band_show')), array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::showBandAction',));
                    }
                    not_api_band_show:

                }

                // api_band_genres
                if ($pathinfo === '/api/band/genres') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_band_genres;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::getGenresAction',  '_route' => 'api_band_genres',);
                }
                not_api_band_genres:

                // api_band_create
                if ($pathinfo === '/api/band/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_band_create;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::postBandAction',  '_route' => 'api_band_create',);
                }
                not_api_band_create:

                // api_band_update
                if ($pathinfo === '/api/band/') {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_api_band_update;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::putBandAction',  '_route' => 'api_band_update',);
                }
                not_api_band_update:

                // api_band_delete
                if (preg_match('#^/api/band/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_band_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_band_delete')), array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::deleteBandAction',));
                }
                not_api_band_delete:

                // api_band_add_image
                if (preg_match('#^/api/band/(?P<slug>[^/]++)/(?P<image>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_api_band_add_image;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_band_add_image')), array (  '_controller' => 'DataBundle\\Controller\\ApiBandController::addBandImageAction',));
                }
                not_api_band_add_image:

            }

            if (0 === strpos($pathinfo, '/api/concert')) {
                if (0 === strpos($pathinfo, '/api/concerts')) {
                    // api_concerts_list
                    if ($pathinfo === '/api/concerts') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_concerts_list;
                        }

                        return array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::getConcertAction',  '_route' => 'api_concerts_list',);
                    }
                    not_api_concerts_list:

                    // api_concert_show
                    if (preg_match('#^/api/concerts/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_concert_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_show')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::showConcertAction',));
                    }
                    not_api_concert_show:

                }

                // api_concert_get_band
                if (preg_match('#^/api/concert/(?P<id>[^/]++)/band$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_concert_get_band;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_get_band')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::getConcertBandAction',));
                }
                not_api_concert_get_band:

                // api_concert_patch_band
                if (preg_match('#^/api/concert/(?P<id>[^/]++)/band/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_api_concert_patch_band;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_patch_band')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::patchConcertBandAction',));
                }
                not_api_concert_patch_band:

                // api_concert_get_genre
                if (preg_match('#^/api/concert/(?P<id>[^/]++)/genre$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_concert_get_genre;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_get_genre')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::getConcertGenreAction',));
                }
                not_api_concert_get_genre:

                // api_concert_get_location
                if (preg_match('#^/api/concert/(?P<id>[^/]++)/location$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_concert_get_location;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_get_location')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::getConcertLocationAction',));
                }
                not_api_concert_get_location:

                // api_concert_get_date
                if (preg_match('#^/api/concert/(?P<id>[^/]++)/date$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_concert_get_date;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_get_date')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::getConcertDateAction',));
                }
                not_api_concert_get_date:

                // api_concert_create
                if ($pathinfo === '/api/concert/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_concert_create;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::postConcertAction',  '_route' => 'api_concert_create',);
                }
                not_api_concert_create:

                // api_concert_update
                if ($pathinfo === '/api/concert/') {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_api_concert_update;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::putConcertAction',  '_route' => 'api_concert_update',);
                }
                not_api_concert_update:

                // api_concert_delete
                if (preg_match('#^/api/concert/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_concert_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_concert_delete')), array (  '_controller' => 'DataBundle\\Controller\\ApiConcertController::deleteConcertAction',));
                }
                not_api_concert_delete:

            }

            if (0 === strpos($pathinfo, '/api/location')) {
                if (0 === strpos($pathinfo, '/api/locations')) {
                    // api_locations_list
                    if ($pathinfo === '/api/locations') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_locations_list;
                        }

                        return array (  '_controller' => 'DataBundle\\Controller\\ApiLocationController::getLocationAction',  '_route' => 'api_locations_list',);
                    }
                    not_api_locations_list:

                    // api_location_show
                    if (preg_match('#^/api/locations/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_location_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_location_show')), array (  '_controller' => 'DataBundle\\Controller\\ApiLocationController::showLocationAction',));
                    }
                    not_api_location_show:

                }

                // api_location_create
                if ($pathinfo === '/api/location/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_location_create;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiLocationController::postLocationAction',  '_route' => 'api_location_create',);
                }
                not_api_location_create:

                // api_location_update
                if ($pathinfo === '/api/location/') {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_api_location_update;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiLocationController::putLocationAction',  '_route' => 'api_location_update',);
                }
                not_api_location_update:

                // api_location_delete
                if (preg_match('#^/api/location/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_location_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_location_delete')), array (  '_controller' => 'DataBundle\\Controller\\ApiLocationController::deleteLocationAction',));
                }
                not_api_location_delete:

            }

            if (0 === strpos($pathinfo, '/api/media')) {
                // api_media_list
                if ($pathinfo === '/api/media') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_media_list;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiMediaController::getMediaAction',  '_route' => 'api_media_list',);
                }
                not_api_media_list:

                // api_media_create
                if ($pathinfo === '/api/media/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_media_create;
                    }

                    return array (  '_controller' => 'DataBundle\\Controller\\ApiMediaController::postMediaAction',  '_route' => 'api_media_create',);
                }
                not_api_media_create:

                // api_media_delete
                if (preg_match('#^/api/media/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_media_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_media_delete')), array (  '_controller' => 'DataBundle\\Controller\\ApiMediaController::deleteImageAction',));
                }
                not_api_media_delete:

            }

        }

        if (0 === strpos($pathinfo, '/band')) {
            if (0 === strpos($pathinfo, '/bands')) {
                // data_bandcrud_index
                if (0 === strpos($pathinfo, '/bands/all') && preg_match('#^/bands/all(?:/(?P<offset>[^/]++)(?:/(?P<limit>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_bandcrud_index')), array (  'offset' => 1,  'limit' => 10,  '_controller' => 'DataBundle\\Controller\\CRUDBandController::indexAction',));
                }

                // data_bandcrud_show
                if (preg_match('#^/bands/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_bandcrud_show')), array (  '_controller' => 'DataBundle\\Controller\\CRUDBandController::showAction',));
                }

            }

            // data_bandcrud_new
            if ($pathinfo === '/band/new') {
                return array (  '_controller' => 'DataBundle\\Controller\\CRUDBandController::newAction',  '_route' => 'data_bandcrud_new',);
            }

            // data_bandcrud_edit
            if (0 === strpos($pathinfo, '/band/edit') && preg_match('#^/band/edit/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_bandcrud_edit')), array (  '_controller' => 'DataBundle\\Controller\\CRUDBandController::editAction',));
            }

            // data_bandcrud_delete
            if (0 === strpos($pathinfo, '/band/delete') && preg_match('#^/band/delete/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_bandcrud_delete')), array (  '_controller' => 'DataBundle\\Controller\\CRUDBandController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/concert')) {
            if (0 === strpos($pathinfo, '/concerts')) {
                // data_concertcrud_index
                if (0 === strpos($pathinfo, '/concerts/all') && preg_match('#^/concerts/all(?:/(?P<offset>[^/]++)(?:/(?P<limit>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_concertcrud_index')), array (  'offset' => 1,  'limit' => 10,  '_controller' => 'DataBundle\\Controller\\CRUDConcertController::indexAction',));
                }

                // data_concertcrud_show
                if (preg_match('#^/concerts/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_concertcrud_show')), array (  '_controller' => 'DataBundle\\Controller\\CRUDConcertController::showAction',));
                }

            }

            // data_concertcrud_new
            if ($pathinfo === '/concert/new') {
                return array (  '_controller' => 'DataBundle\\Controller\\CRUDConcertController::newAction',  '_route' => 'data_concertcrud_new',);
            }

            // data_concertcrud_edit
            if (0 === strpos($pathinfo, '/concert/edit') && preg_match('#^/concert/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_concertcrud_edit')), array (  '_controller' => 'DataBundle\\Controller\\CRUDConcertController::editAction',));
            }

            // data_concertcrud_delete
            if (0 === strpos($pathinfo, '/concert/delete') && preg_match('#^/concert/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_concertcrud_delete')), array (  '_controller' => 'DataBundle\\Controller\\CRUDConcertController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/location')) {
            if (0 === strpos($pathinfo, '/locations')) {
                // data_locationcrud_index
                if (0 === strpos($pathinfo, '/locations/all') && preg_match('#^/locations/all(?:/(?P<offset>[^/]++)(?:/(?P<limit>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_locationcrud_index')), array (  'offset' => 1,  'limit' => 10,  '_controller' => 'DataBundle\\Controller\\CRUDLocationController::indexAction',));
                }

                // data_locationcrud_show
                if (preg_match('#^/locations/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_locationcrud_show')), array (  '_controller' => 'DataBundle\\Controller\\CRUDLocationController::showAction',));
                }

            }

            // data_locationcrud_new
            if ($pathinfo === '/location/new') {
                return array (  '_controller' => 'DataBundle\\Controller\\CRUDLocationController::newAction',  '_route' => 'data_locationcrud_new',);
            }

            // data_locationcrud_edit
            if (0 === strpos($pathinfo, '/location/edit') && preg_match('#^/location/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_locationcrud_edit')), array (  '_controller' => 'DataBundle\\Controller\\CRUDLocationController::editAction',));
            }

            // data_locationcrud_delete
            if (0 === strpos($pathinfo, '/location/delete') && preg_match('#^/location/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_locationcrud_delete')), array (  '_controller' => 'DataBundle\\Controller\\CRUDLocationController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/media')) {
            // data_mediacrud_index
            if (0 === strpos($pathinfo, '/media/all') && preg_match('#^/media/all(?:/(?P<offset>[^/]++)(?:/(?P<limit>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_mediacrud_index')), array (  'offset' => 1,  'limit' => 10,  '_controller' => 'DataBundle\\Controller\\CRUDMediaController::indexAction',));
            }

            // data_mediacrud_show
            if (preg_match('#^/media/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_mediacrud_show')), array (  '_controller' => 'DataBundle\\Controller\\CRUDMediaController::showAction',));
            }

        }

        // data_mediacrud_new
        if ($pathinfo === '/image/new') {
            return array (  '_controller' => 'DataBundle\\Controller\\CRUDMediaController::newAction',  '_route' => 'data_mediacrud_new',);
        }

        if (0 === strpos($pathinfo, '/location')) {
            // data_mediacrud_edit
            if (0 === strpos($pathinfo, '/location/edit') && preg_match('#^/location/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_mediacrud_edit')), array (  '_controller' => 'DataBundle\\Controller\\CRUDMediaController::editAction',));
            }

            // data_mediacrud_delete
            if (0 === strpos($pathinfo, '/location/delete') && preg_match('#^/location/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'data_mediacrud_delete')), array (  '_controller' => 'DataBundle\\Controller\\CRUDMediaController::deleteAction',));
            }

        }

        // data_default_index
        if ($pathinfo === '/test') {
            return array (  '_controller' => 'DataBundle\\Controller\\DefaultController::indexAction',  '_route' => 'data_default_index',);
        }

        if (0 === strpos($pathinfo, '/api')) {
            // mk_api_default_index
            if (rtrim($pathinfo, '/') === '/api') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_mk_api_default_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'mk_api_default_index');
                }

                return array (  '_controller' => 'MK\\ApiBundle\\Controller\\DefaultController::indexAction',  '_route' => 'mk_api_default_index',);
            }
            not_mk_api_default_index:

            // mk_api_default_testapipost
            if ($pathinfo === '/api/post') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_mk_api_default_testapipost;
                }

                return array (  '_controller' => 'MK\\ApiBundle\\Controller\\DefaultController::testAPiPOSTAction',  '_route' => 'mk_api_default_testapipost',);
            }
            not_mk_api_default_testapipost:

            if (0 === strpos($pathinfo, '/api/token')) {
                // new_token
                if ($pathinfo === '/api/token') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_new_token;
                    }

                    return array (  '_controller' => 'MK\\ApiBundle\\Controller\\TokenController::newTokenAction',  '_route' => 'new_token',);
                }
                not_new_token:

                // check_token
                if ($pathinfo === '/api/token') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_check_token;
                    }

                    return array (  '_controller' => 'MK\\ApiBundle\\Controller\\TokenController::checkTokenAction',  '_route' => 'check_token',);
                }
                not_check_token:

            }

        }

        // mk_user_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'mk_user_homepage');
            }

            return array (  '_controller' => 'MK\\UserBundle\\Controller\\DefaultController::indexAction',  '_route' => 'mk_user_homepage',);
        }

        // mk_user_admin
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'MK\\UserBundle\\Controller\\DefaultController::adminAction',  '_route' => 'mk_user_admin',);
        }

        // user_registration
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'MK\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'user_registration',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // secure_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'MK\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'secure_login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'MK\\UserBundle\\Controller\\SecurityController::loginCheckAction',  '_route' => 'login_check',);
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // nelmio_api_doc_index
        if (0 === strpos($pathinfo, '/doc') && preg_match('#^/doc(?:/(?P<view>[^/]++))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_nelmio_api_doc_index;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
        }
        not_nelmio_api_doc_index:

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
