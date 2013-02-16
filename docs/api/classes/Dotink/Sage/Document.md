# `Document`
## A representation of a single document in the documentation.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Extends

[`\Dotink\Sage\DocumentCollection`](./DocumentCollection.md)
### Details

Although these are generally thought of as single pages, it is possible for them to be
nested in one another.  That is to say, because a `Document` is also a `DocumentCollection`
it may contain additional sub-documents.  Classes for example will contain Methods.
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
#### <span style="color:#6a6e3d;">$context</span>

The context for the document's reflection

#### <span style="color:#6a6e3d;">$description</span>

The description of the document as parsed from the docblock

#### <span style="color:#6a6e3d;">$details</span>

The details of the document as parsed from the docblock

#### <span style="color:#6a6e3d;">$info</span>

The information array which contains tokens and their parsed values

#### <span style="color:#6a6e3d;">$keys</span>

The keys associated with this document (static, final, abstract, public, etc)

#### <span style="color:#6a6e3d;">$reflection</span>

The token reflection for the document

#### <span style="color:#6a6e3d;">$type</span>

The type of this document (class, method, property, trait, etc)



### Inherited Properties

[`DocumentCollection::$documents`](./DocumentCollection.md#documents) 

## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates a new document

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
									<a href="http://andrewsville.github.com/PHP-Token-Reflection/class-TokenReflection.IReflection.html">IReflection</a>
				
			</td>
			<td>
				The reflection to use
			</td>
		</tr>
					
		<tr>
			<td>
				$generator
			</td>
			<td>
									<a href="./Generator.md">Generator</a>
				
			</td>
			<td>
				The generator that is creating this document
			</td>
		</tr>
					
		<tr>
			<td>
				$context
			</td>
			<td>
									<a href="http://andrewsville.github.com/PHP-Token-Reflection/class-TokenReflection.IReflection.html">IReflection</a>
				
			</td>
			<td>
				The context where the reflection was found
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			Document
		</dt>
		<dd>
			The document for method chaining
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getContext()</span>

Get's the context reflection for this document

###### Returns

<dl>
	
		<dt>
			IReflection
		</dt>
		<dd>
			The reflection for the document's context
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getDescription()</span>

Gets the description of the document

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The description of the document
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getDetails()</span>

Gets the details of the document

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The details of the document
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getInfo()</span>

Gets the information for a particular token

##### Details

When a token is retrieved using this method it is removed from the information stack.
This allows you to iterate with this method to extract all values in templating.

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
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The token to get information for
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			An array or string containing the parsed information
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getReflection()</span>

Allows for getting the reflection for additional information about the `Document`

###### Returns

<dl>
	
		<dt>
			IReflection
		</dt>
		<dd>
			The reflection that the document represents
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getKeys()</span>

Allows for getting the keys of the document

###### Returns

<dl>
	
		<dt>
			array
		</dt>
		<dd>
			The keys assigned to the document
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getType()</span>

Allows for getting the type of document

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The type of the document
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">hasInfo()</span>

Determines if token information is available in the information array

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			TRUE if there is information for that token, FALSE otherwise
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">keyModifiers()</span>

Keys any modifier information we can glean from our reflection

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
				$context
			</td>
			<td>
									<a href="http://andrewsville.github.com/PHP-Token-Reflection/class-TokenReflection.IReflection.html">IReflection</a>
				
			</td>
			<td>
				The context with which we want to analyze the reflection
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

#### <span style="color:#3e6a6e;">parseDocComment()</span>

Parses a doc comment (intelligently)

##### Details

Unlike other docblock parsers, we do not require the "short description" to be a single
line.  Instead we look for the first line break to split the "description" vs. the
details which is every line that follows until the first `@`.

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

#### <span style="color:#3e6a6e;">parseToken()</span>

Parses a token and adds it's value to the info array

##### Details

This method looks to the generator to get a token parser and then attempts to parse
a value using that token parser.

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
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The token (type) we're parding
			</td>
		</tr>
					
		<tr>
			<td>
				$value
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The value (all content after the token itself)
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
		In the event the parser does not validate the value
	</dd>

</dl>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>



### Inherited Methods

[`DocumentCollection::count()`](./DocumentCollection.md#count) [`DocumentCollection::current()`](./DocumentCollection.md#current) [`DocumentCollection::key()`](./DocumentCollection.md#key) [`DocumentCollection::next()`](./DocumentCollection.md#next) [`DocumentCollection::query()`](./DocumentCollection.md#query) [`DocumentCollection::rewind()`](./DocumentCollection.md#rewind) [`DocumentCollection::valid()`](./DocumentCollection.md#valid) 



