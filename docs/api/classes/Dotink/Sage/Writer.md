# `Writer`
## Provides documentation writing services by outputting to a particular directory

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
#### <span style="color:#6a6e3d;">$currentWriteDocument</span>

The current document being written to.

#### <span style="color:#6a6e3d;">$outputPath</span>

The output path for this writer

#### <span style="color:#6a6e3d;">$references</span>

Compiled references list [file => document]




## Methods

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
				string
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
				string
			</td>
			<td>
				The directory containing our templates
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

void
:    Provides no return value.

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
				array
			</td>
			<td>
				A document collection keyed by directory structure
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

void
:    Provides no return value.

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
				string
			</td>
			<td>
				The document to get a link to
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

string
:    The relative link to the documentation

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
				array
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
				string
			</td>
			<td>
				The output path for the document collection
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

array
:    The array of file => document references

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
				string
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

string
:    The absolute real path for output

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
				string
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

void
:    Provides no return value.

<hr />

#### <span style="color:#3e6a6e;">write()</span>

Writes all the documentation out to a file

###### Returns

void
:    Provides no return value.





