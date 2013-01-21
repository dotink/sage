# `Exception`
##A custom exception class to differentiate Sage exceptions from other types.

_Copyright (c) 2013, Matthew J. Sahagian_.
  _Please reference the LICENSE.txt file at the root of this distribution_

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


### Instance Properties
#### <span style="color:#6a6e3d;">$message</span>

#### <span style="color:#6a6e3d;">$string</span>

#### <span style="color:#6a6e3d;">$code</span>

#### <span style="color:#6a6e3d;">$file</span>

#### <span style="color:#6a6e3d;">$line</span>

#### <span style="color:#6a6e3d;">$trace</span>

#### <span style="color:#6a6e3d;">$previous</span>



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
				string
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
				mixed
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
				mixed
			</td>
			<td>
				ad infinitum
			</td>
		</tr>
			
	</tbody>
</table>

<hr />

#### <span style="color:#3e6a6e;">__clone()</span>

<hr />

#### <span style="color:#3e6a6e;">getMessage()</span>

<hr />

#### <span style="color:#3e6a6e;">getCode()</span>

<hr />

#### <span style="color:#3e6a6e;">getFile()</span>

<hr />

#### <span style="color:#3e6a6e;">getLine()</span>

<hr />

#### <span style="color:#3e6a6e;">getTrace()</span>

<hr />

#### <span style="color:#3e6a6e;">getPrevious()</span>

<hr />

#### <span style="color:#3e6a6e;">getTraceAsString()</span>

<hr />

#### <span style="color:#3e6a6e;">__toString()</span>



