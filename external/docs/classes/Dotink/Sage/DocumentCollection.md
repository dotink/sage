# `DocumentCollection`



### Details




## Properties


### Instance Properties
#### <span style="color:#6a6e3d;">$documents</span>

The internal documents collection



## Methods


### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates a new document query, a progressively filterable collection of documents

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
				array
			</td>
			<td>
				An array of documents to filter
			</td>
		</tr>
					
		<tr>
			<td>
				$key
			</td>
			<td>
				string
			</td>
			<td>
				The key to ensure the document has
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
				string
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



