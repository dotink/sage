# Writer



## Methods
		
### Instance Methods
		
#### __construct()
			
Creates a new writer
									
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
				$output_path
			</td>
			<td>
				string
			</td>
			<td>
				The output path where we will be writing documentation to
			</td>
		</tr>
														
		<tr>
			<td>
				$template_directory
			</td>
			<td>
				string
			</td>
			<td>
				The directory containing our templates
			</td>
		</tr>
									
	</tbody>
</table>

					
#### buildDocumentation()
			
Builds documentation from an array of documents
									
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
				$documents
			</td>
			<td>
				array
			</td>
			<td>
				A document collection keyed by directory structure
			</td>
		</tr>
									
	</tbody>
</table>

					
#### buildDocumentationInFile()
			
Builds our documentation for a single document in a particular file
									
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
				$document
			</td>
			<td>
				array
			</td>
			<td>
				A document to build documentation for
			</td>
		</tr>
														
		<tr>
			<td>
				$file
			</td>
			<td>
				string
			</td>
			<td>
				The file to build the documentation in
			</td>
		</tr>
									
	</tbody>
</table>

					
#### buildDocumentationInPath()
			
Builds our documentation in a particular directory
									
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
				$documents
			</td>
			<td>
				array
			</td>
			<td>
				A document collection keyed by directory structure
			</td>
		</tr>
														
		<tr>
			<td>
				$output_path
			</td>
			<td>
				string
			</td>
			<td>
				The output path for the document collection
			</td>
		</tr>
									
	</tbody>
</table>

					
#### setOutputPath()
			
Sets the output path with validation
									
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
				$output_path
			</td>
			<td>
				string
			</td>
			<td>
				A relative or absolute directory to hold output
			</td>
		</tr>
									
	</tbody>
</table>

					
#### setTemplateDirectory()
			
Sets the template directory with validation
									
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
				$template_directory
			</td>
			<td>
				string
			</td>
			<td>
				The directory containing templates to set
			</td>
		</tr>
									
	</tbody>
</table>

						


