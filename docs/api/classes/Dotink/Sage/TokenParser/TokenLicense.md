# TokenLicense
## Responsible for parsing @license tokens in a docblock.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Details

No additional parsing of the license string is done, however, in some documentation
templates it may be the case that if the string begins with 'http://' it could auto-link
assuming it's a URL to the license.

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
			string
		</dt>
		<dd>
			The value for the token
		</dd>
	
</dl>






