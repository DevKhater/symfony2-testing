<?php

namespace DataBundle\Handler\HandlerInterface;

use DataBundle\Model\BandInterface;

interface BandHandlerInterface
{
    /**
     * Get a Band given the identifier
     *
     * @api
     *
     * @param mixed $id
     *
     * @return BandInterface
     */
    public function get($slug);

    /**
     * Get a list of Bands.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0);

    /**
     * Post Band, creates a new Band.
     *
     * @api
     *
     * @param array $parameters
     *
     * @return BandInterface
     */
    public function post( $parameters);

    /**
     * Edit a Band.
     *
     * @api
     *
     * @param BandInterface   $page
     * @param array           $parameters
     *
     * @return BandInterface
     */
    public function put(BandInterface $page, array $parameters);

    /**
     * Partially update a Band.
     *
     * @api
     *
     * @param BandInterface   $page
     * @param array           $parameters
     *
     * @return BandInterface
     */
    public function patch(BandInterface $page, $parameters);
}