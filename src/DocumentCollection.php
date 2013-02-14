<?php namespace Dotink\Sage {

	/**
	 * A collection of documents which can be progressively filtered via simple queries
	 *
	 * This class is countable as well as traversable so that it can be used in templating.
	 *
	 * @copyright Copyright (c) 2013, Matthew J. Sahagian
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Sage
	 */
	class DocumentCollection implements \Iterator, \Countable
	{
		/**
		 * The internal documents collection
		 *
		 * This will be passed to any subqueries we might do which provides a progressive filtering
		 * of any parent document collection
		 *
		 * @access protected
		 * @var array
		 */
		protected $documents = array();


		/**
		 * Creates a new document query, a progressively filterable collection of documents
		 *
		 * @access public
		 * @param array $documents An array of documents to filter
		 * @param string $key The key to ensure the document has
		 * @return void
		 */
		public function __construct(array $documents, $key)
		{
			if ($key[0] == '!') {
				foreach ($documents as $document) {
					if (array_search(substr($key, 1), $document->getKeys()) === FALSE) {
						$this->documents[] = $document;
					}
				}

			} else {
				foreach ($documents as $document) {
					if (array_search($key, $document->getKeys()) !== FALSE) {
						$this->documents[] = $document;
					}
				}
			}
		}


		/**
		 * Allows the document query to be counted
		 *
		 * @access public
		 * @return int The count of the internal documents collection
		 */
		public function count()
		{
			return count($this->documents);
		}


		/**
		 * Gets the current value
		 *
		 * @access public
		 * @return mixed The currently pointed to value of the internal documents collection
		 */
		public function current()
		{
			return current($this->documents);
		}


		/**
		 * Get the current key
		 *
		 * @access public
		 * @return mixed The currently pointed to key of the internal documents collection
		 */
		public function key()
		{
			return key($this->documents);
		}


		/**
		 * Moves the current element of the internal documents collection forward one
		 *
		 * @access public
		 * @return void
		 */
		public function next()
		{
			next($this->documents);
		}


		/**
		 * Creates a new document query from the existing internal document collection
		 *
		 * @access public
		 * @param string $key The key to filter the document collection by
		 * @return DocumentCollection The new traversable document query
		 */
		public function query($key)
		{
			return new self($this->documents, $key);
		}


		/**
		 * Moved the current element of the internal documents collection back to the beginning
		 *
		 * @access public
		 * @return void
		 */
		public function rewind()
		{
			reset($this->documents);
		}


		/**
		 * Determine if the current key of an array is Valid
		 *
		 * @access public
		 * @return boolean TRUE if the current key is valid, FALSE otherwise
		 */
		public function valid()
		{
			return key($this->documents) !== NULL;
		}
	}
}
