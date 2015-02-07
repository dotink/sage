# Exception
## A custom exception class to differentiate Sage exceptions from other types.

_Copyright (c) 2013, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

### Extends

[`\Exception`](http://php.net/class.exception)

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

[`\Exception::$message`](http://php.net/class.exception#message) [`\Exception::$string`](http://php.net/class.exception#string) [`\Exception::$code`](http://php.net/class.exception#code) [`\Exception::$file`](http://php.net/class.exception#file) [`\Exception::$line`](http://php.net/class.exception#line) [`\Exception::$trace`](http://php.net/class.exception#trace) [`\Exception::$previous`](http://php.net/class.exception#previous) 

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
									<a href="http://php.net/language.types.string">string</a>
				
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
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
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
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				ad infinitum
			</td>
		</tr>
			
	</tbody>
</table>




### Inherited Methods

[`\Exception::__clone()`](http://php.net/class.exception#__clone) [`\Exception::getMessage()`](http://php.net/class.exception#getMessage) [`\Exception::getCode()`](http://php.net/class.exception#getCode) [`\Exception::getFile()`](http://php.net/class.exception#getFile) [`\Exception::getLine()`](http://php.net/class.exception#getLine) [`\Exception::getTrace()`](http://php.net/class.exception#getTrace) [`\Exception::getPrevious()`](http://php.net/class.exception#getPrevious) [`\Exception::getTraceAsString()`](http://php.net/class.exception#getTraceAsString) [`\Exception::__toString()`](http://php.net/class.exception#__toString) 



