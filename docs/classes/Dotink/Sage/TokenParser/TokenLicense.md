# `TokenLicense`
##Responsible for parsing license tokens in a docblock.

_Copyright (c) 2013, Matthew J. Sahagian_.
  _Please reference the LICENSE.txt file at the root of this distribution_

### Details

No additional parsing of the license string is done, however, in some documentation
templates it may be the case that if the string begins with 'http://' it could auto-link
assuming it's a URL to the license.

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

#### <span style="color:#3e6a6e;">validate()</span>

Validates that the copyright value looks OK

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

<dl>
	<dt markdown="1">
		`boolean`
	</dt>
	<dd>
		TRUE if the value validates, FALSE otherwise
	</dd>
</dl>


#### <span style="color:#3e6a6e;">parse()</span>

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

###### Returns

<dl>
	<dt markdown="1">
		`array`
	</dt>
	<dd>
		The information array
	</dd>
</dl>




