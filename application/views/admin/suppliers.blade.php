@layout('layout.admin')

@section('title')
Supplier
@endsection

@section('content')
<div>
	<!-- Button to trigger modal -->
    <a href="#create-modal" role="button" class="btn" data-toggle="modal" style="float:right"><i class="icon-plus"></i> New</a>
     
    <!-- Create Modal -->
    <div id="create-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		{{ Form::open('admin/suppliers/create', '', array('class' => 'form-horizontal')); }}
	    <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Supplier</h3>
	    </div>
	    <div class="modal-body">
			    <div class="control-group">
				    <label class="control-label" for="inputName">Name</label>
				    <div class="controls">
				    	<input type="text" id="inputName" placeholder="Name" name="name">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputAddress">Address</label>
				    <div class="controls">
				    	<input type="text" id="inputAddress" placeholder="Address" name="address">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputTel">Tel</label>
				    <div class="controls">
				    	<input type="text" id="inputTel" placeholder="Tel" name="tel">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputContact">Contact</label>
				    <div class="controls">
				    	<input type="text" id="inputContact" placeholder="Contact" name="contact">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputContact Tel">Contact Tel</label>
				    <div class="controls">
				    	<input type="text" id="inputContact Tel" placeholder="Contact Tel" name="contact_tel">
			    	</div>
			    </div>
	    </div>
	    <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <input type="submit" class="btn btn-primary" value="Save changes" />
	    </div>
	    {{ Form::close() }}
    </div>

	<h1>Supplier</h1>	
	<hr>    

	<!-- Report Message -->
	@if ($result !== false and ! is_null($result))
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert" type="button">×</button>
			{{ $result }}
		</div>
	@endif

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Address</th>
				<th>Tel</th>
				<th>Contact</th>
				<th>Contact Tel</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($suppliers->results as $supplier)
			<tr>
				<td>{{ $supplier->id }}</td>
				<td>{{ $supplier->name }}</td>
				<td>{{ $supplier->address }}</td>
				<td>{{ $supplier->tel }}</td>
				<td>{{ $supplier->contact }}</td>
				<td>{{ $supplier->contact_tel }}</td>
				<td>
					<a href="#create-update-{{ $supplier->id }}" role="button" class="btn" data-toggle="modal"><i class="icon-pencil"></i></a>
					<a href="/admin/suppliers/delete/{{ $supplier->id }}" role="button" class="btn"><i class="icon-trash"></i></a>
				    <div id="create-update-{{ $supplier->id }}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						{{ Form::open('admin/suppliers/update/'.$supplier->id, '', array('class' => 'form-horizontal')) }}
					    <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">{{ $supplier->name }}</h3>
					    </div>
					    <div class="modal-body">
							    <div class="control-group">
								    <label class="control-label" for="inputName">Name</label>
								    <div class="controls">
								    	<input type="text" id="inputName" placeholder="Name" name="name" value="{{ $supplier->name }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputAddress">Address</label>
								    <div class="controls">
								    	<input type="text" id="inputAddress" placeholder="Address" name="address" value="{{ $supplier->address }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputTel">Tel</label>
								    <div class="controls">
								    	<input type="text" id="inputTel" placeholder="Tel" name="tel" value="{{ $supplier->tel }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputContact">Contact</label>
								    <div class="controls">
								    	<input type="text" id="inputContact" placeholder="Contact" name="contact" value="{{ $supplier->contact }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputContact Tel">Contact Tel</label>
								    <div class="controls">
								    	<input type="text" id="inputContact Tel" placeholder="Contact Tel" name="contact_tel" value="{{ $supplier->contact_tel }}">
							    	</div>
							    </div>
					    </div>
					    <div class="modal-footer">
						    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						    <input type="submit" class="btn btn-primary" value="Save changes" />
					    </div>
	    				{{ Form::close() }}
    				</div>
				</td>
			</tr>
			@empty
			<tr><td colspan="7" class="center">No result found.</td></tr>
			@endforelse
		</tbody>
	</table>
    {{ $suppliers->links() }}
</div>
@endsection