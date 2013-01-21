# `TokenCopyright`
##Responsible for parsing copyright tokens in a docblock.

_Copyright (c) 2013, Matthew J. Sahagian_.
  _Please reference the LICENSE.txt file at the root of this distribution_

### Details

No additional parsing of the string which follows the copyright is done, so it will not
independently parse the year or names or anything like that.

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




