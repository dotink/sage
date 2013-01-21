# `DocumentCollection`



### Details




## Properties


### Instance Properties
#### <span style="color:#6a6e3d;">$documents</span>

The internal documents collection



## Methods


### Instance Methods


#### <span style="color:#3e6a6e;">__construct()</span>
	
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
			

