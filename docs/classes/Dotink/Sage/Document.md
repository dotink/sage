# `Document`



### Details




## Properties


### Instance Properties
#### <span style="color:#6a6e3d;">$description</span>

#### <span style="color:#6a6e3d;">$details</span>

#### <span style="color:#6a6e3d;">$info</span>

#### <span style="color:#6a6e3d;">$keys</span>

#### <span style="color:#6a6e3d;">$reflection</span>

#### <span style="color:#6a6e3d;">$type</span>

#### <span style="color:#6a6e3d;">$documents</span>

The internal documents collection



## Methods


### Instance Methods


#### <span style="color:#3e6a6e;">__construct()</span>
	
Creates a new document
			
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
				$reflection
			</td>
			<td>
				TokenReflection\IReflection
			</td>
			<td>
				The reflection to use
			</td>
		</tr>
					
		<tr>
			<td>
				$generator
			</td>
			<td>
				Generator
			</td>
			<td>
				The generator that is creating this document
			</td>
		</tr>
			
	</tbody>
</table>

	
#### <span style="color:#3e6a6e;">getDescription()</span>
			
#### <span style="color:#3e6a6e;">getDetails()</span>
			
#### <span style="color:#3e6a6e;">getInfo()</span>
			
#### <span style="color:#3e6a6e;">getReflection()</span>
	
Allows for getting the reflection for basic information
			
#### <span style="color:#3e6a6e;">getKeys()</span>
	
Allows for getting the keys of the document
			
#### <span style="color:#3e6a6e;">getType()</span>
	
Allows for getting the type of document
			
#### <span style="color:#3e6a6e;">hasInfo()</span>
			
#### <span style="color:#3e6a6e;">parseDocComment()</span>
			
#### <span style="color:#3e6a6e;">parseToken()</span>
	
Parses a token and adds it's value to the info array
			
#### <span style="color:#3e6a6e;">count()</span>
	
Allows the document query to be counted
			
#### <span style="color:#3e6a6e;">current()</span>
	
Gets the current value of the internal documents collection
			
#### <span style="color:#3e6a6e;">key()</span>
	
Gets the current key of the internal documents collection
			
#### <span style="color:#3e6a6e;">next()</span>
	
Moves the current element of the internal documents collection forward one
			
#### <span style="color:#3e6a6e;">query()</span>
	
Creates a new document query from the existing internal document collection
			
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
				$key
			</td>
			<td>
				string
			</td>
			<td>
				The key to filter the document collection by
			</td>
		</tr>
			
	</tbody>
</table>

	
#### <span style="color:#3e6a6e;">rewind()</span>
	
Moved the current element of the internal documents collection back to the beginning
			
#### <span style="color:#3e6a6e;">valid()</span>
	
Determine if the current key of an array is Valid
			

