# Document

## Properties

	


## Methods
		
### Instance Methods
		
#### __construct()
			
Creates a new document
									
###### Parameters

<table>
	<thead>
		<th>Type</th>
		<th>Param</th>
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
									
	</tbody>
</table>

					
#### getDescription()
											
#### getDetails()
											
#### getInfo()
											
#### getReflection()
			
Allows for getting the reflection for basic information
											
#### getKeys()
			
Allows for getting the keys of the document
											
#### getType()
			
Allows for getting the type of document
											
#### hasInfo()
											
#### parseDocComment()
											
#### parseToken()
			
Parses a token and adds it's value to the info array
											
#### count()
			
Allows the document query to be counted
											
#### current()
			
Gets the current value of the internal documents collection
											
#### key()
			
Gets the current key of the internal documents collection
											
#### next()
			
Moves the current element of the internal documents collection forward one
											
#### query()
			
Creates a new document query from the existing internal document collection
									
###### Parameters

<table>
	<thead>
		<th>Type</th>
		<th>Param</th>
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

					
#### rewind()
			
Moved the current element of the internal documents collection back to the beginning
											
#### valid()
			
Determine if the current key of an array is Valid
												


