# `Param` (Responsible for parsing parameter tokens in a docblock.)


_Copyright (c) 2013, Matthew J. Sahagian_

## Details

Each parameter token will be parsed into an array containing a `name`, `types`, and
`details` key.  The `type` key will be an array as well in the event the parameter can
be passed as multiple types.

Examples of what is parseable:

- `@param string $name Description of what this parameter is`
- `@param string|File $input_file The file we want to read from`
- `@param ...`

If the param token is followed by a simple '...' it will automatically represent a ad
infinitum number of repetitions of the preceding param.

### Authors

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

#### $previousDefinition
The previous definition used for reference in the event of `...`



## Methods

### Static Methods


#### validate()
	
Validates that the value looks like a proper param
			
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
				string
			</td>
			<td>
				The value for the token
			</td>
		</tr>
			
	</tbody>
</table>

	
#### parse()
	
Parses the value into an information array
			
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
				string
			</td>
			<td>
				The value for the token
			</td>
		</tr>
			
	</tbody>
</table>

	


