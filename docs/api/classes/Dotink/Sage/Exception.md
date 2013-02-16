# `Exception`
## A custom exception class to differentiate Sage exceptions from other types.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Extends

[`\Exception`](http://www.php.net/class.exception.php)
### Details

This exception class supports using sprintf style arguments to construct a message.
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

[`Exception::$message`](http://www.php.net/class.exception.php#message Namespace: \) [`Exception::$string`](http://www.php.net/class.exception.php#string Namespace: \) [`Exception::$code`](http://www.php.net/class.exception.php#code Namespace: \) [`Exception::$file`](http://www.php.net/class.exception.php#file Namespace: \) [`Exception::$line`](http://www.php.net/class.exception.php#line Namespace: \) [`Exception::$trace`](http://www.php.net/class.exception.php#trace Namespace: \) [`Exception::$previous`](http://www.php.net/class.exception.php#previous Namespace: \) 

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

[`Exception::__clone()`](http://www.php.net/class.exception.php#__clone Namespace: \) [`Exception::getMessage()`](http://www.php.net/class.exception.php#getMessage Namespace: \) [`Exception::getCode()`](http://www.php.net/class.exception.php#getCode Namespace: \) [`Exception::getFile()`](http://www.php.net/class.exception.php#getFile Namespace: \) [`Exception::getLine()`](http://www.php.net/class.exception.php#getLine Namespace: \) [`Exception::getTrace()`](http://www.php.net/class.exception.php#getTrace Namespace: \) [`Exception::getPrevious()`](http://www.php.net/class.exception.php#getPrevious Namespace: \) [`Exception::getTraceAsString()`](http://www.php.net/class.exception.php#getTraceAsString Namespace: \) [`Exception::__toString()`](http://www.php.net/class.exception.php#__toString Namespace: \) 



