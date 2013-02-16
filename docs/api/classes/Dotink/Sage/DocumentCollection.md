# `DocumentCollection`
## A collection of documents which can be progressively filtered via simple queries

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Details

This class is countable as well as traversable so that it can be used in templating.
#### Authors

<table>
	<thead>
		<th>Name</th>
		<th>Handle</th>
		<th>Email</th>
	</thead>
	<tbody>
			<tr>
			<td>
				Matthew J. Sahagian
			</td>
			<td>
				mjs
			</td>
			<td>
				msahagian@dotink.org
			</td>
		</tr>
	
	</tbody>
</table>

## Properties

### Instance Properties
#### <span style="color:#6a6e3d;">$documents</span>

The internal documents collection

##### Details

This will be passed to any subqueries we might do which provides a progressive filtering
of any parent document collection




## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates a new document collection

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$documents
			</td>
			<td>
									<a href="http://www.php.net/language.types.array.php">array</a>
				
			</td>
			<td>
				The documents to be contained in the collection
			</td>
		</tr>
					
		<tr>
			<td>
				$key
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				A key to filter the documents by
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">count()</span>

Allows the document query to be counted

###### Returns

<dl>
	
		<dt>
			int
		</dt>
		<dd>
			The count of the internal documents collection
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">current()</span>

Gets the current value

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The currently pointed to value of the internal documents collection
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">key()</span>

Get the current key

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The currently pointed to key of the internal documents collection
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">next()</span>

Moves the current element of the internal documents collection forward one

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">query()</span>

Creates a new document query from the existing internal document collection

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$key
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The key to filter the document collection by
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			DocumentCollection
		</dt>
		<dd>
			The new traversable document query
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">rewind()</span>

Moved the current element of the internal documents collection back to the beginning

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">valid()</span>

Determine if the current key of an array is Valid

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			TRUE if the current key is valid, FALSE otherwise
		</dd>
	
</dl>





