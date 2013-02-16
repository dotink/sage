# `Generator`
## Provides documentation generation service by reading a particular source directory

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_
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
#### <span style="color:#6a6e3d;">$broker</span>

The token reflection broker of the generator

#### <span style="color:#6a6e3d;">$documents</span>

A collection of documents

#### <span style="color:#6a6e3d;">$inputPath</span>

The input path we will be scanning for source code

#### <span style="color:#6a6e3d;">$options</span>

Options and values for the generator




## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates a new generator

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
				$broker
			</td>
			<td>
				TokenReflection\Broker
			</td>
			<td>
				The token reflection broker to use for reflection
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

#### <span style="color:#3e6a6e;">getTokenParser()</span>

Gets the token parser class for a given token

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
				$token
			</td>
			<td>
				string
			</td>
			<td>
				The token to get a parser for
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The class for parsing the token, or NULL if not available
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">run()</span>

Runs the documentation generator

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
				$input_path
			</td>
			<td>
				string
			</td>
			<td>
				A relative or absolute directory to scan
			</td>
		</tr>
					
		<tr>
			<td>
				$options
			</td>
			<td>
				array
			</td>
			<td>
				An array of options and their values
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

#### <span style="color:#3e6a6e;">makeDocumentCollection()</span>

Makes a document collection

##### Details

If the document collection is sorted by type then then the various documents will still
be in separate directories per namespace, however, they will be rooted based on the
type of structure.  So, for example:

`/classes/Dotink/Sage/Generator.md`

Which without sorting by type would normally be in:

`/Dotink/Sage/Generator.md`

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
				$reflection
			</td>
			<td>
				array
			</td>
			<td>
				A list of token reflections
			</td>
		</tr>
					
		<tr>
			<td>
				$sort_by_type
			</td>
			<td>
				boolean
			</td>
			<td>
				Whether or not we should sort by type
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

#### <span style="color:#3e6a6e;">configTokenParsers()</span>

Configures token parsers from an array, filtering out bad ones

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
				$token_parsers
			</td>
			<td>
				array
			</td>
			<td>
				A list of classes for parsing tokens, keyed by the token
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

#### <span style="color:#3e6a6e;">setInputPath()</span>

Sets the input path with validation

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
				$input_path
			</td>
			<td>
				string
			</td>
			<td>
				A relative or absolute directory to scan
			</td>
		</tr>
			
	</tbody>
</table>

###### Throws

<dl>

	<dt>
					Dotink\Sage\Exception		
	</dt>
	<dd>
		If the path cannot be used for various reasons
	</dd>

</dl>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The absolute real path for input
		</dd>
	
</dl>





