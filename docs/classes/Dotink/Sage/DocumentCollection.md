# `DocumentCollection`



### Details




## Properties


### Instance Properties
#### $documents
The internal documents collection



## Methods


### Instance Methods


#### __construct()
	
Creates a new document query, a progressively filterable collection of documents
			
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
				$documents
			</td>
			<td>
				array
			</td>
			<td>
				An array of documents to filter
			</td>
		</tr>
					
		<tr>
			<td>
				$key
			</td>
			<td>
				string
			</td>
			<td>
				The key to ensure the document has
			</td>
		</tr>
			
	</tbody>
</table>

	
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

	
#### rewind()
	
Moved the current element of the internal documents collection back to the beginning
			
#### valid()
	
Determine if the current key of an array is Valid
			

