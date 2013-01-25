@layout('layout.admin')

@section('title')
Materials
@endsection

@section('content')
<div id="admin-materials">
	<!-- Report Message -->
	@if ($report_message !== false and ! is_null($report_message))
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert" type="button">×</button>
			{{ $report_message }}
		</div>
	@endif

	<!-- Button to trigger modal -->
    <a href="#create-modal" role="button" class="btn" data-toggle="modal" style="float:right"><i class="icon-plus"></i> {{ __('admin.button_create') }}</a>
     
    <!-- Create Modal -->
    <div id="create-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		{{ Form::open('admin/materials/create', '', array('class' => 'form-horizontal')); }}
	    <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Material</h3>
	    </div>
	    <div class="modal-body">
			    <div class="control-group">
				    <label class="control-label" for="inputName">{{ __('admin.name') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputName" placeholder="Name" name="name">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputTotal">{{ __('admin.total') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputTotal" placeholder="Total" name="total">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputUnit">{{ __('admin.unit') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputUnit" placeholder="Unit" name="unit">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputMin Stock">{{ __('materials.min_stock') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputMin Stock" placeholder="Min Stock" name="min_Stock">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputMax Stock">{{ __('materials.max_stock') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputMax Stock" placeholder="Max Stock" name="max_stock">
			    	</div>
			    </div>
	    </div>
	    <div class="modal-footer">
		    <input type="submit" class="btn btn-primary" value="Save" />
	    </div>
	    {{ Form::close() }}
    </div>

	<h1>Materials</h1>	
	<hr>    

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>{{ __('admin.name') }}</th>
				<th>{{ __('admin.total') }}</th>
				<th>{{ __('materials.min_stock') }}</th>
				<th>{{ __('materials.max_stock') }}</th>
				<th>{{ __('admin.unit') }}</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($query->results as $data)
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->name }}</td>
				<td>{{ $data->total }}</td>
				<td>{{ $data->min_stock }}</td>
				<td>{{ $data->max_stock }}</td>
				<td>{{ $data->unit }}</td>
				<td class="right">
					<a href="#create-update-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_update') }}"><i class="icon-pencil"></i></a>
					<a href="/admin/materials/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>

				    <div id="create-update-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						{{ Form::open('admin/materials/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
					    <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="{{ __('admin.button_close') }}">×</button>
						    <h3 id="myModalLabel">{{ $data->name }}</h3>
					    </div>
					    <div class="modal-body">
							    <div class="control-group">
								    <label class="control-label" for="inputName">{{ __('admin.name') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputName" placeholder="Name" name="name" value="{{ $data->name }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputTotal">{{ __('admin.total') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputTotal" placeholder="Total" name="total" value="{{ $data->total }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputUnit">{{ __('admin.unit') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputUnit" placeholder="Unit" name="unit" value="{{ $data->unit }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputMin Stock">{{ __('materials.min_stock') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputMin Stock" placeholder="Min Stock" name="min_stock" value="{{ $data->min_stock }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputMax Stock">{{ __('materials.max_stock') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputMax Stock" placeholder="Max Stock" name="max_stock" value="{{ $data->max_stock }}">
							    	</div>
							    </div>
					    </div>
					    <div class="modal-footer">
						    <input type="submit" class="btn btn-primary" value="{{ __('admin.button_save') }}" />
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
    {{ $query->links() }}
</div>
@endsection