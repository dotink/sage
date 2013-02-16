# Exception
## A custom exception class to differentiate Sage exceptions from other types.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Extends

[`\Exception`](http://www.php.net/class.exception.php)

### Details

This exception class supports using sprintf style arguments to construct a message.

#### Namespace

`Dotink\Sage`

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

### Inherited Properties

[`\Exception::$message`](http://www.php.net/class.exception.php#message) [`\Exception::$string`](http://www.php.net/class.exception.php#string) [`\Exception::$code`](http://www.php.net/class.exception.php#code) [`\Exception::$file`](http://www.php.net/class.exception.php#file) [`\Exception::$line`](http://www.php.net/class.exception.php#line) [`\Exception::$trace`](http://www.php.net/class.exception.php#trace) [`\Exception::$previous`](http://www.php.net/class.exception.php#previous) 

## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates a new Sage exception

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
				$message
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				A printf style message
			</td>
		</tr>
					
		<tr>
			<td>
				$compontent
			</td>
			<td>
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
			</td>
			<td>
				A component for any placeholders in the message
			</td>
		</tr>
					
		<tr>
			<td>
				$...
			</td>
			<td>
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
			</td>
			<td>
				ad infinitum
			</td>
		</tr>
			
	</tbody>
</table>



### Inherited Methods

[`\Exception::__clone()`](http://www.php.net/class.exception.php#__clone) [`\Exception::getMessage()`](http://www.php.net/class.exception.php#getMessage) [`\Exception::getCode()`](http://www.php.net/class.exception.php#getCode) [`\Exception::getFile()`](http://www.php.net/class.exception.php#getFile) [`\Exception::getLine()`](http://www.php.net/class.exception.php#getLine) [`\Exception::getTrace()`](http://www.php.net/class.exception.php#getTrace) [`\Exception::getPrevious()`](http://www.php.net/class.exception.php#getPrevious) [`\Exception::getTraceAsString()`](http://www.php.net/class.exception.php#getTraceAsString) [`\Exception::__toString()`](http://www.php.net/class.exception.php#__toString) 



