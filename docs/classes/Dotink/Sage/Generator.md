# Generator

## Properties

	


## Methods
		
### Instance Methods
		
#### __construct()
			
Creates a new generator
									
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
				$broker
			</td>
			<td>
				TokenReflection\Broker
			</td>
			<td>
				The token reflection broker to use for reflection
			</td>
		</tr>
									
	</tbody>
</table>

					
#### getTokenParser()
			
Gets the token parser class for a given token
									
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
				$token
			</td>
			<td>
				string
			</td>
			<td>
				The token to get a parser for
			</td>
		</tr>
									
	</tbody>
</table>

					
#### run()
			
Runs the documentation generator
									
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
				$input_path
			</td>
			<td>
				string
			</td>
			<td>
				A relative or absolute directory to scan
			</td>
		</tr>
														
		<tr>
			<td>
				$options
			</td>
			<td>
				array
			</td>
			<td>
				An array of options and their values
			</td>
		</tr>
									
	</tbody>
</table>

					
#### makeDocumentCollection()
			
Makes a document collection
						
##### Details

If the document collection is sorted by type then.
						
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
				array
			</td>
			<td>
				A list of token reflections
			</td>
		</tr>
														
		<tr>
			<td>
				$sort_by_type
			</td>
			<td>
				boolean
			</td>
			<td>
				Whether or not we should sort by type
			</td>
		</tr>
									
	</tbody>
</table>

					
#### configTokenParsers()
			
Configures token parsers from an array, filtering out bad ones
									
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
				$token_parsers
			</td>
			<td>
				array
			</td>
			<td>
				A list of classes for parsing tokens, keyed by the token
			</td>
		</tr>
									
	</tbody>
</table>

					
#### setInputPath()
			
Sets the input path with validation
									
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
				$input_path
			</td>
			<td>
				string
			</td>
			<td>
				A relative or absolute directory to scan
			</td>
		</tr>
									
	</tbody>
</table>

						


