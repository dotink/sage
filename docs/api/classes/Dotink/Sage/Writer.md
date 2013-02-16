# Writer
## Provides documentation writing services by outputting to a particular directory

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_


#### Namespace

`Dotink\Sage`

#### Imports

<table>

	<tr>
		<th>Alias</th>
		<th>Namespace / Class</th>
	</tr>
	
	<tr>
		<td>IReflection</td>
		<td>TokenReflection\IReflection</td>
	</tr>
	
</table>

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
#### <span style="color:#6a6e3d;">$currentWriteDocument</span>

The current document being written to.

#### <span style="color:#6a6e3d;">$externalDocs</span>

The list of external documents and their links

#### <span style="color:#6a6e3d;">$outputPath</span>

The output path for this writer

#### <span style="color:#6a6e3d;">$references</span>

Compiled references list [file => document]




## Methods
### Static Methods
<hr />

#### <span style="color:#3e6a6e;">isStandardType()</span>

Determines whether a reference is a standard type

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
				$reference
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The reference to chck
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			TRUE if the reference is a stndard type, FALSE otherwise
		</dd>
	
</dl>



### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates a new writer

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
				$output_path
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The output path where we will be writing documentation to
			</td>
		</tr>
					
		<tr>
			<td>
				$template_directory
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The directory containing our templates
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

#### <span style="color:#3e6a6e;">buildDocumentation()</span>

Builds documentation from an array of documents

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
				A document collection keyed by directory structure
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

#### <span style="color:#3e6a6e;">reduce()</span>

Reduces a reference in a given context

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
				$reference
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The reference to reduce
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
				The reflection context for reduction
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
			The reduced reference
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">expand()</span>

Expands a reference in a given context

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
				$reference
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The reference to expand
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
				The reflection context for expansion
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
			The expanded reference
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">getLink()</span>

Gets a relative link to a particular document

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
				$document
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The document to get a link to
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
			The relative link to the documentation
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">setExternalDocs()</span>

Sets external doc links used with `getLink()`

##### Details

The format of the `$links` argument should be an array whose keys match a possible
reference in the document.  Possible references include things like class, trait, and
interface names as well as standard PHP types and keywords.

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
				$links
			</td>
			<td>
									<a href="http://www.php.net/language.types.array.php">array</a>
				
			</td>
			<td>
				The external links configuration
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			Writer
		</dt>
		<dd>
			The writer for method chaining
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">compile()</span>

Compiles references of file paths to documents

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
				A document collection keyed by directory structure
			</td>
		</tr>
					
		<tr>
			<td>
				$output_path
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The output path for the document collection
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			array
		</dt>
		<dd>
			The array of file => document references
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">setOutputPath()</span>

Sets the output path with validation

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
				$output_path
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				A relative or absolute directory to hold output
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
			The absolute real path for output
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">setTemplateDirectory()</span>

Sets the template directory with validation

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
				$template_directory
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The directory containing templates to set
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
		If the directory cannot be found or is not readable
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

<hr />

#### <span style="color:#3e6a6e;">write()</span>

Writes all the documentation out to a file

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>





