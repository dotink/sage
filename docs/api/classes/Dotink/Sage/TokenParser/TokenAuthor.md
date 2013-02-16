# `TokenAuthor`
## Responsible for parsing @author tokens in a docblock.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Details

The parser will attempt to parse out `name`, `handle`, and `email` keys from strings which
look like the following:

`Matthew J. Sahagian [mjs] <msahagian@dotink.org>

If any one of these pieces is missing it should still get all the information that is
available with missing pieces represented as an empty string.
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
				string
			</td>
			<td>
				The value for the token
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

boolean
:    TRUE if the value validates, FALSE otherwise
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
				string
			</td>
			<td>
				The value for the token
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

array
:    A list of parsed information, keyed by information type





