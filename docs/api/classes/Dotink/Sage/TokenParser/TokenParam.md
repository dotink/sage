# TokenParam
## Responsible for parsing @param tokens in a docblock.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Details

Each parameter token will be parsed into an array containing a `name`, `types`, and
`details` key.  The `type` key will be an array as well in the event the parameter can
be passed as multiple types.

Examples of what is parseable:

- `@param string $name Description of what this parameter is`
- `@param string|File $input_file The file we want to read from`
- `@param ...`

If the param token is followed by a simple '...' it will automatically represent a ad
infinitum number of repetitions of the preceding param.

#### Namespace

`Dotink\Sage\TokenParser`

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
### Static Properties
#### <span style="color:#6a6e3d;">$previousDefinition</span>

The previous definition used for reference in the event of `...`





## Methods
### Static Methods
<hr />

#### <span style="color:#3e6a6e;">validate()</span>

Validates that the value for the token looks OK

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
				$value
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The value for the token
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
			TRUE if the value validates, FALSE otherwise
		</dd>
	
</dl>

<hr />

#### <span style="color:#3e6a6e;">parse()</span>

Parses the value into usable information

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
				$value
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The value for the token
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
			A list of parsed information, keyed by information type
		</dd>
	
</dl>






